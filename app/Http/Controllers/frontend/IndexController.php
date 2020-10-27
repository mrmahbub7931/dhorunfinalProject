<?php

namespace App\Http\Controllers\frontend;

use App\Product;
use App\Category;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('front-end.index',compact('products','categories'));
        
    }


}
