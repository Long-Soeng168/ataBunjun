<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return response()->json($products);
    }

    public function getProductsByShop(String $shop_id){
        $products = Product::where('shop_id', $shop_id)->latest()->paginate(10);
        return response()->json($products);
    }

    public function getProductsByCategory(String $category_id){
        $products = Product::where('category_id', $category_id)->latest()->paginate(10);
        return response()->json($products);
    }

    public function getProductsByBodyType(String $body_type_id){
        $products = Product::where('body_type_id', $body_type_id)->latest()->paginate(10);
        return response()->json($products);
    }

    public function getProductsByBrand(String $brand_id){
        $products = Product::where('brand_id', $brand_id)->latest()->paginate(10);
        return response()->json($products);
    }

    public function getProductsByModel(String $model_id){
        $products = Product::where('model_id', $model_id)->latest()->paginate(10);
        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with('category', 'body_type', 'brand', 'brand_model')->find($id);
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function images(string $id)
    {

    }
}
