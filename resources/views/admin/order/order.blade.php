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
     	
	    <h3>Order Details</h3>
	    <table class="table">
	          <thead>
	            <tr>
	              <th scope="col">Image</th>
	              <th scope="col">Name</th>
	              <th scope="col">Quantity</th>
	              <th scope="col">Sub Total</th>
	              <th scope="col">Customer</th>
	              <th scope="col">Date</th>
	              <th scope="col">Status</th>
	              <th scope="col">Action</th>
	            </tr>
	          </thead>
	          <tbody>
	          	@foreach($orders as $order)

	          	@php
	          		$product=App\Product::where('id',$order->pid)->first();
	          		$user=App\User::where('id',$order->uid)->first();
	          	@endphp
	            <tr>
	              <td>  
	              	<img width="120" src="{{asset('/uploads/'.$product->thum_img)}}" alt="">  </td>
	              <td>{{$product->name}}</td>
	              <td>{{$order->quantity}}</td>
	              <td>{{$order->subtotal}}</td>
	              <td>{{$user->name}}</td>
	              <td>{{date('d-m-Y',strtotime($order->created_at))}}</td>
	              <td>
	              	@if($order->status==0)
	              	<b class="text-danger fa-sm">Pending</b>
	              	@else
	              	<b class="text-success fa-sm">Completed</b>
	              	@endif
	              </td>
	              <td>
	              	<a href="{{url('admin/orders/'.$order->id)}}" class="btn btn-outline-success btn-sm rounded shadow"> <i class="fa fa-check fa-2x"></i></a>
	              	
	              	<a href="javascript:void(0)" onclick="document.getElementById('deleteform').submit()" class="btn btn-outline-danger btn-sm rounded shadow"> <i class="fa fa-trash fa-2x"></i></a>
	              	<form method="post" id="deleteform" action="{{url('admin/orders/'.$order->id)}}">
	              		@csrf
	              		@method('DELETE')
	              	</form>
	              </td>
	            </tr>
	           @endforeach
	          </tbody>
	    </table>
	</div>
</div>
</div>
</header>
</div>
</div>
</div>
</div>
</div>


@endsection

