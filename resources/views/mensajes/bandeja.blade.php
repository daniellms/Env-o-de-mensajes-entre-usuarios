@extends('layout')
@section('contenido')
<h1>Bandeja de entrada</h1>
<br><br>
{{-- {{dd($mismsjs)}} --}}
@if(isset($mismsjs)) 
    @foreach ($mismsjs as $msj)
   <div class="list-group">
    <a href="#" class="list-group-item list-group-item-action active">{{$msj -> motivo}}</a>
    <a href="#" class="list-group-item list-group-item-action">{{$msj -> mensaje}}</a>
    <a href="#" class="list-group-item list-group-item-action disabled">Enviado por: 
        {{$enviadospor[$loop->index]->email}}</a>
    <a href="#" class="list-group-item list-group-item-action disabled">Fecha: {{$msj -> updated_at}} </a>
    {{-- <form style="display:inline;"
            method="POST"
            action="{{route('mensajes.destroy',$msj->id) }}">
            <!-- @ csrf  token formulario valido -->
            {!! csrf_field() !!}
            {!! method_field('DELETE') !!} {{-- esto es para q me reconozca el navegador solo para eso --}}
            {{-- <button class="btn btn-danger btn-xs" type="submit">Eliminar</button>
        </form>  --}} 
    
    </div>
    <br><br>
    @endforeach 
@else
    <p><li>No hay mensajes recibidos</p></li>
@endif
@stop