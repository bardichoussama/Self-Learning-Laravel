<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function publicIndex()
    {
        return Product::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);
    
        $product = Product::create($request->all());
    
        return response()->json([
            'status' => 200,
            'message' => 'Product added successfully.',
            'product' => $product,
        ]);
    }
    
    public function destroy($id)
    {
        $product = Product::find($id);
    
        if ($product) {
            $product->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Product deleted successfully.',
            ]);
        }
    
        return response()->json([
            'status' => 404,
            'message' => 'Product not found.',
        ]);
    }
}
