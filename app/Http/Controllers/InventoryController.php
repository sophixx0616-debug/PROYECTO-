<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use App\Models\Inventory;
use Illuminate\Support\Facades\Storage;

class InventoryController extends Controller
{
    public function index()
    {
        $items = Inventory::all();
        $totalProductos = $items->count();
        $stockBajo = $items->where('stock', '<=', 5)->count();
        $sinStock = $items->where('stock', 0)->count();

        return view('inventory.index', compact(
            'items',
            'totalProductos',
            'stockBajo',
            'sinStock'
        ));
    }

    public function create()
    {
        return view('inventory.create');
    }

    public function store(StoreInventoryRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('inventory', 'public');
        }

        Inventory::create($data);

        return redirect()->route('inventory.index')
            ->with('success', 'Producto agregado correctamente');
    }

    public function edit($id)
    {
        $item = Inventory::findOrFail($id);
        return view('inventory.edit', compact('item'));
    }

    public function update(UpdateInventoryRequest $request, $id)
    {
        $item = Inventory::findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($item->image && Storage::disk('public')->exists($item->image)) {
                Storage::disk('public')->delete($item->image);
            }
            $data['image'] = $request->file('image')->store('inventory', 'public');
        } else {
            unset($data['image']);
        }

        $item->update($data);

        return redirect()->route('inventory.index')
            ->with('success', 'Producto actualizado correctamente');
    }

    public function destroy($id)
    {
        $item = Inventory::findOrFail($id);

        if ($item->image && Storage::disk('public')->exists($item->image)) {
            Storage::disk('public')->delete($item->image);
        }

        $item->delete();

        return redirect()->route('inventory.index')
            ->with('success', 'Producto eliminado correctamente');
    }
}
