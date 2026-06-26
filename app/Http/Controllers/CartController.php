<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory; // Importante: Usamos el modelo de tu compañera

class CartController extends Controller
{
    // 1. Mostrar el carrito (La página donde se ve la lista)
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // 2. Añadir al carrito con validación de stock (Coherencia)
    public function add(Request $request, $id)
    {
        // Buscamos el producto en el inventario de ella
        $product = Inventory::findOrFail($id);

        // Verificamos si hay existencias
        if ($product->stock <= 0) {
            return back()->with('error', '¡Lo sentimos! No hay stock de ' . $product->product_name);
        }

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            if($cart[$id]['quantity'] + 1 > $product->stock) {
                return back()->with('error', 'No puedes añadir más; solo quedan ' . $product->stock . ' unidades.');
            }
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->product_name,
                "quantity" => 1,
                "price" => $product->price,
            ];
        }

        session()->put('cart', $cart);
        return back()->with('success', $product->product_name . ' se añadió al carrito.');
    }

    // 3. Eliminar un item del carrito
    public function remove($id)
    {
        $cart = session()->get('cart');
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return back()->with('success', 'Producto eliminado.');
    }

    // 4. Finalizar pedido (vacía el carrito)
    public function checkout()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', '¡Pedido realizado con éxito! Te contactaremos pronto.');
    }

    // 5. Añadir un Servicio al carrito (Permite múltiples servicios diferentes)
    public function addService(Request $request, $id)
    {
        // Buscamos el servicio en tu tabla
        $service = \App\Models\Service::findOrFail($id);

        $cart = session()->get('cart', []);

        // Usamos el ID del servicio como clave única en la bolsa
        $cartKey = 'service_' . $id;

        if(isset($cart[$cartKey])) {
            // Si ya existe en la bolsa, aumentamos la cantidad elegida
            $cart[$cartKey]['quantity']++;
        } else {
            // Si es la primera vez que se elige, lo registramos completo
            $cart[$cartKey] = [
                "name" => $service->name . " (Servicio)",
                "quantity" => 1,
                "price" => $service->price,
                "image" => "service-icon" // Etiqueta para identificar que es un servicio
            ];
        }

        session()->put('cart', $cart);
        return back()->with('success', '¡' . $service->name . ' se añadió a tu bolsa de experiencias!');
    }
}
