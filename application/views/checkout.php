    <?php include 'header.php'?>  
  
 <style>.checkout .remove_inventory,.checkout .totocart {display:none}</style>
<section class="checkout cart py-3">
<div class="container">
    <h3>Order Summary</h3>
       
      <div class="row">
  <!--  <pre> <?php  echo count($customer);     print_r($_SESSION );  print_r($customer ); ?></pre>   -->  
 <div class="col-sm-9">

 <div class="address p-2 mb-2 " style="background:#fff">
 

    <div class="p-2"   >
   

   <div class="addresshow" style="display:<?php echo $val=(count($customer) >0) ?"block":"none";  ?>">
       <h6> Delivery Address <a class="pull-right edit_address" href="javascript:void(0)">Edit</a> </h6>
     <?php  foreach($customer as $custom){?>
 
      <p><?php echo $custom['fname'];?></p>
 <p><?php echo $custom['h_addressline1'];?></p>
  <p><?php echo $custom['h_addressline2'];?></p>
   <p><?php echo $custom['area'];?>,<?php echo $custom['h_city'];?></p>
    
     <?php  }?>
        </div> 
     <div class="addresshowedit" style="display:<?php echo $val=(count($customer) <=0) ?"block":"none";  ?>">
         <h6> Delivery Address   </h6>
     <form id="addressadd" method="post"   >
  <input type="hidden" name="customerid" value="<?php echo $_SESSION['customer_id'];?>">
    <label><small>Address Line 1</small></label>
    <input type="text" name="address1" class="form-control" >
    <div class="clearfix"></div>
     <label><small>Address Line 2</small></label>
    <input type="text" name="address2" class="form-control" >
        <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-6">   <label><small>Area</small></label>
   <select class="form-control text-capitalize" name="area"   >
     <option value="" >Select Option</option>
    <?php foreach($areaname as $areas){ ?>
 <option value="<?php echo  $areas['name']; ?>" ><?php echo  $areas['name']; ?></option>

   <?php } ?>
 
   </select></div>
      <div class="col-md-6"><label><small>City</small></label>
   <select class="form-control" name="city" >
     <option value="Pondicherry" >Pondicherry</option>
    <option value="Cuddalore">Cuddalore</option>
     
   </select>

 </div>
</div>
<div class="text-center">
   <button type="submit" class="btn btn-secondary m-3 w-50" >Save</button>
 </div>
 </form>
 </div>
    </div>

    
  </div>
 
            <style>.cart_listdiv{background  :var(--white);padding: 10px;}
          .cart_listdiv img{ width: 50px;}</style>
 
 <!--    <pre>  <?php print_r($allproducts);?>  </pre> 
    <pre>  <?php print_r($cartproducts);?>  </pre>-->
  <?php $subtotal1=0;$discountvalue=0;    foreach( $cartproducts as $items)
  {  $subtotal1=$subtotal1+($items["qty"]*$items["price"]); 

   ?>
  <div class="cart_listdiv mb-2">
    

      <div class="row"> 
  <div class="col-2   align-self-center">
 <img src="<?php echo base_url(); ?>uploads/<?php echo $items['image'] ?>" alt="<?php echo $items['name'] ?> ">
  </div>
    <div class="col-10 col-lg-4   align-self-center">
            <h6 class="m-0"><?php echo $items['name'];
				if($items['variantid']!=0){
					echo " ( ".$items['quantity']." )";
				}
				?></h6> </div>

     
  <div class="col-8 col-lg-4  align-self-center text-right">
    <p class="addcart my-2 m-0"> <span><?php echo $items['qty'] ?> x <?php echo $items['price'] ?></span>  
  <small> </small>   </p>      
 <?php foreach ($allproducts as $key => $allprod) { 


    if( $allprod['id'] == $items['productid']){    if($allprod['disprice']!=''){ ?> 
      <p class="addcart my-2 m-0 text-success"  >    <span><!-- <s class="text-muted mx-2"  ><i class="fa fa-inr"></i> <?php echo $allprod['price'] ;?>   </s>   <?php echo $allprod['disprice'];?>  <i class="fa fa-inr"></i>  --> </span>

 <small>You Save <i class="fa fa-inr"></i><?php $varamount=$allprod['price']-$allprod['disprice'] ; 

     echo $varamount * $items['qty'] ;

$discountvalue=$discountvalue+($varamount * $items['qty']); 

     ?> </small>        </p>  
   
  <?php }

} 

} ?>

    </div>
<div class="col-4 col-lg-2   align-self-center text-right">
   <i class="fa fa-inr mr-2"></i><span><?php echo number_format($items['qty']*$items['price'], 2, '.', '');  ?></span>

    </div>

    </div> 

     
 
    </div>   
    <?php } ?> 
    <?php echo form_open_multipart(adminpath."ordersubmit"); ?>
    <div class="payment">
    <p  style="color:var(--primarycolor);"> <i class="fa fa-money" aria-hidden="true"></i> <b style="color:red">Payment Option *</b></p>
    <div class="form-check"> 
    <input class="form-check-input cash" type="radio"  value="1" name="cash"  id="flexRadioDefault2" >
    <label class="form-check-label" for="flexRadioDefault2">
    Cash On Delivery
    </label>
    </div>   
  <div class="form-check"> 
  <input class="form-check-input pay" type="radio"  value="2" name="cash"  id="flexRadioDefault" >
  <label class="form-check-label" for="flexRadioDefault">
  Bank Transfer
  </label>
