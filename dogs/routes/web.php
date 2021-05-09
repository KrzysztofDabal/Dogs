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
Route::POST('/notices/', 'SiteController@filtr')->name('notices.filtr');
Route::get('/notices/create/', 'SiteController@create')->middleware('auth')->name('notices.create');
Route::get('/notices/edit/{id}/', 'SiteController@edit')->middleware('auth')->name('notices.edit');
Route::post('/notices/edit/{id}/', 'SiteController@update_notice')->middleware('auth')->name('notices.update');
Route::post('/notices/store/', 'SiteController@store_notice')->middleware('auth')->name('notices.store');
Route::get('/notices/{id}/', 'SiteController@show_notice')->name('notices.show');
Route::delete('/notices/{id}', 'SiteController@notice_destroy')->middleware('auth')->name('notices.destroy');


//messages
Route::post('/conversation/', 'SiteController@store_conversation')->middleware('auth')->name('conversation.create');
Route::get('/messages/', 'SiteController@messages')->middleware('auth')->name('messages.index');
Route::get('/messages/{id}', 'SiteController@show_message')->middleware('auth')->name('messages.show');
Route::post('/message/', 'SiteController@store_message')->middleware('auth')->name('messages.create');


//heaven
Route::get('/heaven/', 'HeavenController@index')->name('heaven.index');
//heaven notices
Route::get('/heaven/notices/', 'HeavenController@notices_index')->name('heaven.notices.index');
Route::get('/heaven/notices/create/', 'HeavenController@notice_create')->name('heaven.notices.create');
Route::post('/heaven/notices/create/', 'HeavenController@notice_store')->name('heaven.notices.store');
Route::get('/heaven/notices/edit/{id}', 'HeavenController@notice_edit')->name('heaven.notices.edit');
Route::post('/heaven/notices/edit/{id}/', 'HeavenController@notice_update')->name('heaven.notices.update');
Route::delete('/heaven/notices/{id}', 'HeavenController@notice_destroy')->name('heaven.notices.destroy');
//heaven users
Route::get('/heaven/users/', 'HeavenController@users_index')->middleware('auth')->name('heaven.users.index');
Route::get('/heaven/users/create', 'HeavenController@user_create')->name('heaven.users.create');
Route::post('/heaven/users/create', 'HeavenController@user_store')->name('heaven.users.store');
Route::get('/heaven/users/edit/{id}', 'HeavenController@user_edit')->name('heaven.users.edit');
Route::post('/heaven/users/edit/{id}', 'HeavenController@user_update')->name('heaven.users.update');
Route::post('/heaven/users/edit/role/{id}/', 'HeavenController@set_role')->name('heaven.users.edit.role');
Route::delete('/heaven/users/{id}/', 'HeavenController@user_destroy')->name('heaven.users.destroy');


Auth::routes();

Route::get('/home/', 'SiteController@index')->name('home');
