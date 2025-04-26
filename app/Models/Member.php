<?php

namespace App\Models;

use App\Models\Rental;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;
    protected $fillable=[
        'F_Name',
        'Birth_Date',
        'Address',
        'Phone_Number',	
        'Image',	
        'Email'
    ];

    function Rentals()
    {
        return $this->hasMany(Rental::class,'member_id');
    }
}
