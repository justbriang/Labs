<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    Protected $fillable=['title','description','rating'];
    protected $guarded=['car_id'];
    public function creator()
    {
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }

}