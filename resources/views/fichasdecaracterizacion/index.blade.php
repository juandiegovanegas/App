<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Fichas de Caracterización</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Lista de Fichas de Caracterización</h4>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped align-middle">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>NIS</th>
                                <th>Código</th>
                                <th>Denominación</th>
                                <th>Cupo</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Observaciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($fichasdecaracterizacion as $fichascaracterizacion)
                                <tr>
                                    <td class="text-center">{{ $fichascaracterizacion->nis }}</td>
                                    <td>{{ $fichascaracterizacion->codigo }}</td>
                                    <td>{{ $fichascaracterizacion->denominacion }}</td>
                                    <td class="text-center">{{ $fichascaracterizacion->cupo }}</td>
                                    <td>{{ $fichascaracterizacion->fechainicio }}</td>
                                    <td>{{ $fichascaracterizacion->fechafin }}</td>
                                    <td>{{ $fichascaracterizacion->observaciones }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">
                                        No hay registros
                                    </td>
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
                <h4 class="mb-0">Registrar Nueva Ficha de Caracterización</h4>
            </div>

            <div class="card-body">

                <form action="{{ route('fichasdecaracterizacion.store') }}" method="POST">
                    @csrf

                    <div class="row">



                        <div class="col-md-3 mb-3">
                            <label class="form-label">Código</label>
                            <input type="text" name="codigo" class="form-control" required>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Denominación</label>
                            <input type="text" name="denominacion" class="form-control" required>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Cupo</label>
                            <input type="text" name="cupo" class="form-control">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">fecha inicio</label>
                            <input type="date" name="fechainicio" class="form-control">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">fecha fin</label>
                            <input type="date" name="fechafin" class="form-control">
                        </div>


                        <div class="col-md-3 mb-3">
                            <label class="form-label">observaciones</label>
                            <input type="text" name="observaciones" class="form-control">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Centro de Formación</label>
                            <select name="tblcentrosdeformacion_nis" class="form-select" required>
                                <option value="">Seleccione...</option>
                                @foreach ($centrosdeformacion as $centrosdeformacion)
                                    <option value="{{ $centrosdeformacion->nis }}">
                                        {{ $centrosdeformacion->codigo }} - {{ $centrosdeformacion->denominacion }}

                                        
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Nis
                                <select name="tblprogramasdeformacion_nis" class="form-select" required>
                                    <option value="">Seleccione...</option>
                                    @foreach ($programasdeformacion as $programa)
                                        <option value="{{ $programa->nis }}">{{ $programa->denominacion }}</option>
                                    @endforeach
                                </select>
                            </label>    
                            <input type="text" name="observaciones" class="form-control">
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-success">
                                Guardar ficha
                            </button>
                        </div>

                </form>

            </div>
        </div>

    </div>

</body>

</html>