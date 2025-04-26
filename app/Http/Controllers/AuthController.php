<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    function getLoginView(){
        return view('pages.login.login');
    }

    function auth(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $staff=Staff::where('email','=',$request->email)->first();
        if($staff){
            if($staff->count()>=1){
                if (Hash::check($request->password, $staff->password)) {
                    session()->put('loginId', $staff->id);
                    session()->put('staffImg', $staff->Image);
                    session()->put('staffName', $staff->Full_Name);
                    session()->put('role', $staff->Role);
    
                    return redirect()->route('member.view');
                }else{
                    return back()->with('fail','Password not match!');
                }
            }
        }
        else{
            return back()->with('fail','This email is not register.');

        }
    }
    
    function logOut(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            Session::pull('staffImg');
            Session::pull('staffName');
            Session::pull('role');
            return redirect()->route('auth.view');
        }
    }
}
