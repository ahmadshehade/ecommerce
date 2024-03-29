<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('users_view.loginuser');
});

Route::get('create/user','UserController@createRegister')->name('showcreate');
Route::post('store/user','UserController@storeUser')->name('createUser');
Route::get('page/login','UserController@pagelogin')->name('pagelogin');
Route::post('accept/login','UserController@loginUser')->name('acceptlogin');
Route::post('logout/user','UserController@logoutUser')->name('logout');
//
Route::get('admin/login','AdminController@showloginAdmin')->name('loginAdmin');
Route::post('admin/success/login','AdminController@loginAdmin')->name('successLogin');
Route::post('logout/Admin','AdminController@logoutAdmin')->name('logoutAdmin');
//
Route::get('all/product','ProductController@index')->name('allproduct');
Route::get('show/product/{id}','ProductController@show')->name('showProduct');



Route::group(['middleware' => 'userAuth'],function(){
Route::get('/profile/create', 'UserController@createProfile')->name('createprofile');
Route::post('/profile/store', 'UserController@storeprofile')->name('storeprofile');




Route::group(['middleware' => 'profileAuth'],function(){
Route::get('show/profile/{id}','UserController@showProfile')->name('showprofile');
Route::get('update/profile/{id}','UserController@editProfile')->name('editprofile');
Route::post('store/update/profile/{id}','UserController@updateProfile')->name('storeUpdateProfile');
Route::delete('delete/profile/{id}','UserController@deleteProfile')->name('deleteProfile');


Route::group(['middleware' => 'basketAuth'],function(){
    Route::get('create/basket/to/profile/{id}','BasketController@createBasket')->name('createBasket');
    Route::post('store/basket/{id}','BasketController@storeBasket')->name('storeBasket');
    Route::get('show/basket/{id}','BasketController@showBasket')->name('showBasket');
    Route::get('edit/basket/{id}','BasketController@editBasket')->name('editbasket');
    Route::post('update/basket/{id}','BasketController@updateBasket')->name('updateBasket');
    Route::delete('delete/basket/{id}','BasketController@deleteBasket')->name('deleteBsaket');
    Route::post('buy/product/{id1}/{id}','ProductController@buyProducts')->name('buyproduct');
    Route::delete('returned/item/{id1}/{id}','BasketProductController@removeItem')->name('returnproduct');
    Route::get('all/items/{id}','BasketProductController@index')->name('allItems');
    });
});

});
Route::group(['middleware' => 'AdminAuth'],function(){
Route::get('create/product','ProductController@create')->name('createProduct');
Route::post('store/product','ProductController@store')->name('storeproduct');
Route::post('update/product/{id}','ProductController@update')->name('updateproduct');
Route::get('edit/product/{id}','ProductController@edit')->name('editproduct');
Route::delete('delete/product/{id}','ProductController@delete')->name('deleteproduct');
// Route::get('create/video','ProductController@showcreatevideo')->name('create.video');
// Route::post('store/video','ProductController@createvideo')->name('store.video');

});

