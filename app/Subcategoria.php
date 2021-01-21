<?php

namespace App;

use App\Product;
use App\Categoria;
use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    protected $fillable=['nombre', 'detalle','category_id'];

    public function productos()
    {
        return $this->belongsToMany(Product::class);
    }
}
