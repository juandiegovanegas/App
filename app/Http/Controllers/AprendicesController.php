<?php

namespace App\Http\Controllers;

use App\Models\Aprendices;
use App\Models\TiposDocumentos;
use App\Models\Eps;
use App\Models\FichasDeCaracterizacion;
use Illuminate\Http\Request;

class AprendicesController extends Controller
{
    /**
     * Mostrar listado
     */
    public function index()
    {
        $aprendices = Aprendices::with(['tipoDocumento', 'eps', 'ficha'])->get();
        $tiposdocumentos = TiposDocumentos::all();
        $eps = Eps::all();
        $fichas = FichasDeCaracterizacion::all();
        return view('aprendices.index', compact('aprendices', 'tiposdocumentos', 'eps', 'fichas'));
    }

    /**
     * Mostrar formulario crear
     */
    public function create()
    {
        $tiposdocumentos = TiposDocumentos::all();
        $eps = Eps::all();
        $fichas = FichasDeCaracterizacion::all();

        return view('aprendices.create', compact('tiposdocumentos', 'eps', 'fichas'));
    }

    /**
     * Guardar nuevo aprendiz
     */
    public function store(Request $request)
    {
        $request->validate([
            'numdoc' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'correoinstitucional' => 'required',
            'correopersonal' => 'required',
            'sexo' => 'required',
            'fechanac' => 'required|date',
            'tbltiposdocumentos_nis' => 'required',
            'tbleps_nis' => 'required',
            'tblfichasdecaracterizacion_nis' => 'required'
        ]);

        Aprendices::create($request->all());

        return redirect()->route('aprendices.index')
            ->with('success', 'Aprendiz creado correctamente');
    }

    /**
     * Mostrar detalle
     */
    public function show($nis)
    {
        $aprendiz = Aprendices::with(['tipoDocumento', 'eps', 'ficha'])
            ->findOrFail($nis);

        return view('aprendices.show', compact('aprendiz'));
    }

    /**
     * Mostrar formulario editar
     */
    public function edit($nis)
    {
        $aprendiz = Aprendices::findOrFail($nis);
        $tiposdocumentos = TiposDocumentos::all();
        $eps = Eps::all();
        $fichas = FichasDeCaracterizacion::all();

        return view('aprendices.edit', compact('aprendiz', 'tiposdocumentos', 'eps', 'fichas'));
    }

    /**
     * Actualizar aprendiz
     */
    public function update(Request $request, $nis)
    {
        $request->validate([
            'tbltiposdocumentos_nis' => 'required|exists:tbltiposdocumentos,nis',
            'numdoc' => 'required|string|max:255',
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:255',
            'correoinstitucional' => 'nullable|email|max:255',
            'correopersonal' => 'nullable|email|max:255',
            'sexo' => 'nullable|in:M,F',
            'fechanac' => 'nullable|date',
            'tbleps_nis' => 'nullable|exists:tbleps,nis',
            'tblfichasdecaracterizacion_nis' => 'nullable|exists:tblfichasdecaracterizacion,nis',
        ]);

        $aprendiz = Aprendices::findOrFail($nis);

        $aprendiz->update($request->all());

        return redirect()->route('aprendices.index')
            ->with('success', 'Aprendiz actualizado correctamente');
    }

    /**
     * Eliminar aprendiz
     */
    public function destroy($nis)
    {
        $aprendiz = Aprendices::findOrFail($nis);
        $aprendiz->delete();

        return redirect()->route('aprendices.index')
            ->with('success', 'Aprendiz eliminado correctamente');
    }
}
