<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('perpustakaan.index', compact('books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_buku' => 'required|unique:books',
            'judul' => 'required',
            'kategori' => 'required',
            'penulis' => 'required',
            'stok' => 'required|integer',
        ]);

        Book::create($request->all());

        return redirect()->back()->with('success', 'Buku berhasil ditambahkan!');
    }
}