<?php

namespace App;

use App\Order;
use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    protected $table = 'order_product';
    protected $fillable = ['order_id','user_id','product_slug','product_code','product_name','product_size','product_color','product_price','product_qty'];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
