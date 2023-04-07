<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {      
        $product_count = Product::count();
        return view('admin.dashboard',compact('product_count'));
    }
}
