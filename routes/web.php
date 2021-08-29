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



Route::get('/', 'HomeController@index')->name('home');



Route::get('/home', function() {
    return view('home');
})->middleware('auth');


Route::get('/admin/categories', 'App\Http\Controllers\Admin\CategoriesController@index')->name('admin.categories');
Route::post('/admin/categories/store', 'App\Http\Controllers\Admin\CategoriesController@store')->name('admin.categories.store');
Route::post('/admin/categories/{categoryId}/update', 'App\Http\Controllers\Admin\CategoriesController@update')->name('admin.categories.update');
Route::delete('/admin/categories/{categoryId}/delete', 'App\Http\Controllers\Admin\CategoriesController@delete')->name('admin.categories.delete');

Route::get('/admin/products', 'App\Http\Controllers\Admin\productsController@index')->name('admin.products');
Route::post('/admin/products/store', 'App\Http\Controllers\Admin\productsController@store')->name('admin.products.store');
Route::post('/admin/products/{productsId}/update', 'App\Http\Controllers\Admin\productsController@update')->name('admin.products.update');
Route::delete('/admin/products/{productsId}/delete', 'App\Http\Controllers\Admin\productsController@delete')->name('admin.products.delete');

Auth::routes();

