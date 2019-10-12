@extends('layout')
@section('contenido')
    <h1>index</h1>
    <table  class="table letramediana" >
            {{-- class="table" --}}
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
              <tr>
                  <td>{{$user -> id}} </td>
                  <td>{{$user -> name}} </td>
                  <td>{{$user -> email}}</td>
                  {{-- <td> --}}
                    <td>
                        <a class="btn btn-info btn-xs"
                        href="{{ route('usuarios.edit', $user->id) }}">Editar</a>
                       <form style="display:inline;"
                        method="POST"
                        action="{{route('user.destroy',$user->id) }}">
                        <!-- @ csrf  token formulario valido -->
                        {!! csrf_field() !!}
                        {!! method_field('DELETE') !!} {{-- esto es para q me reconozca el navegador solo para eso --}}
                         <button class="btn btn-danger btn-xs" type="submit">Eliminar</button>
                    </form> 
                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Modal
                      </button>
                  </td> --}}
  
              </tr>
          @endforeach
        </tbody>
    </table>
@stop