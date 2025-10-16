<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //Campos que se pueden asignar masivamente
    protected $fillable = ['name', 'description', 'price'];

    // Relación N a N con ShoppingList
    public function shoppingLists()
    {
        return $this->belongsToMany(ShoppingList::class, 'product_shopping_list')
                    ->withPivot('quantity')
                    ->withTimestamps();

    }
}
