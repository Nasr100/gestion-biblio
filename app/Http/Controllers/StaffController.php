<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    function getStaffView(){
        $staffs=Staff::latest()->paginate(7);
        return view('pages.staff.staff',compact('staffs'));
    }

    function storeStaff(Request $request){
        $request->validate([
        'fullname'=>'required',
        'email'=>'required',
        'phonenumber'=>'required',
        'birthdate'=>'required',
        ]);

        $path='imgs/';
        $image=$request->img;
        $imageName=$request->img->getClientOriginalName();
        $image->move($path,$imageName);
        
        $staff=new Staff;
        $staff->Full_Name=$request->fullname;
        $staff->Birth_Date=$request->birthdate;
        $staff->Email=$request->email;
        $staff->password=Hash::make($request->password);
        $staff->Image=$path.$imageName;
        $staff->Phone_Number=$request->phonenumber;
        $staff->save();

        return response()->json([
            'status'=>'success',
        ]);
    
    }

    function deleteStaff(Request $request){
        Staff::find($request->up_id)->delete();
        return response()->json([
            'status'=>'success',
        ]);
    }

    function updateStaff(Request $request){
        $request->validate([
            'fullname'=>'required',
            'email'=>'required',
            'phonenumber'=>'required',
            'birthdate'=>'required',
            ]);
        
            $staff=Staff::find($request->id);
            if ($request->hasFile('img')) {
                $path='imgs/';
                $image=$request->img;
                $imageName=$request->img->getClientOriginalName();
                $image->move($path,$imageName);
                $staff->Image=$path.$imageName;
            }
            if($request->has('password')){
                $staff->password=Hash::make($request->password);
            }
                $staff->Full_Name=$request->fullname;
                $staff->Birth_Date=$request->birthdate;
                $staff->email=$request->email;
                $staff->Phone_Number=$request->phonenumber;
                $staff->save();
                
                return response()->json([
                'status'=>'success',
            ]);
    }

    function searchStaff(Request $request){
        if($request->searchString==null){
            $staffs=Staff::latest()->paginate(7);
        return view('pages.staff.searchPage',compact('staffs'))->render();
        }
        $staffs=Staff::where('Full_Name','like','%'.$request->searchString.'%')
        ->orWhere('role','like','%'.$request->searchString.'%')
        ->orWhere('id','like','%'.$request->searchString.'%')
        ->orWhere('Phone_Number','like','%'.$request->searchString.'%')
        ->orderBy('id','desc')->paginate(7);

        if($staffs->count() >=1){
            return view('pages.staff.searchPage',compact('staffs'))->render();
        }else{
            return response()->json([
                'status'=>'nothing found'
            ]);
        }
    }

    function pagination(Request $request){
        $staffs=Staff::latest()->paginate(7);
        return view('pages.staff.searchPage',compact('staffs'))->render();
    }
}
