
<!DOCTYPE html>
<html>
<head>
    <title>Editar Programa de Formación</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-header bg-warning text-white">
            <h4>Editar Programa de Formación</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('programasdeformacion.update', $programadeformacion->nis) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Código</label>
                    <input type="text" name="codigo" class="form-control"
                           value="{{ $programadeformacion->codigo }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Denominación</label>
                    <input type="text" name="denominacion" class="form-control"
                           value="{{ $programadeformacion->denominacion }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Observaciones</label>
                    <input type="text" name="observaciones" class="form-control"
                           value="{{ $programadeformacion->observaciones }}">
                </div>

                <button type="submit" class="btn btn-success">
                    Actualizar
                </button>

                <a href="{{ route('programasdeformacion.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>

            </form>

        </div>
    </div>

</div>

</body>
</html>
