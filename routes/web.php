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

Route::get('blog', function () {
    return view('admin/index');
});

Route::get('customerCustomerdata', 'indexController@customerdata');

Route::get('customerAddcust1', 'indexController@addcust1');

Route::get('customerAddcust2', 'indexController@addcust2');

Route::get('customerAddcust', 'indexController@addcust');

Route::get('customer/addcust1/getstates/{id}','indexController@getStates');

Route::get('customer/addcust1/kecamatan/{id}','indexController@kecamatan');

Route::get('customer/addcust1/kelurahan/{id}','indexController@kelurahan');

Route::post('CustomerStore', 'indexController@store');

Route::get('barcode/barcode', 'barcodeController@barcode');
Route::get('barcode/barcode_pdf', 'barcodeController@printbarcode');
Route::get('barcode/barcode_scanner', 'barcodeController@scannerbarcode');

