@extends('layout')
@section('contenido')
<h1>Estas en el Home</h1>
@if(auth()->check()) 
<p>{{auth()->user()->name}}   Email: {{auth()->user()->email}} </p>
<p>Usted se encuentra autenticado</p>
@else
<p>Usted No este autenticado </p>
@endif
@stop
    
