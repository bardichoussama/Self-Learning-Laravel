<?php

namespace App\Http\Controllers;
use App\Repositories\ProductRepository;
use App\Models\Product;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function index()
    {
        $products = $this->productRepository->all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
        ]);

        if( $validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors' => $validator->messages(),
            ]);
        }
        else
        {
            $product = new Product();
            $product->name = $request->name;
            $product->save();

            return response()->json([
                'status' => 200,
                'message' => 'created successfuly'
            ]);
        }
    }

    public function delete($id): bool
    {
        $product = $this->find($id);
    
        if (!$product) {
            \Log::error("Product not found: ID $id");
            return false;
        }
    
        try {
            return $product->delete();
        } catch (\Exception $e) {
            \Log::error("Error deleting product ID $id: " . $e->getMessage());
            return false;
        }
    }
    
    
}
