<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductDetailResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function index(Request $request)
    {       
        $perpage = $request->perpage;
        $products = Product::paginate($perpage);
        $total = count($products);

        return ProductResource::collection($products)->additional([
            'total' => $total,
        ]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        if($product) {
            return new ProductDetailResource($product);
        }
    }
}
