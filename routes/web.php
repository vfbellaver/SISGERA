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


use Sisgera\Sisgera;

Route::get('/', function () {
    return redirect()->route('login');
});

// Sisgera
Route::get('sisgera.js', function () {
    $json = json_encode(array_merge(Sisgera::scriptVariables(), []));
    $js = <<<js
    window.Sisgera = {$json};
js;
    return response($js)->header('Content-Type', 'text/javascript');
})->name('sisgera.js');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//INVITATION
Route::post('registro/cadastro', 'Auth\RegisterController@registerInvitation')->name('registro-cadastro');
Route::get('registro/cadastro/{token}', 'Auth\RegisterController@invitation')->name('cadastro');

//ADMIN
Route::resource('admin', 'AdminController');
Route::resource('user', 'Api\UsuarioController');

//USERS
Route::get('current/user', 'UsuarioController@getCurrentUser')->name('current.user');
Route::get('configuracoes/perfil', 'UsuarioController@perfilUsuario')->name('perfil-usuario');
Route::put('perfil/{user}/password', 'Api\UsuarioController@atualizaPassword')->name('atualiza.password');

//get Userts
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

Route::get('get/enviados', 'MeusRequerimentosController@getEnviados')->name('meus-req-enviados');
Route::get('get/recebidos', 'MeusRequerimentosController@getRecebidos')->name('meus-req-recebidos');
Route::get('get/deferidos', 'MeusRequerimentosController@getDeferidos')->name('meus-req-deferidos');
Route::get('get/indeferidos', 'MeusRequerimentosController@getIndeferidos')->name('meus-req-indeferidos');

Route::get('tipo/solicitacao', 'MeusRequerimentosController@TiposdeSolicitacao')->name('tipos-solicitacao');
Route::get('meus/requerimentos/enviados', 'MeusRequerimentosController@requerimentosEnviados')->name('meus-requerimentos-enviados');
Route::get('meus/requerimentos/recebidos', 'MeusRequerimentosController@requerimentosRecebidos')->name('meus-requerimentos-recebidos');
Route::get('meus/requerimentos/deferidos', 'MeusRequerimentosController@requerimentosDeferidos')->name('meus-requerimentos-deferidos');
Route::get('meus/requerimentos/indeferidos', 'MeusRequerimentosController@requerimentosIndeferidos')->name('meus-requerimentos-indeferidos');


//Cerel Requerimentos
Route::get('get/cerel-recebidos','CerelRequerimentosController@getRecebidos')->name('get-cerel-req-recebidos');
Route::get('requerimentos/recebidos','CerelRequerimentosController@requerimentosRecebidos')->name('view-cerel-req-recebidos');
Route::get('get/cerel-req-list','CerelRequerimentosController@getAll')->name('get-cerel-req-list');
Route::get('requerimentos/todos','CerelRequerimentosController@requerimentosList')->name('view-cerel-req-list');