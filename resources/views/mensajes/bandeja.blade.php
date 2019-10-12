@extends('layout')
@section('contenido')
Bandeja de entrada
  {{-- @foreach ($mensajes as $mensaje)
   @if($mensaje->receptor_id === auth()->user()->id)
        <p> {{$mensaje->receptor_id}}" mensaje"</p>
   @endif
  @endforeach  --}}

   @foreach ($bandeja as $msj)
   <div class="list-group">
    <a href="#" class="list-group-item list-group-item-action active">{{$msj -> nombre}}</a>
    <a href="#" class="list-group-item list-group-item-action">{{$msj -> mensaje}}</a>
    <a href="#" class="list-group-item list-group-item-action disabled">Enviado por: 
        {{$enviadospor[$loop->index]->email}}
    </a>
    <form style="display:inline;"
            method="POST"
            action="{{route('mensajes.destroy',$msj->id) }}">
            <!-- @ csrf  token formulario valido -->
            {!! csrf_field() !!}
            {!! method_field('DELETE') !!} {{-- esto es para q me reconozca el navegador solo para eso --}}
            <button class="btn btn-danger btn-xs" type="submit">Eliminar</button>
        </form> 
    <br><br>
</div>
    @endforeach
    {{-- @foreach ($enviadospor as $user)
    {{$user -> email}}
    @endforeach     --}}
@stop