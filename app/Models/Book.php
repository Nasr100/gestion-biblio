<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';

    protected $fillable=[
        'Book_Name',
        'Author',	
        'Isbn',	
        'Pub_Date',	
        'Edition',	
    ];
    public function categories()
    {
        return $this->belongsToMany(Category::class,'bookscategories','book_id','category_id');
    }
    function Rentals()
    {
        return $this->hasMany(Rental::class,'book_id');
    }
}
