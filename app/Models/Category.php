<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];
    protected static function booted()
    {
        static::creating(function ($category) {
            $category->slug = Str::slug($category->name.'-' . Str::random(5));
        });
    }
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
