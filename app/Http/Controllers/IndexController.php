<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(){
        $books = Book::with('category')
        ->where('rating', '>=', 4.0)
        ->where('status', 'aktif')
        ->orderBy('rating', 'desc')
        ->paginate(3);

        return view('guest.index', compact('books', ));
    }

    public function book_section(){
        $categories = BookCategory::all();
        $books = Book::where('status', 'aktif')
        ->orderBy('rating', 'desc')
        ->get();

        return view('guest.books', compact('books', 'categories'));
    }

    public function about_us(){
        return view('guest.about');    
    }
    public function contact_us(){
        return view('guest.contact');    
    }
    public function detail_book($id){
        $book = Book::with('category')->find($id);

        $relatedBooks = Book::where('kategori_id', $book->kategori_id)
        ->where('id', '!=', $book->id)
        ->limit(4)
        ->get();

        return view('guest.detail_book', compact('book', 'relatedBooks'));    
    }
}
