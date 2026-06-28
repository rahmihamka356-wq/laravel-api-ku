<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Service\ItemService;
use Illuminate\Http\Request; // Tambahkan ini untuk membaca query parameter

class ItemController extends BaseController
{
    protected ItemService $svc;

    public function __construct(ItemService $svc)
    {
        $this->svc = $svc;
    }

    // Ubah method index agar menerima Request $req
    public function index(Request $req)
    {
        // Ambil query parameter category_id dari URL Postman
        $categoryId = $req->query('category_id');

        // Kirim $categoryId ke dalam service layer
        return $this->success($this->svc->all($categoryId));
    }

    public function store(StoreItemRequest $req)
    {
        $item = $this->svc->create($req->validated());
        return $this->success($item, 'Item dibuat', 201);
    }

    public function show($id)
    {
        dd($request->all());
        
        try {
            $item = $this->svc->find($id);
            return $this->success($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 404);
        }
    }

    public function update(UpdateItemRequest $req, $id)
    {
        $item = $this->svc->update($id, $req->validated());

        return $this->success($item, 'Item diperbarui');
    }

    public function destroy($id)
    {
        $this->svc->delete($id);

        return $this->success(null, 'Item dihapus', 204);
    }
}