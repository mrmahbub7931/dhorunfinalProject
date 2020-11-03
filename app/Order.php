<?php

namespace App;

use App\OrderProducts;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'user_id', 'user_name', 'phone_number', 'address', 'customer_area', 'shipping_charge', 'order_status','coupon_code','coupon_amount','payment_method','order_total'
    ];

    public function order_products()
    {
        return $this->hasMany(OrderProducts::class, 'order_id');
    }
}
