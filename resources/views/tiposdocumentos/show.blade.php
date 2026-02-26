<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Registro Tipo de Documento</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container">
    {{-- Usamos el objeto individual $regionales --}}
    @if(isset($tiposdocumentos))
        <p><strong>NIS:</strong> {{ $tiposdocumentos->nis }}</p>
        <p><strong>Denominación:</strong> {{ $tiposdocumentos->denominacion }}</p>
        <p><strong>Observaciones:</strong> {{ $tiposdocumentos->observaciones ?? 'Sin observaciones' }}</p>
       
    @else
        <p>No se encontró la información del registro.</p>
    @endif
</div>

<hr>
<a href="{{ route('tiposdocumentos.index') }}" class="btn btn-secondary">Volver a la lista</a>