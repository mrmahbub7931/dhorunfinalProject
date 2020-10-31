<?php

namespace App\Http\Controllers\frontend;

use App\User;
use App\Category;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class UserLoginController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('front-end.login',compact('categories'));
    }

    public function userAccount()
    {
        $categories = Category::all();
        if (Gate::allows('isUser')) {
            return view('front-end.account',compact('categories'));
        } else {
            return redirect()->route('frontend.user.login')->with('categories',$categories);
    
        }

        
    }

    // customer regisgter form
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone_number' => 'required|unique:users|max:13',
            'password'  =>  'required|min:6'
        ]);
        $data = [
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
        ];
        $user = User::create($data);
        auth()->login($user);
        return redirect()->route('frontend.user.account');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('phone_number', 'password');
        if (Auth::attempt($credentials)) {
            if (Gate::allows('isUser')) {
                return redirect()->route('frontend.user.account')->with('success','Successfully Loged in!');
            }else{
                return "Invaild User";
            }
            return redirect()->route('frontend.user.account')->with('success','Successfully Loged in!');
        }else{
            return redirect()->route('frontend.user.login')->with('error','Login Credentials Missing!');
        }
    }

    public function userDetails(Request $request,$id)
    {
        // return $request->all();
        $user = User::find($id);
        if ($request->address !== null) {
            $user->address = $request->address;
        }
        if ( isset($request->old_password) && !Hash::check($request->old_password, $user->password) ){
            return 'The old password does not match our records.';
        } else if(isset($request->old_password)){
            $user->password = bcrypt($request->password);
        }
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->update();
        return $user;
    }
}
