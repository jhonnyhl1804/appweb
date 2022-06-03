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
                        Editar un Vehiculo
                    </div>
                    <div class="card-body">
                        <form action="{{ route('vehiculo.update', $vehiculo->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <div class="label">Placa</div>
                                <input type="text" class="form-control" value="{{ $vehiculo->placa}}"  name="placa">
                            </div>
                            <div class="form-group">
                                <div class="label">Color</div>
                                <input type="text" class="form-control" value="{{ $vehiculo->color}}" name="color">
                            </div>
                            <div class="form-group">
                                <div class="label">Modelo</div>
                                <input type="text" class="form-control" value="{{ $vehiculo->modelo}}" name="modelo">
                            </div>
                            <button type="submit" class="btn btn-primary">Editar</button>
                            <a href="{{ route('vehiculo.index') }}" class="btn btn-danger">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection