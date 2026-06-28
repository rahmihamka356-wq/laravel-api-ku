<?php
namespace App\Service;
use App\Models\Item;
use Illuminate\Support\Facades\Log;
class ItemService
{
    public function all($categoryId = null)
    {
        // Jika ada categoryId, Lakukan filter. Jika tidak, ambil semua data.
        return \App\Models\Item::when($categoryId, function ($query) use ($categoryId) {
            return $query->where('category_id', $categoryId);
        })->get();
    }
    public function find(int $id): Item
    {
        return Item::with('category')->findOrFail($id);
    }
    public function create(array $data): Item
    {
        Log::info('Membuat item baru', ['data' => $data]);
        return Item::create($data);
    }
    public function update(int $id, array $data): Item
    {
        Log::info("Mengupdate item ID: {$id}", ['data' => $data]);
        $item = Item::findOrFail($id);
        $item->update($data);
        return $item;
    }
    public function delete(int $id): void
    {
        Log::info("Menghapus item ID: {$id}");
        Item::destroy($id);
    }
}