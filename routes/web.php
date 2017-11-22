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

//INVITATION
Route::post('registro/cadastro', 'Auth\RegisterController@registerInvitation')->name('registro-cadastro');
Route::get('registro/cadastro/{token}', 'Auth\RegisterController@invitation')->name('cadastro');

//ADMIN
Route::resource('usuario', 'AdminController');
Route::resource('user', 'Api\UsuarioController');

//USERS
Route::get('current/user','UsuarioController@getCurrentUser')->name('current.user');

Route::get('get/coord', 'UsuarioController@getCoordenadores')->name('get-coordenadores');
Route::get('get/alunos', 'UsuarioController@getAlunos')->name('get-alunos');
Route::get('get/cerel', 'UsuarioController@getCerel')->name('get-cerel');
Route::get('get/civis', 'UsuarioController@getCivis')->name('get-civis');

Route::get('usuarios/coordenadores', 'UsuarioController@listaCoordenadores')->name('lista-coordenadores');
Route::get('usuarios/alunos', 'UsuarioController@listaAlunos')->name('lista-alunos');
Route::get('usuarios/cerel', 'UsuarioController@listaCerel')->name('lista-cerel');
Route::get('usuarios/externo', 'UsuarioController@listaCivis')->name('lista-civis');

//REQUERIMENTO
Route::resource('requerimento', 'RequerimentoController');
Route::get('tipo/solicitacao', 'RequerimentoController@getTiposRequerimento')->name('tipos-requerimento');