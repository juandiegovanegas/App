@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Archivo</h1>
    <p><strong>ID:</strong> {{ $archivo->nis }}</p>
    <p><strong>Nombre Original:</strong> {{ $archivo->nombre_original }}</p>
    <p><strong>Ruta:</strong> {{ $archivo->ruta }}</p>
    <p><strong>Tipo MIME:</strong> {{ $archivo->mime_type }}</p>
    <p><strong>Tamaño:</strong> {{ $archivo->size }} bytes</p>
    <a href="{{ Storage::url($archivo->ruta) }}" target="_blank" class="btn btn-primary">Ver/Descargar</a>
    <a href="{{ route('archivos.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection