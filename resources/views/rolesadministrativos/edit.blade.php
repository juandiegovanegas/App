
<!DOCTYPE html>
<html>
<head>
    <title>Editar Tipo de Documento</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-header bg-warning text-white">
            <h4>Editar Rol Administrativo</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('rolesadministrativos.update', $rolesadministrativos->nis) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Código</label>
                    <input type="text" name="nis" class="form-control"
                           value="{{ $rolesadministrativos->nis }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <input type="text" name="descripcion" class="form-control"
                           value="{{ $rolesadministrativos->descripcion }}">
                </div>

                <button type="submit" class="btn btn-success">
                    Actualizar
                </button>

                <a href="{{ route('rolesadministrativos.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>

            </form>

        </div>
    </div>

</div>

</body>
</html>
