<?php

namespace App\Http\Controllers\member;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BorrowingItem;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $user_id = Auth::user()->id;
        $user = Member::where('user_id', $user_id)->first();
        $borrowings_active = BorrowingItem::where('user_id', $user_id)
        ->where('status', 'dipinjam')
        ->get();
        $borrowings_returned = BorrowingItem::where('user_id', $user_id)
        ->where('status', 'dikembalikan')
        ->get();
        $borrowings_pending = BorrowingItem::where('user_id', $user_id)
        ->where('status', 'menunggu')
        ->get();
        
        return view('member.profile.show', compact('user', 'borrowings_active', 'borrowings_returned', 'borrowings_pending'));
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
        //
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
    public function destroy(string $id)
    {
        //
    }

    public function edit_bg(Request $request){
        $request->validate([
            'bg_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user_id = Auth::user()->id;
        $member = Member::where('user_id', $user_id)->first();

        $member->edit([
            'bg_img' => $request->bg_img,
        ]);

        return redirect()->back();
    }
}
