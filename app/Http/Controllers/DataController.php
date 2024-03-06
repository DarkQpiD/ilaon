<?php

// app/Http/Controllers/DataController.php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function create()
    {
        return view('adddata.create');
    }

    public function storeBook(Request $request)
    {
        // Validate form data
        $validatedData = $request->validate([
            'book_id' => 'required|max:15',
            'book_title' => 'required|max:255',
            'author' => 'required|max:255',
        ]);

        // Create a new book
        Book::create($validatedData);

        // Redirect back to the create page with a success message
        return redirect()->route('data.create')->with('success', 'Book added successfully!');
    }

    public function storeUser(Request $request)
    {
        // Validate form data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        // Create a new user
        User::create($validatedData);

        // Redirect back to the create page with a success message
        return redirect()->route('data.create')->with('success', 'User added successfully!');
    }
}

