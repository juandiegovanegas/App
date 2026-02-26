<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Programas de Formación</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow mb-4">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0">Lista de Programas de Formación</h4>
            </div>

            <div class="card-body">

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>NIS</th>
                                <th>Código</th>
                                <th>Denominación</th>
                                <th>Observaciones</th>
                                <th>Acciones</th>
                                <th>Eliminar</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($programasdeformacion as $programadeformacion)
                            <tr>
                                <td>{{ $programadeformacion->nis }}</td>
                                <td>{{ $programadeformacion->codigo }}</td>
                                <td>{{ $programadeformacion->denominacion }}</td>
                                <td>{{ $programadeformacion->observaciones }}</td>
                                <td><a href="{{ route('programasdeformacion.show', $programadeformacion->nis) }}" class="btn btn-info">
                                      Ver detalle</td>
                                <td>
                                    <form action="{{ route('programasdeformacion.destroy', $programadeformacion ->nis) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar este programa de formación?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background:red; color:white; border:none; padding:5px 10px; border-radius:4px;">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                                <td><a href="{{ route('programasdeformacion.edit', $programadeformacion->nis) }}" class="btn btn-warning btn-sm">Editar</a></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">No hay registros</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>


        <!-- FORMULARIO ABAJO -->
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Registrar Nuevo Programa de Formación</h4>
            </div>

            <div class="card-body">

                <form action="{{ route('programasdeformacion.store') }}" method="POST">
                    @csrf

                    <div class="row">



                        <div class="col-md-3 mb-3">
                            <label class="form-label">Código</label>
                            <input type="text" name="codigo" class="form-control" required>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Denominación</label>
                            <input type="text" name="denominacion" class="form-control" required>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Observaciones</label>
                            <input type="text" name="observaciones" class="form-control">
                        </div>

                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">
                            Guardar Programa de Formación
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</body>

</html>