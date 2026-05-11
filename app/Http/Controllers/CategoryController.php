<?php

namespace App\Http\Controllers;

// Import model Category, bukan Item
use App\Models\Category; 
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Mengambil semua data kategori
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    // Menambah kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::create($request->all());
        return response()->json($category, 201);
    }

    // Menampilkan satu kategori berdasarkan ID
    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
        }

        return response()->json($category);
    }

    // Mengubah data kategori
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($request->all());
        return response()->json($category);
    }

    // Menghapus kategori
    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
        }

        $category->delete();
        return response()->json(['message' => 'Kategori berhasil dihapus']);
    }
}