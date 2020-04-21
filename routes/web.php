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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','WelcomeController@index');
Route::get('/product-details-{id}','WelcomeController@details');
Route::get('/about','WelcomeController@about');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//search
Route::post('/search','WelcomeController@search');

//admin
Route::get('/admin/dashboard', 'AdminController@index');
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm');
Route::post('/admin/login', 'Auth\AdminLoginController@login');

//product
Route::resource('admin/products','ProductController');

//shopitem
Route::get('/shopitem','WelcomeController@buymore');



//cart
Route::get('/cart','WelcomeController@cart');
Route::post('/cart/addtocart','WelcomeController@addcart');
Route::get('cart/remove-item/{id}','WelcomeController@removecart');

//orders
Route::get('/admin/orders','OrderController@index');
Route::get('/admin/orders/{id}','OrderController@confirm');

//payment
Route::post('/payment','WelcomeController@payment');
Route::post('/payment/success','ProfileController@success');


//mail

Route::get('/sendemail','SendEmailController@index');
Route::post('/sendemail/send','SendEmailController@send');
// Route::get('mail',function(){

// 	return view('front.cart.cart');
// });

// Route::post('mail',function(){

//  Mail::to('tafsirul15-8661@diu.edu.bd')->send(new DemoMail());


// });