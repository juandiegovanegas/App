<?php

namespace App\Http\Controllers;

use App\Models\entecoformadores;
use Illuminate\Http\Request;

class EntecoformadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entecoformadores = entecoformadores::all();
        return view('entecoformadores.index', compact('entecoformadores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('entecoformadores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
        'tdoc' => 'required',
        'numdoc' => 'required',
        'razonsocial' => 'required'
    ]);

        entecoformadores::create($request->all());

    return redirect()->route('entecoformadores.index')
        ->with('success', 'Ente Coformador registrado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nis)
    {
        $entecoformadores = entecoformadores::where('nis', $nis)->firstOrFail();

    return view('entecoformadores.show', compact('entecoformadores'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nis)
    {
                 $entecoformadores = entecoformadores::findOrFail($nis);
    return view('entecoformadores.edit', compact('entecoformadores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
        'tdoc' => 'required',
        'numdoc' => 'required',
        'razonsocial' => 'required'
    ]);

        $entecoformadores = entecoformadores::findOrFail($id);
        $entecoformadores->update($request->all());

        return redirect()->route('entecoformadores.index')
            ->with('success', 'Ente Coformador actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $entecoformadores = entecoformadores::findOrFail($id);
    $entecoformadores->delete();

    return redirect()->route('entecoformadores.index')
        ->with('success', 'Ente Coformador eliminado correctamente');
    }
}
