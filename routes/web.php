<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/index');
});

Route::get('/index', 'IndexController@index')->name('index');
Route::get('/product/{id}', 'IndexController@productDetail')->name('productDetail');

Route::get('/cart', 'CartController@getCart')->name('getCart');
Route::post('/addCart/{id}', 'CartController@addCart')->name('addCart');
Route::post('/addCartOne', 'CartController@addcartOne')->name('addcartOne');
Route::post('/updateCart', 'CartController@updateCart')->name('updateCart');
Route::get('/removeCart/{id}','CartController@removeCart')->where('id','[0-9]+')->name('removeCart');
Route::get('/orderConfirm', 'CartController@orderConfirm')->name('orderConfirm');
Route::post('/orderPay', 'CartController@orderPay')->name('orderPay');

Route::prefix('admin')->middleware('admin')->group(function () {

    Route::get('/dashboard', 'AdminController@index')->name('admin.index');

    Route::prefix('categories')->group(function () {
        Route::get('/list', 'CategoryController@index')->name('category.index');
        Route::get('/create', 'CategoryController@create')->name('category.create');
        Route::post('/create', 'CategoryController@store')->name('category.store');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('category.edit');
        Route::put('/edit/{id}', 'CategoryController@update')->name('category.update');
        Route::delete('/destroy/{id}', 'CategoryController@destroy')->name('category.destroy');
        Route::get('/search', 'CategoryController@search')->name('category.search');
    });

    Route::prefix('products')->group(function () {
        Route::get('/list', 'ProductController@index')->name('product.index');
        Route::get('/show/{id}', 'ProductController@show')->name('product.show');
        Route::get('/create', 'ProductController@create')->name('product.create');
        Route::post('/create', 'ProductController@store')->name('product.store');
        Route::get('/edit/{id}', 'ProductController@edit')->name('product.edit');
        Route::put('/edit/{id}', 'ProductController@update')->name('product.update');
        Route::delete('/destroy/{id}', 'ProductController@destroy')->name('product.destroy');
        Route::get('/search', 'ProductController@search')->name('product.search');
    });

    Route::prefix('users')->group(function () {
        Route::get('/list', 'UserController@index')->name('user.index');
        Route::get('/show/{id}', 'UserController@show')->name('user.show');
        Route::get('/create', 'UserController@create')->name('user.create');
        Route::post('/create', 'UserController@store')->name('user.store');
        Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');
        Route::put('/edit/{id}', 'UserController@update')->name('user.update');
        Route::delete('/destroy/{id}', 'UserController@destroy')->name('user.destroy');
        Route::get('/search', 'UserController@search')->name('user.search');

        Route::post('/decentralization/{id}', 'UserController@decentralization')->name('user.decentralization');
    });

    Route::prefix('orders')->group(function () {
        Route::get('/list', 'OrderController@index')->name('order.index');
        Route::get('/show/{id}', 'OrderController@show')->name('order.show');
        Route::get('/search', 'OrderController@search')->name('order.search');

        Route::delete('/cancel/{id}', 'OrderController@cancel')->name('order.cancel');
        Route::get('/cancel', 'OrderController@getCancel')->name('order.getCancel');
        Route::post('/cancel/{id}', 'OrderController@restoreOrders')->name('order.restore');

        Route::get('/processing', 'OrderController@getProcessing')->name('order.getProcessing');
        Route::put('/processing/{id}', 'OrderController@processing')->name('order.processing');

        Route::get('/export', 'OrderController@getExportOrder')->name('order.getExport');
        Route::put('/export/{id}', 'OrderController@exportOrder')->name('order.export');

        Route::get('/shipped', 'OrderController@getShippedOrder')->name('order.getShipped');
        Route::put('/shipped/{id}', 'OrderController@shippedOrder')->name('order.shipped');
    });

});;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/activation/{token}', 'Auth\RegisterController@userActivation');
