@extends('vistaBase')
@section('contenido')
<style>
    .carta {
        height: 130px;
        width: 260px;

    }

    .card_foot {
        color: white;
        text-decoration: none;
    }

    .card_foot:hover {
        color: white;
    }
</style>
<center>
    <div class="contenedor">
        <h2 class="titulo">
            Salas agregadas
        </h2>

        <hr class="opacity-80" style="color: black;">
    </div>
</center>
<?php $contSalas = 0;
$contReservas = 0;
?>
@foreach ($salas as $sala)
<?php $contSalas++;
?>
@endforeach

@foreach ($reservas as $reserva)
<?php $contReservas++;
?>
@endforeach

<div class="row row-cols-1 row-cols-md-3 g-4" style="margin-left: 4%; max-width: 95%; margin-bottom: 300px;">
    <div class="col" style="max-width: 270px; margin-left: 10px;">
        <div class="card zoom carta" style="background-color:  rgba(32, 120, 192 , 0.948);">

            <div class="card-body">
                <h3 class="card-title letrasCard">{{$contSalas}}</h3>
                <p class="card-text letrasCard">Total de salas</p>
            </div>
            <div class="" style="background-color: rgb(0, 0, 0, 0.16); height: 30px;">
                <hr style="margin: 0px;">
                <center>
                    <p><a href="{{route('listaSalas')}}" class=" card_foot">Mas informacion <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                            </svg></a></p>
                </center>
            </div>
        </div>
    </div>
    <div class="col" style="max-width: 270px; margin-left: 10px;">
        <div class="card zoom carta" style="background-color:rgba(11, 156, 23, 0.9);">

            <div class="card-body">
                <h3 class="card-title letrasCard">{{$contReservas}}</h3>
                <p class="card-text letrasCard">Total de reservas</p>
            </div>
            <div class="" style="background-color: rgb(0, 0, 0, 0.16); height: 30px;">
                <hr style="margin: 0px;">
                <center>
                    <p><a href="{{route('nuevaReserva')}}" class=" card_foot">Mas informacion <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                            </svg></a></p>
                </center>
            </div>
        </div>
    </div>
</div>
@endsection