<?php

namespace App\Http\Controllers;

use App\Product;
use App\Moreimg;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $products=Product::orderby('id','desc')->get();
       return view('admin.product.product',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.product.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      // request()->validate([
      //    'name'=>'required|string|max:191',
      //    'code'=>'required|string',
      //    'price'=>'required|string|max:191' ,
      //    'quantity'=>'required|string|max:191',
      //    'thum_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
         
      // ]); 

        $image_file=$request->file('thum_img');
        $image_file_name=time().$image_file->getClientOriginalName();
        $image_file->move(public_path('./uploads/'), $image_file_name);


       $save=new Product(); 
       $save->name=$request->name;
       $save->code=$request->code;
       $save->type=$request->type;
       $save->category=$request->category;
       $save->price=$request->price;
       $save->qty=$request->qty;
       $save->thum_img=$image_file_name;
       $save->tags=implode(",",$request->tags);
       $save->adinfo=$request->adinfo;
       $save->short_des=$request->short_des;
       $save->description=$request->description;
       $save->save();


       

       if ($request->hasFile('moreimg')) {
        
        foreach ($request->file('moreimg') as $moreimg_file) {

        $moreimg_name=time().$moreimg_file->getClientOriginalName();
        $moreimg_file->move(public_path('./uploads/moreimg/'), $moreimg_name);
          $moreimg=new Moreimg();
          $moreimg->pid=$save->id;
          $moreimg->moreimg=$moreimg_name;
          $moreimg->save();
        }
       }

       return back()->with('success','This info save successfully');

    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.details',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

       return view('admin.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
     

        $save=Product::find($product->id);   

        if ($request->hasFile('thum_img')) {
        unlink(public_path('./uploads/'.$save->thum_img)); 
        $image_file=$request->file('thum_img');
        $image_file_name=time().$image_file->getClientOriginalName();
        $image_file->move(public_path('./uploads/'), $image_file_name);
        }
       


    
       $save->name=$request->name;
       $save->code=$request->code;
       $save->type=$request->type;
       $save->category=$request->category;
       $save->price=$request->price;
       $save->qty=$request->qty;

if ($request->hasFile('thum_img')) {

       $save->thum_img=$image_file_name;

}

       $save->tags=implode(",",$request->tags);
       $save->adinfo=$request->adinfo;
       $save->short_des=$request->short_des;
       $save->description=$request->description;
       $save->save();

       if ($request->hasFile('moreimg')) {
        
        foreach ($request->file('moreimg') as $moreimg_file) {
        $moreimg= Moreimg::where('pid',$product->id);
        unlink(public_path('./uploads/moreimg/'.$moreimg->moreimg));
        $moreimg_name=time().$moreimg_file->getClientOriginalName();
        $moreimg_file->move(public_path('./uploads/moreimg/'), $moreimg_name);
          
          $moreimg->pid=$save->id;
          $moreimg->moreimg=$moreimg_name;
          $moreimg->save();
        }
       }

       return back()->with('success','This info updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
       
     unlink(public_path('./uploads/'.$product->thum_img)); 

      $moreimg=Moreimg::where('pid',$product->id)->get();
      foreach ($moreimg as $moreimg) {
        unlink(public_path('./uploads/moreimg/'.$moreimg->moreimg));
        $moreimg->delete();
      }

    $product->delete();

   return back()->with('success','This info deleted successfully');

    }
}
