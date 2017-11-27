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


//USERS
Route::resource('user', 'Api\UsuarioController');
Route::get('current/user', 'UsuarioController@getCurrentUser')->name('current.user');
Route::get('configuracoes/perfil', 'UsuarioController@perfilUsuario')->name('perfil-usuario');
Route::put('perfil/{user}/password', 'Api\UsuarioController@atualizaPassword')->name('atualiza.password');

//CONTAS
Route::resource('conta', 'Api\ContaController');

//RETORNA OS USUARIOS
Route::get('get/coord', 'UsuarioController@getCoordenadores')->name('get-coordenadores');
Route::get('get/alunos', 'UsuarioController@getAlunos')->name('get-alunos');
Route::get('get/cerel', 'UsuarioController@getCerel')->name('get-cerel');
Route::get('get/civis', 'UsuarioController@getCivis')->name('get-civis');

Route::get('usuarios/coordenadores', 'UsuarioController@listaCoordenadores')->name('lista-coordenadores');
Route::get('usuarios/alunos', 'UsuarioController@listaAlunos')->name('lista-alunos');
Route::get('usuarios/cerel', 'UsuarioController@listaCerel')->name('lista-cerel');
Route::get('usuarios/externo', 'UsuarioController@listaCivis')->name('lista-civis');

//REQUERIMENTOS DO USUARIO LOGADO
Route::resource('requerimento', 'Api\RequerimentoController');
Route::get('get/meus/enviados', 'MeusRequerimentosController@getEnviados')->name('meus-req-enviados');
Route::get('get/meus/recebidos', 'MeusRequerimentosController@getRecebidos')->name('meus-req-recebidos');
Route::get('get/meus/deferidos', 'MeusRequerimentosController@getDeferidos')->name('meus-req-deferidos');
Route::get('get/meus/indeferidos', 'MeusRequerimentosController@getIndeferidos')->name('meus-req-indeferidos');

Route::get('tipo/solicitacao', 'MeusRequerimentosController@TiposdeSolicitacao')->name('tipos-solicitacao');
Route::get('meus/requerimentos/enviados', 'MeusRequerimentosController@requerimentosEnviados')->name('meus-requerimentos-enviados');
Route::get('meus/requerimentos/recebidos', 'MeusRequerimentosController@requerimentosRecebidos')->name('meus-requerimentos-recebidos');
Route::get('meus/requerimentos/deferidos', 'MeusRequerimentosController@requerimentosDeferidos')->name('meus-requerimentos-deferidos');
Route::get('meus/requerimentos/indeferidos', 'MeusRequerimentosController@requerimentosIndeferidos')->name('meus-requerimentos-indeferidos');


//TODOS REQUERIMENTOS INDEPENDENTE DE USUARIO LOGADO
Route::get('requerimentos/enviados','CerelRequerimentosController@requerimentosEnviados')->name('view-cerel-req-enviados');
Route::get('get/requerimentos/enviados','CerelRequerimentosController@getEnviados')->name('get-requerimentos-enviados');

Route::get('requerimentos/recebidos','CerelRequerimentosController@requerimentosRecebidos')->name('view-cerel-req-recebidos');
Route::get('get/requerimentos/recebidos','CerelRequerimentosController@getRecebidos')->name('get-requerimentos-recebidos');

Route::get('requerimentos/deferidos','CerelRequerimentosController@requerimentosDeferidos')->name('view-cerel-req-deferidos');
Route::get('get/requerimentos/deferidos','CerelRequerimentosController@getDeferidos')->name('get-requerimentos-deferidos');

Route::get('requerimentos/indeferidos','CerelRequerimentosController@requerimentosIndeferidos')->name('view-cerel-req-indeferidos');
Route::get('get/requerimentos/indeferidos','CerelRequerimentosController@getIndeferidos')->name('get-requerimentos-indeferidos');

Route::get('requerimentos/todos','CerelRequerimentosController@requerimentosList')->name('view-cerel-req-list');
Route::get('get/requerimentos/todos','CerelRequerimentosController@getAll')->name('get-requerimentos-todos');

