<?php
namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function all()
    {
        return Product::all();
    }
    
    public function delete($id): bool
    {
        $product = $this->find($id);
        if ($product) {
            return $product->delete();
        }
        return false;
    }
}
