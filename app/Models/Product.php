<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'image', 'price', 'discount', 'sub_category_id'];
    protected static function booted()
    {
        static::creating(function ($product) {
            $product->slug = \Illuminate\Support\Str::slug($product->name . '-' . \Illuminate\Support\Str::random(5));
        });
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }
    public function getImageAttribute($value)
    {
        return asset('storage/' . $value);
    }
    public function similarProducts()
    {
        return $this->where('sub_category_id', $this->sub_category_id)
                    ->where('id', '!=', $this->id)
                    ->take(10)->get();
    }
   
}
