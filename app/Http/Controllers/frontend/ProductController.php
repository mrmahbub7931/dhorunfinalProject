<?php

namespace App\Http\Controllers\frontend;

use App\Cart;
use App\Product;
use App\Category;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function products($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $categories = Category::all();
        // $product = DB::table('products')->where('slug', $slug)->first();
        return view('front-end.product-details',compact('categories','product'));
    }

    public function getAddToCart(Request $request, $product)
    {
        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($request->all(),$request->slug);
        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function remove($product)
    {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        
        if($product) {
            if(isset($cart->items[$product])) {
                // dd($cart->items[$product]);
                $cart->remove($cart->items[$product]);
                unset($cart->items[$product]);
                session()->put('cart', $cart);
                $oldCart = session()->has('cart') ? session()->get('cart') : null;
            }
            session()->flash('success', 'Product removed successfully');
        }
        return redirect()->back();
    }

    public function updateCart(Request $request)
    {
        return $request->all();
    }

    public function cartPage()
    {
        $categories = Category::all();
        if (!Session::has('cart')) {
            return view('front-end.cart',['categories' => $categories,'products' => null]);
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('front-end.cart',['categories' => $categories,'products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
}
