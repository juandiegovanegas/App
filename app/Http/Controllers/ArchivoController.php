<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archivo;

class ArchivoController extends Controller
{


    public function index()
    {
        $archivos = \App\Models\Archivo::all();
        return view('archivos.index', compact('archivos'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'archivo' => 'required|file|max:10240'
        ]);

        $archivo = $request->file('archivo');

        $nombre = time() . '_' . $archivo->getClientOriginalName();

        $ruta = $archivo->storeAs('public/archivos', $nombre);

        Archivo::create([
            'nombre_original' => $archivo->getClientOriginalName(),
            'ruta' => $ruta,
            'mime_type' => $archivo->getMimeType(),
            'size' => $archivo->getSize()
        ]);

        return back()->with('success', 'Archivo subido correctamente');
    }
}
