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
Route::put('usuarios/{id}',[  //esta ruta es redundante ya q llama al controlador directamente
    'uses' => 'ControladorUsuario@update',
    'as' => 'user.update'
    ]);

    Route::delete('usuarios/{id}',[     // toma los datos del formulario
        'uses' => 'ControladorUsuario@destroy',
        'as' => 'user.destroy'
    ]);
 Route::get('usuarios/show/{id}',[  
        'uses' => 'ControladorUsuario@show',
        'as' => 'user.show'
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
 Route::get('mensajes/show{id}',[
    'uses' => 'ControladorMensaje@show',
    'as' => 'mensajes.show'
 ]);
 Route::get('mensajes/bandeja',[
    'uses' => 'ControladorMensaje@bandeja',
    'as' => 'mensajes.bandeja'
 ]);
 Route::delete('mensajes/{id}',[     // toma los datos del formulario
    'uses' => 'ControladorMensaje@destroy',
    'as' => 'mensajes.destroy'
]);
Route::get('mensajes/edit/{id}',[
    'uses' => 'ControladorMensaje@edit',
    'as' => 'mensajes.edit'
]);
Route::put('mensajes/{id}',[
    'uses' => 'ControladorMensaje@update',
    'as' => 'mensajes.update'
]);



Route::get('ver',[
    'uses' => 'ControladorUsuario@ver',
]);

