<?php

namespace App\Http\Controllers;

use App\Models\programasdeformacion;
use Illuminate\Http\Request;

class ProgramasdeformacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programasdeformacion = programasdeformacion::all();
        return view('programasdeformacion.index', compact('programasdeformacion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('programasdeformacion.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'codigo' => 'required|integer',
        'denominacion' => 'required'
    ]);

        programasdeformacion::create($request->all());

    return redirect()->route('programasdeformacion.index')
        ->with('success', 'Programa de formación registrado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nis)
    {
         $programadeformacion = programasdeformacion::where('nis', $nis)->firstOrFail();

    return view('programasdeformacion.show', compact('programadeformacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nis)
    {
         $programadeformacion = programasdeformacion::findOrFail($nis);
    return view('programasdeformacion.edit', compact('programadeformacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
                 $request->validate([
        'codigo' => 'required',
        'denominacion' => 'required',
    ]);

    $programadeformacion = programasdeformacion::findOrFail($id);
    $programadeformacion->update($request->all());

    return redirect()->route('programasdeformacion.index')
        ->with('success', 'Programa de formación actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $programadeformacion = programasdeformacion::findOrFail($id);
    $programadeformacion->delete();

    return redirect()->route('programasdeformacion.index')
        ->with('success', 'Programa de formación eliminado correctamente');
    }
}
