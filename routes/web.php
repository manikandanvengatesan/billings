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
Route::get('customer/{id}','CustomerController@getCustomer')->name('getCustomer');
Route::post('customer','CustomerController@create')->name('createCustomer');
Route::put('customer','CustomerController@update')->name('updateCustomer');
Route::get('deleteCustomer/{id}','CustomerController@delete')->name('deleteCustomer');

Route::get('suppliers','SupplierController@show')->name('showSupplier');
Route::get('supplier/{id}','SupplierController@getSupplier')->name('getSupplier');
Route::post('supplier','SupplierController@create')->name('createSupplier');
Route::put('supplier','SupplierController@update')->name('updateSupplier');
Route::get('deleteSupplier/{id}','SupplierController@delete')->name('deleteSupplier');

Route::get('invoice','InvoiceController@show')->name('invoice');
Route::post('createInvoice','InvoiceController@create')->name('createInvoice');
Route::get('reports','ReportController@reports')->name('showReports');
Route::get('invoice_report','ReportController@invoiceReport')->name('invoiceReport');

Route::get('payable','PayableController@show')->name('payable');
Route::post('createPayable','PayableController@create')->name('createPayable');
