<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $books = Book::with('category')
        ->where('rating', '>=', 4.0)
        ->where('status', 'aktif')
        ->orderBy('rating', 'desc')
        ->paginate(3);

        return view('index', compact('books'));
    }

    public function book_section(){
        $categories = BookCategory::all();
        $books = Book::where('status', 'aktif')
        ->orderBy('rating', 'desc')
        ->get();

        return view('books', compact('books', 'categories'));
    }

    public function about_us(){
        return view('about');    
    }
    public function contact_us(){
        return view('contact');    
    }
}
