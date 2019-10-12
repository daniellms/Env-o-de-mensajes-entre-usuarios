@extends('layout')
@section('contenido')
    Mensajes
    <br><br>
    
    <div class="list-group">
            {{-- col-md-8 offset-md-4 nav --}}
            <li ><a  href="<?php echo route('mensajes.crear')?>">Redactar</a></li>
            <li> <a href="mensajes/show {{auth()->user()->id}}">Mensajes Enviados</a></li>
            {{-- <li> <a href="mensajes/bandeja">Bandeja de Entrada</a></li> --}}

        </div>
@stop