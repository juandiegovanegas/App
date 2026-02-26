<?php

namespace App\Http\Controllers;

use App\Models\centrosdeformacion;
use App\Models\programasdeformacion;
use App\Models\fichasdecaracterizacion;
use Illuminate\Http\Request;

class FichasdecaracterizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $fichasdecaracterizacion = FichasDeCaracterizacion::all();
    $centrosdeformacion = CentrosDeFormacion::all();
    $programasdeformacion = ProgramasDeFormacion::all();

    return view('fichasdecaracterizacion.index',
        compact(
            'fichasdecaracterizacion',
            'centrosdeformacion',
            'programasdeformacion'
        )
    );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $centrosdeformacion = centrosdeformacion::all();
        $programasdeformacion = programasdeformacion::all();

         return view('fichasdecaracterizacion.index', compact('centrosdeformacion', 'programasdeformacion'));

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

        fichasdecaracterizacion::create($request->all());

    return redirect()->route('fichasdecaracterizacion.index')
        ->with('success', 'Ficha de caracterización registrada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nis)
    {
         $fichasdecaracterizacion = fichasdecaracterizacion::where('nis', $nis)->firstOrFail();

    return view('fichasdecaracterizacion.show', compact('fichasdecaracterizacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nis)
    {
         $fichasdecaracterizacion = fichasdecaracterizacion::findOrFail($nis);
    return view('fichasdecaracterizacion.edit', compact('fichasdecaracterizacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nis)
    {
                 $request->validate([
        'codigo' => 'required',
        'denominacion' => 'required',
    ]);

    $fichasdecaracterizacion = fichasdecaracterizacion::findOrFail($nis);
    $fichasdecaracterizacion->update($request->all());

    return redirect()->route('fichasdecaracterizacion.index')
        ->with('success', 'Ficha de caracterización actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nis)
    {
         $fichasdecaracterizacion = fichasdecaracterizacion::findOrFail($nis);
    $fichasdecaracterizacion->delete();

    return redirect()->route('fichasdecaracterizacion.index')
        ->with('success', 'Ficha de caracterización eliminada correctamente');
    }
}
