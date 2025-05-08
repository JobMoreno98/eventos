<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hola, {{ $data['nombre'] }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Hola, {{ $data['nombre'] }}</h1>
        <div>
            <img src="{{ asset('img/protesta.jpg') }}" class="w-100" alt="">
        </div>
        <form action="{{ route('confirmar.asistencia', $data['correo']) }}" method="post"
            class="d-flex align-items-center flex-column">
            @method('post')
            @csrf
            <div class="my-4">

                <input type="radio" class="btn-check" name="asistencia" id="success-outlined" autocomplete="off"
                    >
                <label class="btn btn-outline-success" for="success-outlined">Asistire</label>

                <input type="radio" class="btn-check" name="noasistencia" id="danger-outlined" autocomplete="off">
                <label class="btn btn-outline-danger" for="danger-outlined">No asistire</label>
            </div>
            <div>
                <button type="submit" class="btn btn-sm btn-success">Enviar</button>
            </div>
        </form>

    </div>
</body>

</html>
