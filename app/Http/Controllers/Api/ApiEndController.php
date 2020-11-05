<?php

namespace App\Http\Controllers\Api;

use App\Cart;
use App\Category;
use App\CategoryProduct;
use App\Demo;
use App\Http\Controllers\Controller;
use App\Http\Resources\AreaResource;
use App\Http\Resources\CartResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ChildCategoryResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\SliderResource;
use App\Order;
use App\OrderArea;
use App\OrderProducts;
use App\Product;
use App\Slider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;

class ApiEndController extends Controller
{
    //

    public function slider(){
        $slider = Slider::where('active',true)->get();
        return SliderResource::collection($slider);
    }

    public function categories(){
        $category = Category::where('parent_id',0)->with('child')->get();
        return CategoryResource::collection($category);
    }


    public function trendingCategories(){
        $category = Category::where('trending',1)->get();
//        return $category;
        return ChildCategoryResource::collection($category);
    }

    /*some products for trending*/
    public function homeProduct(){
      $product = Product::where('status','on')->get()->shuffle()->take(10);
      return ProductResource::collection($product);
    }

    /*category ways product*/
    public function single_category($id){
        $category = CategoryProduct::where('category_id',$id)->with('products')->get();
        $products =collect();
        foreach ($category as $c){
            $products->push($c->products);
        }
        return ProductResource::collection($products);
    }

    /*search product*/
    public function searchProduct($name){
//        return $name;
        $product = Product::where('status','on')->where('name', 'LIKE', '%' . $name . '%')->get()->take(20);
        if ($product->count() <= 0){
            $product = Product::where('status','on')->get()->shuffle()->take(10);
        }
        return ProductResource::collection($product);
    }


    /*wishlist*/
    public function wishlist(Request $request)
    {
        $datas = json_decode($request->wishlists);
        $product = collect();
        foreach ($datas as $p) {
            $pro = Product::where('status','on')->where('id', $p)->first();
            if ($pro != null) {
                $demo = new Demo();
                $demo->id = $pro->id;
                $demo->name = $pro->name;
                $demo->image = $pro->image;
                $demo->stock = $pro->stock;
                $demo->price = $pro->price;
                $demo->discount = $pro->discount;
                $demo->desc = $pro->desc;
                $demo->unity = $pro->unity;
                $product->push($demo);
            }
        }
        return ProductResource::collection($product);
    }


    /*cart calculations*/
    public function cart_product($carts)
    {
//        return $carts;
        $carts_decode = json_decode($carts);

        $carts_list = collect();
        foreach ($carts_decode as $cart) {
            $explode_cart = explode("-", $cart);
            $demo_cart = new Demo();
            $demo_cart->productStockId = (int)$explode_cart[0];
            $demo_cart->campaignId = (int)$explode_cart[1];
            $demo_cart->quantity = (int)$explode_cart[2];
            $carts_list->push($demo_cart);
        }

//        return $carts_list;

        //modifying cart items to show
        $cart_list = collect();
        $cartProduct = new Demo();
        $t_price = 0;

        foreach ($carts_list as $cart) {
            $product = Product::where('id',$cart->productStockId)->first();
            if ($product != null){
                $demo_cart = new Demo();
                $demo_cart->id = $product->id;
                $demo_cart->image  = $product->featured_image;
                $demo_cart->name  = $product->name;
                $demo_cart->price  = $product->discount == null ? $product->price : round((1 - ($product->discount/100)) * $product->price);
                $demo_cart->quantity  =$cart->quantity;
                $demo_cart->subPrice  =($demo_cart->price *$cart->quantity);
                $t_price += $demo_cart->subPrice;
                $cart_list->push($demo_cart);
            }

        }
        $cartProduct->cart_product = $cart_list;
        $cartProduct->total_price = $t_price;
        $cartProduct->total_price_format = number_format($t_price,2);

        return new CartResource($cartProduct);

    }

    /*deliver are*/
    public function area(){
        $area  = OrderArea::all();
        return AreaResource::collection($area);
    }

