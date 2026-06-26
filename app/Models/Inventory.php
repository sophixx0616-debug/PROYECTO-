<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Inventory extends Model
{
    protected $fillable = [
        'product_name',
        'brand',
        'stock',
        'category',
        'description',
        'price',
        'image'
    ];

    public function getImageUrlAttribute(): string
    {
        if ($this->image && Storage::disk('public')->exists($this->image)) {
            return Storage::url($this->image);
        }
        return '';
    }
}