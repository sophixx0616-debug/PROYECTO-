<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inventory;

class InventorySeeder extends Seeder
{
    public function run(): void
    {
        $productos = [
            [
                'product_name' => 'Esmalte Semi-Permanente',
                'brand' => 'CND',
                'stock' => 15,
                'category' => 'manicure',
                'description' => 'Esmalte de larga duración en variedad de colores.',
                'price' => 25000
            ],
            [
                'product_name' => 'Acrílico en Polvo',
                'brand' => 'Valentino',
                'stock' => 8,
                'category' => 'manicure',
                'description' => 'Polvo acrílico para extensiones y relleno.',
                'price' => 45000
            ],
            [
                'product_name' => 'Lima de Uñas Profesional',
                'brand' => 'KADS',
                'stock' => 30,
                'category' => 'facil',
                'description' => 'Lima de uñas doble grano para acabado profesional.',
                'price' => 5000
            ],
            [
                'product_name' => 'Aceite para Cutículas',
                'brand' => 'CND',
                'stock' => 20,
                'category' => 'facil',
                'description' => 'Aceite hidratante para cutículas con aroma a jojoba.',
                'price' => 12000
            ],
            [
                'product_name' => 'Toallas Desechables',
                'brand' => 'Desechables Spa',
                'stock' => 3,
                'category' => 'otros',
                'description' => 'Paquete de toallas suaves para tratamientos.',
                'price' => 8000
            ],
            [
                'product_name' => 'Guantes de Latex',
                'brand' => 'SensiCare',
                'stock' => 2,
                'category' => 'otros',
                'description' => 'Guantes de látex sin polvo, caja de 100 unidades.',
                'price' => 15000
            ],
        ];

        foreach ($productos as $producto) {
            Inventory::updateOrCreate(
                ['product_name' => $producto['product_name']],
                $producto
            );
        }
    }
}
