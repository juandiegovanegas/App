<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de EPS</title>

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
                                <th>Numdoc</th>
                                <th>Denominación</th>
                                <th>Observaciones</th>
                                <th>Acciones</th>
                                <th>Eliminar</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($eps as $eps)
                            <tr>
                                <td>{{ $eps->nis }}</td>
                                <td>{{ $eps->numdoc }}</td>
                                <td>{{ $eps->denominacion }}</td>
                                <td>{{ $eps->observaciones }}</td>
                                <td><a href="{{ route('eps.show', $eps->nis) }}" class="btn btn-info">
                                      Ver detalle</td>
                                <td>
                                    <form action="{{ route('eps.destroy', $eps ->nis) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar esta EPS?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background:red; color:white; border:none; padding:5px 10px; border-radius:4px;">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                                <td><a href="{{ route('eps.edit', $eps->nis) }}" class="btn btn-warning btn-sm">Editar</a></td>
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
                <h4 class="mb-0">Registrar Nueva EPS</h4>
            </div>

            <div class="card-body">

                <form action="{{ route('eps.store') }}" method="POST">
                    @csrf

                    <div class="row">



                        <div class="col-md-3 mb-3">
                            <label class="form-label">Código</label>
                            <input type="text" name="numdoc" class="form-control" required>
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
                            Guardar EPS
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</body>

</html>