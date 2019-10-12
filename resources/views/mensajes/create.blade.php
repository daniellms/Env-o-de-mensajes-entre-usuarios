@extends('layout')
@section('contenido')
@if (\Session::has('success')) 
<div class="alert alert-success"> 
    <ul>
         <li>{!! \Session::get('success') !!}</li> 
    </ul>
</div> 
@endif

Redactar un mensajes
<form  class="form letrachica" method="POST" action="{{route('mensajes.store')}}">
        @csrf <!-- token formulario valido -->
    <label for="nombre">  
        Titulo
        <input class="form-control" type="text" name="nombre" value="{{old('nombre')}}"> 
        {!!$errors->first('nombre','<span class=error>:message</span>')!!} <!--validacion de form con el metodo mensajes de controlador-->
    </label><br>
    <div class="form-group">
        Para:
        <select  class="select" name="correo" class="form-control">
            @foreach($usuarios as $user)
                @if(auth()->user()->email != $user->email){{-- asi no me aparece el user actual --}}
                     <option value="{{$user->id}}">{{$user->email}} </option>
                 @endif
            @endforeach
        </select>
    </div> 
    <label for="mensaje">
            Mensaje
            <textarea class="form-control" name="mensaje"> {{old('mensaje')}} </textarea>
            {!!$errors->first('mensaje','<span class=error>:message</span>')!!}
        </label><br>
    <input type="hidden" name="emisorid" value="{{auth()->user()->id}}">
    <input type="submit" class="btn btn-primary" value="Enviar">
</form>
@stop