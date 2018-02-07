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
Route::resource('cuentasCobrar/cajero','CajeroController');
Route::resource('cuentasCobrar/usuario','UsuarioController');
Route::resource('cuentasCobrar/rol','RolController');
Route::resource('cuentasCobrar/tipopago','TipopagoController');