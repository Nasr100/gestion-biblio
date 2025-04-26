<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RentalController extends Controller
{
    function getRentalsView(){
        $rentals=Rental::with('book','member')->paginate(7);

        return view('pages.rentals.rentals',compact('rentals')); 
    }

    function storerental(Request $request){
        
     
        $request->validate([
            'memberName'=>'required',
            'bookTitle'=>'required'
        ]);
        $book_id=Book::where('Book_Name',$request->bookTitle)->value('id');
        $member_id=Member::where('F_Name',$request->memberName)->value('id');
        $rental=new Rental;
        $rental->book_id=$book_id;
        $rental->member_id = $member_id;
        $rental->Rent_Date=date("Y-m-d");
        $rental->Return_Date =date("Y-m-d",strtotime("+7 days"));
        $rental->save();
        return response()->json([
            'status'=>'success',
        ]);
        // dd($rental->Rent_Date);

      
    }
    function memberSearch(Request $request){
        $data=Member::where('F_Name', 'like', '%'.$request->searchString.'%')->get();
        $output="";
        foreach($data as $row){
            $output .='
            <li><a class="dropdown-item membersearchli" href="#">'.$row->F_Name.'</a></li>
            '; 
        }
        echo $output;
     }


    function bookSearch(Request $request){
        $data=Book::where('Book_Name', 'like', '%'.$request->searchString.'%')->get();
        $output="";
        foreach($data as $row){
            $output .='
            <li><a class="dropdown-item booksearchli " href="#">'.$row->Book_Name.'</a></li>
            '; 
        }
        echo $output;
     }

     function rentalUpdate(Request $request){
        $request->validate([
            'memberName'=>'required',
            'bookTitle'=>'required',
            'returnDate'=>'required|date',
            'rentaDate'=>'required|date'
        ]);
       
        $member_id=Member::where('F_Name',$request->memberName)->value('id');
        $book_id=Book::where('Book_Name',$request->bookTitle)->value('id');

        $rental=Rental::find($request->id);
        $rental->Rent_Date=$request->rentaDate;
        $rental->Return_Date=$request->returnDate;
        $rental->member_id =$member_id;
        $rental->book_id =$book_id;
        if($request->has('actualReturnDate')){
            $rental->Actual_Return_Date =$request->actualReturnDate;
            $rental->isReturned =1;
        }
        $rental->save();

        return response()->json([
            'status'=>'success',
        ]);
     }

     function rentalSearch(Request $request){
        if($request->searchString==null){
            $rentals=Rental::select('rental.id','rental.Rent_Date','rental.Return_Date','rental.Actual_Return_Date','books.Book_Name','members.F_Name')
            ->join('books','books.id','=','rental.book_id')
            ->join('members','members.id','=','rental.member_id')->paginate(7);
            
            return view('pages.rentals.searchPage',compact('rentals'))->render(); 
        }

        $rentals=Rental::select('rental.id','rental.Rent_Date','rental.Return_Date','rental.Actual_Return_Date','books.Book_Name','members.F_Name')
        ->join('books','books.id','=','rental.book_id')
        ->join('members','members.id','=','rental.member_id')
        -> where('Book_Name','like','%'.$request->searchString.'%')
        ->orWhere('F_Name','like','%'.$request->searchString.'%')->paginate(7);
        // dd($rentals);
        
        
   
        if($rentals->count() >= 1){
            return view('pages.rentals.searchPage',compact('rentals'))->render(); 
        }
        else{
            return response()->json([
                'status'=>'nothing found'
            ]);
        }
    }

    function pagination(Request $request){
        $rentals=Rental::select('rental.id','rental.Rent_Date','rental.Return_Date','rental.Actual_Return_Date','books.Book_Name','members.F_Name')
        ->join('books','books.id','=','rental.book_id')
        ->join('members','members.id','=','rental.member_id')->paginate(7);

        return view('pages.rentals.searchPage',compact('rentals'))->render(); 
    }

    function rentalDelete(Request $request){
        Rental::find($request->id)->delete();
        return response()->json([
            'status'=>'success'
        ]);
    }
}
