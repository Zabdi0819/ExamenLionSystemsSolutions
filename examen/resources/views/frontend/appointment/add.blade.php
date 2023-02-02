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
                            <h4 class="text-white">Agendar cita</h4>
                        </div>
                        <div class="col">
                            <a href="{{ url('customer') }}" class="btn btn-danger bg-gradient float-end" style="width: 140px"
                            onclick="return confirm('¿Está seguro de cancelar la operación? No se guardarán los cambios.')">Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body border bg-light bg-gradient shadow-lg">
                <form action="{{ url('insert-app/'.$customer -> id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 order-details">
                            <h4>Asegúrate de que toda la información sea correcta</h4>
                            <hr>
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2">
                                <div class="col">
                                    <label for="">Nombre:</label>
                                    <br>
                                    <div class="form-control">{{ $customer -> name }}</div>
                                </div>
                                <div class="col">
                                    <label for="">Apellido:</label>
                                    <br>
                                    <div class="form-control">{{ $customer -> last_name }}</div>
                                </div>
                                <div class="col">
                                    <label for="">Correo electrónico:</label>
                                    <br>
                                    <div class="form-control">{{ $customer -> email }}</div>
                                </div>
                                <div class="col">
                                    <label for="">Teléfono:</label>
                                    <br>
                                    <div class="form-control">{{ $customer -> phone }}</div>
                                </div>
                                <div class="col">
                                    <label for="">Seleccione una sala:</label>
                                    <select name="mr_id" class="form-select" >
                                        @foreach ($mr as $item)
                                            <option value="{{ $item -> id }}">{{ $item -> name }} - ${{ $item -> price_hour }} por hora</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="">Fecha:</label>
                                    <div class="input-group date" id="datepicker">
                                        <span class="input-group-append">
                                            <span class="input-group-text bg-white">
                                                <i class="fa-solid fa-calendar-days mx-3"></i>
                                            </span>
                                        </span>
    
                                        <input type="text" name="date" class="form-control pull-right" required>
                                        
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Hora de inicio:</label>
                                    <select name="hr_start" class="form-select" >
                                        @foreach ($hours as $item)
                                            <option value="{{ $item }}">{{ $item }}:00</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="">Seleccione la cantidad de horas:</label>
                                    <select name="qty" class="form-select" >
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <br>
                    <button type="submit" class="btn btn-primary">Agendar</button>
                </form>
            </div>
        </div>
    </div>
</div>

    
@endsection

@section('scripts')
<script>
    $(function(){
        var today = new Date();
        $('#datepicker').datepicker({
            format: "dd/mm/yyyy",
            language: "es",
            autoclose: true,
            todayHighlight: true,
            todayBtn: true,
            startDate: today
        });
    })
</script>
    
@endsection