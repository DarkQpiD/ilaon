<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['book_id', 'user_id', 'returned_at'];
    
    protected $dates = ['returned_at'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
