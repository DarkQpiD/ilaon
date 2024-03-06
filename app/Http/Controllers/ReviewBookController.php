<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\review_book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewBookController extends Controller
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
            $request->validate([
                'review_text' => 'required|string',
            ]);
    
            $book_id = $request->route('book_id');
            $loggedInUser = auth()->user();
    
            // สร้างและบันทึกรีวิว
            review_book::create([
                'id' => $loggedInUser->id,
                'book_id' => $book_id,
                'review_text' => $request->input('review_text'),
            ]);
    
            //$review->save();
    
            return redirect()->back()->with('success', 'Review submitted successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(book $book)
    {
        // ใช้ฟังก์ชัน 'book' เพื่อดึงข้อมูลของหนังสือที่เกี่ยวข้อง
        $reviews = $book->review_books;

        return view('book/Detail_book', compact('book', $reviews));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(review_book $review_book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, review_book $review_book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(review_book $review_book)
    {
        //
    }
}
