<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'image', 'price', 'discount', 'sub_category_id'];
    protected static function booted()
    {
        static::created(function ($product) {
            $product->slug = $product->id;
            $product->save();
        });
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }


    // public function getImageAttribute($value)
    // {
    //     return $value ? asset('storage/' . $value) : null;
    // }
    public function getImageUrl()
    {
        // تحقق إذا كانت الصورة موجودة ثم أعرض رابط الصورة
        return  $this->image ? asset('storage/' .  $this->image) : null;
    }
    public function getImagePathAttribute()
    {
        return $this->getRawOriginal('image');
    }


    public function similarProducts()
    {
        return $this->where('sub_category_id', $this->sub_category_id)
            ->where('id', '!=', $this->id)
            ->take(10)->get();
    }
}
