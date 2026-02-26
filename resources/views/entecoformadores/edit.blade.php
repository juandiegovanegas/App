
<!DOCTYPE html>
<html>
<head>
    <title>Editar Ente Coformador</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-header bg-warning text-white">
            <h4>Editar Ente Coformador</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('entecoformadores.update', $entecoformadores->nis) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">NIS</label>
                    <input type="text" name="nis" class="form-control"
                           value="{{ $entecoformadores->nis }}" required disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tipo de Documento</label>
                    <input type="text" name="tdoc" class="form-control"
                           value="{{ $entecoformadores->tdoc }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Número de Documento</label>
                    <input type="text" name="numdoc" class="form-control"
                           value="{{ $entecoformadores->numdoc }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Razón Social</label>
                    <input type="text" name="razonsocial" class="form-control"
                           value="{{ $entecoformadores->razonsocial }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Dirección</label>
                    <input type="text" name="direccion" class="form-control"
                           value="{{ $entecoformadores->direccion }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="telefono" class="form-control"
                           value="{{ $entecoformadores->telefono }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Correo Institucional</label>
                    <input type="email" name="correoinstitucional" class="form-control"
                           value="{{ $entecoformadores->correoinstitucional }}">
                </div>

                <button type="submit" class="btn btn-success">
                    Actualizar
                </button>

                <a href="{{ route('entecoformadores.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>

            </form>

        </div>
    </div>

</div>

</body>
</html>
