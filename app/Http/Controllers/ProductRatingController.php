<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Rating;

class ProductRatingController extends Controller
{
    public function index()
    {
        $products = Product::with('ratings')->paginate(1);
        
           return response()->json([
                'status' => true,
                'products' => $products,
            ]);
             
    }

    public function store(Request $request)
    { 
        $product = Product::create($request->only(['title', 'price', 'description', 'category', 'image']));
        if ($request->has('rating')) {
            $product->ratings()->create($request->input('rating'));
        }
        return response()->json($product);
    }

    public function show($id)
    {
        $product = Product::with('ratings')->findOrFail($id);
        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->only(['title', 'price', 'description', 'category', 'image']));

        if ($request->has('rating')) {
            $product->ratings()->update($request->input('rating'));
        }

        return response()->json($product);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(null, 204);
    }
}
