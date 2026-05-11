<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // Mengambil semua data item beserta info kategorinya
    public function index()
    {
        // 'category' di sini merujuk ke nama function relasi di Model Item
        $items = Item::with('category')->get();
        return response()->json($items);
    }

    // Menambah item baru
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id', // Pastikan ID kategori ada
            'name'        => 'required|string|max:255',
            'stock'       => 'required|integer|min:0',
            'price'       => 'required|numeric|min:0',
        ]);

        $item = Item::create($request->all());
        return response()->json($item, 201);
    }

    // Menampilkan satu item detail
    public function show($id)
    {
        $item = Item::with('category')->find($id);

        if (!$item) {
            return response()->json(['message' => 'Item tidak ditemukan'], 404);
        }

        return response()->json($item);
    }

    // Mengupdate data item
    public function update(Request $request, $id)
    {
        $item = Item::find($id);

        if (!$item) {
            return response()->json(['message' => 'Item tidak ditemukan'], 404);
        }

        $request->validate([
            'category_id' => 'sometimes|exists:categories,id',
            'name'        => 'sometimes|string|max:255',
            'stock'       => 'sometimes|integer|min:0',
            'price'       => 'sometimes|numeric|min:0',
        ]);

        $item->update($request->all());
        return response()->json($item);
    }

    // Menghapus item
    public function destroy($id)
    {
        $item = Item::find($id);

        if (!$item) {
            return response()->json(['message' => 'Item tidak ditemukan'], 404);
        }

        $item->delete();
        return response()->json(['message' => 'Item berhasil dihapus']);
    }
}