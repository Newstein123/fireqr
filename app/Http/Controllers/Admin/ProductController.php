<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProductController extends Controller
{
    public function index()
    {   
        $products = Product::orderBy('id', 'desc')->get();
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

        $fileNames = [];

        foreach ($request->file('images') as $image) {
            $filename = time() .'_'.$image->getClientOriginalName();
            $path = public_path('img/qr-image');
            $image->move($path, $filename); 
            $fileNames[] = $filename;
        }

        Product::create([
            'name' => $request->name,
            'type' => $request->type,
            'model_no' => $request->model_no,
            'manufactured_year' => $request->manufactured_year,
            'start_date' => $request->start_date,
            'usage' => $request->usage,
            'description' => $request->detail,
            'image' => json_encode($fileNames), 
            'publish' => 0,
        ]);

        return redirect('/admin/product')->with('message', 'A product is created successfully');
    }

    public function edit($id)
    {   
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {   
        $product = Product::findOrFail($id);
        if($request->hasFile('images')) {
            foreach(json_decode($product->image) as $image) {
                unlink(public_path('img/qr-image/'.$image));
            }

            $newFileNames = [];

            foreach($request->file('images') as $image) {
                $filename = time(). '_'.$image->getClientOriginalName();
                $newFileNames[] = $filename;
                $image->move(public_path('img/qr-image'), $filename);
            }

            $product->update([
                'name' => $request->name,
                'type' => $request->type,
                'model_no' => $request->model_no,
                'manufactured_year' => $request->manufactured_year,
                'start_date' => $request->start_date,
                'usage' => $request->usage,
                'description' => $request->detail,
                'image' => json_encode($newFileNames), 
                'publish' => 0,
            ]);

            return redirect('/admin/product')->with('message', 'Product updated successfully');
        }
    }

    public function download($id)
    {
        $image = QrCode::format('png')->size(500)->merge('fire.jpg', 0.2, true)->generate(url('/product/'.$id));
        return response($image)->header('Content-type','image/png')->header('Content-Disposition', 'attachment; filename=qrcode.png');
    }

    public function change_state(Request $request)
    {
        $product = Product::find($request->id);

        if($product) {
            if($product->publish == 0) {
                $product->update([
                    'publish' => 1,
                ]);
                return response()->json([
                    'success' => true,
                    'message' => 'Product is unpublished',
                ]);
            } else {
                $product->update([
                    'publish' => 0,
                ]);
                return response()->json([
                    'success' => true,
                    'message' => 'Product is published',
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something Wrong',
            ]);
        }
    }

    public function delete(Request $request)
    {
        $product = Product::find($request->id);
        foreach(json_decode($product->image) as $image) {
           unlink(public_path('img/qr-image/'.$image));
        }
        if($product) {
            $product->delete();

            return response()->json([
                'success' => true,
                'message' => 'Product deleted successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something Wrong',
            ]);
        }
    }
}
