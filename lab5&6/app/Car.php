<?php

namespace App;
use User;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{   protected $guarded=['user_id'];

    public function make()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function reviews(){
        return $this->hasMany(Reviews::class);
    }

}
