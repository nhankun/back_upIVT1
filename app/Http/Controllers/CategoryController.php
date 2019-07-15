<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreCategoryPost;
use App\Http\Requests\UpdateCategoryPost;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryPost $request)
    {
        $data = $request->only('name');
        $category = Category::create($data);

        return redirect()->route('category.create')->with('success','Create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryPost $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->back()->with('success','Edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if (count($category->products)>0)
        {
            return redirect()->route('category.index')->with('error','Can\'t delete category!');
        }
        $category->delete();
        return redirect()->route('category.index')->with('success','Delete category successfully!');
    }

    public function search(Request $request)
    {
        $key = $request->key;
        if (!$key == '')
        {
            $categories = Category::where('id','like','%'.$key.'%')
                        ->orWhere('name','like','%'.$key.'%')->get();
            return view('admin.category.index',compact(['categories','key']));
        }
        $categories = Category::paginate(5);
        return view('admin.category.index',compact('categories'));
    }
}
