<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'Category_Name'
    ];
    public function books()
    {
        return $this->belongsToMany(Book::class,'bookscategories','category_id','book_id');
    }
}
