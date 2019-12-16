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

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/prestador/lista', 'PrestadorController@lista')->name('prestador.lista');
Route::get('/prestador/cadastrar/{cpfCnpj?}/{index?}', 'PrestadorController@cadastrar')->name('prestador.cadastrar');

Route::post('/prestador/salvar/{cpfCnpj?}/{index?}', 'PrestadorController@salvar')->name('prestador.salvar');
