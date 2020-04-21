<?php

namespace App\Http\Controllers;
use Auth;
use Cart;
use App\Order;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __contruct()
    {
    	$this->middleware('auth');
    }


    public function success()
    {
        
       foreach (Cart::getContent()  as $item) {

          $order=new Order();
          $order->uid=Auth::user()->id;
          $order->pid=$item->id;
          $order->quantity=$item->quantity;
          $order->subtotal=$item->attributes->subtotal;
          $order->status=0;
          $order->save();
       }

        Cart::clear();

       return 'success';

    }
}
