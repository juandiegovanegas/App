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
    {{-- Usamos el objeto individual $rolesadministrativos --}}
    @if(isset($rolesadministrativos))
        <p><strong>NIS:</strong> {{ $rolesadministrativos->nis }}</p>
        <p><strong>descripcion:</strong> {{ $rolesadministrativos->descripcion }}</p>
       
    @else
        <p>No se encontró la información del registro.</p>
    @endif
</div>

<hr>
<a href="{{ route('rolesadministrativos.index') }}" class="btn btn-secondary">Volver a la lista</a>