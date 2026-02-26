<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel Principal</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            min-height: 100vh;
        }

        .card-hover:hover {
            transform: scale(1.05);
            transition: 0.3s ease-in-out;
        }
    </style>
</head>

<body>

    <div class="container py-5">

        <h1 class="text-center text-white mb-5 fw-bold">
            Panel Principal
        </h1>

        <div class="row g-4">

            <div class="col-md-4">
                <a href="{{ route('instructores.index') }}" class="text-decoration-none">
                    <div class="card shadow card-hover text-center p-4">
                        <h4 class="text-primary">👨‍🏫 Instructores</h4>
                        <p class="text-muted">Gestionar instructores</p>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('tiposdocumentos.index') }}" class="text-decoration-none">
                    <div class="card shadow card-hover text-center p-4">
                        <h4 class="text-success">📄 Tipo Documento</h4>
                        <p class="text-muted">Administrar tipos de documento</p>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('programasdeformacion.index') }}" class="text-decoration-none">
                    <div class="card shadow card-hover text-center p-4">
                        <h4 class="text-warning">📚 Programa de Formación</h4>
                        <p class="text-muted">Gestionar programas</p>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('regionales.index') }}" class="text-decoration-none">
                    <div class="card shadow card-hover text-center p-4">
                        <h4 class="text-danger">🌎 Regionales</h4>
                        <p class="text-muted">Administrar regionales</p>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('rolesadministrativos.index') }}" class="text-decoration-none">
                    <div class="card shadow card-hover text-center p-4">
                        <h4 class="text-dark">🔐 Roles Administrativos</h4>
                        <p class="text-muted">Gestionar roles</p>
                    </div>
                </a>
            </div>


            <div class="col-md-4">
                <a href="{{ route('aprendices.index') }}" class="text-decoration-none">
                    <div class="card shadow card-hover text-center p-4">
                        <h4 class="text-dark">👨‍🎓 Aprendices</h4>
                        <p class="text-muted">Gestionar aprendices</p>
                    </div>
                </a>
            </div>


            <div class="col-md-4">
                <a href="{{ route('centrosdeformacion.index') }}" class="text-decoration-none">
                    <div class="card shadow card-hover text-center p-4">
                        <h4 class="text-dark">🏢 Centros de Formación</h4>
                        <p class="text-muted">Gestionar centros de formación</p>
                    </div>
                </a>
            </div>


            <div class="col-md-4">
                <a href="{{ route('eps.index') }}" class="text-decoration-none">
                    <div class="card shadow card-hover text-center p-4">
                        <h4 class="text-dark">🏢 EPS</h4>
                        <p class="text-muted">Gestionar EPS</p>
                    </div>
                </a>
            </div>


             <div class="col-md-4">
                <a href="{{ route('fichasdecaracterizacion.index') }}" class="text-decoration-none">
                    <div class="card shadow card-hover text-center p-4">
                        <h4 class="text-dark">🏢 Ficha de caracterizacion</h4>
                        <p class="text-muted">Gestionar fichas de caracterización</p>
                    </div>
                </a>
            </div>


             <div class="col-md-4">
                <a href="{{ route('entecoformadores.index') }}" class="text-decoration-none">
                    <div class="card shadow card-hover text-center p-4">
                        <h4 class="text-dark">🏢 Ente coformadores</h4>
                        <p class="text-muted">Gestionar ente coformadores</p>
                    </div>
                </a>
            </div>


             <div class="col-md-4">
                <a href="{{ route('archivos.index') }}" class="text-decoration-none">
                    <div class="card shadow card-hover text-center p-4">
                        <h4 class="text-dark">🏢 Subir Archivo</h4>
                        <p class="text-muted">Subir archivos al sistema</p>
                    </div>
                </a>
            </div>

        </div>

    </div>

</body>

</html>