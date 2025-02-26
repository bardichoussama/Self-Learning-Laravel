<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function publicIndex()
    {
        return $this->productRepository->getAllProducts();
    }

    public function store(StoreProductRequest $request)
    {
        $product = $this->productRepository->createProduct($request->validated());
    
        return response()->json([
            'status' => 200,
            'message' => 'Product added successfully.',
            'product' => $product,
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
