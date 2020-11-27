<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $fillable=['nombre', 'detalle'];

    public function user()
{
    return $this->hasMany(User::class);
}
}
