@extends('layout')
@section('contenido')
<h1 class="h1 display-4 kbd">Bienvenido al Proyecto E x a m e n</h1>
<br><br>
@if(auth()->check()) 
<p>Usuario: {{auth()->user()->name}}</p>  
<p> Email: {{auth()->user()->email}} </p>
<p>Usted se encuentra autenticado</p>
@else
<p>Usted No esta autenticado </p>
@endif
@stop
    
