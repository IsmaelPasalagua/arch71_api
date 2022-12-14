<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json([
            'data' => $categories,
            'status' => 200
        ]);
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return response()->json([
            'data' => $category,
            'status' => 201
        ]);
    }

    public function show($id)
    {
        $category = Category::find($id);
        return response()->json([
            'data' => $category,
            'status' => 200
        ]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update($request->all());
        return response()->json([
            'data' => $category,
            'status' => 200
        ]);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return response()->json([
            'data' => $category,
            'status' => 200
        ]);
    }
}
