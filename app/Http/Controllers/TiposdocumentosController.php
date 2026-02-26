<?php

namespace App\Http\Controllers;

use App\Models\tiposdocumentos;
use Illuminate\Http\Request;

class TiposdocumentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiposdocumentos = tiposdocumentos::all();
        return view('tiposdocumentos.index', compact('tiposdocumentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tiposdocumentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
        'nis' => 'required|integer',
        'denominacion' => 'required'
    ]);

        tiposdocumentos::create($request->all());

    return redirect()->route('tiposdocumentos.index')
        ->with('success', 'Tipos de documentos registrados correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nis)
    {
         $tiposdocumentos = tiposdocumentos::where('nis', $nis)->firstOrFail();

    return view('tiposdocumentos.show', compact('tiposdocumentos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nis)
    {
           $tiposdocumentos = tiposdocumentos::findOrFail($nis);
    return view('tiposdocumentos.edit', compact('tiposdocumentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nis)
    {
         $request->validate([
        'nis' => 'required|integer',
        'denominacion' => 'required',
        'observaciones' => 'nullable|string'
    ]);

        $tiposdocumentos = tiposdocumentos::findOrFail($nis);
        $tiposdocumentos->update($request->all());

        return redirect()->route('tiposdocumentos.index')
            ->with('success', 'Tipos de documentos actualizados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tiposdocumentos = tiposdocumentos::findOrFail($id);
        $tiposdocumentos->delete();

        return redirect()->route('tiposdocumentos.index')
            ->with('success', 'Tipos de documentos eliminados correctamente');
    }
}
