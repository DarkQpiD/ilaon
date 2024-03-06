<?php

namespace App\Http\Controllers;


use App\Models\borrow;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(borrow $borrow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(borrow $borrow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, borrow $borrow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(borrow $borrow)
    {
        //
    }

    public function returnBook(Borrow $borrow)
{
    // สร้างข้อมูลใน return_history
    return_history::create([
        'user_id' => $borrow->user_id,
        'book_id' => $borrow->book_id,
        'returned_at' => now(),
    ]);

    // ลบข้อมูลใน borrows
    $borrow->delete();

    return redirect()->back()->with('success', 'Book returned successfully!');
}
}
