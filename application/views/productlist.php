<?php include 'header.php'?>  

<div class="margin_top_navbar">
  </div>


<div class="container">


 <div class="breadcrumb_val mb-2" style="color: darkgreen;">
 <br>
 <ol class="breadcrumb">
	 <li class="breadcrumb-item"><a style=" color: #d4a762;" href="<?=base_url?>">Home&nbsp;&nbsp;</a></li>
	 <?php  if($this->uri->segment('2')=='trending'){  ?>
	 <li class="breadcrumb-item"> Trending Products </li>

 <?php }  else{ 	  foreach($joindedcategorytable as $joindedcategoryt){?>
			  <li class="breadcrumb-item">
				  <a style=" color: #d4a762;" href="<?=base_url;?>allcategory"><?php echo $joindedcategoryt['name'] ?></a></li>
				  <li class="breadcrumb-item" style="color: #7f1416;
    font-family: auto;text-transform:uppercase" aria-current="page" > <?php echo $joindedcategoryt['category_name'] ?> </li>
		   
	  

		  <?php }    ?>
 <?php } ?>

<!--  <li><a href="">Fruits & Vegetables</a></li>
-->	</ol>


</div>

<!-- <div class="owl-slider  ">
<div id="carousel" class="owl-carousel">
 <div class="item">
	 <a href=""><img class="owl-lazy" data-src="img/slider/slider.jpg" alt=""></a>
 </div>
 <div class="item">
	 <a href=""><img class="owl-lazy" data-src="img/slider/slider1.jpg" alt=""></a>
 </div>
  
</div>
</div> -->
<section class="product_fulllist product_catlist py-5">
 
	  
		  
  
<div class="row">
  
