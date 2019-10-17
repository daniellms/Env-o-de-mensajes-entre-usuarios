@extends('layout')
@section('contenido')
@if(session()->has('info'))
    <div class="alert-dark">{{session('info')}}</div>
    
    @endif
Editar mensaje
<form  class="form letrachica" method="POST" action="{{route('mensajes.update',$mensaje->id)}}">
        {!!method_field('PUT')!!} {{-- esto es para q me reconozca el navegador solo para eso --}}
        @csrf <!-- token formulario valido -->
    <label>  
        Titulo
        <input class="form-control" type="text" name="motivo" value="{{$mensaje->motivo}}"> 
        {!!$errors->first('motivo','<span class=error>:message</span>')!!} 
    </label><br>
    <label for="mensaje">
            Mensaje
            <textarea class="form-control" name="mensaje"> {{$mensaje->mensaje}} </textarea>
            {!!$errors->first('mensaje','<span class=error>:message</span>')!!}
        </label><br>
    {{-- <input type="hidden" name="emisorid" value="{{auth()->user()->id}}"> --}}
    <input type="submit" class="btn btn-primary" value="Enviar">
</form>

@stop