    public function checkout(Request $request){
//         return $request;

        $user = Auth::user();
        $demo = new Demo();
        $total = 0;
        try {

            $carts_decode = json_decode($request->carts);
            $carts_list = collect();
            foreach ($carts_decode as $cart) {
                $explode_cart = explode("-", $cart);
                $demo_cart = new Demo();
                $demo_cart->id = $explode_cart[0];
                $demo_cart->quantity = $explode_cart[1];
                $demo_cart->subPrice = $explode_cart[2];
                $total +=$demo_cart->subPrice;
                $carts_list->push($demo_cart);
            }

            /*order create*/
            $order = new Order();
            $order->user_id =  $user->id;
            $order->user_name = $user->name;
            $order->phone_number = $request->phone;
            $order->address = $request->address;
            $order->customer_area = $request->area_name;
            $order->shipping_charge = $request->area_charge;
            $order->payment_method = 'Cash on Delivery';
            $order->order_total = $total;
            $order->save();
            /*save the order*/

            /*save the product*/
            foreach ($carts_list as  $cart) {
                $product = Product::where('id',$cart->id)->first();
                $orderProduct = new OrderProducts;
                $orderProduct->order_id = $order->id;
                $orderProduct->user_id = $user->id;
                $orderProduct->product_slug = $product->slug;
                $orderProduct->product_code = null;
                $orderProduct->product_name = $product->name;
                $orderProduct->product_price = $cart->subPrice;
                $orderProduct->product_qty = $cart->quantity;
                $orderProduct->save();
            }

            $demo->error = false;
            $demo->message = "Dear " . Auth::user()->name .
                " Thank you for your purchase.Your order has been successfully placed";
        }catch (Exception $exception){
            $demo->error = true;
            $demo->message = "We are facing some server problem, Try again ";
        }

        return  $demo;

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
    }

    /*userData*/
    public function userData(){
        $user= Auth::user();
        return $user;
    }
    /**
     * REGISTER
     */

    public function register(Request $request)
    {
//        return $request;
        $demo = new Demo();
        if ($request->name == null){
            $demo->error = true;
            $demo->errorMessage = "Name Is Required";
        }elseif ($request->number == null){
            $demo->error = true;
            $demo->errorMessage = "Phone Number is Required";
        }elseif ($request->password == null){
            $demo->error = true;
            $demo->errorMessage = "Password is  Required";
        }elseif($request->address == null){
            $demo->error = true;
            $demo->errorMessage = "Address is Required";
        }else{
            $userhave = User::where('phone_number', $request->number)->first();

            if ($userhave != null) {
                $demo->error = true;
                $demo->errorMessage = "Phone Number is All ready entry";
            } else {

                $user = new User();
                $user->name = $request->name;
                $user->phone_number = $request->number;
                $user->address = $request->address;
                $user->password = Hash::make($request->password);
                $user->save();

                /*append demo data*/
                $demo->error = false;
                $demo->name = $user->name;
                $demo->number = $user->phone_number;
                $demo->avatar = $user->avatar == null ? null : $user->avatar;
                $token = $user->createToken(env('API_TOKEN'))->accessToken;
                $demo->token = $token;
            }
        }
        return $demo;
    }


    /**
     * LOGIN
     */

    public function login(Request $request)
    {
        $demo = new Demo();

        $credentials = [
            'phone_number' => $request['number'],
            'password' => $request['password'],
        ];

        if (!auth()->attempt($credentials)) {
            $demo->error = true;
            $demo->errorMessage = "Invalid Credentials";
        } else {

            $user = Auth::user();
            $demo->error = false;
            $demo->name = $user->name;
            $demo->number = $user->phone_number;
            $demo->avatar = $user->avatar == null ? asset('avatar.png') : asset($user->avatar);
            $token = Auth::user()->createToken(env('API_TOKEN'))->accessToken;
            $demo->token = $token;
        }
        return $demo;

    }

    /**/
    public function logout()
    {
        $user = Auth::user()->token();
        $user->revoke();
        return response(['message' => 'Logout successfully']);
    }

    /*change password*/
    public function changePassword(Request $request)
    {
        $demo = new Demo();
        if (Hash::check($request->currentPassword, Auth::user()->getAuthPassword())) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->newPassword);
            $user->save();

            $demo->error = false;
            $demo->message = 'New Password Is saved';
        } else {
            $demo->error = true;
            $demo->message = 'Current Password Is not Match';
        }
        return $demo;

    }

    /*get data*/
    public function getData(Request $request)
    {
        $demo = new Demo();
        $user = Auth::user();
        $demo->name = $user->name;
        $demo->phone_number = $user->phone_number;
        $demo->address = $user->address;
        $demo->avatar = $user->avatar;
        return $demo;

    }

    /*update image*/
    public function updateImage(Request $request)
    {
        $user = Auth::user();
        $user->avatar = asset($request->picture, 'user_avatar');
        $user->save();
        return [$request, $request->hasFile('picture')];
    }

    public function updateUser(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->slug = $request->name . $user->id;
        $user->phone_number = $request->phone_number;
        $user->save();
        $demo = new Demo();
        $demo->error = false;
        $demo->name = $user->name;
        $demo->email = $user->email;
        $demo->phone_number = $user->phone_number;
        $demo->avatar =$user->avatar == null ? null : asset(auth()->user()->avatar);
        $token = Auth::user()->createToken(env('API_TOKEN'))->accessToken;
        $demo->token = $token;
        return $demo;
    }


}
