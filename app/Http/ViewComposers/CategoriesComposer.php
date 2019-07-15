<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Category;

class CategoriesComposer
{

    protected $categories;



    public function __construct(Category $categories)
    {
        // Dependencies automatically resolved by service container...
        $this->categories = $categories;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categories', $this->categories->get(['id','name']));
//        dd($this->categories->get());
    }
}
