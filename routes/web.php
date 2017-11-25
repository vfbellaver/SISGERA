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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//INVITATION
Route::post('registro/cadastro', 'Auth\RegisterController@registerInvitation')->name('registro-cadastro');
Route::get('registro/cadastro/{token}', 'Auth\RegisterController@invitation')->name('cadastro');

//ADMIN
Route::resource('admin', 'AdminController');
Route::resource('user', 'Api\UsuarioController');

//USERS
Route::get('current/user','UsuarioController@getCurrentUser')->name('current.user');
Route::get('configuracoes/perfil','UsuarioController@perfilUsuario')->name('perfil-usuario');
Route::put('perfil/{user}/password', 'Api\UsuarioController@atualizaPassword')->name('atualiza.password');

Route::get('get/coord', 'UsuarioController@getCoordenadores')->name('get-coordenadores');
Route::get('get/alunos', 'UsuarioController@getAlunos')->name('get-alunos');
Route::get('get/cerel', 'UsuarioController@getCerel')->name('get-cerel');
Route::get('get/civis', 'UsuarioController@getCivis')->name('get-civis');

Route::get('usuarios/coordenadores', 'UsuarioController@listaCoordenadores')->name('lista-coordenadores');
Route::get('usuarios/alunos', 'UsuarioController@listaAlunos')->name('lista-alunos');
Route::get('usuarios/cerel', 'UsuarioController@listaCerel')->name('lista-cerel');
Route::get('usuarios/externo', 'UsuarioController@listaCivis')->name('lista-civis');

//REQUERIMENTOS
Route::resource('requerimento', 'Api\RequerimentoController');

Route::get('get/enviados', 'RequerimentoController@getEnviados')->name('req-enviados');
Route::get('get/recebidos', 'RequerimentoController@getRecebidos')->name('req-recebidos');
Route::get('get/deferidos', 'RequerimentoController@getDeferidos')->name('req-deferidos');
Route::get('get/indeferidos', 'RequerimentoController@getIndeferidos')->name('req-indeferidos');

Route::get('tipo/solicitacao', 'RequerimentoController@TiposdeSolicitacao')->name('tipos-solicitacao');
Route::get('requerimentos/enviados', 'RequerimentoController@requerimentosEnviados')->name('requerimentos-enviados');
Route::get('requerimentos/recebidos', 'RequerimentoController@requerimentosRecebidos')->name('requerimentos-recebidos');
Route::get('requerimentos/deferidos', 'RequerimentoController@requerimentosDeferidos')->name('requerimentos-deferidos');
Route::get('requerimentos/indeferidos', 'RequerimentoController@requerimentosIndeferidos')->name('requerimentos-indeferidos');
