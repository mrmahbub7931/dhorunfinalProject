<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    protected $table = 'shipping_addresses';
    protected $fillable = [
        'user_id','user_name','phone_number','address','customer_area','flat_rate'
    ];
}
