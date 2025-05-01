<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'code',
        'name',
        'phone',
        'email',
        'location',
        'street',
        'home',
        'zip',
        'city',
        'country',
        'payment',
        'first_batch',
        'CardName',
        'cardNumber',
        'month',
        'year',
        'cvc',
        'payment_getway',
        'CashOrBatch',
        'code'
    ];
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
