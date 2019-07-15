<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserPost;
use App\Http\Requests\UpdateUserPost;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserPost $request)
    {
        $data = $request->only('name','email','password','tel','address','active');
        $user = User::create($data);
        $user->update(['password'=>Hash::make($user->password)]);
        return redirect()->route('user.create')->with('success','Create user successfully!');
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
        $user = User::findOrFail($id);
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserPost $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->tel = $request->tel;
        $user->address = $request->address;
        $user->active = $request->active;
        $user->save();

        return redirect()->route('user.index')->with('success','Edit user successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if (count($user->comments)>0 || count($user->orders)>0 || $user->user_type == 0)
        {
            return redirect()->route('user.index')->with('error','Can\'t delete user!');
        }
        $user->delete();
        return redirect()->route('user.index')->with('success','Delete user successfully!');

    }

    public function search(Request $request)
    {
        $key = $request->key;
        if (!$key == '')
        {
            $users = User::where('id','like','%'.$key.'%')
                ->orwhere('name','like','%'.$key.'%')
                ->orWhere('email','like','%'.$key.'%')
                ->orWhere('tel','like','%'.$key.'%')
                ->orWhere('address','like','%'.$key.'%')
                ->get();

            return view('admin.user.index',compact(['users','key']));
        }
        $users = User::paginate(5);
        return view('admin.user.index',compact('users'));
    }

    public function decentralization(Request $request,$id)
    {
        $user = User::where('id','=',$id)
                ->update(['user_type'=>$request->user_type]);
        return redirect()->back();
    }
}
