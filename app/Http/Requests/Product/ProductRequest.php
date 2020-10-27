<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type'  =>  'required',
            'product_name'  =>  'required',
            'price' =>  'required',
            'unity'    =>  'required',
            'stock' =>  'required',
            'featured_image'    =>  'mimes:jpeg,bmp,png,jpg',
            'status'    =>  'required',
        ];
    }
}
