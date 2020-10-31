<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderArea extends Model
{
    protected $table = 'order_areas';
    protected $fillable = [
        'order_area','flat_rate'
    ];
}
