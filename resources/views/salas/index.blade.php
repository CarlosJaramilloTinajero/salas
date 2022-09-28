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

<div class="row row-cols-1 row-cols-md-3 g-4" style="margin-left: 4%; max-width: 95%">
    <div class="col" style="max-width: 270px; margin-left: 10px;">
        <div class="card zoom carta" style="background-color:  rgba(32, 120, 192 , 0.948);">

            <div class="card-body">
                <h3 class="card-title letrasCard">{{$contSalas}}</h3>
                <p class="card-text letrasCard">Total de salas</p>
            </div>
            <div class="" style="background-color: rgb(0, 0, 0, 0.16); height: 30px;">
                <hr style="margin: 0px;">
                <center>
                    <p><a href="{{route('listaSalas')}}" class=" card_foot">Mas informacion -></a></p>
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
                    <p><a href="{{route('nuevaReserva')}}" class=" card_foot">Mas informacion -></a></p>
                </center>
            </div>
        </div>
    </div>
</div>
@endsection