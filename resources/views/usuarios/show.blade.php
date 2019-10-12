@extends('layout')
@section('contenido')

<h1>Usuario {{$user->name}}</h1>
<table class="table">
    <tr>
        <th>Nombre</th>
        <td>{{$user->name}}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{$user->email}}</td>
    </tr>
    <tr>
            <th>Dni</th>
            <td>{{$user->dni}}</td>
    </tr>
    <tr>
            <th>Tipo de Documento</th>
            <td>
               
                {{$tipo->nombre}}</td>
    </tr>

    {{-- <tr>
        <th>Roles</th>
        <td>@foreach ($user->roles as $role)
            {{$role->nombre_control}}
        @endforeach</td>
    </tr> --}}
</table>
@stop