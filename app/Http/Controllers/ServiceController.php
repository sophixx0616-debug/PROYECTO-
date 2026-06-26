<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(StoreServiceRequest $request)
    {
        Service::create($request->validated());

        return redirect()->route('services.index')
            ->with('success', 'Servicio creado correctamente');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('services.edit', compact('service'));
    }

    public function update(UpdateServiceRequest $request, $id)
    {
        $service = Service::findOrFail($id);
        $service->update($request->validated());

        return redirect()->route('services.index')
            ->with('success', 'Servicio actualizado correctamente');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('services.index')
            ->with('success', 'Servicio eliminado correctamente');
    }
}
