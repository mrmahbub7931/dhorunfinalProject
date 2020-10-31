<?php

namespace App\Http\Controllers\Admin;

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
}
