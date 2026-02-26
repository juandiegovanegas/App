<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Programa de Formación</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container">
    {{-- Usamos el objeto individual $regional --}}
    @if(isset($regional))
        <p><strong>NIS:</strong> {{ $regional->nis }}</p>
        <p><strong>Código:</strong> {{ $regional->codigo }}</p>
        <p><strong>Denominación:</strong> {{ $regional->denominacion }}</p>
        <p><strong>Observaciones:</strong> {{ $regional->observaciones ?? 'Sin observaciones' }}</p>
       
    @else
        <p>No se encontró la información del registro.</p>
    @endif
</div>

<hr>
<a href="{{ route('regionales.index') }}" class="btn btn-secondary">Volver a la lista</a>