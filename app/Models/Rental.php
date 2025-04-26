<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rental extends Model
{
    use HasFactory;
    protected $table = 'rental';
    protected $fillable = [
        'Rent_Date',
        'Return_Date',
        'Actual_Return_Date',
        'book_id',
        'member_id',	
        'isReturned'
    ];

    function book()
    {
        return $this->belongsTo(Book::class,'book_id');
    }
    function member()
    {
        return $this->belongsTo(Member::class,'member_id');
    }

}
