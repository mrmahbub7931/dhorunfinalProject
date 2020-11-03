<?php

namespace App\Http\Controllers\frontend;

use App\Cart;
use App\User;
use App\Order;
use App\Product;
use App\Category;
use App\OrderArea;
use App\OrderProducts;
use GuzzleHttp\Client;
use App\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('front-end.index',compact('products','categories'));
        
    }

    public function checkout(Request $request)
    {
        $customerareas = OrderArea::all();
        $categories = Category::all();
        if (Gate::allows('isUser')) {
            $shipAddressCount = ShippingAddress::where('user_id',$request->user_id)->count();
            $shipDetails = array();
            if ($shipAddressCount > 0) {
                $shipDetails = ShippingAddress::where('user_id',$request->user_id)->first();
            }
            if ($request->isMethod('post')) {
                $data = [
                    'user_id' => $request->user_id,
                    'user_name' => $request->name,
                    'phone_number' => $request->phone_number,
                    'address' => $request->address,
                    'customer_area' => $request->customer_area,
                    'flat_rate' => $request->flat_rate,
                ];
                User::where('id',$request->user_id)->update(['name' => $request->name,'phone_number' => $request->phone_number,'address' => $request->address]);

                if ($shipAddressCount > 0) {
                    // update shipping address
                    ShippingAddress::where('user_id',$request->user_id)->update(['user_name' => $request->name,'phone_number' => $request->phone_number,'address' => $request->address,'customer_area' => $request->customer_area,'flat_rate' => $request->flat_rate]);
                    return redirect()->route('frontend.order.review');
                } else {
                    // insert shipping address
                    $shippingAddress = ShippingAddress::create($data);
                    return redirect()->route('frontend.order.review');
                }
            }
        
        
            return view('front-end.checkout',compact('categories','customerareas'));

        } else {
            return redirect()->route('frontend.user.login')->with('categories',$categories);
    
        }
        
        
    }

    public function orderReview(Request $request)
    {
        $categories = Category::all();
        $customerareas = OrderArea::all();
        if (Auth::check()) {
            $shippingAddress = ShippingAddress::where('user_id',Auth::user()->id)->first();
        }
        if (Gate::allows('isUser')) {
            return view('front-end.order-review',compact('categories','shippingAddress','customerareas'));
        } else {
            return redirect()->route('frontend.user.login')->with('categories',$categories);
        }
        
    }

    // order place function
    public function placeOrder(Request $request)
    {
        $categories = Category::all();
        if (Gate::allows('isUser')) {
            if ($request->isMethod('post')) {
                $data = [
                    'user_id'   =>  $request->user_id,
                    'user_name'   =>  $request->user_name,
                    'phone_number'   =>  $request->phone_number,
                    'address'   =>  $request->address,
                    'customer_area'   =>  $request->customer_area,
                    'shipping_charge'   =>  $request->shipping_charge,
                    'payment_method'   =>  $request->payment_method,
                    'order_total'   =>  $request->order_total,
                ];

                $order = Order::create($data);

                $order_id = DB::getPdo()->lastInsertId();
                if (Session::has('cart')) {
                    $oldCart = Session::get('cart');
                    $carts = new Cart($oldCart);
                    foreach ($carts->items as  $cart) {
                        $orderProduct = new OrderProducts;
                        $orderProduct->order_id = $order_id;
                        $orderProduct->user_id = $request->user_id;
                        $orderProduct->product_slug = $cart['slug'];
                        $orderProduct->product_code = $cart['code'];
                        $orderProduct->product_name = $cart['item']['product_name'];
                        $orderProduct->product_price = $cart['item']['sales_price'];
                        $orderProduct->product_qty = $cart['qty'];
                        $orderProduct->save();
                    }
                    // dd($carts);
                    // return view('front-end.cart',['categories' => $categories,'products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
                }
                Session::forget('cart');
                Session::put('order_id',$orderProduct->product_code);
                Session::put('order_total',$order->order_total);
                return redirect()->route('frontend.order.thanks')->with('success','Thanks for purchasing with us!');
            }
        } else {
            return redirect()->route('frontend.user.login')->with('categories',$categories);
        }
    }

    public function thanks()
    {
        $categories = Category::all();
        if (Gate::allows('isUser')) {
            return view('front-end.thanks',compact('categories'));
        } else {
            return redirect()->route('frontend.user.login')->with('categories',$categories);
        }
    }


}
