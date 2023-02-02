@extends('layouts.front')

@section('title')
    Citas
@endsection

@section('content')
<div class="py-3">
    <div class="container">
        <div class="card">
            <div class="card">
                <div class="card-header bg-dark bg-gradient">
                    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 align-self-center">
                        <div class="col">
                            <h4 class="text-white">Salas ocupadas actualmente</h4>
                        </div>
                        <div class="col">
                            <a href="{{ url('appointment') }}" class="btn btn-warning bg-gradient float-end" style="width: 200px">Ver todas las citas</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body" style="overflow-x:scroll; width: 100%">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Inicio</th>
                            <th>Fin</th>
                            <th>Sala</th>
                            <th>Accción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($currentMr as $item)
                            <tr>
                                <td>{{ $item -> date }}</td>
                                <td>{{ $item -> hr_start }}</td>
                                <td>{{ $item -> app -> hr_end }}</td>
                                <td>{{ $item -> mr -> name }}</td>
                                <td>
                                    <a href="{{ url('view-app/'.$item -> app_id) }}" class="btn btn-primary btn-sm">Ver</a>
                                    <a href="{{ url('checkout/'.$item -> app_id) }}" onclick="return confirm('¿Está seguro de liberar la sala {{ $item -> mr -> name }}?')" class="btn btn-danger btn-sm">Liberar sala</a>
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