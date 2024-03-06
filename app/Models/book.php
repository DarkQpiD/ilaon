<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class book extends Model
{
    use HasFactory;

    protected $primaryKey = 'book_id';


    protected $fillable = [
        'book_id',
        'book_title',
        'author',
        'genre',
        'image_path',
        'book_status',
    ];

    public function borrow(): HasMany
    {
        return $this->hasMany(borrow::class);
    }

    public function loan(): HasMany
    {
        return $this->hasMany(loan::class);
    }

    public function review_book(): HasMany
    {
        return $this->hasMany(review_book::class);
    }

}
