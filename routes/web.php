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

Route::middleware('auth')->group(function () {

    Route::get('/', 'HomeController@index')->name('');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('/users', 'UserController')
        ->names('users');
    Route::put('/users/pendency/{user}', 'UserController@pendency')->name('users.pendency');

    Route::resource('/categories', 'CategoryController')
        ->names('categories');

    Route::resource('/sales', 'SellController')
        ->names('sales');

    Route::resource('/products', 'ProductController')
        ->names('products');
    
    Route::resource('/messages', 'MessageController')
        ->names('messages');
    
    Route::resource('/clients', 'ClientsController')
        ->names('clients');
});
