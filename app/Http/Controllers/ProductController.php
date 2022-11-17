<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        foreach ($products as $product) {
            try{
                $product->category_name = Category::find($product->category_id)->name;
            }
            catch (\Exception $e) {
                $product->category_name = 'N/A';
            }
        }
        return response()->json([
            'data' => $products,
            'status' => 200
        ]);
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());
        try{
            $product->category_name = Category::find($product->category_id)->name;
        }
        catch (\Exception $e) {
            $product->category_name = 'N/A';
        }
        return response()->json([
            'data' => $product,
            'status' => 201
        ]);
    }

    public function show($id)
    {
        $product = Product::find($id);
        try{
            $product->category_name = Category::find($product->category_id)->name;
        }
        catch (\Exception $e) {
            $product->category_name = 'N/A';
        }
        return response()->json([
            'data' => $product,
            'status' => 200
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        try{
            $product->category_name = Category::find($product->category_id)->name;
        }
        catch (\Exception $e) {
            $product->category_name = 'N/A';
        }
        return response()->json([
            'data' => $product,
            'status' => 200
        ]);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        try{
            $product->category_name = Category::find($product->category_id)->name;
        }
        catch (\Exception $e) {
            $product->category_name = 'N/A';
        }
        return response()->json([
            'data' => $product,
            'status' => 200
        ]);
    }

    public function search(Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->name . '%')->get();
        foreach ($products as $product) {
            try{
                $product->category_name = Category::find($product->category_id)->name;
            }
            catch (\Exception $e) {
                $product->category_name = 'N/A';
            }
        }
        if (count($products) == 0) {
            return response()->json([
                'data' => 'Not Found',
                'status' => 404
            ]);
        }
        return response()->json([
            'data' => $products,
            'status' => 200
        ]);
    }
}
