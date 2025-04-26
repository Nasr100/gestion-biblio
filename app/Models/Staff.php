<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
   protected  $table = "staff" ;
   protected $fillable=[
        'Image',
        'Full_Name',
        'Role',
        'email',
        'Phone_Number',
        'Birth_Date',
        'password'
   ];
}
