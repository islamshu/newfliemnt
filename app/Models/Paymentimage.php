<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paymentimage extends Model
{
    protected $fillable = [
        'image',
        'name',
        'link'
    ];
    
    // public function getImageAttribute($value)
    // {
    //     return asset('storage/' . $value);
    // }
    public function getImageUrl()
    {
        // تحقق إذا كانت الصورة موجودة ثم أعرض رابط الصورة
        return  $this->image ? asset('storage/' .  $this->image) : null;
    }
   
}
