<?php

namespace App\Http\Controllers;

use App\Models\eps;
use Illuminate\Http\Request;

class EpsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eps = eps::all();
        return view('eps.index', compact('eps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('eps.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
        'numdoc' => 'required|integer',
        'denominacion' => 'required'
    ]);

        eps::create($request->all());

    return redirect()->route('eps.index')
        ->with('success', 'EPS registrada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nis)
    {
        $eps = eps::where('nis', $nis)->firstOrFail();

    return view('eps.show', compact('eps'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nis)
    {
                 $eps = eps::findOrFail($nis);
    return view('eps.edit', compact('eps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
        'numdoc' => 'required|integer',
        'denominacion' => 'required',
        'observaciones' => 'nullable|string'
    ]);

        $eps = eps::findOrFail($id);
        $eps->update($request->all());

        return redirect()->route('eps.index')
            ->with('success', 'EPS actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $eps = eps::findOrFail($id);
    $eps->delete();

    return redirect()->route('eps.index')
        ->with('success', 'EPS eliminada correctamente');
    }
}
