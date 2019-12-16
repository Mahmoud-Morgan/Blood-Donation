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

Route::get('/doner','DonerController@index');

Route::get('/info','DonerController@info');

Route::post('/store','DonerController@store');

Route::get('/search','DonerController@filter');

Route::post('/search','DonerController@filter');

Route::get('/patiant',function (){
    return view('patiantform');
});

Route::get('/home',function (){
    return view('home');
});

Route::get('/layout',function (){
    return view('layout');
});


