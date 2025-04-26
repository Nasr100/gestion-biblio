<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Rental;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    function getMembersView(){
        $members=Member::latest()->paginate(7);
        return view('pages.members.members',compact('members'));
    }

    function storeMember(Request $request){
            $request->validate([
            'fullname'=>'required',
            'birthdate'=>'date',
            'address'=>'required',
            'email'=>'required|email',
            'phonenumber'=>'required|min:10|max:10',
            'img'=>'required',
        ]);
    $path='imgs/';
    $image=$request->img;
    $imageName=$request->img->getClientOriginalName();
    $image->move($path,$imageName);

    $member=new Member;
    $member->F_Name=$request->fullname;
    $member->Birth_Date=$request->birthdate;
    $member->Address=$request->address;
    $member->Email=$request->email;
    $member->Image=$path.$imageName;
    $member->Phone_Number=$request->phonenumber;
    $member->save();

    return response()->json([
        'status'=>'success',
    ]);
}

    function deleteMember(Request $request){
        Member::find($request->up_id)->delete();
        return response()->json([
            'status'=>'success',
        ]);

    }
    function updateMember(Request $request){
        // dd($request);
        $request->validate([
            'fullname'=>'required',
            'birthdate'=>'date',
            'address'=>'required',
            'email'=>'required|email',
            'phonenumber'=>'required|min:10|max:10',
            // // 'img'=>'required',
        ]
    );
    $member=Member::find($request->id);
    if ($request->hasFile('img')) {
        $path='imgs/';
        $image=$request->up_img;
        $imageName=$request->up_img->getClientOriginalName();
        $image->move($path,$imageName);
        $member->Image=$path.$imageName;

    }
        $member->F_Name=$request->fullname;
        $member->Birth_Date=$request->birthdate;
        $member->Address=$request->address;
        $member->Email=$request->email;
        $member->Phone_Number=$request->phonenumber;
        $member->save();
        
        return response()->json([
        'status'=>'success',
    ]);
    }
    
    function searchMember(Request $request){
        if($request->searchString==null){
            $members=Member::latest()->paginate(7);
        return view('pages.members.searchPage',compact('members'))->render();
        }
        $members=Member::where('F_Name','like','%'.$request->searchString.'%')
        ->orWhere('Email','like','%'.$request->searchString.'%')
        ->orWhere('id','like','%'.$request->searchString.'%')
        ->orWhere('Phone_Number','like','%'.$request->searchString.'%')
        ->orderBy('id','desc')->paginate(7);

        if($members->count() >=1){
            return view('pages.members.searchPage',compact('members'))->render();
        }else{
            return response()->json([
                'status'=>'nothing found'
            ]);
        }
    }
    function pagination(){
        $members=Member::latest()->paginate(7);
        return view('pages.members.searchPage',compact('members'))->render();
    }

    function bookStatus(Request $request){
        $bookStatus=Rental::with("book")->where('member_id','=',$request->Vid)->get();
        // dd($bookStatus);
        // $bookStatus=Rentals::with('')->find();
        return view('pages.members.bookStatus',compact('bookStatus'))->render();

    }
}
   

