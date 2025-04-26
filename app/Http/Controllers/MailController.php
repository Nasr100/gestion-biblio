<?php

namespace App\Http\Controllers;

use App\Mail\memberMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    function index(Request $request){
        // dd($request->memberName,$request->email);
        // dd();
    //    $mailer=new memberMail($request->memberName);
    //    dd($mailer);
            Mail::to($request->email)->send(new memberMail($request->memberName) );
            return response()->json([
                'status'=>'success'
            ]);
        
       
    }
    

}
