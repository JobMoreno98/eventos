<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rectoria CUCSH</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="vh-100">
    <div class="container vh-100 d-flex justify-content-center align-items-center flex-column border border-dark p-3">
        <div>
            <img style="width: 100%;max-width:200px;" src="{{ asset('img/logo_cucsh.jpg') }}" alt=""
                class="rounded-circle">
        </div>
        <div class="my-5">
            <p class="fs-2 ">
                Su respuesta ha sido recibida
            </p>
        </div>

    </div>

</body>

</html>
