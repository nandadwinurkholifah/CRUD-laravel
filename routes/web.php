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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post', 'postcontroller@index')->name('post.index');
Route::get('/post/create', 'postcontroller@create')->name('post.create');
Route::post('/post/create', 'postcontroller@store')->name('post.store');
Route::get('/post/{post}/edit', 'postcontroller@edit')->name('post.edit');
Route::get('/post/{post}/show', 'postcontroller@show')->name('post.show');
Route::patch('/post/{post}/edit', 'postcontroller@update')->name('post.update');
Route::delete('post/{post}/delete', 'postcontroller@destroy')->name('post.destroy');
