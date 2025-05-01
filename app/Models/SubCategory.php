<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['name', 'slug', 'category_id', 'is_homepage','image'];
    protected static function booted()
    {
        static::creating(function ($subCategory) {
            $subCategory->slug = \Illuminate\Support\Str::slug($subCategory->name . '-' . \Illuminate\Support\Str::random(5));
        });
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function getImageAttribute($value)
    {
        return asset('storage/' . $value);
    }


}
