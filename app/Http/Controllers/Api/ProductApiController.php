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
        $page = request('page') ?? 1;
        $perpage = request('perpage') ?? 10;
        $data = Product::orderBy('id', 'desc')->where('publish' , 0)->get();
        $total = count($data);
        $products = Product::offset(($page - 1) * $perpage)->limit($perpage)->get();
        return ProductResource::collection($products)->additional([
            'total' => $total,
            'success' => true,
        ]);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if($product) {
            return new ProductDetailResource($product);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }
}
