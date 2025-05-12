<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 3);
        $products = Product::with([
            'variants.images',
            'images'
        ])->paginate((int) $perPage);

        return response()->json($products);
    }
    public function show(Product $product)
    {
        return $product->load(['variants.images', 'images']);
    }
}
