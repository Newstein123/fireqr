<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {   
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.show', compact('product'));
    }

    public function create()
    {
       return view('admin.product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'images.*' => 'required|mimes:jpg,bmp,png'
        ], [
            'name.required' => 'ပစ္စည်းအမည်လိုအပ်ပါသည်',
            'type.required' => 'ပစ္စည်းအမျိုးအစား လိုအပ်ပါသည်',
        ]);

        $imagePath = [];

        foreach ($request->file('images') as $image) {
            $filename = time() .'_'.$image->getClientOriginalName();
            $path = $image->storeAs('/img/qr-image', $filename); 
            $imagePath[] = $path;
        }

        Product::create([
            'name' => $request->name,
            'type' => $request->type,
            'model_no' => $request->model_no,
            'manufactured_year' => $request->manufactured_year,
            'start_date' => $request->start_date,
            'usage' => $request->usage,
            'description' => $request->detail,
            'image' => json_encode($imagePath), 
            'publish' => 0,
        ]);

        echo "success";
    }
}
