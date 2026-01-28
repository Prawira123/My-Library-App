<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validat([
            'title' => 'required|max:255',
            'penulis' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'rating' => 'number|required|min:1|max:5',
            'tahun_terbit' => 'required|date',
            'kategori_id' => 'required|exists:book_categories,id',
            'deskripsi' => 'required',
            'stok' => 'required|integer|min:0',
            'status' => 'required|in:aktif,tidak aktif',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);

        return redirect()->route('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::find($id);

        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::find($id);

        $request->validate([
            'title' => 'required|max:255',
            'penulis' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'rating' => 'number|required|min:1|max:5',
            'tahun_terbit' => 'required|date',
            'kategori_id' => 'required|exists:book_categories,id',
            'deskripsi' => 'required',
            'stok' => 'required|integer|min:0',
            'status' => 'required|in:aktif,tidak aktif',
            'cover' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus');
    }
}
