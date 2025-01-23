<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    // Show the main view
    public function index()

    {
        $products = $this->productRepository->getAllProducts();
        return view('products.index' ,compact('products'));
    }

    // Get all products (AJAX endpoint)
    // public function getProducts()
    // {
    //     $products = $this->productRepository->getAllProducts();
    //     return response()->json($products);
    // }

    // Add a new product (AJAX endpoint)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);
    
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);
    
        return response()->json($product);
    }

    // Delete a product (AJAX endpoint)
    public function destroy($id)
    {
        $product = $this->productRepository->find($id);

        if ($product) {
            $product->delete();  // Delete the product
            return response()->json(['success' => true], 200);  // Return success
        }

        return response()->json(['success' => false], 404);  // Return error if not found
    }
}
