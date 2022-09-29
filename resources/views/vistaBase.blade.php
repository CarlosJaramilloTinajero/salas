<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="/icono/iconoS.png">
    <meta name="google" value="notranslate">
    <title>Salas</title>
    <style>
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

        .menuL {
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
                            <a class="nav-link menuL" href="{{route('nuevaReserva')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-plus-fill" viewBox="0 0 16 16">
                                    <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zM8.5 8.5V10H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V11H6a.5.5 0 0 1 0-1h1.5V8.5a.5.5 0 0 1 1 0z" />
                                </svg> Reservar sala</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menuL" href="{{route('reservas')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-fill" viewBox="0 0 16 16">
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5h16V4H0V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5z" />
                                </svg> Reservas</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>

    @yield('contenido')

</body>


<footer style="background-color: rgba(7, 39, 65, 0.8); padding-top: 80px; padding-bottom: 10px; margin-top: 40px;">
    <center>
        <div>
            <p style="color: white; font-size: 12px;">
                Sitio web Desarrollado por Carlos Daniel Jaramillo Tinajero
            </p>
            <div class="d-flex justify-content-center mb-2">
                <div class="p-2">
                    <p class="col" style="max-width: 150px; color: white; font-size: 11px; text-align: center;">
                        FrameWorks utilizados <br>
                        Laravel <br>
                        BootStrap <br>
                    </p>
                </div>
                <div class="p-2">
                    <p class="col" style="max-width: 150px; color: white; font-size: 11px; text-align: center;">
                        Lenguajes utilizados <br>
                        PHP <br>
                        HTML <br>
                        JavaScript <br>
                        MySql <br>
                        CSS
                    </p>
                </div>
            </div>
            <p style="color: white; font-size: 12px;">https://github.com/CarlosJaramilloTinajero/salas</p>
        </div>
    </center>
</footer>

</html>