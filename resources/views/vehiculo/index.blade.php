@extends('layouts.main')
@section('contenido')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ route('principal.index') }}">Principal</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('vehiculo.index') }}">Vehiculos<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('tipo_vehiculo.index') }}">Tipos de Vehiculos</a>
      </li>
    </ul>
  </div>
  <div class="collapse navbar-collapse">
      <ul class="navbar-nav mar-auto">
        <a href=" javascript: document.getElementById('logout').submit()" class="btn btn-danger btn-sm float-right">Cerrar Sesión</a>
        <form action="{{ route('logout') }}" id="logout" style="display:none" method="POST">
        @csrf
        </form>
      </ul>
  </div>
</nav>
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Listado de vehiculos
                        <a href="{{ route('vehiculo.create' )}}" class="btn btn-success btn-sm float-right">Agregar</a>
                    </div>
                    <div class="card-body">

                        @if(session('info'))
                        <div class="alert alert-success">
                        {{ session('info') }}
                        </div>
                        @endif

                        <table class="table table-hover table-sm">
                            <thead>
                                <th>#</th>
                                <th>Placa</th>
                                <th>Color</th>
                                <th>Modelo</th>
                                <th>Acción</th>
                            </thead>
                            <tbody>
                                @foreach($vehiculos as $vehiculo)
                                <tr>
                                    <td>
                                    {{$vehiculo->id}}
                                    </td>
                                    <td>
                                    {{$vehiculo->placa}}
                                    </td>
                                    <td>
                                    {{$vehiculo->color}}
                                    </td>
                                    <td>
                                    {{$vehiculo->modelo}}
                                    </td>
                                    <td>
                                    <a href="{{route('vehiculo.edit', $vehiculo->id)}}" class="btn btn-warning btn-sm">Editar</a>
                                        <a href="javascript: document.getElementById('delete-{{$vehiculo->id}}').submit()" class="btn btn-danger btn-sm">Eliminar</a>
                                        <form id="delete-{{$vehiculo->id}}" action="{{ route('vehiculo.destroy', $vehiculo->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        Bienvenido {{ auth()->user()->name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection