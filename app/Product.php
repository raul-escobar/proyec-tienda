<?php

namespace App;

use App\User;
use App\Venta;
use App\Categoria;
use App\ProductImage;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['nombre', 'precio','detalle','category_id','user_id','cantidad','estado','comentario'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    public function image(){
        return $this->hasOne(ProductImage::class);
    }
    public function images(){
        return $this->hasMany(ProductImage::class);
    }
    public function subcategorias()
    {
        return $this->belongsToMany(Subcategoria::class);
    }
   
public function venta()
{
 return $this->morphTo(Venta::class,'product_id');

}
   
}
