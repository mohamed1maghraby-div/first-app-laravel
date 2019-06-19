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
use App\Item;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//-----------------items route------------------
//items create
Route::get('/items', 'user_interface@create_items')->middleware('auth');
Route::post('/items', 'user_interface@create_items')->middleware('auth');
//items delete
Route::get('items/{id}', 'user_interface@item_delete')->middleware('auth');
//items edit
Route::get('/item_edit/{id}', 'user_interface@item_edit')->middleware('auth');
Route::post('/item_edit/{id}', 'user_interface@item_edit')->middleware('auth');
//---------------end items route-----------------

//-----------------request route------------------
//request create
Route::get('/requests', 'user_interface@requests')->middleware('auth');
Route::post('/requests', 'user_interface@requests')->middleware('auth');
//request delete
Route::get('requests/{id}/{items}', 'user_interface@request_delete')->middleware('auth');
//---------------end request route-----------------

//---------------update profile-----------------
Route::get('/user_profile', 'user_interface@user_profilee')->middleware('auth');
Route::get('/user_profile/{user_id}', 'user_interface@user_profile')->middleware('auth');
Route::patch('/user_profile/{user_id}', 'user_interface@user_profile')->middleware('auth');
//---------------end update profile-----------------




