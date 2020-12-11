<?php

namespace App;

use App\User;
use App\Categoria;
use App\ProductImage;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['nombre', 'precio','detalle','category_id','user_id','cantidad'];

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
   
}
