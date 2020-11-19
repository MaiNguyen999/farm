<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'ClientController@home');
Route::get('/cart', 'ClientController@cart');
Route::get('/shop', 'ClientController@shop');
Route::get('/checkout', 'ClientController@checkout');
Route::get('/login', 'ClientController@login');
Route::get('/signup', 'ClientController@signup');
Route::post('/updateqty','ClientController@updateqty');
Route::get('/removeitem/{id}', 'ClientController@removeitem' );
Route::post('/postcheckout', 'ClientController@postcheckout');

Route::get('/admin', 'AdminController@dashboard');
Route::get('/orders', 'AdminController@orders');

Route::get('/addcategory', 'CategoryController@addcategory');
Route::post('/savecategory', 'CategoryController@savecategory');
Route::get('/categories', 'CategoryController@categories');
Route::get('/edit_category/{id}', 'CategoryController@edit');
Route::post('/updatecategory', 'CategoryController@updatecategory');
Route::get('/delete/{id}', 'CategoryController@delete');
Route::get('/view_by_cat/{name}', 'CategoryController@view_by_cat');

Route::get('/products', 'ProductController@products');
Route::get('/addproduct', 'ProductController@addproduct');
Route::get('/edit_product/{id}', 'ProductController@edit');
Route::post('/saveproduct', 'ProductController@saveproduct');
Route::post('/updateproduct','ProductController@updateproduct');
Route::get('/delete_product/{id}', 'ProductController@delete');
Route::get('/activate_product/{id}', 'ProductController@activate');
Route::get('/deactivate_product/{id}', 'ProductController@deactivate');
Route::get('addToCart/{id}', 'ProductController@addToCart');

Route::get('/sliders', 'SliderController@sliders');
Route::get('/addslider', 'SliderController@addslider');
Route::post('/saveslider','SliderController@saveslider');
Route::get('/edit_slider/{id}', 'SliderController@edit');
Route::post('/updateslider','SliderController@updateslider');
Route::get('/delete_slider/{id}', 'SliderController@delete');
Route::get('/activate_slider/{id}', 'SliderController@activate');
Route::get('/deactivate_slider/{id}', 'SliderController@deactivate');