@extends('layouts.front')

@section('title')
    Detalles de cita
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark bg-gradient">
                    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 align-self-center">
                        <div class="col">
                            <h4 class="text-white">Detalles de cita</h4>
                        </div>
                        <div class="col">
                            <a href="{{ url('appointment') }}" class="btn btn-warning bg-gradient float-end" style="width: 140px">Salir</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body border bg-light bg-gradient shadow-lg">
                <form action="{{ url('update-app/'.$appointment -> id) }}" method="POST" enctype="multipart/form-data">
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
                                    <div class="form-control">{{ $appointment -> customer -> name }}</div>
                                </div>
                                <div class="col">
                                    <label for="">Apellido:</label>
                                    <br>
                                    <div class="form-control">{{ $appointment -> customer -> last_name }}</div>
                                </div>
                                <div class="col">
                                    <label for="">Correo electrónico:</label>
                                    <br>
                                    <div class="form-control">{{ $appointment -> customer -> email }}</div>
                                </div>
                                <div class="col">
                                    <label for="">Teléfono:</label>
                                    <br>
                                    <div class="form-control">{{ $appointment -> customer -> phone }}</div>
                                </div>
                                <div class="col">
                                    <label for="">Sala:</label>
                                    <label  class="form-control pull-right">{{ $appointment -> mr -> name }} - ${{ $appointment -> mr -> price_hour }} por hora</label>
                                </div>
                                <div class="col">
                                    <label for="">Fecha:</label>
                                    <div class="input-group date">
                                        <span class="input-group-append">
                                            <span class="input-group-text bg-white">
                                                <i class="fa-solid fa-calendar-days mx-3"></i>
                                            </span>
                                        </span>
    
                                        <label name="date" class="form-control pull-right">{{ $appointment -> date }}</label>
                                        
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Hora de inicio:</label>
                                    <label name="date" class="form-control pull-right">{{ $appointment -> hr_start }}</label>
                                </div>
                                <div class="col">
                                    <label for="">Hora fin:</label>
                                    <label name="date" class="form-control pull-right">{{ $appointment -> hr_end }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <br>
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