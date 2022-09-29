@extends('vistaBase')
@section('contenido')
<center>
    <!-- style="border: rgb(0, 0, 0, 0.1) 2px solid;" -->
    <div class="contenedor" style="margin-bottom: 100px;">
        <div class="row">
            <div class="col">
                <legend class="titulo">Lista de salas</legend>
            </div>
            <div class="col d-flex justify-content-end">
                <button type="button" class="btn btn-primary" style="height: 50px;" data-bs-toggle="modal" data-bs-target="#modal-sala">Agregar sala</button>
            </div>
        </div>

        <hr class="opacity-80" style="color: black;">
        @if (session('success'))
        <h6 class="alert alert-success">{{session('success')}}</h6>
        @endif
        @error('numeroDeSala')
        <h6 class="alert alert-danger">{{$message}}</h6>
        @enderror
        <div class="rounded" style="border: rgb(0, 0, 0, 0.2) 1.5px solid; padding: 15px;">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Ubicacion</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($salas as $sala)
                    <?php $i++; ?>
                    <tr>
                        <th scope="row">{{$i}} </th>
                        <td>{{$sala->nombre}}</td>
                        <td>{{$sala->ubicacion}}</td>
                        @if ($sala->estado == "activa")
                        <td><span class="rounded" style="background-color: green; padding-left: 8px; padding-right: 8px; padding-top: 2px; padding-bottom: 2px;"><small style="color: white; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size: 16px;">Activa</small></span></td>
                        @else
                        <td><span class="rounded" style="background-color: red; padding-left: 8px; padding-right: 8px; padding-top: 2px; padding-bottom: 2px;"><small style="color: white; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size: 16px;">Inactiva</small></span></td>
                        @endif
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary btn-sm">Acciones</button>
                                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-sala-{{$sala->id}}" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg> Editar</a>
                                    </li>
                                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-sala-eliminar-{{$sala->id}}" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                            </svg> Eliminar</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>

                    <!-- Editar sala -->
                    <div class="modal fade" id="modal-sala-{{$sala->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="color: black;" id="exampleModalLabel">Editar sala "{{$sala->nombre}}"</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('salas.update',['sala' => $sala->id])}}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <label for="" class="form-label" style="color: black;">Nombre de la sala</label>
                                        <input type="text" name="nombre" id="" class="form-control" value="{{$sala->nombre}}"><br>

                                        <label for="" class="form-label" style="color: black;">Ubicacion</label>
                                        <textarea id="" class="form-control" name="ubicacion" rows="2" cols="50">{{$sala->ubicacion}}</textarea><br>

                                        <label for="" class="form-label" style="color: black;">Descripcion</label>
                                        <textarea id="" name="descripcion" rows="2" cols="50" class="form-control">{{$sala->descripcion}}</textarea><br>

                                        <label for="" class="form-label" style="color: black;">Estado</label>
                                        <select class="form-select" name="estado">
                                            @if ($sala->estado == "activa")
                                            <option value="activa" selected>Activa</option>
                                            <option value="inactiva">Inactiva</option>
                                            @else
                                            <option value="activa">Activa</option>
                                            <option value="inactiva" selected>Inactiva</option>
                                            @endif

                                        </select><br>

                                        <input type="submit" class="btn btn-primary" value="Modificar">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Eliminar sala -->
                    <div class="modal fade" id="modal-sala-eliminar-{{$sala->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="color: black;" id="exampleModalLabel">Confirmacion</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    Esta seguro de eliminar la sala "{{$sala->nombre}}"?<br>Si elimina la sala se eliminaran todas las reservas que hay en esta sala

                                </div>
                                <div class="modal-footer">
                                    <form action="{{route('salas.destroy',['sala' => $sala->id])}}" method="POST">
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

    </div>
</center>
<!-- Agregar sala -->
<div class="modal fade" id="modal-sala" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color: black;" id="exampleModalLabel">Agregar sala</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('salas.store')}}" method="POST">
                    @csrf
                    <label for="" class="form-label" style="color: black;">Nombre de la sala</label>
                    <input type="text" name="nombre" id="" class="form-control"><br>

                    <label for="" class="form-label" style="color: black;">Ubicacion</label>
                    <textarea id="" class="form-control" name="ubicacion" rows="2" cols="50"></textarea><br>

                    <label for="" class="form-label" style="color: black;">Descripcion</label>
                    <textarea id="" name="descripcion" rows="2" cols="50" class="form-control"></textarea><br>

                    <label for="" class="form-label" style="color: black;">Estado</label>
                    <select class="form-select" name="estado">
                        <option value="activa">Activa</option>
                        <option value="inactiva">Inactiva</option>
                    </select><br>

                    <input type="submit" class="btn btn-primary" value="Agregar">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

@endsection