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

//Listado de usuarios
Route::get('', 'UserController@list');
//Formulario de usuarios
Route::get('/form','UserController@userform');
//Guardar usuarios
Route::post('/save','UserController@save')->name('save');
//Eliiminar usuarios
Route::delete('/delete/{id}','UserController@delete')->name('delete');
//Formulario para editar los usuarios
Route::get('/editform/{id}','UserController@editform')->name('editform');
//Edicion de usuarios
Route::patch('/edit/{id}','UserController@edit')->name('edit');