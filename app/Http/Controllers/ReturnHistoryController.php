<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\return_history;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReturnHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
    public function show(return_history $return_history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(return_history $return_history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, return_history $return_history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(return_history $return_history)
    {
        //
    }

    public function returnBook($borrowId)
{
    // ดึงข้อมูลการยืมจาก borrow_id
    $borrow = Borrow::find($borrowId);

    if ($borrow) {
        // สร้างข้อมูลใน return_history
        return_history::create([
            'borrow_id' => $borrow->borrow_id,
            'id' => $borrow->user_id,
            'book_id' => $borrow->book_id,
            'return_date' => Carbon::now(),
        ]);

        // ลบข้อมูลใน borrows
        $borrow->delete();

        return redirect()->back()->with('success', 'Book returned successfully!');
    }

    return redirect()->back()->with('error', 'Borrow record not found.');
}
}
