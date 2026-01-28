<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use Illuminate\Http\Request;

class BookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = BookCategory::all();
        return view('categories.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'deskripsi' => 'required'
        ]);

        BookCategory::create($request->all());
        return redirect()->route('categories.index')->with('success', 'Kategori buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = BookCategory::find($id);

        return redirect()->route('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = BookCategory::find($id);

        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = BookCategory::find($id);

        $request->validate([
            'name' => 'required',
            'deskripsi' => 'required'
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Kategori buku berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = BookCategory::find($id);

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Kategori buku berhasil dihapus');
    }
}
