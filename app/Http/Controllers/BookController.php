<?php

namespace App\Http\Controllers;
use App\Models\Loan;
use App\Models\book;
use Illuminate\Http\Request;
use Inertia\Inertia;    

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = book::all();
        //Inertia::share('books', $books);
        return view('book/show_book', [ // นำมาแสดงหน้า product
            'books' => $books]);
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
    public function show(book $book)
    {
       // $book = Book::findOrFail($book_id);
       $bookId = $book->book_id;
        return view('book.Detail_book', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(book $book)
    {
        //
    }
}
