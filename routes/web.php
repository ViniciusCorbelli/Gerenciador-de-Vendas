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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//Route::get('/pessoas', 'PersonController@index')->name('people.index');
//Route::post('/pessoas/criar', 'PersonController@store')->name('people.create');

Route::middleware('auth')->group(function(){
    Route::resource('/users', 'UserController')
        ->names('users');

    Route::resource('/categories', 'CategoryController')
        ->names('categories');
});
