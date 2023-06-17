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

Route::get('/', '\App\Http\Controllers\PrincipalController@contato')->name('index');
Route::post('/', '\App\Http\Controllers\PrincipalController@salvar')->name('index');
Route::get('/{id}/excluir', '\App\Http\Controllers\PrincipalController@excluir')->name('excluir');
Route::post('/{id}/editar', '\App\Http\Controllers\PrincipalController@editar')->name('editar');
