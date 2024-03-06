<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class return_history extends Model
{
    use HasFactory;

    protected $fillable = ['borrow_id','id' ,'book_id', 'return_date'];


    public function book(): BelongsTo
    {
        return $this->belongsTo(book::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
