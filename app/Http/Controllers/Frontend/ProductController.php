<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Stevebauman\Location\Facades\Location;

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
        $scan_count = $product->scan_count;
        $product->update([
            'scan_count' => $scan_count + 1,
        ]);
        return view('frontend.product.show', compact('product'));
    }
}
