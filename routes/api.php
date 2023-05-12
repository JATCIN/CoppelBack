<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/denuncias','App\Http\Controllers\DenunciasController@index');
Route::post('/denuncias','App\Http\Controllers\DenunciasController@store');
Route::get('/denuncias/{denuncias}','App\Http\Controllers\DenunciasController@show');
Route::put('/denuncias/{denuncias}','App\Http\Controllers\DenunciasController@update');
Route::delete('/denuncias/{denuncias}','App\Http\Controllers\DenunciasController@destroy');

Route::get('/empresas','App\Http\Controllers\EmpresasController@index');
Route::post('/empresas','App\Http\Controllers\EmpresasController@store');
Route::get('/empresas/{empresas}','App\Http\Controllers\EmpresasController@show');
Route::put('/empresas/{empresas}','App\Http\Controllers\EmpresasController@update');
Route::delete('/empresas/{empresas}','App\Http\Controllers\EmpresasController@destroy');

Route::get('/paises','App\Http\Controllers\PaisesController@index');
Route::post('/paises','App\Http\Controllers\PaisesController@store');
Route::get('/paises/{paises}','App\Http\Controllers\PaisesController@show');
Route::put('/paises/{paises}','App\Http\Controllers\PaisesController@update');
Route::delete('/paises/{paises}','App\Http\Controllers\PaisesController@destroy');

Route::get('/estados','App\Http\Controllers\EstadosController@index');
Route::post('/estados','App\Http\Controllers\EstadosController@store');
Route::get('/estados/{estados}','App\Http\Controllers\EstadosController@show');
Route::put('/estados/{estados}','App\Http\Controllers\EstadosController@update');
Route::delete('/estados/{estados}','App\Http\Controllers\EstadosController@destroy');

Route::get('/usuarios','App\Http\Controllers\UsuariosController@index');
Route::post('/usuarios','App\Http\Controllers\UsuariosController@store');
Route::get('/usuarios/{usuarios}','App\Http\Controllers\UsuariosController@show');
Route::put('/usuarios/{usuarios}','App\Http\Controllers\UsuariosController@update');
Route::delete('/usuarios/{usuarios}','App\Http\Controllers\UsuariosController@destroy');

Route::post('/seguimiento-denuncia', 'App\Http\Controllers\DenunciasController@seguimientoDenuncia');
