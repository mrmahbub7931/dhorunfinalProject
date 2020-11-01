<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'totalPrice'=>$this->total_price+ (.00001),
            'totalPriceFormat'=>$this->total_price_format,
            'cartProduct'=>CartProductResource::collection($this->cart_product)
        ];
    }
}



class CartProductResource extends JsonResource{

    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'image'=>$this->image,
            'name'=>$this->name,
            'price'=>(double)$this->price+ (.00001),
            'subPrice'=>(double)$this->subPrice+ (.00001),
            'quantity'=>(int)$this->quantity,
        ];
    }
}
