<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=['titulo', 'message','product_id','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
