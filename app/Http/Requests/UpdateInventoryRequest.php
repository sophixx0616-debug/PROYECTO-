<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInventoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_name' => 'required|string|max:255',
            'brand'        => 'nullable|string|max:255',
            'stock'        => 'required|integer|min:0',
            'category'     => 'required|in:facil,manicure,otros',
            'description'  => 'nullable|string|max:1000',
            'price'        => 'required|numeric|min:0',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'product_name.required' => 'El nombre del producto es obligatorio.',
            'product_name.string'   => 'El nombre del producto debe ser texto.',
            'brand.string'          => 'La marca debe ser texto.',
            'stock.required'        => 'El stock es obligatorio.',
            'stock.integer'         => 'El stock debe ser un número entero.',
            'stock.min'             => 'El stock no puede ser negativo.',
            'category.required'     => 'La categoría es obligatoria.',
            'category.in'           => 'La categoría seleccionada no es válida.',
            'description.string'    => 'La descripción debe ser texto.',
            'price.required'        => 'El precio es obligatorio.',
            'price.numeric'         => 'El precio debe ser un valor numérico.',
            'price.min'             => 'El precio no puede ser negativo.',
            'image.image'           => 'El archivo debe ser una imagen.',
            'image.mimes'           => 'La imagen debe ser jpeg, png, jpg o webp.',
            'image.max'             => 'La imagen no debe superar 2MB.',
        ];
    }
}
