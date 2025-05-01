<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainCats extends Model
{
    protected $table = 'main_cat';
    protected $fillable = [
        'title',
        'image'
    ];
    public function getImageAttribute($value)
    {
        return asset('storage/' . $value);
    }
}
