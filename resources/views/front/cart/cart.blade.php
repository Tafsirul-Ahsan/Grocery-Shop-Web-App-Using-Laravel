
@extends('master')

@section('homeContent')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <div class="services-breadcrumb">
        <div class="agile_inner_breadcrumb">
            <div class="container">
                <ul class="w3_short">
                    <li>
                        <a href="{{url('/')}}">Home</a>
                        <i>|</i>
                    </li>
                    <li>Checkout</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- //page -->
    <!-- checkout page -->
    <div class="privacy">
        <div class="container">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">Checkout
                <span class="heading-style">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
            </h3>
            <!-- //tittle heading -->
            <div class="checkout-right">
                
                <h4>Your shopping cart contains:
                    <span>{{Cart::getContent()->count()}} Products</span>
                </h4>
                
                <div class="table-responsive">
                    <table class="timetable_sub">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Code</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Subtotal</th>
                                <th>Remove</th>
                                <th>Payment</th>
                            </tr>
                        </thead>
                       <tbody>
@foreach(Cart::getContent() as $cartitem)
    <tr>
        <td>{{$cartitem->id}}</td>
        <td>{{$cartitem->attributes->code}}</td>
      <td><img width="120" src="{{asset('uploads/'.$cartitem->attributes->thum_img)}}" alt=""></td>
       <td>{{$cartitem->quantity}}</td>
      <td>{{$cartitem->name}}</td>
       <td>{{$cartitem->attributes->subtotal}}</td>
      <td>{{$cartitem->price}}</td>
      <td><a href="{{url('cart/remove-item/'.$cartitem->id)}}">
        <button type="button" class="btn btn-danger">Remove</button></a></td>
      @if(Auth::check())
                    <td class="checkout-right-basket">
                        <h4>Name:{{Auth::user()->name}}</h4>
                        <h4>Email:{{Auth::user()->email}}</h4>
                       <form action="{{url('/payment')}}" method="post">
                          @csrf
                        <button type="submit" class="btn btn-warning btn-lg">Checkout</button>
                       </form>
                    </td>
                    @else
                    <td>
                       <button class="checkout-right-basket">
                        <a href="{{url('/login')}}" {{-- data-toggle="modal" data-target="#myModal1" --}}>
                            <span class="fa fa-unlock-alt" aria-hidden="true"></span> Sign In </a>
                  </button>
                  </td>
                    @endif
                </div>
    </tr>
@endforeach

    <tr>
      <td colspan="4"><a href="{{url('/')}}"> <button type="button" class="btn btn-success">Buy More</button></a></td>
      <td colspan="4"><style>h1{color:Green;}</style><h1>Total: ${{\Cart::getTotal()}}</h1></td>
    </tr>

  </tbody>
</table>
                </div>
            </div>
            <div class="checkout-left">
                <div class="address_form_agile">
                    <h4>Add a new Details</h4>
                    <form action="{{url('sendemail/send')}}" method="post" class="creditly-card-form agileinfo_form">
                        @csrf
                        <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                            <div class="information-wrapper">
                                <div class="first-row">
                                    <div class="controls">
                                        <input class="billing-address-name" type="text" name="name" placeholder="Full Name" required="">
                                    </div>
                                    <div class="w3_agileits_card_number_grids">
                                        <div class="w3_agileits_card_number_grid_left">
                                            <div class="controls">
                                                <input type="text" placeholder="Mobile Number" name="numberad" required="">
                                            </div>
                                        </div>
                                        <div class="w3_agileits_card_number_grid_right">
                                            <div class="controls">
                                                <input type="text" placeholder="Landmark" name="landmark" required="">
                                            </div>
                                        </div>
                                        <div class="clear"> </div>
                                    </div>
                                    <div class="controls">
                                        <input type="text" placeholder="Town/City" name="city" required="">
                                    </div>
                                    
                                </div>
                                
                              <button class="submit check_out" name="send">Send mail</button>
                              
                            </div>
                        </div>
                    </form>
                    
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
