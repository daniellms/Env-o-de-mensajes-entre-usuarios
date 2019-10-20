@extends('layout')
@section('contenido')
    <h1>Bandeja de Entrada<h1>
     @if(isset($mismsjs)) 
            <table  class="table letramediana" >
                    {{-- class="table" --}}
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Motivo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($mismsjs as $m)
                          <tr>
                            <td>{{$m -> id}} </td>
                            <td>{{$m -> motivo}} </td>
                            <td>
                                 <a class="btn btn-info btn-xs"
                                 href="unico {{$m->id}}">Mostrar</a>

                                 <form style="display:inline;"
                                 method="POST"
                                 action="{{route('mensajes.destroy',[$m->id,'bandeja']) }}">
                                 {!! csrf_field() !!}
                                 {!! method_field('DELETE') !!} {{-- esto es para q me reconozca el navegador solo para eso --}}
                                  <button class="btn btn-danger btn-xs" type="submit">Eliminar</button>
                             </form> 
                          </tr>
                        @endforeach
                </tbody>
            </table>
    @else
    <li> No hay mensajes</li>
    @endif
@stop