<?php

namespace App\Http\Controllers;

use App\Models\Instructores;
use App\Models\RolesAdministrativos;
use App\Models\TiposDocumentos;
use App\Models\Eps;
use Illuminate\Http\Request;

class InstructoresController extends Controller
{
    public function index()
    {
        $instructores = Instructores::with([
            'tipoDocumento',
            'eps',
            'rolAdministrativo'
        ])->get();

        $tiposdocumentos = TiposDocumentos::all();
        $eps = Eps::all();
        $rolesadministrativos = RolesAdministrativos::all();

        return view(
            'instructores.index',
            compact('instructores', 'tiposdocumentos', 'eps', 'rolesadministrativos')
        );
    }

    public function create()
    {
        $tiposdocumentos = TiposDocumentos::all();
        $eps = Eps::all();
        $rolesadministrativos = RolesAdministrativos::all();

        return view(
            'instructores.create',
            compact('tiposdocumentos', 'eps', 'rolesadministrativos')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'numdoc' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'direccion' => 'nullable',
            'telefono' => 'nullable',
            'correoinstitucional' => 'nullable|email',
            'correopersonal' => 'nullable|email',
            'sexo' => 'required|int:0,1',
            'fechanac' => 'nullable|date',
            'tbltiposdocumentos_nis' => 'required',
            'tbleps_nis' => 'required',
            'tblrolesadministrativos_nis' => 'required'
        ]);

        Instructores::create($request->all());

        return redirect()->route('instructores.index')
            ->with('success', 'Instructor creado correctamente');
    }

    public function show(string $nis)
    {
        $instructor = Instructores::with([
            'tipoDocumento',
            'eps',
            'rolAdministrativo'
        ])->findOrFail($nis);

        return view('instructores.show', compact('instructor'));
    }

    public function edit(string $nis)
    {
        $instructor = Instructores::findOrFail($nis);
        $tiposdocumentos = TiposDocumentos::all();
        $eps = Eps::all();
        $rolesadministrativos = RolesAdministrativos::all();

        return view(
            'instructores.edit',
            compact('instructor', 'tiposdocumentos', 'eps', 'rolesadministrativos')
        );
    }

    public function update(Request $request, string $nis)
    {
        $request->validate([
            'numdoc' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'sexo' => 'required|in:1,2'
        ]);

        $instructor = Instructores::findOrFail($nis);
        $instructor->update($request->all());

        return redirect()->route('instructores.index')
            ->with('success', 'Instructor actualizado correctamente');
    }

    public function destroy(string $nis)
    {
        $instructor = Instructores::findOrFail($nis);
        $instructor->delete();

        return redirect()->route('instructores.index')
            ->with('success', 'Instructor eliminado correctamente');
    }
}