<div class="col-sm-12 "  >
 <div class="row">
		 <div class="col-sm-12">	
		 <h4 class="text-left" style="color: #7f1416;
   font-family: 'Playball', cursive !important;" >	<?php  if($this->uri->segment('2')=='trending'){  ?>
   Trending Products 

 <?php } ?></h4></div>


		 <?php  $products= $trending; ?>

		  <?php foreach($products as $product){ ?>
	 <div class="col-12 col-lg-3">	
<div   class="productcarousel  ">

			 <div class="product_list">
  

	 
			 <div class="row">
				 <div class="col-4 col-md-12 align-self-center">
					 <?php  
					 $start_date = $product['start_date'];
					 $end_date =$product['end_date'];
					 $start = strtotime($start_date);
					 $todays_date = date("Y-m-d");
					 $today = strtotime($todays_date);
					 $expiration_date = strtotime($end_date);
					 if($today >= $start && $today <= $expiration_date) // if todays date is > start date and < end date then execute the below script               
					 {  
					   $discounts=1;
					 }else{
						 $discounts=0;
					 } 	
					  if($product['disprice'] && $discounts==1){
											  
						$discountamount=$product['price']-$product['disprice'] ;
						   $amount=($discountamount / $product['price'] )*100  ;
						   
						   ;?>
						   <p class="offerss p-1"><i class="fa fa-certificate ml-2"></i><span  >
								 <?php    echo floor($amount); ?>% <br><small>Off</small>


								 </span></p>
					   <?php } ?>

					  
							 
						<?php   foreach($trendingimages as $trendingimag){ 
								   if($trendingimag['productid']==$product['id']){ ?> 
					  <a href='<?=base_url;?>singleproduct/<?php  echo clean($product['productname'] );   ?>/<?php  echo  $product['randid']  ;   ?> '> 
				 <img data-imagename="<?php echo $trendingimag['path']; ?>/thumb/<?php echo $trendingimag['image']; ?>"  src="<?=uploads?><?php echo $trendingimag['path']; ?>/<?php echo $trendingimag['image']; ?> ">
			 </a>
		 <?php break;} }?>  
  
				 </div>
				 <div class="col-8 col-md-12">
						 <!-- <p class="manu_name">Manufacturer Name</p> -->
						 <a href='<?=base_url;?>singleproduct/<?php  echo clean($product['productname'] );   ?>/<?php  echo  $product['randid']  ; ?>  '> 
		  <h6 class="product_name"><?php echo  $product['productname']  ;  ?></h6></a>
							<?php   if($product['variableproduct']==2){ ?>
			 
<select  class="form-control listdrowdo">
  
		<?php foreach ($trendingid as $key => $value): if($product['id']== $value['productid']){ ?>
 <option  value=" <?php
 $start_date = $product['start_date'];
 $end_date =$product['end_date'];
 $start = strtotime($start_date);
 $todays_date = date("Y-m-d");
 $today = strtotime($todays_date);
 $expiration_date = strtotime($end_date);
 if($today >= $start && $today <= $expiration_date) // if todays date is > start date and < end date then execute the below script               
 {  
   $discounts=1;
 }else{
	 $discounts=0;
 } 	
  
	  if($value['disprice'] && $discounts==1){echo $value['disprice'];} else{echo $value['price'];}  ?>" title="<?php echo $value['quantity']; ?>" for="<?php echo $value['id']; ?>" ><?php echo $value['quantity']; ?> -<?php if($value['disprice']){  ?>&#128; <?php echo $value['disprice'] ?> 
<?php } else{?> &#128; <?php echo $value['price'] ?> <?php }  ?></option>
 <?php } endforeach ?> 
</select>
				   
<?php }  else{ ?>
<p class="quantity"><?php echo $product['quantity'] ?></p>
<?php } 	?>

			 <div class="mrp_cart">
<?php   if($product['variableproduct']==2){
	   echo '<p class="p-2"></p>'; 
	   }  else{ ?>
  <?php 
	  $start_date = $product['start_date'];
	  $end_date =$product['end_date'];
	  $start = strtotime($start_date);
	  $todays_date = date("Y-m-d");
	  $today = strtotime($todays_date);
	  $expiration_date = strtotime($end_date);
	  if($today >= $start && $today <= $expiration_date) // if todays date is > start date and < end date then execute the below script               
	  {  
		$discounts=1;
	  }else{
		  $discounts=0;
	  } 	
  if($product['disprice'] && $discounts==1){  ?>
<p class="mrp"><span>MRP:
<s>&#128; <?php echo $product['price'] ?></s></span> &#128; <?php echo $product['disprice'] ?></p>
<?php } else{?>
<p class="mrp"><span>MRP: </span>   &#128; <?php echo $product['price'] ?></p>
<?php }  ?>

<?php } 	?> 

<?php if($product['stock']==1){	 ?>
			 <p class="addcart">
				 <i class="fa fa-minus minus" aria-hidden="true" style="color: white;
    background-color: #1ac044;"></i>
				 <span>
					 <input style="border-radius: 8px" type="number" class="quantity" name="productstock" value="1">&nbsp;&nbsp;<i style="color: white;
    background-color: #1ac044;" class="fa fa-plus add" aria-hidden="true"></i> 
				 </span>
				 
				 <!-- <button type="button" name="add_cart"
				  class="add_cart"
				   data-productname="<?php echo $product['productname'];?>"
					data-customerid='<?php if(isset($_SESSION["customer_id"])){ echo $_SESSION["customer_id"]; } ; ?>' 
data-price=" <?php if($product['disprice']){echo $product['disprice'];} else{echo $product['price'];}  ?>" data-productid="<?php echo $product['id'];?>"  />
					 <i class="fa fa-shopping-cart mr-2 "></i>Add
				 </button> -->

			  <?php   if($product['variableproduct']==1) {?>
				 <button type="button" name="add_cart"
				  class="add_cart" data-variableproduct="<?php echo $product['variableproduct'];?>"
				  data-quantity="<?php echo $product['quantity'];?>"
				   data-productname="<?php echo $product['productname'];?>"
					data-customerid='<?php if(isset($_SESSION["customer_id"])){ echo $_SESSION["customer_id"]; } ; ?>' 
data-price=" <?php if($product['disprice']){echo $product['disprice'];} else{echo $product['price'];}  ?>" data-productid="<?php echo $product['id'];?>"  />
					 <i class="fa fa-shopping-cart mr-2 "></i>Add
				 </button>
			 <?php } ?>

<?php   if($product['variableproduct']==2){  ?>

<button type="button" name="add_cart"  class="add_cart" data-quantity="<?php echo $product['quantity'];?>" data-variableproduct="<?php echo $product['variableproduct'];?>"   data-productname="<?php echo $product['productname'];?>"   data-customerid='<?php if(isset($_SESSION["customer_id"])){ echo $_SESSION["customer_id"]; } ; ?>' 
data-price=" <?php if($product['disprice']){echo $product['disprice'];} else{echo $product['price'];}  ?>" data-productid="<?php echo $product['id'];?>"  />
					 <i class="fa fa-shopping-cart mr-2 "></i>Add
				 </button>
				 <?php } ?>


			  </p>
	 <?php } else{ echo '<p class="text-danger m-1"><small><b>Out of Stock</small></b></p>';}  ?>
		 </div>
				 </div>

			 </div>
		 
			 
		  
	  
		 </div>

	 </div> 
 </div>
	 <?php } ?>
 </div>
 </div>
  </div>


 </section>


  

  
 </div>
 <br>
<hr>
  <?php include 'footer.php '?> 




