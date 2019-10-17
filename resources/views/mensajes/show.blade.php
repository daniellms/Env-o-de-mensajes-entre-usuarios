@extends('layout')
@section('contenido')
{{-- {{dd($mismsjs )}}  --}}
<h1>Todos mis mensajes Enviados</h1>
<br><br>
@if(isset($mismsjs))
    @foreach ($mismsjs as $mensaje)
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">{{$mensaje -> motivo}}</a>
            <a href="#" class="list-group-item list-group-item-action ">{{$mensaje -> mensaje}}</a>
            <a href="#" class="list-group-item list-group-item-action disabled">Enviado a 
                {{$enviado[$loop->index]->email}}</a> 
            <a href="#" class="list-group-item list-group-item-action disabled">Fecha: {{$mensaje -> updated_at}} </a>
            <a class="btn btn-warning btn-xs"href="{{ route('mensajes.edit', $mensaje->id) }}">Editar</a>
        </div>
        <br><br>
    @endforeach
@else
       <li> No se enviaron Mensajes</li>
@endif
    {{-- @if($mismsjs != null)
        @foreach ($mismsjs as $m)
             <p>elemento</p>
         @endforeach
    @else
           
             <p>No hay mensajes recibidos</p>
    @endif --}}
          {{-- <tr>
            <li> <a href=""> <td>{{$mensaje -> nombre}} </td></a></li>
             
         </tr> --}}
@stop