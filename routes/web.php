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

//routes-admin
Route::resource('admin', 'AdminController');
Route::get('coordenadores','Api\AdminController@getCoordenadores')->name('admin.coordenadores');
Route::get('alunos','Api\AdminController@getAlunos')->name('admin.alunos');



//REQUERIMENTOS
Route::resource('requerimento', 'Web\RequerimentoController',
    ['except' => ['destroy','store','update']]);

//TIPOS REQUERIMENTOS
Route::resource('tipos-requerimentos','Api\TipoRequerimentoController',
    ['except'=> ['show','create']]);
