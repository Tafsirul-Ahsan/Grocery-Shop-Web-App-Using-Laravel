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
     <div class="card">

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show m-5" role="alert">
  <strong>Success!</strong> {{session()->get('success')}}.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<form class="form-horizontal" action="{{url('admin/products/'.$product->id)}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PATCH')
<div class="card-body">
<h4 class="card-title">Product Update</h4>
<div class="form-group row">
    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Name</label>
    <div class="col-sm-9">
        <input type="text" value="{{$product->name}}" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter Name Here">
        @error('name')
        <span class="invalid-feedback">{{$message}}</span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Code</label>
    <div class="col-sm-9">
        <input type="text" value="{{$product->code}}" class="form-control @error('code') is-invalid @enderror" id="code" name="code"  placeholder="Enter Code Here">
        @error('code')
        <span class="invalid-feedback">{{$message}}</span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Price</label>
    <div class="col-sm-9">
        <input type="text" value="{{$product->price}}" class="form-control @error('price') is-invalid @enderror" id="price" name="price"  placeholder="Enter price Here">
        @error('price')
        <span class="invalid-feedback">{{$message}}</span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Quantity</label>
    <div class="col-sm-9">
        <input type="number" value="{{$product->qty}}" class="form-control" id="qty" name="qty" placeholder="Enter qty Here">
    </div>
</div>
<div class="form-group row">
    <label for="type" class="col-sm-3 text-right control-label col-form-label">Type</label>
    <div class="col-sm-9">
        <select class="custom-select" name="type">
          <option value="">Select type</option>
          <option {{($product->type=='New')?'selected':''}} value="New">New</option>
          <option {{($product->type=='Hot')?'selected':''}} value="Hot">Hot</option>
          <option {{($product->type=='Old')?'selected':''}} value="Old">Old</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="category" class="col-sm-3 text-right control-label col-form-label">Category</label>
    <div class="col-sm-9">
        <input type="text" value="{{$product->category}}" class="form-control" id="category" name="category" placeholder="Enter category Here">
    </div>
</div> 
 <div class="form-group row">
    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Thum Image</label>
    <div class="col-sm-9">
        <input type="file" id="disabledTextInput" name="thum_img" class="form-control">
        <img width="40" src="{{asset('/uploads/'.$product->thum_img)}}" alt="">
    </div>
</div>
   <div class="form-group row">
    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">More Image</label>
    <div class="col-sm-9">
        <input type="file" id="disabledTextInput" name="moreimg[]"  multiple class="form-control">
    </div>
</div>
 <div class="form-group row">
    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Tags</label>
    <div class="col-sm-9">
        <input  type="text" value="{{$product->tags}}" name="tags[]" data-role="tagsinput"  placeholder="Add tags" />
    </div>
</div>
<div class="form-group row">
    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Additional info</label>
    <div class="col-sm-9">
        <textarea   name="adinfo" class="form-control">{{$product->adinfo}}</textarea>
    </div>
</div>
<div class="form-group row">
    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Short Description</label>
    <div class="col-sm-9">
        <textarea  name="short_des" class="form-control">{{$product->short_des}}</textarea>
    </div>
</div>
<div class="form-group row">
    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Description</label>
    <div class="col-sm-9">
        <textarea  name="description" class="form-control">{{$product->description}}</textarea>
    </div>
</div>
</div>
<div class="border-top mt-5">
<div class="card-body">
    <button type="submit" class="btn btn-primary">Update Product</button>
</div>
</div>
</form>
</div>
</div>
</header>
</div>
</div>
</div>
</div>
</div>



@endsection


