<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpecialistRequest;
use App\Http\Requests\UpdateSpecialistRequest;
use App\Models\Specialist;

class SpecialistController extends Controller
{
    public function index()
    {
        $specialists = Specialist::all();
        return view('specialists.index', compact('specialists'));
    }

    public function create()
    {
        return view('specialists.create');
    }

    public function store(StoreSpecialistRequest $request)
    {
        Specialist::create($request->validated());

        return redirect()->route('specialists.index')
            ->with('success', 'Especialista creada correctamente');
    }

    public function show(Specialist $specialist)
    {
        return view('specialists.show', compact('specialist'));
    }

    public function edit(Specialist $specialist)
    {
        return view('specialists.edit', compact('specialist'));
    }

    public function update(UpdateSpecialistRequest $request, Specialist $specialist)
    {
        $specialist->update($request->validated());

        return redirect()->route('specialists.index')
            ->with('success', 'Especialista actualizada correctamente');
    }

    public function destroy(Specialist $specialist)
    {
        $specialist->delete();

        return redirect()->route('specialists.index')
            ->with('success', 'Especialista eliminada correctamente');
    }
}
