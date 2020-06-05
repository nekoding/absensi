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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Web Url
Route::get('/home', 'HomeController@index')->name('home');

// Checkin
Route::get('checkin/create', 'Absen\CheckInController@create')->name('checkin.create');
Route::post('checkin', 'Absen\CheckInController@store')->name('checkin.store');

// Checkout
Route::get('checkout/create', 'Absen\CheckOutController@create')->name('checkout.create');
Route::post('checkout', 'Absen\CheckOutController@store')->name('checkout.store');

// Admin login
Route::get('admin','Admin\CheckInController@index')->middleware('cekstatus')->name('admin.checkin');
Route::get('admin/checkout','Admin\CheckOutController@index')->middleware('cekstatus')->name('admin.checkout');
Route::get('admin/users','Admin\ListUserController@index')->middleware('cekstatus')->name('admin.users');


Route::get('admin/data/checkin','Admin\CheckInController@show')->middleware('cekstatus')->name('data.checkin');
Route::get('admin/data/checkout','Admin\CheckOutController@show')->middleware('cekstatus')->name('data.checkout');
Route::get('admin/data/users','Admin\ListUserController@show')->middleware('cekstatus')->name('data.users');