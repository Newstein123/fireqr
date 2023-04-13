<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {   
        $products = Product::orderBy('id', 'desc')->where('publish', 0)->paginate(12);
        return view('frontend.product.index', compact('products'));
    }

    public function show($id)
    {   
        $product = Product::findOrFail($id);
        return view('frontend.product.show', compact('product'));
    }
}
