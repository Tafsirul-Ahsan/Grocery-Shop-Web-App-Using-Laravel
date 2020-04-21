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

<form class="form-horizontal" action="{{url('admin/products')}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="card-body">
    <style>h2{text-align: center;}</style>
<h2 class="card-title">Product Create</h2>
<br>
<div class="form-group row">
    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Name</label>
    <div class="col-sm-9">
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter Name Here">
        @error('name')
        <span class="invalid-feedback">{{$message}}</span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Code</label>
    <div class="col-sm-9">
        <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code"  placeholder="Enter Code Here">
        @error('code')
        <span class="invalid-feedback">{{$message}}</span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Price</label>
    <div class="col-sm-9">
        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price"  placeholder="Enter price Here">
        @error('price')
        <span class="invalid-feedback">{{$message}}</span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Quantity</label>
    <div class="col-sm-9">
        <input type="number" class="form-control" id="qty" name="qty" placeholder="Enter qty Here">
    </div>
</div>
<div class="form-group row">
    <label for="type" class="col-sm-3 text-right control-label col-form-label">Type</label>
    <div class="col-sm-9">
        <select class="custom-select" name="type">
		  <option selected value="">Select type</option>
		  <option value="New">New</option>
		  <option value="Hot">Hot</option>
		  <option value="Old">Old</option>
		</select>
    </div>
</div>
<div class="form-group row">
    <label for="category" class="col-sm-3 text-right control-label col-form-label">Category</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="category" name="category" placeholder="Enter category Here">
    </div>
</div> 
 <div class="form-group row">
    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Thum Image</label>
    <div class="col-sm-9">
        <input type="file" id="disabledTextInput" name="thum_img" class="form-control">
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
        <input  type="text" value="" name="tags[]" data-role="tagsinput"  placeholder="Add tags" />
    </div>
</div>
<div class="form-group row">
    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Additional info</label>
    <div class="col-sm-9">
        <textarea   name="adinfo" class="form-control"></textarea>
    </div>
</div>
<div class="form-group row">
    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Short Description</label>
    <div class="col-sm-9">
        <textarea  name="short_des" class="form-control"></textarea>
    </div>
</div>
<div class="form-group row">
    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Description</label>
    <div class="col-sm-9">
        <textarea id="editor" name="description" class="form-control"></textarea>
    </div>
</div>
</div>
<div class="border-top mt-5">
<div class="card-body">
    <button type="submit" class="btn btn-primary">Save Product</button>
</div>
</div>
</form>
</div>


@endsection


@section('libcss')
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/quill/dist/quill.snow.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/dist/css/tags.css')}}">
@endsection

@section('libjs')
<script src="{{asset('admin/assets/libs/quill/dist/quill.min.js')}}"></script>
<script src="{{asset('admin/dist/js/tags.js')}}"></script>

<script>
var quill = new Quill('#editor', {
theme: 'snow'
});

</script>


@endsection
