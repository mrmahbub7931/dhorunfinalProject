<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'id'=>$this->id,
            'image'=>$this->featured_image,
            'name'=>$this->name,
            'stock'=>$this->stock,
            'price'=>$this->price,
            'discount'=>$this->discount,
            'desc'=>$this->short_desc,
            'unity'=>$this->unity,
        ];
    }
}
