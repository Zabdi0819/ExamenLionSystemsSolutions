@extends('layouts.front')

@section('title')
    Salas
@endsection

@section('content')
<div class="py-3">
    <div class="container">
        <div class="card">
            <div class="card">
                <div class="card-header bg-dark bg-gradient">
                    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 align-self-center">
                        <div class="col">
                            <h4 class="text-white">Lista de salas</h4>
                        </div>
                        <div class="col">
                            <a href="{{ url('btn-insert-mr') }}" class="btn btn-warning bg-gradient float-end" style="width: 140px">Añadir nueva</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body" style="overflow-x:scroll; width: 100%">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Máx. capacidad</th>
                            <th>Precio por hora</th>
                            <th>Imagen</th>
                            <th>Accción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mr as $item)
                            <tr>
                                <td>{{ $item -> id }}</td>
                                <td>{{ $item -> name }}</td>
                                <td>{{ $item -> description }}</td>
                                <td>{{ $item -> capacity }}</td>
                                <td>{{ $item -> price_hour }}</td>
                                <td>
                                    <img src="{{ asset('assets/uploads/salas/'.$item -> image) }}" class= "imageView" alt="Image here">
                                </td>
                                <td>
                                    <a href="{{ url('edit-mr/'.$item -> id) }}" class="btn btn-primary btn-sm">Editar</a>
                                    <a href="{{ url('delete-mr/'.$item -> id) }}" onclick="return confirm('¿Estás seguro de eliminar la sala {{ $item -> name }}?')" class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    
@endsection