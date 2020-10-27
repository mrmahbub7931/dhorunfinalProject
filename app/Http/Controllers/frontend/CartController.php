<?php

namespace App\Http\Controllers\frontend;

use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getAddToCart(Request $request, $product)
    {
        $cat_client = new Client(["base_uri" => "http://localhost:8000"]);
        $category_response = $cat_client->get("/api/category");
        $categories = json_decode($category_response->getBody(), true);

        $cart_client = new Client(["base_uri" => "http://localhost:8000"]);

        $product_response = $cart_client->get("/api/products/$product");
        $product = json_decode($product_response->getBody(), true);
        dd($product);
        // return view('front-end.cart',compact('categories','cart'));
        // $product = 
    }
}
