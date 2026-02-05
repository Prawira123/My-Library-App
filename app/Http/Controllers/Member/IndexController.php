<?php

namespace App\Http\Controllers\Member;

use App\Models\Book;
use App\Models\User;
use App\Models\BookCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
        $books = Book::with('category')
        ->where('rating', '>=', 4.0)
        ->where('status', 'aktif')
        ->orderBy('rating', 'desc')
        ->paginate(3);

        return view('member.index', compact('books'));
    }

    public function book_section(){
        $categories = BookCategory::all();
        $books = Book::where('status', 'aktif')
        ->orderBy('rating', 'desc')
        ->get();

        return view('member.books', compact('books', 'categories'));
    }

    public function about_us(){
        return view('member.about');    
    }
    public function contact_us(){
        return view('member.contact');    
    }
    public function detail_book($id){
        $book = Book::with('category')->find($id);

        $relatedBooks = Book::where('kategori_id', $book->kategori_id)
        ->where('id', '!=', $book->id)
        ->limit(4)
        ->get();

        return view('member.detail_book', compact('book', 'relatedBooks'));    
    }
}
