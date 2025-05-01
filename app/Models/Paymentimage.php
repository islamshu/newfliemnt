<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paymentimage extends Model
{
    protected $fillable = [
        'image',
        'name',
    ];
    
    public function getImageAttribute($value)
    {
        return asset('storage/' . $value);
    }

   
}
