<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Roles Administrativos</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow mb-4">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0">Lista de Roles Administrativos</h4>
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
                                <th>Descripcion</th>
                                <th>Acciones</th>
                                <th>Eliminar</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($rolesadministrativos as $rol)
                            <tr>
                                <td>{{ $rol->nis }}</td>
                                <td>{{ $rol->descripcion }}</td>

                                <td>
                                    <a href="{{ route('rolesadministrativos.show', $rol->nis) }}"
                                        class="btn btn-info btn-sm">
                                        Ver detalle
                                    </a>
                                </td>

                                <td>
                                    <form action="{{ route('rolesadministrativos.destroy', $rol->nis) }}"
                                        method="POST"
                                        onsubmit="return confirm('¿Seguro que quieres eliminar este rol?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-danger btn-sm">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>

                                <td>
                                    <a href="{{ route('rolesadministrativos.edit', $rol->nis) }}"
                                        class="btn btn-warning btn-sm">
                                        Editar
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">No hay registros</td>
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
                <h4 class="mb-0">Registrar Nuevo Rol Administrativo</h4>
            </div>

            <div class="card-body">

                <form action="{{ route('rolesadministrativos.store') }}" method="POST">
                    @csrf

                    <div class="row">

                        <div class="col-md-3 mb-3">
                            <label class="form-label">descripcion</label>
                            <input type="text" name="descripcion" class="form-control" required>
                        </div>


                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">
                            Guardar roles administrativos
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</body>

</html>