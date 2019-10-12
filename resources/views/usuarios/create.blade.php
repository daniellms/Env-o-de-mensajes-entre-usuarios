@extends('layout')
@section('contenido')
<h2 class="h2 fondoli">Únete a nosotros</h2>

@if (\Session::has('success')) 
<div class="alert alert-success"> 
    <ul>
         <li>{!! \Session::get('success') !!}</li> 
    </ul>
</div> 
@endif
    <form class="form letrachica" method="POST" action="{{route('usuarios.store')}}">
    @csrf <!-- token formulario valido -->
     {{-- @if (auth()->guest()) --}}
       <label for="nombre">  
             Nombre
             <input class="form-control" type="text" name="nombre" value="{{old('nombre')}}"> 
             {!!$errors->first('nombre')!!} <!--validacion de form con el metodo mensajes de controlador-->
        </label><br>
        <label for="email">
            Email
            <input class="form-control" type="text" name="email" value="{{old('email')}}">
            {!!$errors->first('email')!!}
        </label><br>
        <label for="pass">
            Contraseña
            <input class="form-control" type="password" name="pass" value="{{old('pass')}}">
            {!!$errors->first('pass')!!}
        </label><br>
        <label for="pass">
            Nro Documento
            <input class="form-control" type="text" name="dni" value="{{old('dni')}}">
            {!!$errors->first('dni')!!}
        </label><br>

        <div class="form-group">
            Tipo de Dni
            <select  class="select" name="tipo" class="form-control">
                @foreach($tipos as $tipo)
                 <option value="{{$tipo->id}}">{{$tipo->nombre}} </option>
                @endforeach
            </select>
        </div>
    <input type="submit" class="btn btn-primary" value="Enviar">
    </form>
    @stop