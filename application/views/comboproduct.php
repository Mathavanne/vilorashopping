   <?php include 'header.php'?>  

 <div class="margin_top_navbar">
 </div>
<div class="container ">
<div class="breadcrumb_val">
	<?php   foreach($singleproduct as $singlepro){}?>
	<ul>
		<li><a href="<?=base_url?>">Home</a></li> 
		<li><?php echo $singlepro['name'] ?></li>
	</ul>
</div>
</div>
 <pre>
 	<?php     //print_r( $joindedcategorytable	 ); 
?>
  <?php     //print_r( $joindedcategorytable	 ); 

 ///print_r($category); ?>
<?php   //print_r($parentcategory); ?>
<?php   //print_r($singleproduct); ?> 
</pre>  
<div class="container">
	<?php foreach($singleproduct as $singlepro){?> 
	<div class="row product_details">
		<div class="col-sm-6">
			<!-- <?php foreach($singleproductimage as $singleproductima){ ?>
		 <img src="<?php echo uploads;echo $singleproductima['path'] ?>/<?php echo $singleproductima['image'] ?>">
		 <?php } ?> -->
 <img data-imagename="<?php echo $singlepro['path'] ?>/<?php echo $singlepro['image'] ?>" src="<?php echo uploads;echo $singlepro['path'] ?>/<?php echo $singlepro['image'] ?>">
		  </div>
		 <div class="col-sm-6">
	
 
		   
		 	<h4 class="mb-3"><?php echo $singlepro['name'] ?></h4>
		  
<div class="price  my-4">
		 	 Price :  <b> <i class="fa fa-inr"></i> <?php echo $singlepro['amount'] ?></b>
		 		 
		 	</div>
 <!--    <?php //if($singlepro['stock']==1){	 ?> -->

		 <p class="addcart">
					<button class="transparentbtn mr-2"  ><i class="fa fa-minus minus" aria-hidden="true"></i></button>
					<span>
						<input type="number" class="quantity" name="productstock" value="1"><button class="transparentbtn ml-2"   ><i class="fa fa-plus add" aria-hidden="true"></i> </button>
					</span>
					
					<button type="button" name="add_cart" style="float:none" class="add_cartsinglepage"
					  data-productname="<?php echo $singlepro['name'];?>"
					   data-customerid='<?php if(isset($_SESSION["customer_id"])){ echo $_SESSION["customer_id"]; } ; ?>' 
 data-price=" <?php echo $singlepro['amount'];  ?>" data-productid="<?php echo $singlepro['id'];?>"  />
						<i class="fa fa-shopping-cart mr-2 "></i>Add To Cart
					</button>

			 

				 </p>
<!-- <?php //}else{ echo '<p class="text-danger m-1"><small><b>Out of Stock</small></b></p>';}  ?> -->

		</div>
 </div>
  <div class="descriptionssd">
  <!-- 		<h3>Description</h3>
<p>Daawat Devaaya Basmati Rice is an exotic range of rice that promises both quality and taste. It is pearly white, extra-long and extra fine. The slender long-grained rice is aromatic and nutritious at the same time and can fulfil the nutritional and dietary requirement of an entire meal. This superior grade basmati rice offers ample calories and carbohydrates, for instant energy, whilst providing proteins and dietary fibres for enhanced metabolism and digestion. What’s more, Daawat Devaaya Basmati Rice is non-sticky even post-cooking and its flavourful rich taste is guaranteed to earn you lots of appreciation from your visitors. Be it the authentic biriyani or Chinese fried rice, this basmati rice will ensure superior taste and texture, along with an exquisite fragrance. Buy Daawat Devaaya Basmati Rice online now!</p> -->
 	 <h3>Included Products</h3>
   	 <ul>
   	 	<?php foreach($productlist as $productlis ){ ?>
 	 	<li><?php echo $productlis['productname'];?> (<?php echo $productlis['quantity'];?>)</li>
 
		<?php }?>
 	 </ul>  
 </div> 
<?php }?>
</div>
<?php include 'footer.php '?>