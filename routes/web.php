<?php

use App\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;

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

Auth::routes(['register' => false]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');


Route::fallback(function () {
    return view('welcome');
});
