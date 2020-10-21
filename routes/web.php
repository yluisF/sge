<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/inicio', 'HomeController@index')->name('home');
Route::get('/registro', 'RegitroController@index')->name('registrojera');
Route::post('registrando', 'RegitroController@store')->name('registrobd');
Route::get('/registros', 'RegitrosController@index')->name('registron');
Route::post('registrandos', 'RegitrosController@store')->name('registronbd');

Route::get('/crearSeccion', 'HomeController@crearseccion')->name('seccicrear');
Route::post('/crearSeccions', 'HomeController@crearseccion2')->name('seccicrear2');

Route::get('/crearColonia', 'HomeController@crearcolonia')->name('colicrear');
Route::post('/crearColonias', 'HomeController@crearcolonia2')->name('colicrear2');

Route::get('/crearMunicipio', 'HomeController@crearmunicipio')->name('municrear');
Route::post('/crearMunicipios', 'HomeController@crearmunicipio2')->name('municrear2');

Route::get('/inicio/{id}', 'HomeController@show')->name('muestrausuario');
Route::delete('/iniciod/{id}', 'HomeController@destroy')->name('borraruser');

Route::get('/editar', 'ActuaController@index')->name('actualizarpersonal');
Route::get('/editar/{email}/e', 'ActuaController@edit')->name('actualizapersonales');
Route::patch('/editar/{email}', 'ActuaController@update')->name('actualizandop');

Route::get('/editas', 'ActuasController@index')->name('actualizardireccion');
Route::get('/editas/{persona_id}/e', 'ActuasController@edit')->name('actualizadirecciones');
Route::patch('/editas/{persona_id}', 'ActuasController@update')->name('actualizandod');

Route::get('/registrodireccion', 'DireccionController@index')->name('registrodireccion');
Route::post('registrandodirec', 'DireccionController@store')->name('registrodirecbd');



Route::get('/BusquedaS', 'BusquedasController@seccion')->name('seccion');
Route::post('/BusquedaS/b', 'BusquedasController@muestra')->name('buscaseccion');

Route::get('/BusquedaJ', 'BusquedasController@cargo')->name('cargos');
Route::post('/BusquedaJ/b', 'BusquedasController@muestrajerarquia')->name('buscajerarquia');

Route::get('/BusquedaM', 'BusquedasController@municipio')->name('municipio');
Route::post('/BusquedaM/b', 'BusquedasController@muestramunicipio')->name('buscamunicipio');

Route::get('/BusquedaC', 'BusquedasController@colonia')->name('colonia');
Route::post('/BusquedaC/b', 'BusquedasController@muestracolonia')->name('buscacolonia');


Route::post('/inicio/buscador', 'HomeController@buscador')->name('formbusca');