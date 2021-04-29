<?php

use Illuminate\Support\Facades\Route;
use views\sites;
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

Route::get('/', function () {return view('sites.index');});
Route::get('/notices', 'SiteController@index');
Route::get('/notices/creat', 'SiteController@creat');
Route::get('/notices/{id}', 'SiteController@show');

Route::post('/notices', 'SiteController@store_notice');
Route::post('/reply', 'SiteController@store_reply');

Route::delete('/notices/{id}', 'SiteController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
