<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function publicIndex()
    {
        $products = $this->productRepository->getAllProducts();
        return view('public.products.index', compact('products'));
    }

    public function adminIndex()
    {
        $products = $this->productRepository->getAllProducts();
        return view('admin.products.index', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $this->productRepository->createProduct($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Product added successfully.',
        ]);
    }

    public function destroy($id)
    {
        $deleted = $this->productRepository->delete($id);

        if ($deleted) {
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

