@extends('vistaBase')
@section('contenido')
<center>
    <div class="contenedor" style="max-width: 90%;">
        <h2 class="titulo">
            Salas agregadas

        </h2>

        <hr class="opacity-80" style="color: white;">
        @if (session('success'))
        <h6 class="alert alert-success">{{session('success')}}</h6>
        @endif
        @error('numeroDeSala')
        <h6 class="alert alert-danger">{{$message}}</h6>
        @enderror

        <form action="{{route('salas.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col" style="max-width: 180px;"><input class="form-control" type="number" name="numeroDeSala" placeholder="Numero de sala"></div>
                <div class="col" style="max-width: 170px;"><input class="btn btn-secondary" type="submit" value="Agregar sala"></div>
            </div>
        </form>
        <!-- <center> -->
        <div class="row row-cols-1 row-cols-md-3 g-4" style="margin-top: 30px;">
            @foreach ($salas as $sala)
            <div id="" class="col" style="max-width: 250px;">
                @if ($sala->disposicion == "desocupada")

                <div class="card zoom" style="background-color:  rgba(0, 189, 16, 0.500);">
                    @else
                    <div class="card zoom" style="background-color:  rgba(0, 189, 16, 0.582);">
                        @endif
                        <div class="card-body">
                            <a href="{{route('salas.show',['sala' => $sala->id])}}">
                                <h5 class="card-title letrasCard">Sala #{{$sala->numeroDeSala}}</h5>
                                <p class="card-text letrasCard">Sala {{$sala->disposicion}}</p>
                            </a>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- </center> -->

</center>

@endsection