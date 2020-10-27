<?php

namespace App\Http\Controllers\frontend;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class UserLoginController extends Controller
{
    public function index()
    {
        $cat_client = new Client(["base_uri" => "http://localhost:8000"]);

        $category_response = $cat_client->get("/api/category");
        $categories = json_decode($category_response->getBody(), true);

        return view('front-end.login',compact('categories'));
    }

    public function account()
    {
        $cat_client = new Client(["base_uri" => "http://localhost:8000"]);

        $category_response = $cat_client->get("/api/category");
        $categories = json_decode($category_response->getBody(), true);

        return view('front-end.account',compact('categories'));
    }

    // customer regisgter form
    public function register(Request $request)
    {
        $client = new Client(["base_uri" => "http://localhost:8000"]);
        $options = [
            RequestOptions::JSON => [
                "name"      => $request->name,
                "number"    =>  $request->phone_number,
                "password"  =>  Hash::make($request->password)
            ]
        ]; 
        $response = $client->post("/api/web/register", $options);
        $responseJSON = json_decode($response->getBody(), true);
        return redirect()->route('frontend.user.account');
    }
}
