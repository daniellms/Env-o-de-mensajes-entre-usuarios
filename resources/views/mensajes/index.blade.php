@extends('layout')
@section('contenido')
    <h1>Mensajes<h1>
    
    <div class="list-group ">
            {{-- col-md-8 offset-md-4 nav --}}
            <li ><a class="" href="<?php echo route('mensajes.crear')?>">Redactar</a></li>
            <li> <a  href="mensajes/bandeja {{auth()->user()->id}}">Bandeja de Entrada</a></li> 
            <li> <a class="" href="mensajes/show {{auth()->user()->id}}">Mensajes Enviados</a></li>
            

        </div>
        
@stop