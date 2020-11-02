<?php

namespace App;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    
    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item,$slug)
    {
        $storedItem = ['qty' => 0,'price' => $item['sales_price'],'slug' => $item['slug'],'code' => $item['product_code'], 'item' => $item];
        if ($this->items) {
            if (array_key_exists($slug,$this->items)) {
                $storedItem = $this->items[$slug];
            }
        }
        
        $storedItem['qty']++;
        $storedItem['price']  =  $item['sales_price'] * $storedItem['qty'];
        $this->items[$slug] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item['sales_price'];
    }

    public function remove($item,$oldItem=null)
    {
        $this->totalQty -= $item['qty'];
        $this->totalPrice -= $item['price'];
    }

    public function update($item,$slug)
    {
        # code...
    }
}
