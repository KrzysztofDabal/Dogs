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

Route::get('/', function () {return view('sites.index');})->name('index');
Route::get('/notices', 'SiteController@index')->name('notices');
Route::get('/notices/creat', 'SiteController@creat')->middleware('auth');
Route::get('/notices/{id}', 'SiteController@show');
Route::get('/dashboard', 'SiteController@dashboard')->middleware('auth')->name('dashboard');
Route::get('/regulamin/',  function () {return view('sites.regulamin');})->name('regulamin');

Route::post('/notices', 'SiteController@store_notice');
Route::post('/reply', 'SiteController@store_reply');

Route::delete('/notices/{id}', 'SiteController@destroy')->middleware('auth');

Auth::routes();

Route::get('/home', 'SiteController@index')->name('home');
