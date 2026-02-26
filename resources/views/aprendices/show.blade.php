<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Aprendiz</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-header bg-info text-white">
            <h4>Detalle del Aprendiz</h4>
        </div>

        <div class="card-body">

            @if(isset($aprendiz))
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>NIS:</strong> {{ $aprendiz->nis }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Tipo Documento:</strong> {{ $aprendiz->tipoDocumento ? $aprendiz->tipoDocumento->denominacion : 'N/A' }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Número Documento:</strong> {{ $aprendiz->numdoc }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Nombres:</strong> {{ $aprendiz->nombres }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Apellidos:</strong> {{ $aprendiz->apellidos }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Dirección:</strong> {{ $aprendiz->direccion ?? 'N/A' }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Teléfono:</strong> {{ $aprendiz->telefono ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Correo Institucional:</strong> {{ $aprendiz->correoinstitucional ?? 'N/A' }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Correo Personal:</strong> {{ $aprendiz->correopersonal ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Sexo:</strong> {{ $aprendiz->sexo == 'M' ? 'Masculino' : ($aprendiz->sexo == 'F' ? 'Femenino' : 'N/A') }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Fecha Nacimiento:</strong> {{ $aprendiz->fechanac ? \Carbon\Carbon::parse($aprendiz->fechanac)->format('d/m/Y') : 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>EPS:</strong> {{ $aprendiz->eps ? $aprendiz->eps->denominacion : 'N/A' }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <p><strong>Ficha:</strong> {{ $aprendiz->ficha ? $aprendiz->ficha->codigo . ' - ' . $aprendiz->ficha->denominacion : 'N/A' }}</p>
                    </div>
                </div>

            @else
                <p>No se encontró la información del aprendiz.</p>
            @endif

        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('aprendices.index') }}" class="btn btn-secondary">Volver a la lista</a>
        <a href="{{ route('aprendices.edit', $aprendiz->nis) }}" class="btn btn-warning">Editar</a>
    </div>

</div>

</body>
</html>