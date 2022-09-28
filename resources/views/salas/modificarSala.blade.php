@extends('vistaBase')
@section('contenido')
<center>
    <div class="contenedor" style="max-width: 400px;">
        <h2 class="titulo">Modificar sala #{{$sala->numeroDeSala}}</h2>
        @if (session('success'))
        <h6 class="alert alert-success">{{session('success')}}</h6>
        @endif
        @error('numeroDeSala')
        <h6 class="alert alert-danger">{{$message}}</h6>
        @enderror
        <form action="{{route('salas.update',['sala' => $sala->id])}}" method="POST" style="max-width: 400px;">
            @csrf
            @method('PATCH')
            <label class="form-label">Numero de sala</label>

            <div class="row">
                <div class="col">
                    <input type="number" name="numeroDeSala" class="form-control" id="" value="{{$sala->numeroDeSala}}">
                </div>
                <div class="col">
                    <input type="submit" value="Modificar" class="btn btn-secondary">
                </div>
            </div>

        </form>
        <hr class="opacity-80" style="color: white;">


        @if (session('success2'))
        <h6 class="alert alert-success">{{session('success2')}}</h6>
        @endif

        <h2 class="titulo">Ocupar sala #{{$sala->numeroDeSala}}</h2>
        <form action="{{route('inicio')}}" style="max-width: 300px;" method="POST" onsubmit="javascript: return ocupar(document.getElementById('dia').value, document.getElementById('inicio').value, document.getElementById('final').value);">
            @csrf
            @method('UPDATE')
            <label for="" class="form-label">Dia de la reserva</label>
            <input type="date" name="dia" id="dia" class="form-control"><br>

            <label for="" class="form-label">Hora de inicio</label>

            <input class="form-control" type="time" name="horaInicio" id="inicio">

            <label for="" class="form-label" style="margin-top: 20px;">Hora final</label>
            <input class="form-control" type="time" name="horaFinal" id="final">
            <br>
            <input type="submit" value="Ocupar sala" class="btn btn-secondary">
        </form>

        <hr class="opacity-80" style="color: white;">

    </div>
</center>

<script>
    function ocupar(dia, inicio, final) {
        let fechaInicio = new Date(dia + " " + inicio);
        let fechaFinal = new Date(dia + " " + final);

        let horaF = fechaFinal.getHours();
        let horaI = fechaInicio.getHours();

        if ((horaF - horaI) < 2) {
            alert('No pasa de dos horas');
            return true;
        } else if ((horaF - horaI) == 2) {
            let minF = fechaFinal.getMinutes();
            let minI = fechaInicio.getMinutes();

            if ((minF - minI) > 0) {
                alert('pasa de dos horas');
                return false;
            } else {
                alert('No pasa de dos horas');
                return true;
            }

        } else {
            alert('pasa de dos horas');
            return false;
        }

    }
</script>

@endsection