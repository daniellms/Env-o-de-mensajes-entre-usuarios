<?php

use App\TipoDni;
use Illuminate\Database\Seeder;
Use App\User;
use App\Mensaje;
use App\MensajeUser;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->createUser();
        $this->createTiposDni();
        $this->createMensaje();
        $this->createMensajeUser();

    }
    protected function createUser()
    {
        User::create([
            'name' => 'daniel',
            'dni' => 34521125,
            'tipo_dni' => 2,
            'email' => 'correo@gmail.com',
            'password' => bcrypt('pass')
        ]);

        User::create([
            'name' => 'gabriel',
            'dni' => 35451123,
            'tipo_dni' => 2,
            'email' => 'cuenta@gmail.com',
            'password' => bcrypt('p123')
        ]);

        User::create([
            'name' => 'romina',
            'dni' => 30021188,
            'tipo_dni' => 1,
            'email' => 'email@gmail.com',
            'password' => bcrypt('asd')
        ]);
    }
    protected function createTiposDni()
    {
        // esta tabla la cargo asi porque al ejecutar de la manera anterior
        //  me cambia el nombre de la tabla en la base de datos (tipo_dnis) y no anda
       
        // DB::table('tipo_dni')->insert([
        //     'nombre' => 'Libreta Electoral',
        //     "created_at" => Carbon::now(), 
        //     "updated_at" => Carbon::now()
        // ]);
        TipoDni::create([
            'nombre' => 'Libreta Electoral'
        ]);
        TipoDni::create([
            'nombre' => 'Carnet de Extrangeria'
        ]);
        TipoDni::create([
            'nombre' => 'Pasaporte'
        ]);
        TipoDni::create([
            'nombre' => 'Reg. Unico de Contribuyentes'
        ]);
        TipoDni::create([
            'nombre' => 'Partida de Nacimiento'
        ]);
        
    }
    protected function createMensaje()
    {
       Mensaje::create([
            'nombre' => 'Ban injustificado',
            'mensaje' => 'Me banearon sin ninguna razon, necesito mi cuenta de nuevo',
            // 'id_emisor' => 3,
            // 'id_receptor' => 1
       ]);
       Mensaje::create([
        'nombre' => 'Consulta de Precios cuenta vip',
        'mensaje' => 'Buenas tardes, cuanto me sale una cuenta admin en el servidor del juego?',
        // 'id_emisor' => 2,
        // 'id_receptor' => 1
        ]);
        Mensaje::create([
            'nombre' => 'Sugerencia',
            'mensaje' => 'Hola, mi sugerencia es que pongan un foro publico en la pagina'
            ]);

    }
    protected function createMensajeUser(){
    
      
        

    }
}
