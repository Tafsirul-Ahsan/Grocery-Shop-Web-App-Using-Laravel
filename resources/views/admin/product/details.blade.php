@extends('admin.master')

@section('homeContent')

     <div class="row">
            <div class="panel-body">
                <div class="col-md-12 w3ls-graph">

                    <!--agileinfo-grap-->
                        <div class="agileinfo-grap">
                            <div class="agileits-box">
                                <header class="agileits-box-header clearfix">
                                  <div class="card">
@if(session()->has('success'))
<div class="alert alert-success" role="alert">
                    <strong>Well done!</strong> You successfully read this! .
                </div>
@endif
	        <style> h2{text-align: center;}</style>
	    <h2 class="card-title m-b-0">Product details </h2>
	    <table class="table table-borderless">
		  <tbody>
		    <tr>
		      <th scope="row">Name</th>
		      <td>{{$product->name}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Code</th>
		      <td>{{$product->code}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Quantity</th>
		      <td>{{$product->qty}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Type</th>
		      <td>{{$product->type}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Short Description</th>
		      <td>{{$product->short_des}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Category</th>
		      <td>{{$product->category}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Tags</th>
		      <td>{{$product->tags}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Price</th>
		      <td>{{$product->price}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Thum image</th>
		      <td><img width="100" src="{{asset('/uploads/'.$product->thum_img)}}" alt=""></td>
		    </tr>
		    <tr>
			@php
			$moreimg=App\Moreimg::where('pid',$product->id)->get();	
			@endphp
		      <th scope="row">More image</th>
		      <td>
				@foreach($moreimg as $moreimg)
		      	<img width="100" src="{{asset('/uploads/moreimg/'.$moreimg->moreimg)}}" alt="">
                @endforeach
		      </td>
		    </tr>

		  </tbody>
		</table>

	 
	</div>

@endsection

