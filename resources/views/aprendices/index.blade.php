<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Aprendices</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        {{-- MENSAJE SUCCESS --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- ERRORES DE VALIDACIÓN --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- TABLA DE APRENDICES --}}
        <div class="card shadow mb-4">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0">Lista de Aprendices</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>NIS</th>
                                <th>Tipo Doc</th>
                                <th>Número Doc</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Correo Institucional</th>
                                <th>Correo Personal</th>
                                <th>Sexo</th>
                                <th>Fecha Nacimiento</th>
                                <th>EPS</th>
                                <th>Ficha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($aprendices as $aprendiz)
                                <tr>
                                    <td>{{ $aprendiz->nis }}</td>
                                    <td>{{ $aprendiz->tipoDocumento ? $aprendiz->tipoDocumento->denominacion : 'N/A' }}
                                    </td>
                                    <td>{{ $aprendiz->numdoc }}</td>
                                    <td>{{ $aprendiz->nombres }}</td>
                                    <td>{{ $aprendiz->apellidos }}</td>
                                    <td>{{ $aprendiz->direccion }}</td>
                                    <td>{{ $aprendiz->telefono }}</td>
                                    <td>{{ $aprendiz->correoinstitucional }}</td>
                                    <td>{{ $aprendiz->correopersonal }}</td>
                                    <td>{{ $aprendiz->sexo }}</td>
                                    <td>{{ $aprendiz->fechanac }}</td>
                                    <td>{{ $aprendiz->eps ? $aprendiz->eps->denominacion : 'N/A' }}</td>
                                    <td>
                                        {{ $aprendiz->ficha ? $aprendiz->ficha->codigo . ' - ' . $aprendiz->ficha->denominacion : 'N/A' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('aprendices.show', $aprendiz->nis) }}"
                                            class="btn btn-info btn-sm">Ver</a>

                                        <a href="{{ route('aprendices.edit', $aprendiz->nis) }}"
                                            class="btn btn-warning btn-sm">Editar</a>

                                        <form action="{{ route('aprendices.destroy', $aprendiz->nis) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('¿Estás seguro?')">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="14">No hay aprendices registrados.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- FORMULARIO CREAR APRENDIZ --}}
        <div class="card shadow mt-4">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Registrar Nuevo Aprendiz</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('aprendices.store') }}" method="POST">
                    @csrf


                    <div class="col-md-4 mb-3">
                        <label class="form-label">Tipo de Documento</label>
                        <select name="tbltiposdocumentos_nis" class="form-control" required>
                            <option value="">Seleccione</option>
                            @foreach ($tiposdocumentos as $tipo)
                                <option value="{{ $tipo->nis }}">
                                    {{ $tipo->denominacion }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Número de Documento</label>
                        <input type="text" name="numdoc" class="form-control" required>
                    </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nombres</label>
                    <input type="text" name="nombres" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Apellidos</label>
                    <input type="text" name="apellidos" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Dirección</label>
                    <input type="text" name="direccion" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="telefono" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Correo Institucional</label>
                    <input type="email" name="correoinstitucional" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Correo Personal</label>
                    <input type="email" name="correopersonal" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Sexo</label>
                    <select name="sexo" class="form-control" required>
                        <option value="sexo">Seleccione</option>
                        <option value="1">Masculino</option>
                        <option value="0">Femenino</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Fecha de Nacimiento</label>
                    <input type="date" name="fechanac" class="form-control" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">EPS</label>
                    <select name="tbleps_nis" class="form-control" required>
                        <option value="">Seleccione</option>
                        @foreach ($eps as $ep)
                            <option value="{{ $ep->nis }}">
                                {{ $ep->denominacion }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label">Ficha de Caracterización</label>
                    <select name="tblfichasdecaracterizacion_nis" class="form-control" required>
                        <option value="">Seleccione</option>
                        @foreach ($fichas as $ficha)
                            <option value="{{ $ficha->nis }}">
                                {{ $ficha->codigo }} - {{ $ficha->denominacion }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-success">
                    Guardar Aprendiz
                </button>
            </div>

            </form>
        </div>
    </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
