<?php
namespace App\Service;
use App\Models\Item;
use Illuminate\Database\Eloquent\Collection;
class ItemService
{
public function all($categoryId = null)
{
    // Jika ada categoryId, lakukan filter. Jika tidak, ambil semua data.
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
        return Item::create($data);
    }
    public function update(int $id, array $data): Item
    {
        $item = Item::findOrFail($id);
        $item->update($data);
        return $item;
    }
    public function delete(int $id): void
    {
        Item::destroy($id);
    }
}