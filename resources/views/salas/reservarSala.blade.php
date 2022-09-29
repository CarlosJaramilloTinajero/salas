@extends('vistaBase')
@section('contenido')
<style>
    .tablaE {
        padding: 10px;
    }
</style>
<center>
    <div class="contenedor" style="margin-bottom: 100px;">
        <legend>Reservar sala</legend>
        <hr class="opacity-80" style="color: black;">
        <div class="row ">
            <!-- col-sm-6 col-md-8 -->
            <div id="col1" class="col rounded" style="border: rgb(0, 0, 0, 0.2) 1.5px solid; margin-right: 10px; margin-left: -10px; min-width: 900px; margin-top: 10px;">
                <h4 style="margin-top: 22px; margin-left: 10px;">Reservas</h4>
                <hr class="opacity-80" style="color: black; width: 95%; margin-left: auto; margin-right: auto;">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Sala</th>
                            <th scope="col">A nombre de</th>
                            <th scope="col">Dia</th>
                            <th scope="col">Desde</th>
                            <th scope="col">hasta</th>
                            <th scope="col">Observaciones</th>
                            <th scope="col">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $i = 0; ?>
                        @foreach ($reservas as $reserva)
                        <?php $salaF = null; ?>
                        @foreach ($salas as $sala)
                        @if ($reserva->sala_id == $sala->id)
                        <?php $salaF = $sala; ?>
                        @endif
                        @endforeach

                        <?php $i++; ?>
                        <tr>
                            <th scope="row">{{$i}} </th>
                            <td>{{$salaF->nombre}}</td>
                            <td>{{$reserva->a_nombre_de}}</td>
                            <td>{{$reserva->dia}}</td>
                            <td>{{$reserva->desde}}</td>
                            <td>{{$reserva->hasta}}</td>
                            <td>{{$reserva->observaciones}}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary btn-sm">Acciones</button>
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-sala-{{$reserva->id}}" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg> Editar</a>
                                        </li>
                                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-sala-eliminar-{{$reserva->id}}" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                </svg> Cancelar</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <!-- Editar reserva -->
                        <div class="modal fade" id="modal-sala-{{$reserva->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" style="color: black;" id="exampleModalLabel">Editar reserva a nombre de "{{$reserva->a_nombre_de}}"</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @if (session('success'))
                                        <h6 class="alert alert-success">{{session('success')}}</h6>
                                        @endif
                                        <div id="modal"></div>
                                        <form action="{{route('modificarReserva',['reserva' => $reserva->id])}}" method="POST" onsubmit="javascript: return validar(document.getElementById('diaM{{$i}}').value, document.getElementById('inicioM{{$i}}').value, document.getElementById('finalM{{$i}}').value, 'alertaM{{$i}}');">
                                            @csrf
                                            @method('PATCH')
                                            <label for="" class="form-label" style="color: black;"><strong>Seleccionar sala</strong></label>
                                            <select class="form-select" name="sala">
                                                @foreach ($salas as $sala)
                                                <option value="{{$sala->id}}">{{$sala->nombre}}</option>
                                                @endforeach
                                            </select><br>

                                            <label for="" class="form-label" style="color: black;"><strong>Reserva a nombre de:</strong></label>
                                            <input type="text" name="a_nombre_de" class="form-control" id="" required value="{{$reserva->a_nombre_de}}"><br>

                                            <label for="" class="form-label" style="color: black;"><strong>Dia de reserva:</strong></label>
                                            <input type="date" name="dia" id="diaM{{$i}}" class="form-control" required value="{{$reserva->dia}}"><br>

                                            <label for="" class="form-label" style="color: black;"><strong>Desde:</strong></label>
                                            <input type="time" name="desde" class="form-control" id="inicioM{{$i}}" required value="{{$reserva->desde}}"><br>

                                            <label for="" class="form-label" style="color: black;"><strong>Hasta:</strong></label>
                                            <input type="time" name="hasta" class="form-control" id="finalM{{$i}}" required value="{{$reserva->hasta}}"><br>
                                            <div id="alertaM{{$i}}"></div>

                                            <label for="" class="form-label" style="color: black;"><strong>Observaciones</strong></label>
                                            <textarea name="observaciones" id="" class="form-control" cols="2" rows="3" required>{{$reserva->observaciones}}</textarea><br>
                                            <div class="col d-flex justify-content-start">
                                                <input type="submit" value="Modificar" class="btn btn-primary">
                                            </div>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Eliminar reserva -->
                        <div class="modal fade" id="modal-sala-eliminar-{{$reserva->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" style="color: black;" id="exampleModalLabel">Confirmacion</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        Esta seguro de cancelar la reserva de la sala "{{$salaF->nombre}}" a nombre de "{{$reserva->a_nombre_de}}"?

                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{route('eliminarRerserva',['reserva' => $reserva->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger" value="Eliminar"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- col-6 col-md-4 -->
            <div id="col2" class="col rounded " style="border: rgb(0, 0, 0, 0.2) 1.5px solid; min-width: 300px; max-width: 450px; margin-top: 10px;">
                <h4 style="margin-top: 22px;">Nueva reserva</h4>
                <hr class="opacity-80" style="color: black; width: 95%; margin-left: auto; margin-right: auto;">
                @if (session('success'))
                <h6 class="alert alert-success">{{session('success')}}</h6>
                @endif
                <!-- <div id="alert"></div> -->
                <form action="{{route('agregarReserva')}}" method="POST" onsubmit="javascript: return validar(document.getElementById('dia').value, document.getElementById('inicio').value, document.getElementById('final').value, 'alerta');">
                    @csrf
                    <label for="" class="form-label" style="color: black;"><strong>Seleccionar sala</strong></label>
                    <select class="form-select" name="sala">
                        @foreach ($salas as $sala)
                        @if ($sala->estado == "activa")
                        <option value="{{$sala->id}}">{{$sala->nombre}}</option>
                        @endif
                        @endforeach
                    </select><br>

                    <label for="" class="form-label" style="color: black;"><strong>Reserva a nombre de:</strong></label>
                    <input type="text" name="a_nombre_de" class="form-control" id="" required><br>

                    <label for="" class="form-label" style="color: black;"><strong>Dia de reserva:</strong></label>
                    <input type="date" name="dia" id="dia" class="form-control" required><br>

                    <label for="" class="form-label" style="color: black;"><strong>Desde:</strong></label>
                    <input type="time" name="desde" class="form-control" id="inicio" required><br>

                    <label for="" class="form-label" style="color: black;"><strong>Hasta:</strong></label>
                    <input type="time" name="hasta" class="form-control" id="final" required><br>
                    <div id="alerta"></div>

                    <label for="" class="form-label" style="color: black;"><strong>Observaciones</strong></label>
                    <textarea name="observaciones" id="" class="form-control" cols="2" rows="3" required></textarea><br>
                    <div class="col d-flex justify-content-end">
                        <input type="submit" value="Reservar" class="btn btn-secondary d-flex justify-content-end">
                    </div>

                </form>
                <br>
            </div>
        </div>
        <br><br>

    </div>
</center>

<script>
    function validar(dia, inicio, final, alerta) {

        let fechaInicio = new Date(dia + " " + inicio);
        let fechaFinal = new Date(dia + " " + final);
        var modal = document.getElementById(alerta);

        //No supe obtener la zona horaria del usuario
        // let fechaActual = new Date();

        // if (+fechaInicio < +fechaActual) {
        //     modal.innerHTML = '<h6 class="alert alert-danger">La fecha de inicio no debe ser menor a la fecha actual</h6>';
        //     return false;
        // }

        let horaF = fechaFinal.getHours();
        let horaI = fechaInicio.getHours();

        let minF = fechaFinal.getMinutes();
        let minI = fechaInicio.getMinutes();


        let horaFEnMinutos = horaF * 60;
        let horaIEnMinutos = horaI * 60;

        if ((horaFEnMinutos + minF) - (horaIEnMinutos + minI) <= 120 &&
            (horaFEnMinutos + minF) - (horaIEnMinutos + minI) > 0) {
            return true;
        }

        if ((horaFEnMinutos + minF) - (horaIEnMinutos + minI) == 0) {
            modal.innerHTML = '<h6 class="alert alert-danger">La hora  de inicio y final es la misma</h6>';
            return false;
        }

        if ((horaFEnMinutos + minF) - (horaIEnMinutos + minI) < 0) {
            modal.innerHTML = '<h6 class="alert alert-danger">La hora  de final debe ser mayor a la de inicio</h6>';
            return false;
        }

        modal.innerHTML = '<h6 class="alert alert-danger">La reserva no debe ser mayor a dos horas</h6>';
        return false;
    }
</script>

<!-- <script>
    function validarFecha(fechaReservaString) {
        fechaReserva = new Date(fechaReservaString);
        fechaActual = new Date();
        if (+fechaReserva > +fechaActual) {
            return false;
        }
        return true;
    }
</script> -->

<script>
    function resize() {
        // let ancho = document.documentElement.clientWidth;
        // if (ancho < 1000) {
        //     var col1 = document.getElementById('col1');
        //     var col2 = document.getElementById('col2');
        //     col1.style.width = "600px";
        //     col2.style.width = "300px"
        // }

    }
</script>
@endsection