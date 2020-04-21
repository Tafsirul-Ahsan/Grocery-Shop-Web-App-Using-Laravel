<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;


class OrderController extends Controller
{

  public function index()
  {
  	$orders=Order::orderby('id','desc')->get();
  	return view('admin.order.order',compact('orders'));
  }


public function confirm($id)
{
	$order=Order::where('id',$id)->first();
	$order->status=1;
	$order->save();
	
	return back();
}
   
}
