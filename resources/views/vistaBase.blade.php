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
        a{
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

        .card {
            border: black 2px solid;
        }

        label {
            color: white;
        }

        .contenedor {
            text-align: left;
            margin-top: 20px;
        }

        .titulo {
            color: white;
            margin-bottom: 25px;
            /* border-bottom: white 2px solid; */
        }
    </style>
</head>

<body class="bg-dark">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark " style="border-bottom:white 1px solid;">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('inicio')}}">Inicio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">En uso</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Desocupadas</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @yield('contenido')

</body>

</html>