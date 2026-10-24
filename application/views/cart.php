   <?php include 'header.php'?>  
 
 <style type="text/css">section.menu{margin-bottom:0}.cart .totocart,.cart .cart_details  .text-primary.float-right  {display:none} .totocart{display:none;}.cart_details{overflow-y: unset;    max-height: none;}</style>
<section class="cart py-3">
<div class="container">
	<h3 style="font-family: 'Playball', cursive !important;color:#d4a762">Cart</h3>
  
	   <br>
     <br>
	  <div class="row">

	  	<div class="col-sm-9">
         <div class="cart_details">
   <h3 align="center">Cart is Empty</h3>
  </div>
 <?php if(isset($_SESSION['customer_id'])){ if(count($cartproducts)>0){ ?>
<a href="<?php echo base_url();?>checkout"class="btn primary_button w-100 mt-3 proceedtocheck ">Proceed To Checkout</a>
<?php }?>
 <?php } else { ?>
  <a href="#signupmodal" data-toggle="modal"   class="btn primary_button w-100 mt-3 ">Proceed To Checkout</a>
   <?php }  ?>
	     <p class="text-center mt-3"><a  >OR</a></p>
   <p class="text-center"><a style="color: white;
    text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
    font-size: x-large;
    font-family: cursive;
    background-color: aliceblue;" href="<?php echo base_url(); ?>">Continue Shopping</a></p>
	  		 

	  	</div>
  	 
	  </div></div>

	</section>
	<style type="text/css">.cart_details .subotos{    text-align: right;
    padding-right: 25px;}</style>
<?php include 'footer.php '?>

