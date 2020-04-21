<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Moreimg;
use Cart;
class WelcomeController extends Controller
{
  
   public function buymore(){
          
          return view('shopitem');
    }
    
    public function index(){
          
          $products=Product::orderby('id','desc')->get();
	return view('welcome',compact('products'));
    }
    public function about(){
          
          return view('front.about');
    }
    public function details($id)
{
   $product=Product::findorfail($id);
   $moreimg=Moreimg::where('pid',$id)->get();
   return view('front.product.product-detail',compact('product','moreimg'));
}

public function cart()
{
	return view('front.cart.cart');
}

    public function addcart(Request $request)
{
 $product=Product::where('id',$request->pid)->first();

$subtotal=$request->quantity*$product->price;

 $cartItem = Cart::add($product->id, $product->name, $product->price, $request->quantity, array('subtotal'=>$subtotal,'thum_img'=>$product->thum_img,'code'=>$product->code));

 return redirect('/cart');
	
}
public function removecart($id)
{
	Cart::remove($id);
	return redirect('/cart');
}
public function payment(Request $request)
{
  
        /* PHP */
$post_data = array();
$post_data['store_id'] = "testbox";
$post_data['store_passwd'] = "qwerty";
$post_data['total_amount'] = Cart::getTotal();
$post_data['currency'] = "BDT";
$post_data['tran_id'] = "SSLCZ_TEST_".uniqid();
$post_data['success_url'] = "http://127.0.0.1:8000/payment/success";
$post_data['fail_url'] = "http://localhost/new_sslcz_gw/fail.php";
$post_data['cancel_url'] = "http://localhost/new_sslcz_gw/cancel.php";
# $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

# EMI INFO
$post_data['emi_option'] = "1";
$post_data['emi_max_inst_option'] = "9";
$post_data['emi_selected_inst'] = "9";

# CUSTOMER INFORMATION
$post_data['cus_name'] = "Test Customer";
$post_data['cus_email'] = "test@test.com";
$post_data['cus_add1'] = "Dhaka";
$post_data['cus_add2'] = "Dhaka";
$post_data['cus_city'] = "Dhaka";
$post_data['cus_state'] = "Dhaka";
$post_data['cus_postcode'] = "1000";
$post_data['cus_country'] = "Bangladesh";
$post_data['cus_phone'] = "01711111111";
$post_data['cus_fax'] = "01711111111";

# SHIPMENT INFORMATION
$post_data['ship_name'] = "Store Test";
$post_data['ship_add1 '] = "Dhaka";
$post_data['ship_add2'] = "Dhaka";
$post_data['ship_city'] = "Dhaka";
$post_data['ship_state'] = "Dhaka";
$post_data['ship_postcode'] = "1000";
$post_data['ship_country'] = "Bangladesh";

# OPTIONAL PARAMETERS
$post_data['value_a'] = "ref001";
$post_data['value_b '] = "ref002";
$post_data['value_c'] = "ref003";
$post_data['value_d'] = "ref004";

# CART PARAMETERS
$post_data['cart'] = json_encode(array(
    array("product"=>"DHK TO BRS AC A1","amount"=>"200.00"),
    array("product"=>"DHK TO BRS AC A2","amount"=>"200.00"),
    array("product"=>"DHK TO BRS AC A3","amount"=>"200.00"),
    array("product"=>"DHK TO BRS AC A4","amount"=>"200.00")
));
$post_data['product_amount'] = "100";
$post_data['vat'] = "5";
$post_data['discount_amount'] = "5";
$post_data['convenience_fee'] = "3";

# REQUEST SEND TO SSLCOMMERZ
$direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v3/api.php";

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $direct_api_url );
curl_setopt($handle, CURLOPT_TIMEOUT, 30);
curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($handle, CURLOPT_POST, 1 );
curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


$content = curl_exec($handle );

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle))) {
  curl_close( $handle);
  $sslcommerzResponse = $content;
} else {
  curl_close( $handle);
  echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
  exit;
}

# PARSE THE JSON RESPONSE
$sslcz = json_decode($sslcommerzResponse, true );

if(isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL']!="" ) {
        # THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other
        # echo "<script>window.location.href = '". $sslcz['GatewayPageURL'] ."';</script>";
  echo "<meta http-equiv='refresh' content='0;url=".$sslcz['GatewayPageURL']."'>";
  # header("Location: ". $sslcz['GatewayPageURL']);
  exit;
} else {
  echo "JSON Data parsing error!";
}

}





public function search(Request $request)
{
  $searchpro=Product::where('name','like',"%$request->search%")->orwhere('category','like',"%$request->search%")->orwhere('tags','like',"%$request->search%")->get();
  $keyword=$request->search;

  return view('front.search',compact('searchpro','keyword'));
}





}
