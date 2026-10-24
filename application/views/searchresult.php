   <?php include 'header.php'?>  

 <div class="margin_top_navbar">
 	</div>



<div class="container">


	<div class="breadcrumb_val mb-2">
 
</div>
 
 <section class="product_fulllist product_catlist py-5"> 
	 
<div class="row">
	 
<div class="col-sm-12 "  >
	<div class="row">
			<div class="col-sm-12">	
			<h4 class="text-left" > 
	Search Result For:
 <?php echo $searchvalue; ?>
	</h4></div>


			<?php  $products= $trending; ?>

			 <?php foreach($products as $product){?>
		<div class="col-12 col-lg-3">	
<div   class="productcarousel  ">
 
				<div class="product_list">
	 
  
		
				<div class="row">
					<div class="col-4 col-md-12 align-self-center">
						<?php   if($product['disprice']){	 					 
					       $discountamount=$product['price']-$product['disprice'] ;
							  $amount=($discountamount / $product['price'] )*100  ;
							  ;?>
							  <p class="offerss p-1"><i class="fa fa-certificate ml-2"></i><span  >
									<?php    echo floor($amount); ?>% <br><small>Off</small>


									</span></p>
						  <?php } ?>

						 
								
				 		  <?php foreach($trendingimages as $trendingimag){ 
								  	if($trendingimag['productid']==$product['id']){ ?> 
						 <a href='<?=base_url;?>singleproduct/<?php  echo clean($product['productname'] );   ?>/<?php  echo  $product['randid']  ;   ?>   '> 
					<img data-imagename="<?php echo $trendingimag['path']; ?>/thumb/<?php echo $trendingimag['image']; ?>"  src="<?=uploads?><?php echo $trendingimag['path']; ?>/<?php echo $trendingimag['image']; ?> ">
				</a>
			<?php break;}}?>  
	 
					</div>
					<div class="col-8 col-md-12">
							<!-- <p class="manu_name">Manufacturer Name</p> -->
							<a href='<?=base_url;?>singleproduct/<?php  echo clean($product['productname'] );   ?>/<?php  echo  $product['randid']  ;   ?>  '> 
			 <h6 class="product_name"><?php echo  $product['productname']  ;  ?></h6></a>
					  <?php   if($product['variableproduct']==2){ ?>
				
<select  class="form-control listdrowdo">
 
	  	 <?php foreach ($trendingid as $key => $value): if($product['id']== $value['productid']){ ?>
	<option  value=" <?php if($value['disprice']){echo $value['disprice'];} else{echo $value['price'];}  ?>" title="<?php echo $value['quantity']; ?>" for="<?php echo $value['id']; ?>" ><?php echo $value['quantity']; ?> -<?php if($value['disprice']){  ?>Rs <?php echo $value['disprice'] ?> 
<?php } else{?> Rs <?php echo $value['price'] ?> <?php }  ?></option>
	<?php } endforeach ?> 
</select>
				  	
 <?php }  else{ ?>
  <p class="quantity"><?php echo $product['quantity'] ?></p>
 <?php } 	?>
				<div class="mrp_cart">
<!-- 	 <?php if($product['disprice']){	 ?>
<p class="mrp"><span>MRP:
<s>Rs <?php echo $product['price'] ?></s></span> Rs <?php echo $product['disprice'] ?></p>
<?php } else{?>
 <p class="mrp"><span>MRP: </span>  Rs <?php echo $product['price'] ?></p>
<?php }  ?> -->
		  <?php   if($product['variableproduct']==2){
		  echo '<p class="p-2"></p>'; 
		  }  else{ ?>
	 <?php if($product['disprice']){  ?>
<p class="mrp"><span>MRP:
<s>Rs <?php echo $product['price'] ?></s></span> Rs <?php echo $product['disprice'] ?></p>
<?php } else{?>
 <p class="mrp"><span>MRP: </span>   Rs <?php echo $product['price'] ?></p>
<?php }  ?>

 <?php } 	?> 
			 
 <?php if($product['stock']==1){	 ?>

				<p class="addcart">
					<i class="fa fa-minus minus" aria-hidden="true"></i>
					<span>
						<input type="number" class="quantity" name="productstock" value="1"><i class="fa fa-plus add" aria-hidden="true"></i> 
					</span>
					
				<!-- 	<button type="button" name="add_cart"
					 class="add_cart"
					  data-productname="<?php echo $product['productname'];?>"
					   data-customerid='<?php if(isset($_SESSION["customer_id"])){ echo $_SESSION["customer_id"]; } ; ?>' 
 data-price=" <?php if($product['disprice']){echo $product['disprice'];} else{echo $product['price'];}  ?>" data-productid="<?php echo $product['id'];?>"  />
						<i class="fa fa-shopping-cart mr-2 "></i>Add
					</button>
 -->
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
	<?php include 'footer.php '?>