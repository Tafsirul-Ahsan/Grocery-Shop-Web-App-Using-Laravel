@extends('master')

@section('homeContent')
    

<div class="container mt-5">
	@if(count($searchpro) > 0)
	<h1>{{count($searchpro)}} item found in "{{$keyword}}"</h1>
	 <div class="row">
                @foreach($searchpro as $product)
                        <div class="col-md-4 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <a href="{{url('product-details-'.$product->id)}}">
                                        <img src="{{asset('uploads/'.$product->thum_img)}}"style="height: 133px" alt=""></a>
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="{{url('product-details-'.$product->id)}}" class="link-product-add-cart">Quick View</a>
                                        </div>
                                    </div>
                                    <span class="product-new-top">{{$product->type}}</span>

                                </div>
                                <div class="item-info-product ">
                                    <h4>
                                        <a href="single.html">{{$product->name}}</a>
                                    </h4>
                                    <div class="info-product-price">
                                        <span class="item_price">${{$product->price}}</span>
                                        <del>$1420.00</del>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                        <form action="#" method="post">
                                            <fieldset>
                                                <input type="hidden" name="cmd" value="_cart" />
                                                <input type="hidden" name="add" value="1" />
                                                <input type="hidden" name="business" value=" " />
                                                <input type="hidden" name="item_name" value="Cashew Nuts, 100g" />
                                                <input type="hidden" name="amount" value="200.00" />
                                                <input type="hidden" name="discount_amount" value="1.00" />
                                                <input type="hidden" name="currency_code" value="USD" />
                                                <input type="hidden" name="return" value=" " />
                                                <input type="hidden" name="cancel_return" value=" " />
                                                <input type="submit" name="submit" value="Add to cart" class="button" />
                                            </fieldset>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endforeach
              </div>
              @else
              <h1>Search result not found!</h1>
              @endif

</div>


@endsection
