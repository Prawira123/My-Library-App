<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Models\BorrowingItem;
use Illuminate\Support\Facades\Auth;

class BorrowingItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::user();

        if(session('role') == 'admin'){
            $borrowing_items = BorrowingItem::all();
        }else{
            $borrowing_items = BorrowingItem::where('user_id', $user->id)->get();
        }

        return redirect()->route('borrowings.index', compact('borrowing_items'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Book $book)
    {
        return view('member.borrowing.create', compact('book'));
    } 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Book $book)
    {
        $request->validate([
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'qty' => 'required|integer|min:1',
        ]);

        $user = Auth::user();
        $kode = now().'-'.$user->id;

        if($request->action == 'borrow'){
            $this->addToCart($user->id, [
                'book_id' => $book->id,
                'qty' => $request->qty,
                'tanggal_pinjam' => $request->tanggal_pinjam,
                'tanggal_kembali' => $request->tanggal_kembali
            ]);

            return redirect()->route('carts.index')->with('success', 'Buku berhasil ditambahkan ke keranjang');
        }

        BorrowingItem::create([
            'book_id' => $book->id,
            'user_id' => $user->id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali_rencana' => $request->tanggal_kembali,
            'tanggal_kembali_aktual' => null,
            'qty' => $request->qty,
            'status' => 'menunggu',
            'denda' => null,
            'kode_peminjaman' => $kode,
        ]);

        $this->penguranganStok($book->id, $request->qty);

        return redirect()->route('home')->with('success', 'Buku berhasil dipinjam');    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, $book_id)
    {

        $user = Auth::user();

        $book = Book::find($book_id);

        $borrowing = BorrowingItem::find($id)
        ->where('user_id', $user->id)
        ->first();

        return redirect()->route('borrowings.show', compact('borrowing'));
    }

    public function edit(string $id, $book_id)
    {   
        
        $user = Auth::user();

        $book = Book::find($book_id);

        $borrowing = BorrowingItem::find($id)
        ->where('user_id', $user->id)
        ->first();

        return view('borrowings.edit', compact('borrowing'));
    }

    public function update(Request $request, string $id)
    {
        $borrowing = BorrowingItem::find($id);

        $request->validate([
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'qty' => 'required|integer|min:1',
        ]);

        $user = Auth::user();

        $kode = now().'-'.$user->id;

        $book = Book::find($borrowing->book_id);

        $this->pengembalianStock($book->id, $borrowing->qty);

        $borrowing->update([
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali_rencana' => $request->tanggal_kembali,
            'tanggal_kembali_aktual' => null,
            'qty' => $request->qty,
            'status' => 'menunggu',
            'denda' => null,
            'kode_peminjaman' => $kode,
        ]);

        $this->penguranganStok($book->id, $request->qty);

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

    private function penguranganStok($book_id, $stok_masuk){
        $book = Book::find($book_id);

        $book->stok -= $stok_masuk;
        $book->save();

        return $book->stok;
    }

    private function pengembalianStock($book_id, $qty){
        $book = Book::find($book_id);

        $book->stok += $qty;
        $book->save();

        return $book->stok;
    }

    private function addToCart($user_id, $data = []){
        $cart = Cart::create([
            'user_id' => $user_id,
        ]);

        foreach($data as $item){
            CartItem::create([
                'cart_id' => $cart->id,
                'book_id' => $item['book_id'],
                'qty' => $item['qty'],
                'tanggal_pinjam' => $item['tanggal_pinjam'],
                'tanggal_kembali' => $item['tanggal_kembali'],
            ]);
        }
    }
}
