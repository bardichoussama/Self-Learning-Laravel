<?php
namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function getAllProducts()
    {
        return Product::all();
    }

    public function createProduct($data)
    {
        return Product::create($data);
    }

    public function delete($id): bool
    {
        $product = Product::find($id);

        if ($product) {
            return $product->delete();
        }

        return false;
    }
}
