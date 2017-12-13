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
Route::get('configuracoes/perfil', 'PerfilController@perfilUsuario')->name('perfil-usuario');
Route::put('perfil/{user}/password', 'PerfilController@atualizaPassword')->name('atualiza.password');

//CONTAS
Route::resource('contas', 'Api\ContaController',['except'=>['show']]);
Route::get('lista/contas', 'Api\ContaController@listaContas')->name('lista-contas');
Route::get('todas/contas', 'Api\ContaController@todasContas')->name('lista-todas');

//RETORNA OS USUARIOS
Route::get('get/coord', 'UsuarioController@getCoordenadores')->name('get-coordenadores');
Route::get('get/alunos', 'UsuarioController@getAlunos')->name('get-alunos');
Route::get('get/cerel', 'UsuarioController@getCerel')->name('get-cerel');
Route::get('get/publico/externo', 'UsuarioController@getExterno')->name('get-externo');

Route::get('usuarios/coordenadores', 'UsuarioController@listaCoordenadores')->name('lista-coordenadores');
Route::get('usuarios/alunos', 'UsuarioController@listaAlunos')->name('lista-alunos');
Route::get('usuarios/cerel', 'UsuarioController@listaCerel')->name('lista-cerel');
Route::get('usuarios/externo', 'UsuarioController@listaExterno')->name('lista-externo');

//REQUERIMENTOS DO USUARIO LOGADO
Route::resource('requerimento', 'Api\RequerimentoController');
Route::get('get/meus/enviados', 'MeusRequerimentosController@getEnviados')->name('meus-req-enviados');
Route::get('get/meus/recebidos', 'MeusRequerimentosController@getRecebidos')->name('meus-req-recebidos');
Route::get('get/meus/deferidos', 'MeusRequerimentosController@getDeferidos')->name('meus-req-deferidos');
Route::get('get/meus/deferidos/parcialmente', 'MeusRequerimentosController@getDeferidosParcialmente')->name('meus-req-deferidos-parcialmente');
Route::get('get/meus/indeferidos', 'MeusRequerimentosController@getIndeferidos')->name('meus-req-indeferidos');

Route::get('tipo/solicitacao', 'MeusRequerimentosController@TiposdeSolicitacao')->name('tipos-solicitacao');
Route::get('meus/requerimentos/enviados', 'MeusRequerimentosController@requerimentosEnviados')->name('meus-requerimentos-enviados');
Route::get('meus/requerimentos/recebidos', 'MeusRequerimentosController@requerimentosRecebidos')->name('meus-requerimentos-recebidos');
Route::get('meus/requerimentos/deferidos', 'MeusRequerimentosController@requerimentosDeferidos')->name('meus-requerimentos-deferidos');
Route::get('meus/requerimentos/deferidos/parcialmente', 'MeusRequerimentosController@requerimentosDeferidosParcialmente')->name('meus-requerimentos-deferidos-parcialmente');
Route::get('meus/requerimentos/indeferidos', 'MeusRequerimentosController@requerimentosIndeferidos')->name('meus-requerimentos-indeferidos');


//TODOS REQUERIMENTOS INDEPENDENTE DE USUARIO LOGADO
Route::get('requerimentos/enviados','RequerimentosController@requerimentosEnviados')->name('view-req-enviados');
Route::get('get/requerimentos/enviados','RequerimentosController@getEnviados')->name('get-requerimentos-enviados');

Route::get('requerimentos/recebidos','RequerimentosController@requerimentosRecebidos')->name('view-req-recebidos');
Route::get('get/requerimentos/recebidos','RequerimentosController@getRecebidos')->name('get-requerimentos-recebidos');

Route::get('requerimentos/deferidos','RequerimentosController@requerimentosDeferidos')->name('view-req-deferidos');
Route::get('get/requerimentos/deferidos','RequerimentosController@getDeferidos')->name('get-requerimentos-deferidos');

Route::get('requerimentos/deferidos/parcialmente','RequerimentosController@requerimentosDeferidosParcialmente')->name('view-req-deferidos-parcialmente');
Route::get('get/requerimentos/parcialmente','RequerimentosController@getDeferidosParcialmente')->name('get-requerimentos-deferidos-parcialmente');

Route::get('requerimentos/indeferidos','RequerimentosController@requerimentosIndeferidos')->name('view-req-indeferidos');
Route::get('get/requerimentos/indeferidos','RequerimentosController@getIndeferidos')->name('get-requerimentos-indeferidos');

Route::get('requerimentos/todos','RequerimentosController@requerimentosList')->name('view-req-list');
Route::get('get/requerimentos/todos','RequerimentosController@getAll')->name('get-requerimentos-todos');

//REQUERIMENTOS POR FUNCAO
Route::get('conta/requerimentos/entrada','Api\RequerimentosContaController@entrada')->name('conta-req-andamento');
Route::get('get/conta/entrada','Api\RequerimentosContaController@getEntrada')->name('get-conta-requerimentos-andamento');

Route::get('conta/requerimentos/deferidos','Api\RequerimentosContaController@deferidos')->name('conta-req-deferidos');
Route::get('get/conta/requerimentos/deferidos','Api\RequerimentosContaController@getDeferidos')->name('get-conta-requerimentos-deferidos');

Route::get('conta/requerimentos/deferidos/parcialmente','Api\RequerimentosContaController@parcialmente')->name('conta-req-deferidos-parcialmente');
Route::get('get/conta/requerimentos/parcialmente','Api\RequerimentosContaController@getParcialmente')->name('get-conta-requerimentos-deferidos-parcialmente');

Route::get('conta/requerimentos/indeferidos','Api\RequerimentosContaController@indeferidos')->name('conta-req-indeferidos');
Route::get('get/conta/requerimentos/indeferidos','Api\RequerimentosContaController@getIndeferidos')->name('get-conta-requerimentos-indeferidos');

//NOTIFACAO NAV BAR
Route::get('notificacoes/nav/bar','Api\RequerimentosContaController@getNoticacoes')->name('get-noticacoes');
Route::put('notificacoes/{requerimento}','Api\RequerimentosContaController@requerimentoRecebido')->name('requerimento-recebido');

//DESPACHAR REQUERIMENTO
Route::post('despachar/requerimento/{requerimento}','Api\RequerimentosContaController@despacharRequerimento')->name('despachar-requerimento');

//ANEXO UPLOAD
Route::post('anexo/upload', 'FileUploadController@fileUpload')->name('file.upload');

//PDF
Route::get('requerimento/imprime/{requerimento}','Api\PdfController@pdfDom')->name('imprime-requerimento');
