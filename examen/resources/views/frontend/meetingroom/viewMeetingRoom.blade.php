@extends('layouts.front')

@section('title')
    Bienvenido
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark bg-gradient">
                    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 align-self-center">
                        <div class="col">
                            <h4 class="text-white">Nueva sala de juntas</h4>
                        </div>
                        <div class="col">
                            <a href="{{ url('index') }}" class="btn btn-warning bg-gradient float-end" style="width: 140px">Salir</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body border bg-light bg-gradient shadow-lg">
                <form action="{{ url('insert-mr') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 order-details">
                            <h4>Asegúrate de que toda la información sea correcta</h4>
                            <hr>
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2">
                                <div class="col">
                                    <label for="">Nombre:</label>
                                    <br>
                                    <input type="text" class="form-control name" placeholder="Nombre" name="name">
                                    <span id="name_error"></span>
                                </div>
                                <div class="col">
                                    <label for="">Descripción:</label>
                                    <br>
                                    <textarea name="description" class="form-control description" placeholder="Descripción"></textarea>
                                    <span id="description"></span>
                                </div>
                                <div class="col">
                                    <label for="">Capacidad:</label>
                                    <br>
                                    <input type="number" class="form-control capacity" placeholder="Capacidad" name="capacity">
                                    <span id="capacity"></span>
                                </div>
                                <div class="col">
                                    <label for="">Precio por hora:</label>
                                    <br>
                                    <input type="number" class="form-control price_hour" placeholder="Precio por hora" name="price_hour">
                                    <span id="price_hour_error"></span><br>
                                </div>
                                <div class="col">
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </form>
            </div>
        </div>
    </div>
</div>

    
@endsection