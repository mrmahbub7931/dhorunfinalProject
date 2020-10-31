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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Admin Route
 */
Route::group([ 'as' => 'admin.','middleware' => ['auth'] ],function (){
    Route::group(['namespace' => 'Admin'], function () {
        Route::get('dashboard','DashboardController@index')->name('dashboard');
        Route::get('category', 'CategoryController@index')->name('category.index');
        Route::get('category/create', 'CategoryController@create')->name('category.create');
        Route::post('category', 'CategoryController@store')->name('category.store');
        Route::get('category/edit/{id}', 'CategoryController@edit')->name('category.edit');
        Route::put('category/update/{id}', 'CategoryController@update')->name('category.update');
        Route::resources([
            'products' => 'ProductController',
            'orderarea' => 'OrderAreaController'
        ]);
    }); 
});
Route::group(['namespace' => 'Admin'], function () {
    Route::Resource('/products','ProductController');
    // Route::Resource('/products/{product}/reviews','ReviewController');
});
// Route::group(['namespace' => 'Category'], function () {
//     Route::Resource('/category','CategoryController');
// });

/**
 * Front end route
 */

 Route::group(['as' => 'frontend.','namespace' => 'frontend'], function () {
     Route::get('/', 'IndexController@index')->name('index');
     Route::get('/cart', 'ProductController@cartPage')->name('cart.index');
     Route::get('/{slug}', 'ProductController@products')->name('product-details');
     Route::post('add-to-cart/{product}','ProductController@getAddToCart')->name('product.addToCart');
     Route::get('remove-from-cart/{product}', 'ProductController@remove')->name('cart.remove');
     Route::post('update-cart', 'ProductController@updateCart')->name('cart.update');
     Route::get('user/login','UserLoginController@index')->name('login.index');
     Route::post('user/login','UserLoginController@login')->name('user.login');
     Route::post('user/register','UserLoginController@register')->name('user.register');
     Route::get('user/account','UserLoginController@userAccount')->name('user.account');
     Route::get('user/logout','UserLoginController@userAccount')->name('user.logout');
     Route::put('user/account/{id}','UserLoginController@userDetails')->name('user.details');
 });

