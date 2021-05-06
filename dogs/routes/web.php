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
//sites
Route::get('/', function () {return view('sites.index');})->name('index');
Route::get('/regulations/',  function () {return view('sites.regulations');})->name('regulations');
Route::get('/description/',  function () {return view('sites.description');})->name('description');
Route::get('/profile', 'SiteController@profile')->middleware('auth')->name('profile');
Route::get('/dashboard/', 'SiteController@dashboard')->middleware('auth')->name('dashboard');


//noticess
Route::get('/notices/', 'SiteController@index')->name('notices.index');
Route::get('/notices/creat/', 'SiteController@creat')->middleware('auth')->name('notices.create');
Route::get('/notices/edit/{id}/', 'SiteController@edit')->middleware('auth')->name('notices.edit');
Route::post('/notices/edit/{id}/', 'SiteController@update_notice')->middleware('auth')->name('notices.update');
Route::get('/notices/{id}/', 'SiteController@show_notice')->middleware('auth')->name('notices.show');
Route::post('/notices/store/', 'SiteController@store_notice')->middleware('auth')->name('notices.store');
Route::delete('/notices/{id}', 'SiteController@notice_destroy')->middleware('auth')->name('notices.destroy');


//messages
Route::post('/conversation/', 'SiteController@store_conversation')->middleware('auth')->name('conversation.create');
Route::get('/messages/', 'SiteController@messages')->middleware('auth')->name('messages.index');
Route::get('/messages/{id}', 'SiteController@show_message')->middleware('auth')->name('messages.show');
Route::post('/message/', 'SiteController@store_message')->middleware('auth')->name('messages.create');


//heaven
Route::get('/heaven/', 'HeavenController@heaven')->middleware('auth')->name('heaven.index');
//heaven notices
Route::get('/heaven/notices/', 'HeavenController@heaven_notices')->middleware('auth')->name('heaven.notices.index');
Route::get('/heaven/notices/edit/{id}', 'HeavenController@heaven_edit')->middleware('auth')->name('heaven.notices.edit');
Route::post('/heaven/notices/edit/{id}/', 'HeavenController@heaven_update_notice')->middleware('auth')->name('heaven.notices.update');
Route::delete('/heaven/notices/{id}', 'HeavenController@heaven_notice_destroy')->middleware('auth')->name('heaven.notices.destroy');
//heaven users
Route::get('/heaven/users/', 'HeavenController@heaven_users')->middleware('auth')->middleware('auth')->name('heaven.users.index');
Route::post('/heaven/users/edit/role/{id}/', 'SiteController@heaven_set_role')->middleware('auth')->name('heaven');


Auth::routes();

Route::get('/home/', 'SiteController@index')->name('home');
