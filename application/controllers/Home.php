   <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller { 

public function __construct() {
		// $this->session->unset();
		
		parent::__construct();
		 
	 
		$this->load->database();
			$this->load->model('Home_model');
		define('assets', base_url()."assets/");
		define('adminpath',base_url()."Home/");
    define('mailpath',base_url()."Mail/");
			define('userpath',base_url()."Userlogin/");
		define('base_url',base_url() );
	 define('uploads', base_url()."uploads/");

 

	}
    public function getCityDepartment(){ 
    // POST data 
    $postData = $this->input->post();  
    $data = $this->Home_model->getCityDepartment($postData);
    echo json_encode($data); 
  }


public function menuval()
	{ 
		// for all page
    $data['area']=$this->Home_model->selectquery('area');
    $data['city']=$this->Home_model->selectquery('city');
		$data['distinctcategory']=$this->Home_model->distinct('category');
		$data['parentcategory']=$this->Home_model->selectquery('parentcategory');
   if(isset($_SESSION['customer_id'])){
      $data['customerdetails']=$this->Home_model->selectquerywhere('customer','customer_id',$_SESSION['customer_id']);
   }
 
		$data['category']=$this->Home_model->selectquery('category');
$this->load->view('menu',$data);
			// for all page end
	}
	public function index()
	{ 

	 $this->menuval();
   $data['slider']=$this->Home_model->selectquery('slider');
   $data['slidertext']=$this->Home_model->selectquery('slidertext');
	 $data['trending']=$this->Home_model->selectquerylimitwithfield('product',10,'trending','1');
 
 
    if (count($data['trending'])>0){ 
      $start_date = $data['trending'][0]['start_date'];
        $end_date = $data['trending'][0]['end_date'];
        $start = strtotime($start_date);
        $todays_date = date("Y-m-d");
        $today = strtotime($todays_date);
        $expiration_date = strtotime($end_date);
        if($today >= $start && $today <= $expiration_date) // if todays date is > start date and < end date then execute the below script               
        {  
          $data['discounts']=1;
        }else{
          $data['discounts']=0;
        }
		foreach($data['trending'] as $datasds){ 
		 $trendingimgarray[]=$datasds['id'];     
     $data['trendingimages']=$this->Home_model->selectqueryin ('images','productid',$trendingimgarray);  
     $data['trendingid']=$this->Home_model->selectqueryin ('productvariation','productid',$trendingimgarray);
		}}
 
		 //print_r($trendingimgarray);
		$data['combo']=$this->Home_model->selectquerylimit('combocategory',10 );
		$data['popularcategories']=$this->Home_model->selectquerylimitwithfield('category',10,'popular','1');
 		$this->load->view('index',$data);
	}
public function setlocation()
{
  $location=$this->input->post('location');
  $this->session->set_userdata('location',$location); 
}

	public function cart()
	{ 
    if(isset($_SESSION['customer_id'])){
       $data['cartproducts']=$this->Home_model->selectquerywhere('cart','customer_id',$_SESSION['customer_id']);
     $this->menuval();
 
    $this->load->view('cart',$data);
     }
     else{
       $this->menuval();
 
    $this->load->view('cart');
     }
		  
	}
 public function myaccount()
  {  
    $data['areaname']=$this->Home_model->selectquery('area');
    $data['city']=$this->Home_model->selectquery('city');

    if(isset($_SESSION['customer_id'])){
       $data['customerdetails']=$this->Home_model->selectquerywhere('customer','customer_id',$_SESSION['customer_id']);
       if($data['customerdetails'][0]['area']!=''){
        $data['customer']= $data['customerdetails'];
       }
       else{
         $data['customer']=array();
       }
    $this->menuval();
    $this->load->view('myaccount',$data);
    }
  else{
      $data['errormessage']="Not Found Go To Homepage";
       $this->menuval();
     $this->load->view('error',$data);
     }
        
  }

 //  public function orderdetails()
 //    {
 //       $data['myorders']=$this->Admin_model->selectquerywhere('myorders','orderstatus','1');
 //       //print_r( $data['myorders'] );
 //        $data['customerdetails']=$this->Admin_model->selectquery('customer');
 //        $data['employeedetails']=$this->Admin_model->selectquery('employee');
 //       $this->load->view('admin/orderdetails',$data);
      
      
 // }
   public function myorders()
  {   

    if(isset($_SESSION['customer_id'])){
     
       $data['myorders']=$this->Home_model->selectquerywhere('myorders','customerid',$_SESSION['customer_id']);
 
        
    $this->menuval();
 
    $this->load->view('myorders',$data);
    }

  else{
      $data['errormessage']="Not Found Go To Homepage";
       $this->menuval();
     $this->load->view('error',$data);
     }
        
  }

  public function orderview()
    {
      $orderid = $this->uri->segment(2);
      $data['myorders']=$this->Home_model->selectquerywhere('orderproducts','orderid', $this->uri->segment(2));
      $data['orderstatus']=$this->Home_model->selectquerywhere('orderstatus','orderid',$this->uri->segment(2)); 
      $data['orderlists']=$this->db->query("SELECT status,o1.orderid as result FROM status s1 LEFT OUTER JOIN orderstatus o1 ON s1.status=o1.newstatus WHERE o1.orderid= '$orderid'
      UNION
      SELECT `status`,null as result FROM `status` WHERE `status` NOT IN (SELECT `newstatus` FROM `orderstatus` WHERE `orderid`='$orderid')");
      $data['listorder'] = $data['orderlists']->result_array();
      // echo json_encode(['data'=>$data['listorder']]);

      $data['status']=$this->Home_model->selectquery('status');
      $productid[]='';
      $comboproductid[]='';
      foreach($data['myorders'] as $datasdfd)
      {
        if($datasdfd['category']=="combo"){
           $comboproductid[]=$datasdfd['productid'];

        }
        else{ $productid[]=$datasdfd['productid'];} 
      }
       $data['comboproductvalue']=$this->Home_model->selectqueryin ('combocategory','id',$comboproductid);
       $data['productvalue']=$this->Home_model->selectqueryin ('product','id',$productid);
        $data['variantvalue']=$this->Home_model->selectqueryin ('productvariation','productid',$productid); 
    $this->menuval();
       $this->load->view('orderview',$data);
      
      
    }

      public function orderviewcombo($id)

    {
  
      $data['myorders']=$this->Home_model->selectquerywhere('combocategory','id', $id);
          
      $data['productvalue']=$this->Home_model->selectqueryin ('product','id',explode(',',$data['myorders'][0]['products']));
    $this->menuval();
       $this->load->view('orderviewcombo',$data);

    }
  public function checkout()
  { 
        $data['areaname']=$this->Home_model->selectquery('area');
        $data['allproducts']=$this->Home_model->selectquery('product');
 if(isset($_SESSION['customer_id'])  ){

$data['cartproducts']=$this->Home_model->selectquerywhere('cart','customer_id',$_SESSION['customer_id']);
//  $pointsvalue='';
// foreach($data['cartproducts'] as $cartproducsd){
//   $pointsvalue[]=$cartproducsd['productid'];
// }
// print_r($pointsvalue);
 
     if(isset($_SESSION['customer_id'])){     
       $data['customerdetails']=$this->Home_model->selectquerywhere('customer','customer_id',$_SESSION['customer_id']);     
       if($data['customerdetails'][0]['area']!=''){
        $data['customer']= $data['customerdetails'];
       }
       else{
         $data['customer']=array();
       }
    }
       
    $this->menuval();
 
    $this->load->view('checkout',$data);
     }
     else{
      $data['errormessage']="No Products In Cart";
       $this->menuval();
     $this->load->view('error',$data);
     }
  }
public function allcategory()
	{
		$this->menuval();
 		$this->load->view('allcategory');
	}

 // public function clean($string) {
 //    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
 //    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
 //    $string = strtolower($string); // Convert to lowercase
 
 //    return $string;
 //      }
 
 public function productlist( )
 { 	
 
$this->menuval();
if($this->uri->segment('2')=='trending'){
 $data['trending']=$this->Home_model-> selectquerywhere('product','trending','1');

foreach($data['trending'] as $datasds){			//echo $data['id'];
     $trendingimgarray[]=$datasds['id'];
   }
   $data['trendingimages']=$this->Home_model->selectqueryin ('images','productid',$trendingimgarray);
   $data['trendingid']=$this->Home_model->selectqueryin ('productvariation','productid',$trendingimgarray);
    $this->load->view('productlist',$data);
}
else {

  // $normalcategory = strtolower(str_replace('-', ' ',$this->uri->segment('2')));
$normalcategory =$this->uri->segment('3');

$data['singleproduct']=$this->Home_model-> selectquerywhere('category','randid', $normalcategory); 

 $data['trending']=$this->Home_model-> selectquerywhere('product','productcategory',$data['singleproduct'][0]['id']);
  
 if(count($data['trending'])>0){
   foreach($data['trending'] as $datasds){     //echo $data['id'];
     $trendingimgarray[]=$datasds['id'];
   }
   $data['trendingimages']=$this->Home_model->selectqueryin ('images','productid',$trendingimgarray);
   $data['trendingid']=$this->Home_model->selectqueryin ('productvariation','productid',$trendingimgarray);
    
   $data['joindedcategorytable']=$this->Home_model-> tablesjoins('parentcategory','category','parentcategory_id','id','id',$data['trending'][0]['productcategory']);
   $this->load->view('productlist',$data); 
 }
 else{
   $data['errormessage']="No Products Found";
    $this->load->view('error',$data); 

 }
 

}

 }

	public function singleproduct()
	{

$this->menuval();
 $landmark = $this->uri->segment('3'); 

  $data['singleproduct']=$this->Home_model-> selectquerywhere('product','randid', $landmark); 
  $data['singleproductimage']=$this->Home_model-> selectquerywhere('images','productid', $data['singleproduct'][0]['id']);
   $data['joindedcategorytable']=$this->Home_model-> tablesjoins('parentcategory','category','parentcategory_id','id','id',$data['singleproduct'][0]['productcategory']);
    $data['variantid']=$this->Home_model-> selectquerywhere('productvariation','productid', $data['singleproduct'][0]['id']);  
 	 $this->load->view('singleproduct',$data);
	}

public function comboproduct()
	{

$this->menuval();
 $landmark = $this->uri->segment('3');
  $data['singleproduct']=$this->Home_model-> selectquerywhere('combocategory','randid', $landmark);
 
 $products=explode(',',$data['singleproduct'][0]['products']) ;
 	$data['productlist']=$this->Home_model->selectqueryin ('product','id',$products); $this->load->view('comboproduct',$data);
	}
 
 
 
 function add()
 {
  
 
if(!empty($this->input->post('customer_id'))){
 

 $insertquery = array(
   "productid"  => $this->input->post('product_id'),
   "name"  => $this->input->post('product_name'),
   "qty"  => $this->input->post('quantity'),
   "price"  => $this->input->post('product_price'),
    "image"  => $this->input->post('imagename'), 
    "customer_id"  => $this->input->post('customer_id'), 
    "variantid"=>$this->input->post('variantid'),
    "quantity"=>$this->input->post('quantitys'),  
  );
 $this->db->where('productid', $insertquery['productid']);
 $this->db->where('customer_id', $insertquery['customer_id']); 
 $result = $this->db->get('cart')->result_array(); 
  if($this->input->post('variableproduct')==2){ 
  $variant=false;
  foreach ($result  as $key => $variantvalue) {
    if($variantvalue['variantid']==$this->input->post('variantid'))
  {
    $variant=true;  
       $updatequery = array( 
   "qty"  => ($this->input->post('quantity') + $variantvalue['qty'])  
  );
$this->Home_model->updatequery('id',$variantvalue['id'],'cart',$updatequery);
 echo $this->view(); 
  }

  }
 
  if(!$variant)
  {
  $this->Home_model->insertquery('cart',$insertquery) ;
 echo $this->view();
  } 
 

 }

 else{
   if(count($result)>0){
$updatequery = array( 
   "qty"  => ($this->input->post('quantity') + $result[0]['qty'])  
  );
$this->Home_model->updatequery('id',$result[0]['id'],'cart',$updatequery);
echo $this->view();
 }
 else{
 $this->Home_model->insertquery('cart',$insertquery) ;
 echo $this->view();
 }
 }


 
}

else{

  if($this->input->post('variableproduct')==2){
    $data = array(
   "id"  => $this->input->post('product_id'),
	"quakd" => $this->input->post('product_id').$this->input->post('product_name'),
   "name"  => $this->input->post('product_name'),
   "qty"  => $this->input->post('quantity'),
   "quantitys"  => $this->input->post('quantitys'),
   "price"  => $this->input->post('product_price'),
   "image"  => $this->input->post('imagename'),
  "variantid"=>$this->input->post('variantid')
  );}
  else{
  $data = array(
   "id"  => $this->input->post('product_id'),
   "name"  => $this->input->post('product_name'),
   "qty"  => $this->input->post('quantity'),
   "quantitys"  => $this->input->post('quantitys'),
   "price"  => $this->input->post('product_price'),
   "image"  => $this->input->post('imagename'),
   "variantid"=>"0"

  );

  }
 
	 
 
$this->cart->insert($data) ; 
echo $this->view();
 
}
 

 

 }
 
 function load()
 {

  echo $this->view();
 }

  function remove()
 {
  $row_id = $_POST["row_id"];
  if(isset($_SESSION['customer_id']))
  {
        
    $this->Home_model->deletequery('id', $row_id,'cart');
    echo $this->view();
  }
    else
    {
    
      $data = array(
         'rowid'  => $row_id,
         'qty'  => 0
        );
       $this->cart->update($data);
       echo $this->view();

    }
   
  
 }


  function addquantity()
 {

  $row_id = $_POST["row_id"];
 $qty = $_POST["qty"];
  if(isset($_SESSION['customer_id']))
  {   $insertquery=array(         
            'qty' =>  $qty);
    $this->Home_model->updatequery('id', $row_id,'cart',$insertquery); 
     echo $this->view();
  }
    else
    {

    
      $data = array(
         'rowid'  => $row_id,
         'qty'  => $qty
        );
       $this->cart->update($data);
       echo $this->view();

    }
   
  
 }

 function clear()
 {
   
  $this->cart->destroy();
  echo $this->view();
 }

  function view()
 {

 
 if( isset($_SESSION['customer_id'])){
 
 $this->db->where('customer_id',$_SESSION['customer_id']); 
 $result = $this->db->get('cart')->result_array();
 
 $output = '';
 
  $count = 0;
  $subtotal=0;
  foreach( $result as $items)
  {
   $count++;
   $subtotal=$subtotal+($items["qty"] * $items["price"]);
   $output .= '
    <div class="carddiv" style="    box-shadow: 0 2px 5px 0 rgba(0,0,0,.16),0 2px 10px 0 rgba(0,0,0,.12)!important;
    border-radius: 8px;"> 
    <div class="cart_listdiv mb-2">
    <i id="'.$items["id"].'" class="fa fa-close   remove_inventory float-right"></i>

      <div class="row  "> 
  <div class="col-3 col-lg-2  align-self-center ">
 <img src="'.base_url().'uploads/'.$items["image"].'" alt="'.$items["name"].'">
  </div>
    <div class="col-9  col-lg-10 align-self-center  ">
    <h6 style="color:#7f1416;" class="m-0">'.$items["name"].' - '.$items["quantity"].'</h6>
    <div class="row mt-4 ">

<div class="col-8 col-lg-9  text-right p-0"><p class="addcart increase_butotns  m-0">
             <i style="background-color: green;
             color: white;" class="fa fa-minus minus add_cart_minus  script_cartadd"  id="cart'.$items["id"].'" aria-hidden="true"></i>
          
            <input readonly type="number" class="quantity text-center" name="productstock" value="'.$items["qty"].'">
            <i style="background-color: green;
            color: white;" class="fa fa-plus add add_cart_add script_cartadd  " id="cart'.$items["id"].'" aria-hidden="true"></i> 
            X   '.$items["price"].'</p>  </div>
<div class="col-4 col-lg-3  "><small><b class="float-right"><i class="fa fa-eur mr-1"></i>'.number_format($items["qty"] * $items["price"], 2, '.', '').'</b></small>  </div>
  
    </div>
            <p class="addcart my-2 m-0">  
     </p>
         </div>
    </div> 

     
 
    </div>

    </div>
   ';
   
  }
  $output .= '<div class="subtotal p-3 ">
        <div class="row">
          <div class="col-4 align-self-center">
               <a type="button" href="'.base_url().'cart" class="btn totocart">Proceed To Cart</a>

          </div>
          <div class="col-4 col-md-5 align-self-center">
            <p class="m-0 text-right">Subtotal : </p>

          </div>
          <div class="col-4 col-md-3 align-self-center">
            <p class="m-0"><i class="fa fa-eur mr-2"></i><b class="totalamount"> '
        .number_format($subtotal, 2, '.', '').'</b></p>
          </div>
        </div>
       
     </div> '
 ;
 }
 
  else {
 
 
 $output = '';

  $count = 0;
  foreach( $this->cart->contents()as $items)
  {
   $count++;
   $output .= '
    <div class="carddiv"> 
    <div class="cart_listdiv mb-2">
    <i id="'.$items["rowid"].'" class="fa fa-close   remove_inventory float-right"></i>

      <div class="row  "> 
  <div class="col-3 col-lg-2  align-self-center ">
 <img src="'.base_url().'uploads/'.$items["image"].'" alt="'.$items["name"].'">
  </div>
    <div class="col-9  col-lg-10 align-self-center  ">
    <h6   class="m-0">'.$items["name"].' - '.$items["quantitys"].'</h6>
    <div class="row mt-4 ">
<div class="col-8 col-lg-9  p-0 text-right"><p class="addcart increase_butotns  m-0">
          <i class="fa fa-minus minus  script_cartadd"  id="cart'.$items["rowid"].'" aria-hidden="true"></i>
           
            <input readonly type="number" class="quantity text-center" name="productstock" value="'.$items["qty"].'" style="border-radius: 8px!important;">
            <i class="fa fa-plus add script_cartadd  " id="cart'.$items["rowid"].'" aria-hidden="true"></i> 
            X   '.$items["price"].' </p>  </div>
<div class="col-4 col-lg-3  "><small><b class="float-right"><i class="fa fa-eur mr-1"></i>'.number_format( $items["subtotal"], 2, '.', '').'</b></small>  </div>
  
    </div>
            <p class="addcart my-2 m-0" >  
     </p>
         </div>
     
 

    </div> 

     
 
    </div>

    </div>
   ';
   
  }
  $output .= '<div class="subtotal p-3 ">
        <div class="row">
          <div class="col-4 align-self-center">
             <a type="button" href="'.base_url().'cart" class="btn totocart">Proceed To Cart</a>

          </div>
          <div class="col-4 col-md-5 align-self-center">
            <p class="m-0 text-right" style="color:#7f1416;">Subtotal : </p>

          </div>
          <div class="col-4 col-md-3 align-self-center">
            <p class="m-0"><i class="fa fa-eur mr-2"></i><b class="totalamount"> '
        .number_format( $this->cart->total(), 2, '.', '').'</b></p>
          </div>
        </div>
       
     </div> '
 ;
 }
 

 

  if($count == 0)
  {
   $output = '<h5 align="center" class="p-3">Cart is Empty <a    href="'.base_url().'" class=" text-primary float-right  ">Continue Shopping</a></h5> ';
  }
  return $output;
 }

 public function addaddress(){
   $address = array(         
            'h_addressline1' =>  $this->input->post('address1') ,
            'h_addressline2' =>  $this->input->post('address2') ,
            'area' =>  $this->input->post('area') ,
            'h_city' =>  $this->input->post('city') ,            
        );
   $this->Home_model->updatequery('customer_id',$this->input->post('customerid'),'customer',$address);

 }

//DISCOUNT
// function discount(){
//   $data['product'] = $this->Home_model->selectquerywhere('product', 'id', $this->input->post('id'));
//   if(isset($data['product'][0]&&$data['product'][0]['disprice'])){
//     $startDate = $data['product'][0]['start_date'];
//     $endDate = $data['product'][0]['end_date'];
//     $start = strtotime($start_date);
//     $todays_date = date("Y-m-d");
//     $today = strtotime($todays_date);
//     $expiration_date = strtotime($end_date);
//     if($today >= $start && $today <= $expiration_date) // if todays date is > start date and < end date then execute the below script               
//     {
//       $data['status']= 1;
//     }else if($today > $expiration_date){
//       $data['status']= 0;
//     }else{

//     }
//   }

// }

 //Apply coupon
function couponApply(){
  
   $data['coupon']=$this->Home_model->selectquerywhere('coupon','coupon_code',$this->input->post('coupon'));
   if(isset($_SESSION['customer_id'])){
    $data['customerdetails']=$this->Home_model->selectquerywhere('customer','customer_id',$_SESSION['customer_id']);
 }
   if(isset($data['coupon'][0])&&$data['coupon'][0]['status']==1){  
        //Single User
        $start_date = $data['coupon'][0]['starts_at'];
        $end_date = $data['coupon'][0]['expires_at'];
        $start = strtotime($start_date);
        $todays_date = date("Y-m-d");
        $today = strtotime($todays_date);
        $expiration_date = strtotime($end_date);
        if($today >= $start && $today <= $expiration_date) // if todays date is > start date and < end date then execute the below script               
        {  
        if($data['coupon'][0]['uses']==1){
          $address = array(         
            'status' =>'0',     
         );
         $this->Home_model->updatequery('coupon_code',$this->input->post('coupon'),'coupon',$address);
         $data['status']=1;
          echo json_encode(['status'=>$data['status'],'data'=>$data['coupon'][0]]);
        }else{
          $data['status']=2;
          echo json_encode(['status'=>$data['status'],'data'=>$data['coupon'][0]]);
        } 
      
        }else if ($today > $expiration_date){
          $errCoupon = "Coupon Code has expired!";
          $address = array(         
            'status' =>'0',     
         );
         $this->Home_model->updatequery('coupon_code',$this->input->post('coupon'),'coupon',$address);
          $data['status']=3;
          echo json_encode(['status'=>$data['status'],'data'=>$errCoupon]);

         }

   
   }else{
    $data['status']="Out Of Stockerewr";
    echo json_encode($data['status']);
   }
  
 }

//  public function coupon(){
//   $data['couponcode']=$this->Home_model->selectquery('coupon');

//   $this->load->view('coupon',$data);

//  }
 public function ordersuccess(){
  $data['errormessage']="Order Confirmed.<br>Our Executive Will contact soon ";
  $this->menuval();
  $this->load->view('ordersuccess',$data);
 }

 public function ordersubmit(){
 
//  if($this->input->post('reminderpoints') || $this->input->post('reminderpoints')==0){ 
//    $updaquery = array('points' => $this->input->post('reminderpoints') ) ;
//     $this->Home_model->updatequery('customer_id',$this->input->post('cusid'),'customer',$updaquery);
//     } 
if(isset($_POST['submitbutton'])){ 

    if($this->input->post('coupon_code')){
      $coupon=1;
    }else{
      $coupon=0;
    }
    // Generate the order ID
    $currentYear = date("y"); // Last 2 digits of the year
    $currentMonth = date("m"); // Month with leading zero
    $randomNumber = sprintf("%04d", rand(0, 9999)); // Generate a 4-digit random number
    $orderID = $currentYear . $currentMonth . $randomNumber;


    $insertquery = array(
       'orderid' => $orderID, // Set the random order ID
        'customerid' => $this->input->post('cusid'),
        'totalamount' => $this->input->post('totalamount'),
        'orderstatus' => "1", 
       'discount_amount' => $this->input->post('discount_amount'),
       'coupon_availed' =>$coupon,
        'payment' => $this->input->post('banking')=='2'? '2' : '1'
      );
      print_r($insertquery); 
      $data['insertid']=$this->Home_model->insertquery('myorders',$insertquery);
      $data['cartitems']=$this->Home_model->selectquerywhere('cart','customer_id',$this->input->post('cusid'));
 //echo "<pre>";print_r($data['cartitems']);  echo "</pre>";
 

 //upload 
 if($this->input->post('banking')==2 ){
    $config['upload_path']          = './uploads/receipts/';
    $config['allowed_types']        = 'jpg|png|jpeg';
    $config['encrypt_name']=true;  
    $this->load->library('upload', $config);
    // $this->load->library('image_lib');
  if (!$this->upload->do_upload('receipt')) {
    $error = array('error' => $this->upload->display_errors());
    print_r( $error);
  }else{
    $user_image= $this->upload->data(); 
     $insertquery2 = array(
      'orderid' => $data['insertid'],
   'image' =>$user_image['file_name'],
   'path' =>'receipts', );          
  $this->Home_model->insertquery('orderrecipt',$insertquery2);
  }
  }

 foreach($data['cartitems'] as $cartsf){

  //echo substr($cartsf['image'], 0, 5);
 if(substr($cartsf['image'], 0, 5)=="combo"){
     $insertquery11 = array(
      'orderid' => $data['insertid'],
      'productid' =>$cartsf['productid'],
       'quantity' => $cartsf['qty'],
       'category' =>"combo",
    );
 }
 else{
       $insertquery11 = array(
      'orderid' => $data['insertid'],
      'productid' =>$cartsf['productid'],
       'quantity' => $cartsf['qty'],
       'category' =>"product",
        'variantid' =>$cartsf['variantid']
       );
 }
 
 $data['cartitems']=$this->Home_model->insertquery('orderproducts', $insertquery11 );

 }

 $this->Home_model->deletequery('customer_id',$insertquery['customerid'],'cart');
 
 redirect(base_url().'ordersuccess');
 }
 }
public function searchresult()
    {
      $this->menuval();
        $query = $this->input->post('searchbars');
        $this->db->like('productname', $query);
        $data['trending'] = $this->db->get("product")->result_array();  

  if(  count( $data['trending']) >0 ){
    $data['searchvalue']=$this->input->post('searchbars');
      foreach($data['trending'] as $datasds){       
      $trendingimgarray[]=$datasds['id'];
    }
    $data['trendingimages']=$this->Home_model->selectqueryin ('images','productid',$trendingimgarray);
    $data['trendingid']=$this->Home_model->selectqueryin ('productvariation','productid',$trendingimgarray);

 
    $this->load->view('searchresult',$data);
  }

  else{

     $data['errormessage']="No Products Found";
     $this->load->view('error',$data);
  }
 


 
    }

    public function category_search_name(){
    $search_name=$this->input->post("search_name"); // first get search character
    $data=$this->Home_model->GetCatSearchName($search_name); // SearchModel is the model class name
    $view = '';
    foreach ($data as $sval) {
        $view = $view .'<li onclick="addText(\''.$sval['productname'].'\')">'.$sval['productname'].'</li>';
    }
    echo $view;
}

 public function contact(){
  $this->menuval();
   $this->load->view('contact');
}
public function privacy(){
  $this->menuval();
   $this->load->view('privacy');
}
 public function forgotpassword(){
 
  if($this->uri->segment(3)){
     $this->menuval();
   $this->load->view('forgotpassword');

  }
  else{
    redirect(base_url);
  }
  
}
 public function forgotpasswordsubmit()
 {

  if(isset(  $_POST['resetpasswordset'])){
   $this->menuval();
 
  $this->load->helper(array('form', 'url'));

                $this->load->library('form_validation');

                $this->form_validation->set_rules('password', 'password', 'required');
                $this->form_validation->set_rules('resetpassword', 'resetpassword', 'required|matches[password]');
                if ($this->form_validation->run() == FALSE)
                {  
                           $this->load->view('forgotpassword');
                }
                else
                { 
 
           $insertquery = array('password' => md5($this->input->post('password')) ) ;
      
      $this->Home_model->updatequery('customer_id',$this->input->post('hiddenval'),'customer',$insertquery);
       $this->session->set_flashdata('emailexist','Password Changed Successfully');
        redirect(base_url);
                }

              }

              else{
                redirect(base_url);

              }
 

 
 }

 
	public function logout(){
    $valurs=array('customer_id','customer_username');
    $this->session->unset_userdata($valurs);  
  redirect(base_url());
}
 public function razorpay(){
  $data = [ 
    'user_id' => '1',
    'payment_id' =>$this->input->post('razorpay_payment_id'),
    'amount' => $this->input->post('totalAmount'),
    'product_id' => $this->input->post('product_id'),
   ];

// you can write your database insertation code here
// after successfully insert transaction in database, pass the response accordingly
$arr = array('msg' => 'Payment successfully credited', 'status' => true);  

echo json_encode($arr);
 }  
}