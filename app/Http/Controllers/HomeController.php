<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function index()
    {

        if (count(Cart::getContent())>0) {
         return redirect('/checkout');
        }else{
           return view('home'); 
        }
        
    }
}
