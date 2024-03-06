<?php

// app/Models/Borrow.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;


    protected $primaryKey = 'borrow_id';

    protected $fillable = ['borrow_id' ,'user_id', 'book_id', 'borrow_date', 'due_date'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'book_id');
    }
    protected $dates = [
        'borrow_date', 'due_date',
    ];

    public $timestamps = false;
}

