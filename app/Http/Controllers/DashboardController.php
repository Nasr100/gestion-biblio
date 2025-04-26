<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Staff;
use App\Models\Member;
use App\Models\Rental;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    function getBoardView(){
        return view('pages.Dashboard.board');
    }
    function getNumbers(){
        $booksNumber=Book::selectRaw('count(id) as books')->value('books');
        $catNumber=Category::selectRaw('count(id) as cats')->value('cats');
        $membersNumber=Member::selectRaw('count(id) as members')->value('members');
        $staffNumber=Staff::selectRaw('count(id) as staff')->value('staff');

     $data=[
        [
            "name"=>'BOOKS',
            "number"=>$booksNumber,
        ],
        [
            "name"=>'CATEGORIES',
            "number"=>$catNumber,
        ],
        [
            "name"=>'STAFF',
            "number"=>$staffNumber,
        ],
        [
            "name"=>'MEMBERS',
            "number"=>$membersNumber,
        ],
        
    ];
        return response()->json($data);
    }

    function getMrentedMembers(){
       
        $mRentedmembers=Rental::select(DB::raw('COUNT(book_id) as book_count'),'F_Name','members.id')
        ->join('members', 'members.id', '=', 'rental.member_id')
        ->groupBy('members.id','F_Name')
        ->orderBy('book_count','DESC')->take(5)->get();
        return view('pages.Dashboard.mostRentedMember',compact('mRentedmembers'))->render();
    }
    function getMrentedBooks(){
       
        $mRentedbooks=Rental::select(DB::raw('COUNT(book_id) as book_count'),'Book_Name','books.id')
        ->join('books', 'books.id', '=', 'rental.book_id')
        ->groupBy('books.id','Book_Name')
        ->orderBy('book_count','DESC')->take(5)->get();
        return view('pages.Dashboard.mostRentedBook',compact('mRentedbooks'))->render();
    }
}
