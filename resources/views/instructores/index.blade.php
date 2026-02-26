<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Instructores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <!-- TABLA -->
        <div class="card shadow mb-4">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0">Lista de Instructores</h4>
            </div>

            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>Nis</th>
                                <th>Tipo Doc</th>
                                <th>Número Documento</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Correo Institucional</th>
                                <th>Correo Personal</th>
                                <th>Sexo</th>
                                <th>Fecha Nacimiento</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($instructores as $instructor)
                                <tr>
                                    <td>{{ $instructor->nis }}</td>
                                    <td>{{ $instructor->tipoDocumento ? $instructor->tipoDocumento->nis: 'N/A' }}</td>
                                    <td>{{ $instructor->numdoc }}</td>
                                    <td>{{ $instructor->nombres }}</td>
                                    <td>{{ $instructor->apellidos }}</td>
                                    <td>{{ $instructor->direccion }}</td>
                                    <td>{{ $instructor->telefono }}</td>
                                    <td>{{ $instructor->correoinstitucional }}</td>
                                    <td>{{ $instructor->correopersonal }}</td>
                                    <td>{{ $instructor->sexo }}</td>
                                    <td>{{ $instructor->fechanac }}</td>
                                    <td>
                                        <a href="{{ route('instructores.edit', $instructor->nis) }}"
                                            class="btn btn-warning btn-sm">Editar</a>

                                        <form action="{{ route('instructores.destroy', $instructor->nis) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('¿Seguro que quieres eliminar?')"
                                                class="btn btn-danger btn-sm">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="12">No hay registros</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>

            </div>
        </div>


        <!-- FORMULARIO -->
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Registrar Instructor</h4>
            </div>

            <div class="card-body">

                <form action="{{ route('instructores.store') }}" method="POST">
                    @csrf

                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <label>Número Documento</label>
                            <input type="text" name="numdoc" class="form-control" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Nombres</label>
                            <input type="text" name="nombres" class="form-control" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Apellidos</label>
                            <input type="text" name="apellidos" class="form-control" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Dirección</label>
                            <input type="text" name="direccion" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Teléfono</label>
                            <input type="text" name="telefono" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Correo Institucional</label>
                            <input type="email" name="correoinstitucional" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Correo Personal</label>
                            <input type="email" name="correopersonal" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Sexo</label>
                            <select name="sexo" class="form-select" required>
                                <option value="sexo">Seleccione</option>
                                <option value="1">Masculino</option>
                                <option value="0">Femenino</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Fecha Nacimiento</label>
                            <input type="date" name="fechanac" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Tipo de Documento</label>
                            <select name="tbltiposdocumentos_nis" class="form-select" required>
                                <option value="">Seleccione</option>
                                @foreach ($tiposdocumentos as $doc)
                                    <option value="{{ $doc->nis }}">
                                        {{ $doc->denominacion }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>EPS</label>
                            <select name="tbleps_nis" class="form-select" required>
                                <option value="">Seleccione</option>
                                @foreach ($eps as $ep)
                                    <option value="{{ $ep->nis }}">
                                        {{ $ep->denominacion }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Rol Administrativo</label>
                            <select name="tblrolesadministrativos_nis" class="form-select" required>
                                <option value="">Seleccione</option>
                                @foreach ($rolesadministrativos as $rol)
                                    <option value="{{ $rol->nis }}">
                                        {{ $rol->descripcion }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">
                            Guardar Instructor
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</body>

</html>
