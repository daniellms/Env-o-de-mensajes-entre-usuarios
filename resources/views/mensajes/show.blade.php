@extends('layout')
@section('contenido')
{{-- {{dd($mensajes )}}  --}}
<br><br>
@foreach ($user->mensajes as $mensaje)
              
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">{{$mensaje -> nombre}}</a>
        <a href="#" class="list-group-item list-group-item-action">{{$mensaje -> mensaje}}</a>
        {{-- <a href="#" class="list-group-item list-group-item-action disabled">Enviado a </a> --}}
        <a class="btn btn-info btn-xs"href="{{ route('mensajes.edit', $mensaje->id) }}">Editar</a>
        <br><br>
    </div>
    @endforeach

    {{-- @foreach ($mensajes as $mensaje)
    <p> {{$mensaje->user_id}}</p>
    @endforeach --}}



          {{-- <tr>
            <li> <a href=""> <td>{{$mensaje -> nombre}} </td></a></li>
             
         </tr> --}}
@stop