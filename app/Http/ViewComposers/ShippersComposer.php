<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\User;

class ShippersComposer
{

    protected $shippers;



    public function __construct(User $shippers)
    {
        // Dependencies automatically resolved by service container...
        $this->shippers = $shippers;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('shippers', $this->shippers->where('user_type','=',2)->get(['id','name']));
//        dd($this->shippers->where('user_type','=',2)->get());
    }
}
