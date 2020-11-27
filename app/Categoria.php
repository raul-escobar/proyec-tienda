<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable=['nombre', 'detalle'];

    public function product()
    {
     return $this->hasMany(Product::class);
 
    }
}
