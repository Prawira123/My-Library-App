<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\BorrowingItem;

class BorrowingItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(session(role) == 'admin'){
            $borrowing_items = BorrowingItem::all();
        }else{
            $borrowing_items = BorrowingItem::where('user_id', auth()->user()->id)->get();
        }

        return redirect()->route('borrowings.index', compact('borrowing_items'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($book_id)
    {
        $book = Book::find($book_id);

        return view('borrowings.create', compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'qty' => 'required|number|min:1',
        ]);

        $kode = now().'-'.auth()->user()->id;

        BorrowingItem::create([
            'book_id' => $request->book_id,
            'user_id' => auth()->user()->id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali_rencana' => $request->tanggal_kembali,
            'tanggal_kembali_aktual' => null,
            'qty' => $request->qty,
            'status' => 'menunggu',
            'denda' => null,
            'kode_peminjaman' => $kode,
        ]);

        return redirect()->route('borrowings.index')->with('success', 'Buku berhasil dipinjam');    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, $book_id)
    {
        $book = Book::find($book_id);
        $borrowing = BorrowingItem::find($id);

        return redirect()->route('borrowings.show', compact('borrowing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, $book_id)
    {   
        $book = Book::find($book_id);
        $borrowing = BorrowingItem::find($id);

        return view('borrowings.edit', compact('borrowing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $borrowing = BorrowingItem::find($id);

        $request->validate([
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'qty' => 'required|number|min:1',
        ]);

        $kode = now().'-'.auth()->user()->id;

        $borrowing->update([
            'book_id' => $request->book_id,
            'user_id' => auth()->user()->id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali_rencana' => $request->tanggal_kembali,
            'tanggal_kembali_aktual' => null,
            'qty' => $request->qty,
            'status' => 'menunggu',
            'denda' => null,
            'kode_peminjaman' => $kode,
        ]);

        return redirect()->route('borrowings.index')->with('success', 'Buku berhasil dipinjam');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $borowing = BorrowingItem::find($id);

        $borowing->delete();

        return redirect()->route('borrowings.index')->with('success', 'Buku berhasil dikembalikan');
    }
}
