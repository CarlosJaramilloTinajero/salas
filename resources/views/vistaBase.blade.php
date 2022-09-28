<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <title>Salas</title>
    <style>
        /* .estadoTabla{

        } */
        /* th{
            padding: 100px;
        }
        td{
            padding: 10px;
        } */
        a {
            text-decoration: none;
        }

        .zoom {
            transition: all .6s ease;

        }

        .zoom:hover {
            scale: 1.05;
            box-shadow: 7px 10px 5px 0px rgba(0, 0, 0, 0.75);
            -webkit-box-shadow: 7px 10px 5px 0px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 7px 10px 5px 0px rgba(0, 0, 0, 0.75);
        }

        .letrasCard {
            color: white;
        }

        /* .card { */
        /* border: black 2px solid; */
        /* } */

        label {
            color: white;
        }

        .contenedor {
            text-align: left;
            margin-top: 20px;
            max-width: 90%;
            margin-top: 75px;
        }

        .sombra {
            box-shadow: 0px -1px 3px 3px rgba(0, 0, 0, 0.75);
            -webkit-box-shadow: 0px -1px 3px 3px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 0px -1px 3px 3px rgba(0, 0, 0, 0.75);
        }

        .titulo {
            color: rgba(0, 0, 0, 0.78);
            margin-bottom: 25px;
            /* border-bottom: white 2px solid; */
        }

        .menuL{
            margin-left: 18px;
        }
    </style>
</head>
<script>
    function resize() {}
</script>

<body class="bg-light" onresize="resize();" onload="resize();">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: rgb(7, 39, 65);">
            <div class="container-fluid">
                <a class="navbar-brand" style="margin-left: 5px;" href="{{route('inicio')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                    </svg> Inicio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link menuL" href="{{route('listaSalas')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                </svg> Lista de salas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menuL" href="{{route('nuevaReserva')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-fill" viewBox="0 0 16 16">
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5h16V4H0V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5z" />
                                </svg> Reservar sala</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menuL" href="#">En uso</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menuL" href="#">Desocupadas</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

    </header>

    @yield('contenido')

</body>

</html>