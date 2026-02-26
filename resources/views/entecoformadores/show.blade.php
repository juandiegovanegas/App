<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Ente Coformador</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Detalle del Ente Coformador</h4>
        </div>
        <div class="card-body">
            @if(isset($entecoformadores))
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>NIS:</strong> {{ $entecoformadores->nis }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Tipo de Documento:</strong> {{ $entecoformadores->tdoc }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>Número de Documento:</strong> {{ $entecoformadores->numdoc }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Razón Social:</strong> {{ $entecoformadores->razonsocial }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>Dirección:</strong> {{ $entecoformadores->direccion ?? 'No especificada' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Teléfono:</strong> {{ $entecoformadores->telefono ?? 'No especificado' }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <p><strong>Correo Institucional:</strong> {{ $entecoformadores->correoinstitucional ?? 'No especificado' }}</p>
                    </div>
                </div>
            @else
                <div class="alert alert-warning">No se encontró la información del Ente Coformador.</div>
            @endif
        </div>
    </div>
</div>

<div class="container mt-3">
    <a href="{{ route('entecoformadores.index') }}" class="btn btn-secondary">Volver a la lista</a>
</div>

</body>
</html>