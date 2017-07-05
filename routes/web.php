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

use App\Mail\OgsMailable;

Route::get('/mail', function () {
    // send an email
    Mail::to('shahzaib407150@hotmail.co.uk')->queue(new OgsMailable);
    return redirect()->route('product.index');
});

Route::get('/admin', [
	'uses' => 'LoginController@index',
	'as' => 'index' 
]);

Route::post('/login', [
	'uses' => 'LoginController@Authenticate',
	'as' => 'user.login'
]);

Route::get('/logout', [
	'uses' => 'LoginController@logout',
	'as' => 'logout'
]);
//Route::get('/reg', 'LoginController@register');
Route::get('/dashboard', [
	'as' => 'home' ,
	'uses' => 'LoginController@home' 
]);

Route::get('/orders', [
	'as' => 'order.view' ,
	'uses' => 'ProductController@index' 
]);

Route::get('/prod', [
	'as' => 'prod.view' ,
	'uses' => 'ProductController@viewProd' 
]);

Route::get('/prodA', [
	'as' => 'prod.add' ,
	'uses' => 'ProductController@addProd' 
]);

Route::post('/prodA', [
	'as' => 'prod.add' ,
	'uses' => 'ProductController@addProd' 
]);

Route::get('/update/{id}', 'ProductController@editProd');

Route::post('/update', [
	'as' => 'prod.update' ,
	'uses' => 'ProductController@update'
]);

Route::get('/', [
	'uses' =>'HomeController@index',
	'as' => 'product.index'
]);

Route::get('/add-to-cart/{id}' , [
	'uses' => 'HomeController@getAddToCart',
	'as' => 'product.addtocart'
]);

Route::get('/view-cart' , [
	'uses' => 'HomeController@cartView',
	'as' => 'cart.view'
]);

Route::get('/minus-item/{id}' , [
	'uses' => 'CartController@itemDecrement',
	'as' => 'item.decrement'
]);

Route::get('/deleteItem/{id}' , [
	'uses' => 'CartController@removeItem',
	'as' => 'item.delete'
]);

Route::post('/addOrder' , [
	'uses' => 'OrderController@addOrder',
	'as' => 'add.order'
]);