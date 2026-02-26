<?php

namespace App\Http\Controllers;

use App\Models\centrosdeformacion;
use Illuminate\Http\Request;

class CentrosdeformacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $centrosdeformacion = centrosdeformacion::all();
        return view('centrosdeformacion.index', compact('centrosdeformacion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('centrosdeformacion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'codigo' => 'required',
        'denominacion' => 'required',
        'observaciones' => 'nullable'
    ]);

    CentrosDeFormacion::create([
        'codigo' => $request->codigo,
    'denominacion' => $request->denominacion,
    'direccion' => $request->direccion
    ]);

    return redirect()->route('centrosdeformacion.index')
        ->with('success', 'Centro creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nis)
    {
         $centrosdeformacion = centrosdeformacion::where('nis', $nis)->firstOrFail();

    return view('centrosdeformacion.show', compact('centrosdeformacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nis)
    {
         $centrosdeformacion = centrosdeformacion::findOrFail($nis);
    return view('centrosdeformacion.edit', compact('centrosdeformacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nis)
    {
         $request->validate([
        'codigo' => 'required|string',
        'denominacion' => 'required',
        'direccion' => 'required|string',
        'observaciones' => 'nullable|string'
    ]);

        $centrosdeformacion = centrosdeformacion::findOrFail($nis);
        $centrosdeformacion->update($request->all());

        return redirect()->route('centrosdeformacion.index')
            ->with('success', 'Centro de Formación actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nis)
    {
           $centrosdeformacion = centrosdeformacion::findOrFail($nis);
    $centrosdeformacion->delete();

    return redirect()->route('centrosdeformacion.index')
        ->with('success', 'Centro de Formación eliminado correctamente');
    }
}
