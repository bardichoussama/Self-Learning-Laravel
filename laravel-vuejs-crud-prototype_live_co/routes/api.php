<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products',[ProductController::class,'publicIndex']);
Route::post('/products', [ProductController::class, 'store']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);

// Route::get('/products', function () {
//     // Define fake product data directly
//     $products = [
//         [
//             'id' => 1,
//             'name' => 'Product 1',
//             'description' => 'This is the description for Product 1.',
//             'price' => 19.99,
//         ],
//         [
//             'id' => 2,
//             'name' => 'Product 2',
//             'description' => 'This is the description for Product 2.',
//             'price' => 29.99,
//         ],
//         [
//             'id' => 3,
//             'name' => 'Product 3',
//             'description' => 'This is the description for Product 3.',
//             'price' => 39.99,
//         ],
//     ];

//     // Return the fake data as JSON
//     return response()->json($products);
// });
