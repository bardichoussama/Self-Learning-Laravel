<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    public function publicIndex()
    {
        return response()->json(Product::all());
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->validated());
    
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
