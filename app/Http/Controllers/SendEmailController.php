<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
class SendEmailController extends Controller
{
    function index(){
    	return view('cart');
    }
    function send(Request $request){
    	$this->validate($request,
    	[
                  'name'=> 'required',
                  'numberad'=>'required',
                  'email'=> 'required|email',
                  'landmark'=>'required',
                  'city'=>'required'
    	] );

               $data=array(
               	'name'=>$request->name,
                 'numberad '=>$request->numberad,
                 'landmark'=>$request->landmark,
                  'city'=>$request->city
               );
               Mail::to('tafsirul15-8661@diu.edu.bd')->send(new SendMail($data));
               return back()->with('success','Thank You For Contracting Us!');
    }
}
