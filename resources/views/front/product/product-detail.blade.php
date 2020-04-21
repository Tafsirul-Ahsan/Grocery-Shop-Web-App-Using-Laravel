@extends('master')
@section('homeContent')

<div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
      <div class="container">
        <ul class="w3_short">
          <li>
            <a href="index.html">Home</a>
            <i>|</i>
          </li>
          <li>Single Page</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- //page -->
  <!-- Single Page -->
  <div class="banner-bootom-w3-agileits">
    <div class="container">
      <!-- tittle heading -->
      <h3 class="tittle-w3l">Single Page
        <span class="heading-style">
          <i></i>
          <i></i>
          <i></i>
        </span>
      </h3>
      <!-- //tittle heading -->
      <div class="col-md-5 single-right-left ">
        <div class="grid images_3_of_2">
          <div class="flexslider">
            
            <ul class="slides ">
              
              <li data-thumb="images/si.jpg">
                @foreach($moreimg as $moreimgslide)
                <div class="thumb-image @if($loop->first) active @endif">
                  <img src="{{asset('uploads/moreimg/'.$moreimgslide->moreimg)}}" data-imagezoom="true" class="img-responsive" alt=""> </div>

              </li>
               @endforeach
              
            </ul>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-7 single-right-left simpleCart_shelfItem">
        <h3>{{$product->name}}</h3>
        <div class="rating1">
          <span class="starRating">
            <input id="rating5" type="radio" name="rating" value="5">
            <label for="rating5">5</label>
            <input id="rating4" type="radio" name="rating" value="4">
            <label for="rating4">4</label>
            <input id="rating3" type="radio" name="rating" value="3" checked="">
            <label for="rating3">3</label>
            <input id="rating2" type="radio" name="rating" value="2">
            <label for="rating2">2</label>
            <input id="rating1" type="radio" name="rating" value="1">
            <label for="rating1">1</label>
          </span>
        </div>
        <p>
          <span class="item_price">${{$product->price}}</span>
          <del>$1300.00</del>
          <label>Free delivery</label>
        </p>
        <div class="single-infoagile">
          <ul>
            <li>
              Cash on Delivery Eligible.
            </li>
            <li>
              Shipping Speed to Delivery.
            </li>
            <li>
              Sold and fulfilled by Supple Tek (3.6 out of 5 | 8 ratings).
            </li>
            <li>
              1 offer from
              <span class="item_price">$950.00</span>
            </li>
          </ul>
        </div>
        <div class="product-single-w3l">
          <p>
            <i class="fa fa-hand-o-right" aria-hidden="true"></i>This is a
            <label>{{$product->category}}</label> product.</p>
          <ul>
            <li>
              {{$product->description}}
            </li>
            
          </ul>
          <p>
            <i class="fa fa-refresh" aria-hidden="true"></i>
            <label>{{$product->tags}}</label>
          </p>
        </div>
        <div class="occasion-cart">
          <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
            <form action="{{url('/cart/addtocart')}}" method="post">
              @csrf
              <fieldset>
                <div class="quantity">
                <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="  fa fa-minus" aria-hidden="true"></i></span>
                 <input type="number" class="qty-text" id="qty" step="1" min="1" max="50" name="quantity" value="1">
                <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                   </div>
                <input type="hidden" name="pid" value="{{$product->id}}">
                <button type="submit" name="addtocart" class="btn btn-primary btn-lg">ADD TO CART</button>
              </fieldset>
            </form>
          </div>

        </div>

      </div>
      <div class="clearfix"> </div>
    </div>
  </div>
  <!-- //Single Page -->
  <!-- special offers -->
  <div class="featured-section" id="projects">
    <div class="container">
      <!-- tittle heading -->
      <h3 class="tittle-w3l">Add More
        <span class="heading-style">
          <i></i>
          <i></i>
          <i></i>
        </span>
      </h3>
      <!-- //tittle heading -->
      <div class="content-bottom-in">
        <ul id="flexiselDemo1">
          <li>
            <div class="w3l-specilamk">
              <div class="speioffer-agile">
                <a href="single.html">
                  <img src="{{asset('lib/images/s1.jpg')}}" alt="">
                </a>
              </div>
              <div class="product-name-w3l">
                <h4>
                  <a href="single.html">Aashirvaad, 5g</a>
                </h4>
                <div class="w3l-pricehkj">
                  <h6>$220.00</h6>
                  <p>Save $40.00</p>
                </div>
                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                  <form action="#" method="post">
                    <fieldset>
                      <input type="hidden" name="cmd" value="_cart" />
                      <input type="hidden" name="add" value="1" />
                      <input type="hidden" name="business" value=" " />
                      <input type="hidden" name="item_name" value="Aashirvaad, 5g" />
                      <input type="hidden" name="amount" value="220.00" />
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
          </li>
          <li>
            <div class="w3l-specilamk">
              <div class="speioffer-agile">
                <a href="single.html">
                  <img src="{{asset('lib/images/s4.jpg')}}" alt="">
                </a>
              </div>
              <div class="product-name-w3l">
                <h4>
                  <a href="single.html">Kissan Tomato Ketchup, 950g</a>
                </h4>
                <div class="w3l-pricehkj">
                  <h6>$99.00</h6>
                  <p>Save $20.00</p>
                </div>
                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                  <form action="#" method="post">
                    <fieldset>
                      <input type="hidden" name="cmd" value="_cart" />
                      <input type="hidden" name="add" value="1" />
                      <input type="hidden" name="business" value=" " />
                      <input type="hidden" name="item_name" value="Kissan Tomato Ketchup, 950g" />
                      <input type="hidden" name="amount" value="99.00" />
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
          </li>
          <li>
            <div class="w3l-specilamk">
              <div class="speioffer-agile">
                <a href="single.html">
                  <img src="{{asset('lib/images/s2.jpg')}}" alt="">
                </a>
              </div>
              <div class="product-name-w3l">
                <h4>
                  <a href="single.html">Madhur Pure Sugar, 1g</a>
                </h4>
                <div class="w3l-pricehkj">
                  <h6>$69.00</h6>
                  <p>Save $20.00</p>
                </div>
                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                  <form action="#" method="post">
                    <fieldset>
                      <input type="hidden" name="cmd" value="_cart" />
                      <input type="hidden" name="add" value="1" />
                      <input type="hidden" name="business" value=" " />
                      <input type="hidden" name="item_name" value="Madhur Pure Sugar, 1g" />
                      <input type="hidden" name="amount" value="69.00" />
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
          </li>
          <li>
            <div class="w3l-specilamk">
              <div class="speioffer-agile">
                <a href="single2.html">
                  <img src="{{asset('lib/images/s3.jpg')}}" alt="">
                </a>
              </div>
              <div class="product-name-w3l">
                <h4>
                  <a href="single2.html">Surf Excel Liquid, 1.02L</a>
                </h4>
                <div class="w3l-pricehkj">
                  <h6>$187.00</h6>
                  <p>Save $30.00</p>
                </div>
                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                  <form action="#" method="post">
                    <fieldset>
                      <input type="hidden" name="cmd" value="_cart" />
                      <input type="hidden" name="add" value="1" />
                      <input type="hidden" name="business" value=" " />
                      <input type="hidden" name="item_name" value="Surf Excel Liquid, 1.02L" />
                      <input type="hidden" name="amount" value="187.00" />
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
          </li>
          <li>
            <div class="w3l-specilamk">
              <div class="speioffer-agile">
                <a href="single.html">
                  <img src="{{asset('lib/images/s8.jpg')}}" alt="">
                </a>
              </div>
              <div class="product-name-w3l">
                <h4>
                  <a href="single.html">Cadbury Choclairs, 655.5g</a>
                </h4>
                <div class="w3l-pricehkj">
                  <h6>$160.00</h6>
                  <p>Save $60.00</p>
                </div>
                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                  <form action="#" method="post">
                    <fieldset>
                      <input type="hidden" name="cmd" value="_cart" />
                      <input type="hidden" name="add" value="1" />
                      <input type="hidden" name="business" value=" " />
                      <input type="hidden" name="item_name" value="Cadbury Choclairs, 655.5g" />
                      <input type="hidden" name="amount" value="160.00" />
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
          </li>
          <li>
            <div class="w3l-specilamk">
              <div class="speioffer-agile">
                <a href="single2.html">
                  <img src="{{asset('lib/images/s6.jpg')}}" alt="">
                </a>
              </div>
              <div class="product-name-w3l">
                <h4>
                  <a href="single2.html">Fair & Lovely, 80 g</a>
                </h4>
                <div class="w3l-pricehkj">
                  <h6>$121.60</h6>
                  <p>Save $30.00</p>
                </div>
                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                  <form action="#" method="post">
                    <fieldset>
                      <input type="hidden" name="cmd" value="_cart" />
                      <input type="hidden" name="add" value="1" />
                      <input type="hidden" name="business" value=" " />
                      <input type="hidden" name="item_name" value="Fair & Lovely, 80 g" />
                      <input type="hidden" name="amount" value="121.60" />
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
          </li>
          <li>
            <div class="w3l-specilamk">
              <div class="speioffer-agile">
                <a href="single.html">
                  <img src="{{asset('lib/images/s5.jpg')}}" alt="">
                </a>
              </div>
              <div class="product-name-w3l">
                <h4>
                  <a href="single.html">Sprite, 2.25L (Pack of 2)</a>
                </h4>
                <div class="w3l-pricehkj">
                  <h6>$180.00</h6>
                  <p>Save $30.00</p>
                </div>
                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                  <form action="#" method="post">
                    <fieldset>
                      <input type="hidden" name="cmd" value="_cart" />
                      <input type="hidden" name="add" value="1" />
                      <input type="hidden" name="business" value=" " />
                      <input type="hidden" name="item_name" value="Sprite, 2.25L (Pack of 2)" />
                      <input type="hidden" name="amount" value="180.00" />
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
          </li>
          <li>
            <div class="w3l-specilamk">
              <div class="speioffer-agile">
                <a href="single2.html">
                  <img src="{{asset('lib/images/s9.jpg')}}" alt="">
                </a>
              </div>
              <div class="product-name-w3l">
                <h4>
                  <a href="single2.html">Lakme Eyeconic Kajal, 0.35 g</a>
                </h4>
                <div class="w3l-pricehkj">
                  <h6>$153.00</h6>
                  <p>Save $40.00</p>
                </div>
                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                  <form action="#" method="post">
                    <fieldset>
                      <input type="hidden" name="cmd" value="_cart" />
                      <input type="hidden" name="add" value="1" />
                      <input type="hidden" name="business" value=" " />
                      <input type="hidden" name="item_name" value="Lakme Eyeconic Kajal, 0.35 g" />
                      <input type="hidden" name="amount" value="153.00" />
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
          </li>
        </ul>
      </div>
    </div>
  </div>
  @endsection