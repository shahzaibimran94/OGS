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
use App\User;
use App\Notifications\RepliedToThread;

Route::get('/mail', function () {
    // send an email
    Mail::to('shahzaib407150@hotmail.co.uk')->queue(new OgsMailable);
    return redirect()->route('product.index');
});

Route::get('/not', function() {
	if(Session::has('user')){
	$user = User::find(Session::get('user')->id);
	$user->notify(new RepliedToThread());
	}else{
		echo 'fail';
	}
});
Route::get('/read', function() {
	Session::get('user')->unreadNotifications->markAsRead();
	//return redirect()->route('product.index');
});
//facebook api
Route::get('/redirect', 'SocialController@redirect');
Route::get('/callback', 'SocialController@callback');

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

Route::post('/reset', [
	'uses' => 'LoginController@reset',
	'as' => 'paswrd.reset'
]);

Route::post('/resetPass', [
	'uses' => 'LoginController@newPass',
	'as' => 'reset'
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

Route::name('product.index')->get('/','HomeController@index');

Route::get('/add-to-cart/{id}' , [
	'uses' => 'HomeController@getAddToCart',
	'as' => 'product.addtocart'
]);

Route::get('/cart-box' , [
	'uses' => 'HomeController@cartBox',
	'as' => 'cart.box'
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