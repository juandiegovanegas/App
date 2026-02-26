<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Entes Coformadores</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow mb-4">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0">Lista de Entes Coformadores</h4>
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
                                <th>Tdoc</th>
                                <th>Numdoc</th>
                                <th>Razonsocial</th>
                                <th>Direccion</th>
                                <th>Telefono</th>
                                <th>Correoinstitucional</th>
                                <th>Acciones</th>
                                <th>Eliminar</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($entecoformadores as $entecoformadores)
                            <tr>
                                <td>{{ $entecoformadores->nis }}</td>
                                <td>{{ $entecoformadores->tdoc }}</td>
                                <td>{{ $entecoformadores->numdoc }}</td>
                                <td>{{ $entecoformadores->razonsocial }}</td>
                                <td>{{ $entecoformadores->direccion }}</td>
                                <td>{{ $entecoformadores->telefono }}</td>
                                <td>{{ $entecoformadores->correoinstitucional }}</td>
                                <td><a href="{{ route('entecoformadores.show', $entecoformadores->nis) }}" class="btn btn-info">
                                      Ver detalle</td>
                                <td>
                                    <form action="{{ route('entecoformadores.destroy', $entecoformadores->nis) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar este Ente Coformador?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background:red; color:white; border:none; padding:5px 10px; border-radius:4px;">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                                <td><a href="{{ route('entecoformadores.edit', $entecoformadores->nis) }}" class="btn btn-warning btn-sm">Editar</a></td>
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
                <h4 class="mb-0">Registrar Nuevo Ente Coformador</h4>
            </div>

            <div class="card-body">

                <form action="{{ route('entecoformadores.store') }}" method="POST">
                    @csrf

                    <div class="row">

                

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Tipo de documento</label>
                            <input type="text" name="tdoc" class="form-control" required>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Número de documento</label>
                            <input type="text" name="numdoc" class="form-control" required>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Razón Social</label>
                            <input type="text" name="razonsocial" class="form-control" required>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Dirección</label>
                            <input type="text" name="direccion" class="form-control">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="text" name="telefono" class="form-control">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Correo Institucional</label>
                            <input type="email" name="correoinstitucional" class="form-control">
                        </div>

                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">
                            Guardar Ente Coformador
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</body>

</html>