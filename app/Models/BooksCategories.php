<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BooksCategories extends Model
{
    use HasFactory;
    protected $table = 'bookscategories';
    protected $fillable = [
        'book_id',
        'category_id'
    ];
}
