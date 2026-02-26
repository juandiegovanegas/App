<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Detalle del Instructor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0">Detalle del Instructor</h4>
            </div>

            <div class="card-body">

                @if (isset($instructor))
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <strong>NIS:</strong> {{ $instructor->nis }}
                        </div>
                        <div class="col-md-6">
                            <strong>Tipo Documento:</strong>
                            {{ $instructor->tipoDocumento->denominacion ?? 'N/A' }}
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <strong>Número Documento:</strong> {{ $instructor->numdoc }}
                        </div>
                        <div class="col-md-6">
                            <strong>Nombres:</strong> {{ $instructor->nombres }}
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <strong>Apellidos:</strong> {{ $instructor->apellidos }}
                        </div>
                        <div class="col-md-6">
                            <strong>Dirección:</strong> {{ $instructor->direccion ?? 'N/A' }}
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <strong>Teléfono:</strong> {{ $instructor->telefono ?? 'N/A' }}
                        </div>
                        <div class="col-md-6">
                            <strong>Correo Institucional:</strong> {{ $instructor->correoinstitucional ?? 'N/A' }}
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <strong>Correo Personal:</strong> {{ $instructor->correopersonal ?? 'N/A' }}
                        </div>
                        <div class="col-md-6">
                            <strong>Sexo:</strong>
                            {{ $instructor->sexo == 'M' ? 'Masculino' : ($instructor->sexo == 'F' ? 'Femenino' : 'N/A') }}
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <strong>Fecha Nacimiento:</strong>
                            {{ $instructor->fechanac ? \Carbon\Carbon::parse($instructor->fechanac)->format('d/m/Y') : 'N/A' }}
                        </div>
                        <div class="col-md-6">
                            <strong>EPS:</strong>
                            {{ $instructor->eps->denominacion ?? 'N/A' }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <strong>Rol Administrativo:</strong>
                            {{ $instructor->rolAdministrativo->descripcion ?? 'N/A' }}
                        </div>
                    </div>
                @else
                    <p>No se encontró la información del instructor.</p>
                @endif

            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('instructores.index') }}" class="btn btn-secondary">Volver</a>
            <a href="{{ route('instructores.edit', $instructor->nis) }}" class="btn btn-warning">Editar</a>
        </div>

    </div>

</body>

</html>
