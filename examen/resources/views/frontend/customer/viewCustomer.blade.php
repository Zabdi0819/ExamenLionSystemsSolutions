@extends('layouts.front')

@section('title')
    Clientes
@endsection

@section('content')
<div class="py-3">
    <div class="container">
        <div class="card">
            <div class="card">
                <div class="card-header bg-dark bg-gradient">
                    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 align-self-center">
                        <div class="col">
                            <h4 class="text-white">Lista de clientes</h4>
                        </div>
                        <div class="col">
                            <a href="{{ url('btn-insert-customer') }}" class="btn btn-warning bg-gradient float-end" style="width: 140px">Añadir nuevo</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body" style="overflow-x:scroll; width: 100%">
                <h4>Seleccione el cliente al que le desea realizar la reserva</h4>
                <hr>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Correo electrónico</th>
                            <th>Teléfono</th>
                            <th>Accción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customer as $item)
                            <tr>
                                <td>{{ $item -> id }}</td>
                                <td>{{ $item -> name }}</td>
                                <td>{{ $item -> last_name }}</td>
                                <td>{{ $item -> email }}</td>
                                <td>{{ $item -> phone }}</td>
                                <td>
                                    <a href="{{ url('edit-customer/'.$item -> id) }}" class="btn btn-primary btn-sm">Editar</a>
                                    <a href="{{ url('delete-customer/'.$item -> id) }}" onclick="return confirm('¿Estás seguro de eliminar a {{ $item -> name }} {{ $item -> last_name }} como cliente?')" class="btn btn-danger btn-sm">Eliminar</a>
                                    <a href="{{ url('btn-insert-app/'.$item -> id) }}" class="btn btn-primary btn-sm">Reservar</a>
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