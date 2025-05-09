@php
    $colores = [
        'Sin respuesta' => 'bg-dark text-white',
        'Asistencia' => 'bg-success text-white',
        'No asistencia' => 'bg-danger text-dark',
    ];
@endphp

<div class="row">
    @foreach ($conteo as $estado => $cantidad)
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm {{ $colores[$estado] ?? 'bg-light' }}">
                <div class="card-body text-center  text-white">
                    <h5 class="card-title text-capitalize">{{ $estado }}</h5>
                    <h1 class="display-5">{{ $cantidad }}</h1>
                </div>
            </div>
        </div>
    @endforeach
</div>
