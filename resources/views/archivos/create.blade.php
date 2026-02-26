@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Subir Archivo</h1>
    <form action="{{ route('archivos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="archivo">Seleccionar Archivo</label>
            <input type="file" class="form-control" name="archivo" id="archivo" required>
        </div>
        <button type="submit" class="btn btn-primary">Subir</button>
    </form>
</div>
@endsection