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
    //return view('welcome');
	return redirect()->route('home');
});

Auth::routes();
/* Route::get('/', 'auth\LoginController@showLoginForm');
Route::get('/register', 'auth\LoginController@showLoginForm'); */
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/endereco', 'ServidorController@endereco_index')->name('endereco');
Route::put('/endereco', 'ServidorController@atualizar_endereco');
Route::get('/preinscricao', 'ServidorController@inscricao1_index')->name('preinscricao');
Route::post('/preinscricao', 'ServidorController@inscricao1_store');
Route::get('/inscricao', 'ServidorController@inscricao_final')->name('inscricao1');
Route::post('/inscricao', 'ServidorController@inscricao_final_store');
Route::get('/perfil', 'ServidorController@perfil_index')->name('perfil');
Route::put('/perfil', 'ServidorController@atualizar_perfil');
Route::get('/admin/pre', 'AdminController@home')->name('admin.pre');
Route::get('/admin/pre/esporte/{id}', 'AdminController@detalhe_esporte')->name('esporte.pre');
Route::get('/admin/pre/campus/{id}', 'AdminController@detalhe_campus')->name('campus.pre');
Route::get('/admin', 'AdminController@home_inscricao')->name('admin');
Route::get('/admin/esporte/{id}', 'AdminController@detalhe_esporte_inscricao')->name('esporte');
Route::get('/admin/campus/{id}', 'AdminController@detalhe_campus_inscricao')->name('campus');
Route::get('/admin/enviaremails/', 'AdminController@enviar_emails');
Route::get('/admin/relatorios/', 'AdminController@relatorios_home')->name('relatorios');
Route::get('/admin/relatorios/campus', 'AdminController@relatorios_campus')->name('relatorios.campus');
Route::get('/admin/relatorios/hospedagem', 'AdminController@relatorios_hospedagem')->name('relatorios.hospedagem');
Route::get('/admin/relatorios/alimentacao', 'AdminController@relatorios_alimentacao')->name('relatorios.alimentacao');
Route::get('/admin/relatorios/logistica', 'AdminController@relatorios_logistica')->name('relatorios.logistica');


