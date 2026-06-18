<?php

namespace App\Http\Controllers;

use App\Models\Specialist;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'specialty' => 'required'
        ]);

        Specialist::create([
            'name' => $request->name,
            'specialty' => $request->specialty
        ]);

        return redirect()
            ->route('specialists.index')
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

    public function update(Request $request, Specialist $specialist)
    {
        $request->validate([
            'name' => 'required',
            'specialty' => 'required'
        ]);

        $specialist->update([
            'name' => $request->name,
            'specialty' => $request->specialty
        ]);

        return redirect()
            ->route('specialists.index')
            ->with('success', 'Especialista actualizada correctamente');
    }

    public function destroy(Specialist $specialist)
    {
        $specialist->delete();

        return redirect()
            ->route('specialists.index')
            ->with('success', 'Especialista eliminada correctamente');
    }
}