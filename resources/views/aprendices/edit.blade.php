
<!DOCTYPE html>
<html>
<head>
    <title>Editar Aprendiz</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-header bg-warning text-white">
            <h4>Editar Aprendiz</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('aprendices.update', $aprendiz->nis) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Tipo Documento</label>
                    <select name="tbltiposdocumentos_nis" class="form-control" required>
                        <option value="">Seleccione...</option>
                        @foreach($tiposdocumentos as $tipo)
                            <option value="{{ $tipo->nis }}" {{ $aprendiz->tbltiposdocumentos_nis == $tipo->nis ? 'selected' : '' }}>
                                {{ $tipo->denominacion }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Número Documento</label>
                    <input type="text" name="numdoc" class="form-control"
                           value="{{ $aprendiz->numdoc }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nombres</label>
                    <input type="text" name="nombres" class="form-control"
                           value="{{ $aprendiz->nombres }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Apellidos</label>
                    <input type="text" name="apellidos" class="form-control"
                           value="{{ $aprendiz->apellidos }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Dirección</label>
                    <input type="text" name="direccion" class="form-control"
                           value="{{ $aprendiz->direccion }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="telefono" class="form-control"
                           value="{{ $aprendiz->telefono }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Correo Institucional</label>
                    <input type="email" name="correoinstitucional" class="form-control"
                           value="{{ $aprendiz->correoinstitucional }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Correo Personal</label>
                    <input type="email" name="correopersonal" class="form-control"
                           value="{{ $aprendiz->correopersonal }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Sexo</label>
                    <select name="sexo" class="form-control">
                        <option value="">Seleccione...</option>
                        <option value="M" {{ $aprendiz->sexo == 'M' ? 'selected' : '' }}>Masculino</option>
                        <option value="F" {{ $aprendiz->sexo == 'F' ? 'selected' : '' }}>Femenino</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Fecha Nacimiento</label>
                    <input type="date" name="fechanac" class="form-control"
                           value="{{ $aprendiz->fechanac }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">EPS</label>
                    <select name="tbleps_nis" class="form-control">
                        <option value="">Seleccione...</option>
                        @foreach($eps as $ep)
                            <option value="{{ $ep->nis }}" {{ $aprendiz->tbleps_nis == $ep->nis ? 'selected' : '' }}>
                                {{ $ep->denominacion }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Ficha</label>
                    <select name="tblfichasdecaracterizacion_nis" class="form-control">
                        <option value="">Seleccione...</option>
                        @foreach($fichas as $ficha)
                            <option value="{{ $ficha->nis }}" {{ $aprendiz->tblfichasdecaracterizacion_nis == $ficha->nis ? 'selected' : '' }}>
                                {{ $ficha->codigo }} - {{ $ficha->denominacion }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">
                    Actualizar
                </button>

                <a href="{{ route('aprendices.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>

            </form>

        </div>
    </div>

</div>

</body>
</html>
