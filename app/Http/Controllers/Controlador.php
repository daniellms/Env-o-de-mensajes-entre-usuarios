<?php

namespace App\Http\Controllers;

use App\http\Requests;
use Illuminate\Http\Request;

class Controlador extends Controller
{
    public function home(){
        return view('home');
    }
}
