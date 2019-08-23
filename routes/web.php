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

Route::get('/', function () {
    return view('login');
});
Route::post('login','AdminController@login')->name('login');
Route::get('logout','AdminController@logout')->name('logout');
Route::get('dashboard','AdminController@dashboard')->name('dashboard');
Route::get('customers','CustomerController@show')->name('showCustomer');
Route::post('customer','CustomerController@create')->name('createCustomer');
Route::put('customer','CustomerController@update')->name('updateCustomer');
Route::get('deleteCustomer/{id}','CustomerController@delete')->name('deleteCustomer');
Route::get('invoice','InvoiceController@show')->name('invoice');