<?php

namespace App;

use App\User;
use App\Categoria;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['nombre', 'precio','detalle','category_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
