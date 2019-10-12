<?php

Route::get('/', [
    'uses'=>'Controlador@home',
    'as'=>'home'] 
  //  return view('welcome');
  );
Route::get('usuario', function () {
    //  return view('welcome');
    return view('usuarios.index');
});
Route::get('login', [
    'uses'=>'Auth\LoginController@showLoginForm',
    'as'=>'login'
]);
Route::post('login','Auth\LoginController@login');
Route::get('logout','Auth\LoginController@logout');
Route::resource('usuarios','ControladorUsuario');

Route::get('usuario/crear', [
    'uses' => 'ControladorUsuario@create',
    'as' => 'user.crear'
    ]);
    
Route::get('usuarios/edit/{id}',[  //esta ruta es redundante ya q llama al controlador directamente
    'uses' => 'ControladorUsuario@edit',
    'as' => 'user.edit'
    ]);
    Route::delete('usuarios/{id}',[     // toma los datos del formulario
        'uses' => 'ControladorUsuario@destroy',
        'as' => 'user.destroy'
    ]);
 Route::get('mensajes',[
    'uses' => 'ControladorMensaje@index',
    'as' => 'mensajes'
 ]);
 Route::get('mensajes/crear',[
    'uses' => 'ControladorMensaje@create',
    'as' => 'mensajes.crear'
 ]);
 Route::post('mensajes',[
    'uses' => 'ControladorMensaje@store',
    'as' => 'mensajes.store'
 ]);