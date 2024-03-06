<?php

// app/Http/Controllers/LoanController.php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Loan;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class LoanController extends Controller
{
    public function borrow(Request $request, $book_id = null)
    {
        if ($book_id) {
            // ตรวจสอบว่าหนังสือสามารถยืมได้
            $book = Book::findOrFail($book_id);

            // ดำเนินการยืม, และอื่น ๆ...
            
            // สร้างข้อมูลการยืม
            $loan = Loan::create([
                'book_id' => $book_id,
                'user_id' => $request->user()->id,
                'borrowed_at' => now(),
            ]);

            // อัปเดตสถานะหนังสือ
            $book->update(['book_status' => 'ถูกยืม']);

            // ดึงข้อมูลหนังสือที่ถูกยืม
            $borrowedBooks = Loan::where('user_id', $request->user()->id)->with('book')->get();

            return view('borrow', compact('borrowedBooks'));
        }

        return redirect()->route('loan.emptyBorrow');
    }
    public function up()
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->bigIncrements('borrow_id');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('book_id', 15)->notNullable();
            $table->foreign('book_id')->references('book_id')->on('books');

            $table->date('borrow_date')->notNullable();
            $table->date('due_date')->notnullable();
            
            $table->timestamps();
        });
    }

    public function return($loan_id)
    {
        // ตรวจสอบและดำเนินการคืนหนังสือ
        // ดำเนินการคืน, อัปเดตสถานะหนังสือ, และอื่น ๆ...

        $loan = Loan::find($loan_id);
        
        // อัปเดตข้อมูลเวลาคืนในฐานข้อมูล
        $loan->update(['returned_at' => now()]);

        // อัปเดตสถานะหนังสือ
        $book = Book::find($loan->book_id);
        $book->update(['book_status' => 'พร้อมให้ยืม']);

        return redirect()->back()->with('success', 'คืนหนังสือสำเร็จ!');
    }
    public function emptyBorrow()
    {
        return view('borrow_empty');
    }
    
}
