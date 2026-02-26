<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Instructor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow">
            <div class="card-header bg-warning text-white">
                <h4 class="mb-0">Editar Instructor</h4>
            </div>

            <div class="card-body">

                <form action="{{ route('instructores.update', $instructor->nis) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tipo Documento</label>
                            <select name="tbltiposdocumentos_nis" class="form-select" required>
                                <option value="">Seleccione...</option>
                                @foreach ($tiposdocumentos as $tipo)
                                    <option value="{{ $tipo->nis }}"
                                        {{ $instructor->tbltiposdocumentos_nis == $tipo->nis ? 'selected' : '' }}>
                                        {{ $tipo->denominacion }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Número Documento</label>
                            <input type="text" name="numdoc" class="form-control" value="{{ $instructor->numdoc }}"
                                required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nombres</label>
                            <input type="text" name="nombres" class="form-control" value="{{ $instructor->nombres }}"
                                required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control"
                                value="{{ $instructor->apellidos }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Dirección</label>
                            <input type="text" name="direccion" class="form-control"
                                value="{{ $instructor->direccion }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="text" name="telefono" class="form-control"
                                value="{{ $instructor->telefono }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Correo Institucional</label>
                            <input type="email" name="correoinstitucional" class="form-control"
                                value="{{ $instructor->correoinstitucional }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Correo Personal</label>
                            <input type="email" name="correopersonal" class="form-control"
                                value="{{ $instructor->correopersonal }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Sexo</label>
                            <select name="sexo" class="form-select">
                                <option value="sexo">Seleccione...</option>
                                <option value="1" {{ $instructor->sexo == '1' ? 'selected' : '' }}>Masculino
                                </option>
                                <option value="0" {{ $instructor->sexo == '0' ? 'selected' : '' }}>Femenino
                                </option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fecha Nacimiento</label>
                            <input type="date" name="fechanac" class="form-control"
                                value="{{ $instructor->fechanac }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">EPS</label>
                            <select name="tbleps_nis" class="form-select">
                                <option value="">Seleccione...</option>
                                @foreach ($eps as $ep)
                                    <option value="{{ $ep->nis }}"
                                        {{ $instructor->tbleps_nis == $ep->nis ? 'selected' : '' }}>
                                        {{ $ep->denominacion }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Rol Administrativo</label>
                            <select name="tblrolesadministrativos_nis" class="form-select">
                                <option value="">Seleccione...</option>
                                @foreach ($rolesadministrativos as $rol)
                                    <option value="{{ $rol->nis }}"
                                        {{ $instructor->tblrolesadministrativos_nis == $rol->nis ? 'selected' : '' }}>
                                        {{ $rol->descripcion }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">
                            Actualizar
                        </button>

                        <a href="{{ route('instructores.index') }}" class="btn btn-secondary">
                            Cancelar
                        </a>
                    </div>

                </form>

            </div>
        </div>

    </div>

</body>

</html>
