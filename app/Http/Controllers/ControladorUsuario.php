<?php

namespace App\Http\Controllers;

use App\User;
use \App\TipoDni;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Http\Requests\StoreUsuario;
use App\Http\Requests\ActualizarUsuario;

class ControladorUsuario extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $users = \App\User::all(); 
        
       
        return view('usuarios.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = TipoDni::all(); //pluck('nombre','id');
        return view('usuarios.create',compact('tipos'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsuario $request)
    {
        //return  $request->input('tipo');

       $usuario = DB::table('users')->insert([     
                    "name" => $request -> input('nombre'),    
                    "email" => $request -> input('email'),
                    "dni" => $request -> input('dni'),
                    "tipo_dni" => $request->input('tipo') ,
                    "password" =>  bcrypt($request -> input('pass')),
                    "created_at" => Carbon::now(), 
                    "updated_at" => Carbon::now(),

               ]);



           //    return view('usuarios.index');
      //return redirect()->route('usuarios.index'); 
     // auth()->user()->id = $usuario()->id;
      return 'funciona';
     // return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('usuarios.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('usuarios.edit',compact('user'));
        //return 'hola desde editar'. $user->id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarUsuario $request, $id)
    {
       $user = User::findOrFail($id);
       $user->update($request->all());
       return back()->with('info','Usuario Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back();
    }
}
