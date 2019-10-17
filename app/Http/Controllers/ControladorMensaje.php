<?php

namespace App\Http\Controllers;

use App\User;
use App\Mensaje;
use Carbon\Carbon;
use App\MensajeUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\MensajeRequest;
use App\Http\Requests\AtualizarMensaje;
use Symfony\Component\Console\Helper\Table;

class ControladorMensaje extends Controller
{
    

    function __construct()
    {
        $this->middleware('auth');
        
    }

    public function index()
    {   
        return view('mensajes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::all();
        return view('mensajes.create', compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MensajeRequest $request)
    {
        
        DB::table('mensajes')->insert([     
                    "motivo" => $request -> input('nombre'),     
                    "mensaje" => $request -> input('mensaje'),
                    "envia_id" => $request -> input('emisorid'),
                    "recibe_id" => $request -> input('correo'),
                    "created_at" => Carbon::now(), // carbon usa fecha, now hora actual
                    "updated_at" => Carbon::now(),
               ]);
               $mensaje= Mensaje::all();
               $msjid =($mensaje->last());
        DB::table('mensaje_user')->insert([
            'mensaje_id' => $msjid->id,
            'user_id' => $request -> input('emisorid'),
            'receptor_id'=> $request -> input('correo'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
         return back()->with('success','Su Mensaje a sido enviado!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // envia_id  recibe_id
        $user = User::findOrFail($id);
        $mensajes = DB::table('mensajes')->get();
        foreach ($mensajes as $mensaje)
        {
            if($mensaje->envia_id === $user->id)
            {
                $mismsjs[] = $mensaje;
                $enviado[] = User::findOrFail($mensaje->recibe_id);
             }
        }
        return view('mensajes.show',compact('user','mismsjs','enviado'));//(,'mismsjs','mensajes')
    }

    public function bandeja($id)
    {
        //// $mensajes = DB::table('mensaje_user')->where('id',auth()->user()->id);
       // // return 'parece q anda';
        // $mensajes = DB::table('mensaje_user')->get();
        // foreach ($mensajes as $mensaje)
        // {
        //      if($mensaje->receptor_id === auth()->user()->id)
        //      {
        //         $bandeja[] = Mensaje::findOrFail($mensaje->mensaje_id);
        //         $enviadospor[] = User::findOrFail($mensaje->user_id);
        //         //echo $mensaje->receptor_id;
        //      }
        //  }
         
        ////$mensaje = Mensaje::findOrFail($id);
        //return view('mensajes.bandeja',compact('mensajes','bandeja','enviadospor'));
        $user = User::findOrFail($id);
        $mensajes = DB::table('mensajes')->get();
        foreach ($mensajes as $mensaje)
        {
            if($mensaje->recibe_id ===$user->id)
            {
                $mismsjs[] = $mensaje;
                $enviadospor[] = User::findOrFail($mensaje->envia_id);
              }//else{
            //     $mismsjs[] = null;
            //  }
        }
        return view('mensajes.bandeja',compact('user','mismsjs','enviadospor'));
    }

    public function edit($id)
    {
        $mensaje = Mensaje::findOrFail($id);
        return view('mensajes.edit',compact('mensaje'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AtualizarMensaje $request, $id)
    {
       // dd($request);
    //    $mensaje = Mensaje::findOrFail($id);
    //    $mensaje->update($request->all());
       DB::table('mensajes')->where('id',$id)->update([
        "motivo" => $request -> input('motivo'), 
        "mensaje" => $request -> input('mensaje'),
        "updated_at" => Carbon::now()
        ]);
       return back()->with('info','Mensaje Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 'se elimino';
    }
    
}
