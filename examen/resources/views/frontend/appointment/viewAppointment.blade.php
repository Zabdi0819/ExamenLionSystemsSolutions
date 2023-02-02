@extends('layouts.front')

@section('title')
    Reservas
@endsection

@section('content')
<div class="py-3">
    <div class="container">
        <div class="card">
            <div class="card">
                <div class="card-header bg-dark bg-gradient">
                    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 align-self-center">
                        <div class="col">
                            <h4 class="text-white">Todas las reservas</h4>
                        </div>
                        <div class="col">
                            <a href="{{ url('customer') }}" class="btn btn-warning bg-gradient float-end" style="width: 200px">Añadir nueva cita</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body" style="overflow-x:scroll; width: 100%">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Folio</th>
                            <th>Nombre</th>
                            <th>Fecha</th>
                            <th>Inicio</th>
                            <th>Fin</th>
                            <th>Sala</th>
                            <th>Accción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointment as $item)
                            <tr>
                                <td>{{ $item -> folio }}</td>
                                <td>{{ $item -> customer -> name }} {{ $item -> customer -> last_name }}</td>
                                <td>{{ $item -> date }}</td>
                                <td>{{ $item -> hr_start }}</td>
                                <td>{{ $item -> hr_end }}</td>
                                <td>{{ $item -> mr -> name }}</td>
                                <td>
                                    <a href="{{ url('view-app/'.$item -> id) }}" class="btn btn-primary btn-sm">Ver</a>
                                    <a href="{{ url('delete-app/'.$item -> id) }}" onclick="return confirm('¿Estás seguro de eliminar la cita de {{ $item -> customer -> name }} {{ $item -> customer -> last_name }}?')" class="btn btn-danger btn-sm">Eliminar</a>
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