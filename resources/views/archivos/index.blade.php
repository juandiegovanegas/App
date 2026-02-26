@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif



<hr>
<h5>Archivos Subidos</h5>

@foreach (\App\Models\Archivo::all() as $archivo)
    <div>
        {{ $archivo->nombre_original }}

        <a href="{{ asset(str_replace('public/', 'storage/', $archivo->ruta)) }}" target="_blank"
            class="btn btn-sm btn-info">
            Ver
        </a>
    </div>
@endforeach

<form action="{{ route('archivos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Seleccionar archivo</label>
        <input type="file" name="archivo" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">
        Subir archivo
    </button>
</form>
