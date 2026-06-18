<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $items = Inventory::all();

        $totalProductos = $items->count();

        $stockBajo = $items->where('quantity', '<=', 5)->count();

        $sinStock = $items->where('quantity', 0)->count();

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

    public function store(Request $request)
{
    $request->validate([
        'product_name' => 'required',
        'stock' => 'required|numeric',
        'price' => 'required|numeric',
    ]);

    Inventory::create([
        'product_name' => $request->product_name,
        'brand' => $request->brand,
        'stock' => $request->stock,
        'category' => $request->category,
        'description' => $request->description,
        'price' => $request->price,
    ]);

    return redirect()->route('inventory.index')
        ->with('success', 'Producto agregado correctamente');
}
    public function edit($id)
    {
        $item = Inventory::findOrFail($id);

        return view('inventory.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        $item = Inventory::findOrFail($id);

        $item->update([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);

        return redirect()->route('inventory.index')
            ->with('success', 'Producto actualizado correctamente');
    }

    public function destroy($id)
    {
        $item = Inventory::findOrFail($id);

        $item->delete();

        return redirect()->route('inventory.index')
            ->with('success', 'Producto eliminado correctamente');
    }
}