<?php

namespace App;

use App\User;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable=['product_id', 'comprador_id','estado','total',"vendedor_id"];

    public function producto()
    {
      return $this->hasOne(Product::class,'id');
    }
    public function comprador()
    {
      return $this->hasOne(User::class,'id');
    }
}
