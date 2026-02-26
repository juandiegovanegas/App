<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Centros de Formación</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow mb-4">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0">Lista de EPS</h4>
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
                                <th>Codigo</th>
                                <th>Denominación</th>
                                <th>Dirección</th>
                                <th>Observaciones</th>
                                <th>Acciones</th>   
                                <th>Eliminar</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($centrosdeformacion as $centrosdeformacion)
                            <tr>
                                <td>{{ $centrosdeformacion->nis }}</td>
                                <td>{{ $centrosdeformacion->codigo }}</td>
                                <td>{{ $centrosdeformacion->denominacion }}</td>
                                <td>{{ $centrosdeformacion->direccion }}</td>
                                <td>{{ $centrosdeformacion->observaciones }}</td>
                                <td><a href="{{ route('centrosdeformacion.show', $centrosdeformacion->nis) }}" class="btn btn-info">
                                      Ver detalle</td>
                                <td>
                                    <form action="{{ route('centrosdeformacion.destroy', $centrosdeformacion ->nis) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar este centro de formación?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background:red; color:white; border:none; padding:5px 10px; border-radius:4px;">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                                <td><a href="{{ route('centrosdeformacion.edit', $centrosdeformacion->nis) }}" class="btn btn-warning btn-sm">Editar</a></td>
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
                <h4 class="mb-0">Registrar Nuevo Centro de Formación</h4>
            </div>

            <div class="card-body">

                <form action="{{ route('centrosdeformacion.store') }}" method="POST">
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
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Dirección</label>
                            <input type="text" name="direccion" class="form-control">
                        </div>

                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">
                            Guardar Centro de Formación
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</body>

</html>