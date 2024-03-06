<?php
// app/Models/Loan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = ['id','book_id', 'user_id', 'borrowed_at', 'returned_at'];

    // สร้างความสัมพันธ์กับโมเดล Book
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'book_id');
    }

    // สร้างความสัมพันธ์กับโมเดล User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
