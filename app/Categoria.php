<?php

namespace App;

use App\Subcategoria;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable=['nombre', 'detalle'];

    public function product()
    {
     return $this->hasMany(Product::class);
 
    }
    public function subcategorias()
    {
        return $this->belongsToMany(Subcategoria::class);
    }
}
