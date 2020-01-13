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

/*
 * namespace for directory that contain controller
 * prefix that the word in url such as admin/home
 * */

Route::namespace('BackEnd')->prefix('admin')->group(function(){

    Route::get('/','Home@index');
//    users route
    Route::resource('users','Users')->except('show','delete');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

