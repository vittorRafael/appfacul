<?php

use Illuminate\Support\Facades\Route;

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

// Arquivo das rotas da aplicação, caminhos que o app pode levar o usuário

// Rota de início, função contato, acessando a rota / do app, irá rodar o que esta escrito no controller PrincipalController e no função contato. 
Route::get('/', '\App\Http\Controllers\PrincipalController@contato')->name('index');

// Rota de início, função salvar, método post. É possível chegar nessa rota atraves do envio de dados no metodo post, essa rota é a responsável para levar os dados ao Controller e executar o função salvar. 
Route::post('/', '\App\Http\Controllers\PrincipalController@salvar')->name('index');

// Rota /{id do registro}/excluir, função excluir. Rota que pega o parâmetro id do registro enviando seus dados para a função excluir no Controller. 
Route::get('/{id}/excluir', '\App\Http\Controllers\PrincipalController@excluir')->name('excluir');

// Rota /{id do registro}/editar, função editar. Rota que pega o parâmetro id do registro enviando seus dados para a função editar no Controller. 
Route::post('/{id}/editar', '\App\Http\Controllers\PrincipalController@editar')->name('editar');
