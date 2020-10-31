<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\CategoryProduct;
use App\Demo;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ChildCategoryResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\SliderResource;
use App\Product;
use App\Slider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    /**
     * REGISTER
     */

    public function register(Request $request)
    {
//        return $request;

        $userhave = User::where('phone_number', $request->number)->first();
//        return $userhave;
        $demo = new Demo();
        if ($userhave != null) {
            $demo->error = true;
            $demo->errorMessage = "Phone Number is All ready entry";
        } else {

            $user = new User();
//            $user->user_type = "Customer";
            $user->name = $request->name;
            $user->phone_number = $request->number;
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
