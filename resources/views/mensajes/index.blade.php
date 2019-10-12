@extends('layout')
@section('contenido')
    Mensajes
    <br><br>
    <div class="list-group">
            {{-- col-md-8 offset-md-4 nav --}}
            <li ><a  href="<?php echo route('mensajes.crear')?>">Redactar</a></li>
            <li> <a href="<?php echo route('login')?>">Bandeja de Entrada</a></li>
          {{-- <div class="list-group">
              <a href="#" class="list-group-item list-group-item-action active">Active item</a>
              <a href="#" class="list-group-item list-group-item-action">Item</a>
              <a href="#" class="list-group-item list-group-item-action disabled">Disabled item</a>
          </div> --}}
                
            
            
            
        </div>
@stop