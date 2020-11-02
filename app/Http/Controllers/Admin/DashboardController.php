<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            return view('admin.dashboard');
        } else {
            return redirect()->route('frontend.index');
    
        }
        
    }
    public function getOrders ()
    {
        if (Gate::allows('isAdmin')) {
            $orders = Order::with('order_products')->orderBy('id','DESC')->get();
            return view('admin.product.orders',compact('orders'));
        } else {
            return redirect()->route('frontend.index');
    
        }
        
    }

    public function getCustomers ()
    {
        if (Gate::allows('isAdmin')) {
            $customers = User::where('role','customer')->orderBy('id','DESC')->get();
            return view('admin.customers',compact('customers'));
        } else {
            return redirect()->route('frontend.index');
    
        }
        
    }
}