</div> 
 
  </div>
    <div class="banktransfer" >
    <div class="form-check ">
      <label class="form-check-label">
      <input type="file"  name="receipt"    accept=".png,.jpg,.jpeg,.gif" class="form-control"  >
      <p class="text-danger"><small>Please Upload Bank Transfer Receipt</small></p>  
     </label>
    </div>
    <h4>Bank Details</h4>
    <p>Ac Name :<b>Canapathy Shopping</b></p>
    <p>Bank Name: <b>DBS </b></p>
    <p>Bank Account No:<b> 0709029248  </b>(France Euros Payment Only)</p>
    </div>
   </div>

  </div>
  <h6 style="margin-top:20px">Apply Coupon</h6>

  <div class ="row mt-3">
      <div class="col-md-3">
               <div class="form-group">
                 <input type="text" class="form-control coupon" placeholder="Enter the Coupon Code">
               </div>
               </div>
               <div  class="col-md-3">
               <button type="submit"  class="btn primary_button coupon_submit" >Apply</button>
               </div>
     
</div>

  <div class="row mt-2">
     
  <div class="col-md-9">
<h6>Payment Details</h6>
  <div class="cart_listdiv  mb-2 p-2" style="background:#fff">
  <div class=" my-2 text-success">
    <small>You Saved   <b  class="float-right"><i class="fa fa-inr mr-2"></i><span  ><?php echo number_format($discountvalue, 2, '.', ''); ?> </span></b></small> 
  </div>
  <div  >
   Total Amount 
     <b class="float-right"><i class="fa fa-inr mr-2"></i><span class="count_total"><?php echo number_format($subtotal1, 2, '.', ''); ?> </span></b> 
    
    <div class="coupondiv">
    Discount Amount 
     <b class="float-right"><i class="fa fa-inr mr-2"></i><span class="coupon_total"></span></b><br/> 
     Grand Total 
     <b class="float-right"><i class="fa fa-inr mr-2"></i><span class="grand_total"></span></b> 
    </div>
</div>
     
     <input type="hidden" name="totalamount" id="totalamount" value="<?php echo number_format($subtotal1, 2, '.', '');?>">

      <input type="hidden" name="reminderpoints" value="">
      <input type="hidden" name="coupon_code" id="coupon_code" value="">
      <input type="hidden" id="orderid" value="">
      <input type="hidden" id="payid" value="">
      <input type="hidden" name="banking" value="">
       <input type="hidden" id="sigid" value="">
       <input type="hidden" name="discount_amount" id="discount_amount" value="">
       <input type="hidden" name="cusid" class="cusid" value="<?php echo $_SESSION['customer_id'];?>">
      <button type="submit" name="submitbutton" class="btn primary_button w-100 mt-3 "  style="display:<?php echo $val=(count($customer) >0) ?"block":"none";  ?>">Place Order</button>
      <h6 class="errormsg" style="color:red;margin-top:20px;text-align:center">****Please Choose the Payment Method****</h6>
</div>
</div>
 

      </div></div>

    </section>
    <?php include 'footer.php '?>




   <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <script type="text/javascript">
    $(".edit_address").on('click',function(){
    $(".addresshow").hide();
    $(".addresshowedit").show();
    });

 $(document).ready(function(){
  $(".coupondiv").hide();
  $('[data-toggle="tooltip"]').tooltip();  
  $(".banktransfer").hide(); 
  $('[name=submitbutton]').prop('disabled', true);
  $(".errormsg").show();
  // $(':input[type="submit"]').prop('disabled', true);
});

 $(".checkboxval").on("click", function(){
 var x=100;
 var y=$(this).val();
 if(y>=1000)
 {
var quotient = Math.floor(1000/x);
var remainder = y-1000;
var l=quotient * 10;
 }
 else
 {
var quotient = Math.floor(y/x);
var remainder = y % x;
var l=quotient * 10;
 }

 console.log(quotient);
 console.log(remainder);
 console.log(l);
  console.log($(".count_total").text());
  if(l>$(".count_total").text()){
  alert("Point value greater than Total amount. Please add more product to apply point ");
 }
 else{
   if($(this).is(":checked")) {  
var value=+$(".count_total").text()-l;
 $(".count_total").text(value);
  $("[name=reminderpoints]").val(remainder);
   $("[name=discount_amount]").val(l); 
    } 

    else{
    var value=+$(".count_total").text()+l;
           $(".count_total").text(value);
            $("[name=reminderpoints]").val('');
   $("[name=discount_amount]").val('');
  

    }
 }

});

$('input[type=radio][name=cash]').change(function() {
if(this.value=="2"){
  console.log(this.value,"valueeeeee454444443");
      $(".banktransfer").show();
      $("[name=banking]").val(this.value);
      $('[name=submitbutton]').prop('disabled', false);
  $(".errormsg").hide();
}else{
  console.log(this.value,"valueeeeee");
      $(".banktransfer").hide();
      $("[name=banking]").val(this.value);
      $('[name=submitbutton]').prop('disabled', false);
  $(".errormsg").hide();
}
});

$("[name=receipt]").change(function(){
    $('[name=submitbutton]').prop('disabled', false);
     $(".errormsg").hide();
})

$('[name=submitbutton]').click(function(){
  
 if($('input[name="cash"]:checked').val()=='2'){
  if($("[name=receipt]").val()){
    // alert("Please Upload the Bank Receipt");
  }else{
    alert("Please Upload the Bank Receipt");
    $('[name=submitbutton]').prop('disabled', true);
  $(".errormsg").show();
  }
  console.log("yuweuyyu", $("[name=receipt]").val())
 }
})

</script>