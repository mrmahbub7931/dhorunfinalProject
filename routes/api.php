<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('slider','Api\ApiEndController@slider');

Route::get('categories','Api\ApiEndController@categories');

Route::get('trending/category','Api\ApiEndController@trendingCategories');

/*trend product*/
Route::get('home/product','Api\ApiEndController@homeProduct');
/*category ways product*/
Route::get('single/category/{id}','Api\ApiEndController@single_category');
/*search product*/
Route::get('search/product/{name}','Api\ApiEndController@searchProduct');
/*wishlist*/
Route::post('wishlist','Api\ApiEndController@wishlist');

//carts
Route::get('shop/carts/{carts}', 'Api\ApiEndController@cart_product');
Route::get('category/product','Api\ApiEndController@singleCategoryProduct');

/*area */
Route::get('area','Api\ApiEndController@area');
Route::post('user/data','Api\ApiEndController@userData');


/*checkout*/
Route::post('checkout','Api\ApiEndController@checkout')->middleware('auth:api');

/*registration customer*/
Route::post('/register', 'Api\ApiEndController@register');
/*login customer*/
Route::post('/login', 'Api\ApiEndController@login');
//logout
Route::post('/logout','Api\ApiEndController@logout')->middleware('auth:api');
/*change password*/
Route::post('change/password','Api\ApiEndController@changePassword')->middleware('auth:api');

// web registration customer

Route::post('/web/login', 'UserController@login');
Route::post('/web/register','UserController@store');
Route::get('/web/users','UserController@index');
Route::get('/web/logout', 'UserController@logout');

/*user data */
Route::post('user/data','Api\ApiEndController@getData')->middleware('auth:api');
Route::post('update/image','Api\ApiEndController@updateImage')->middleware('auth:api');
Route::post('update/user','Api\ApiEndController@updateUser')->middleware('auth:api');

Route::group(['namespace' => 'Products'], function () {
    Route::apiResource('/products','ProductController');
    Route::apiResource('/products/{product}/reviews','ReviewController');
});

Route::group(['namespace' => 'Category'], function () {
    Route::apiResource('/category','CategoryController');
});
