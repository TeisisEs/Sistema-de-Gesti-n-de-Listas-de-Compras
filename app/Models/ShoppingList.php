<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShoppingList extends Model
{
    //Campos que se pueden asignar masivamente
    protected $fillable = ['title', 'notes', 'due_date'];

    // Relación N a N con Product
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_shopping_list')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }
}
