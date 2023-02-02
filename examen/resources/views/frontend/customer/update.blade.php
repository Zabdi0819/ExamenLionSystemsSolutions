@extends('layouts.front')

@section('title')
    Actualizar cliente
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark bg-gradient">
                    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 align-self-center">
                        <div class="col">
                            <h4 class="text-white">Editar cliente</h4>
                        </div>
                        <div class="col">
                            <a href="{{ url('customer') }}" class="btn btn-danger bg-gradient float-end" style="width: 140px"
                            onclick="return confirm('¿Está seguro de cancelar la operación? No se guardarán los cambios.')">Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body border bg-light bg-gradient shadow-lg">
                <form action="{{ url('update-customer/'.$customer -> id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12 order-details">
                            <h4>Asegúrate de que toda la información sea correcta</h4>
                            <hr>
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2">
                                <div class="col">
                                    <label for="">Nombre:</label>
                                    <br>
                                    <input type="text" class="form-control fname" value="{{ $customer -> name }}" placeholder="Nombre" name="name">
                                    <span id="fname_error"></span>
                                </div>
                                <div class="col">
                                    <label for="">Apellido:</label>
                                    <br>
                                    <input type="text" class="form-control lname" value="{{ $customer -> last_name }}" placeholder="Apellido" name="last_name">
                                    <span id="lname_error"></span>
                                </div>
                                <div class="col">
                                    <label for="">Correo electrónico:</label>
                                    <br>
                                    <input type="text" class="form-control email" value="{{ $customer -> email }}" placeholder="Correo electrónico" name="email">
                                    <span id="email_error"></span>
                                </div>
                                <div class="col">
                                    <label for="">Teléfono:</label>
                                    <br>
                                    <input type="text" class="form-control phone" value="{{ $customer -> phone }}" placeholder="Teléfono" name="phone">
                                    <span id="phone_error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

    
@endsection