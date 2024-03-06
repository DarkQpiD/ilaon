<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, $book_id)
    {
        $existingLoan = Loan::where('user_id', Auth::id())
            ->where('book_id', $book_id)
            ->whereNull('returned_at')
            ->first();

        if ($existingLoan) {
            return redirect()->back()->with('error', 'This book is already borrowed!');
        } else {
            Loan::create([
                'user_id' => Auth::id(),
                'book_id' => $book_id,
                'borrowed_at' => now(),
            ]);

            return redirect()->back()->with('success', 'Book added to cart successfully!');
        }
    }

    public function viewCart()
    {
        $loanItems = Loan::where('user_id', Auth::id())
            ->whereNull('returned_at')
            ->with('book')
            ->get();

        return view('cart', compact('loanItems'));
    }

    public function confirmBorrow($loan_id)
    {
        // ดำเนินการยืนยันการยืม และอื่น ๆ
        $loan = Loan::find($loan_id);
        
        // เพิ่มเงื่อนไขเพื่อตรวจสอบว่าหนังสือถูกยืมไปแล้วหรือไม่
        if ($loan && !$loan->returned_at) {
            // ทำการยืนยันการยืม
            // ตัวที่แสดงในหน้าจอคลาสจะหายไป
            // ...
    
            // เพิ่มข้อมูลลงใน borrows table
            Borrow::create([
                'user_id' => $loan->user_id,
                'book_id' => $loan->book_id,
                'borrow_date' => $loan->borrowed_at,
                'due_date' => $loan->due_date,  // ต้องแก้ไขให้ตรงกับข้อมูลที่ต้องการ
            ]);
    
            // หลังจากเพิ่มข้อมูลใน borrows table แล้ว คุณสามารถลบข้อมูลใน Loan table ได้
            $loan->delete();
    
            return redirect()->back()->with('success', 'ยืนยันการยืมสำเร็จ!');
        }
    
        return redirect()->back()->with('error', 'ไม่สามารถยืนยันการยืมได้!');
    }
    
    
    public function cancelBorrow($loan_id)
    {
        // ดำเนินการยกเลิกการยืม และอื่น ๆ
        $loan = Loan::find($loan_id);
    
        // เพิ่มเงื่อนไขเพื่อตรวจสอบว่าหนังสือถูกยืมไปแล้วหรือไม่
        if ($loan && !$loan->returned_at) {
            // นำหนังสือเล่มนั้นออกจากฐานข้อมูล Loan
            $loan->delete();
    
            return redirect()->back()->with('success', 'ยกเลิกการยืมสำเร็จ!');
        }
    
        return redirect()->back()->with('error', 'ไม่สามารถยกเลิกการยืมได้!');
    // สร้างฟังก์ชันอื่น ๆ ตามที่คุณต้องการ
}
}