<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $archive = Archive::where('user_id', $id)->get();

        return view('archives.index', compact('archive'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $book_id = $request->book_id;

        Archive::create([
            'book_id' => $book_id,
            'user_id' => $user_id,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        $book_id = $request->book_id;

        $archive = Archive::find($id)->where('user_id', Auth::user()->id)
        ->where('book_id', $book_id)
        ->first();
        
        $archive->delete();

        return redirect()->back();
    }
}
