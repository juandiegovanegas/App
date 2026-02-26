<?php

namespace App\Http\Controllers;

use App\Models\regionales;
use Illuminate\Http\Request;

class RegionalesController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regionales = regionales::all();
        return view('regionales.index', compact('regionales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('regionales.create');
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

        regionales::create($request->all());

    return redirect()->route('regionales.index')
        ->with('success', 'Regional registrada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nis)
    {
         $regional = regionales::findOrFail($nis);
    return view('regionales.show', compact('regional'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nis)
    {
         $regional = regionales::findOrFail($nis);
    return view('regionales.edit', compact('regional'));
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

    $regional = regionales::findOrFail($nis);
    $regional->update($request->all());

    return redirect()->route('regionales.index')
        ->with('success', 'Regional actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    $regional = regionales::findOrFail($id);
    $regional->delete();

    return redirect()->route('regionales.index')
        ->with('success', 'Regional eliminada correctamente');

    }
}
