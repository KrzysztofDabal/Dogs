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
Route::get('/notices/edit/{id}', 'SiteController@edit')->middleware('auth');
Route::get('/notices/{id}', 'SiteController@show_notice');
Route::get('/dashboard', 'SiteController@dashboard')->middleware('auth')->name('dashboard');
Route::get('/regulamin/',  function () {return view('sites.regulamin');})->name('regulamin');
Route::get('/description/',  function () {return view('sites.description');})->name('description');
Route::get('/profile', 'SiteController@profile')->middleware('auth')->name('profile');
Route::get('/messages', 'SiteController@messages')->middleware('auth')->name('messages');
Route::get('/messages/{id}', 'SiteController@show_message')->middleware('auth');

Route::post('/create', 'SiteController@store_notice');
Route::post('/notices/edit/{id}', 'SiteController@update_notice');
Route::post('/messages', 'SiteController@store_message');

Route::delete('/notices/{id}', 'SiteController@destroy')->middleware('auth');

Auth::routes();

Route::get('/home', 'SiteController@index')->name('home');
