<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Model\User;
use App\Models\Borrow;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;
    
            if ($usertype == 'user') {
                return view('dashboard');
            } elseif ($usertype == 'admin') {
                return view('admin.index');
            } else {
                return redirect()->back();
            }
        }
    }

    public function dashboard()
    {
        $borrowedBooks = Borrow::all(); // ดึงข้อมูลที่มาจาก Borrow
        $books = Book::all(); // ดึงข้อมูลหนังสือ

        return view('admin2.dashboard', compact('borrowedBooks', 'books'));
    }
    public function addBook(Request $request)
{
    // ทำการ validate ข้อมูลจากฟอร์ม (สามารถปรับแต่งตามความต้องการ)
    $validatedData = $request->validate([
        'book_id' => 'required|int',
        'book_title' => 'required|string',
        'author' => 'required|string',
        'genre' => 'string|nullable',
        'image_path' => 'string|nullable',
        // เพิ่ม validation สำหรับ field อื่น ๆ ตามต้องการ
    ]);

    // สร้างข้อมูลใหม่ใน Model Book
    $book = new Book();
    $book->fill($validatedData);
    
    // บันทึกข้อมูลลงในฐานข้อมูล
    $book->save();

    // ส่งข้อความหลังจากบันทึก
    return redirect()->route('admin.dashboard')->with('success', 'Book added successfully.');
}
public function return()
{
    $borrowedBooks = Borrow::all(); // ดึงข้อมูลที่มาจาก Borrow
    $books = Book::all(); // ดึงข้อมูลหนังสือ

    return view('admin2.return_book', compact('borrowedBooks', 'books'));
}   
}
