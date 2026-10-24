   <?php include 'header.php'?> 
   <script type="text/javascript">
        $(function () {
            $("#btnShow").click(function () {
                $('#demoModal').modal('show');
            });
        });
    </script>
   <style>

.image-hover {
  transition: transform 0.2s; /* Add a smooth transition effect */
}

.image-hover:hover {
  transform: scale(1.1); /* Increase the image size on hover */
  /* You can add other styles for the hover effect, such as changing the opacity or adding a border. */
}


</style> 
 <p   class="marquee" style="color: #06311f;
    font-weight: bold;
    font-size: 18px;
    font-family: emoji;font-weight:bold;
	margin-top:18px;font-family: math;" ><i class="fa  fa-shopping-bag mr-2"></i><?php foreach($slidertext as $slidingted){
echo $slidingted['text'];
 } ?><i class="fa fa-shopping-cart"></i>

 </p>
 
 <div class="margin_top_navbar">
 	</div>
   <div class="owl-slider   ">
<div id="carousel1" class="owl-carousel">  
 
	<?php  foreach($slider as $slide){ ?>
		
	<div class="item    ">
		<a href="">
			<img style=" padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;" class="owl-lazy" data-src="<?=uploads?>
	<?php echo $slide['path']?>/<?php echo $slide['image']?>"  >
</a>
	</div>
	 <?php } ?>   
	    
</div>
</div> 
 
<div class="container">
<section class="product_fulllist categorybox py-3 ">
		<div _ngcontent-lcq-c3="" class="col-12"><h2 _ngcontent-lcq-c3="" class="h3-responsive" style="font-family: 'poppins';font-weight: bold;color:#e7c521;width: 100%;
    text-align: center;
    border-bottom: 2px solid #000;
    line-height: .1em;
    margin: 10px 0 20px;"><span _ngcontent-lcq-c3="" class="ng-tns-c3-0" style="    background: #f7f7f7;
    padding: 0 10px;">Popular Categories  </span></h2></div>
		<h4 class="text-left  " > <a href="<?=base_url;?>allcategory" class="float-right">All Category</a> </h4>
		<div class="row"> 
			<?php   foreach($popularcategories as $category1){  ?>
	 
        <div class="col-6 col-lg-3">
 
	 <div class="categorylist">

	 
		<a  href="<?=base_url;?>productlist/<?php echo  clean($category1['category_name']); ?>/<?php  echo  $category1['randid']  ;   ?>">
			
		<img  class="image-hover" src="<?=uploads?><?php echo $category1['path']; ?>/<?php echo $category1['image']; ?> ">
			<!-- <div class="con">
			<img  src="<?=uploads?><?php echo $category1['path']; ?>/<?php echo $category1['image']; ?> ">
         <div class="overlay"><?php echo $category1['category_name'] ?></div>
              </div> -->

			<!-- <h5 style="background-color:#ffbb1d;"> -->
			  <!-- <?php echo $category1['category_name'] ?> -->
			<!-- </h5>    -->
		</a>
		
	 </div> 
	 <h5 style="background-color: #4b0603;
  border: none;
  color: white;
  /* padding: 16px 32px; */
  text-align: center;
  font-size: 16px; 
  margin: 4px 2px;
  opacity: 1;
  transition: 0.3s;
  border-radius: 50px 20px">
	 <?php echo $category1['category_name'] ?>
	 </h5>
 		</div>
 
		<?php } ?>
 
  
				
			
		</div>
		 
	
	</section>



	

	<br>
<br>

	
	<div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="<?=assets?>img/footer.jpg" alt="Image 1" class="img-fluid">
            </div>
            <div class="col-sm-6">
                <img src="<?=assets?>img/footer1.png"  alt="Image 2" class="img-fluid">
            </div>
        </div>
    </div>
	
<br>
<br>

	<div _ngcontent-lcq-c3="" class="col-12">
    
    <h2 _ngcontent-lcq-c3="" class="h3-responsive" style="font-family: 'poppins';font-weight: bold;color:#e7c521;width: 100%;
    text-align: center;
    border-bottom: 2px solid #000;
    line-height: .1em;
    margin: 10px 0 20px;"><span _ngcontent-lcq-c3="" class="ng-tns-c3-0" style="    background: #f7f7f7;
    padding: 0 10px;">Our Services</span></h2></div>
<section class="ftco-section" style="margin-left: 85px;">
			<div class="container">
				<div class="row no-gutters ftco-services">
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-shipped"></span>
              </div>
              <div class="media-body">
			  <i class="fas fa-shipping-fast" style="display: block;
    font-size: 24px;
    margin-right: 15px;
    color: #7f1416;
    width: 65px;
    height: 65px;
    text-align: center;
    line-height: 60px;
    border: 2px #7f1416 dotted;
    border-radius: 999px;"></i>
                <h3 class="heading">Free Shipping</h3>
                <span>Order Now</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-diet"></span>
              </div>
              <div class="media-body">
			
			  <i class="fas fa-shopping-basket" style="display: block;
    font-size: 24px;
    margin-right: 15px;
    color: #7f1416;
    width: 65px;
    height: 65px;
    text-align: center;
    line-height: 60px;
    border: 2px #7f1416 dotted;
    border-radius: 999px;"></i>
                <h3 class="heading">Always Fresh</h3>
                <span>Product well package</span>
              </div>
            </div>    
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-award"></span>
              </div>
              <div class="media-body">
			  <i class="fas fa-shipping-fast" style="display: block;
    font-size: 24px;
    margin-right: 15px;
    color:#7f1416;
    width: 65px;
    height: 65px;
    text-align: center;
    line-height: 60px;
    border: 2px #7f1416 dotted;
    border-radius: 999px;"></i>
                <h3 class="heading">Superior Quality</h3>
                <span>Quality Products</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-customer-service"></span>
              </div>
              <div class="media-body">
			  <i class="fas fa-phone-volume" style="display: block;
    font-size: 24px;
    margin-right: 15px;
    color: #7f1416;
    width: 65px;
    height: 65px;
    text-align: center;
    line-height: 60px;
    border: 2px #7f1416 dotted;
    border-radius: 999px;"></i>
	
                <h3 class="heading">Support</h3>
                <span>24/7 Support</span>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>
	
	  <!-- ////////////////////////////////////////////////////////////////// -->

	  <br>
	  <br>

 	   
		<section class="product_fulllist py-3">
		
	<div _ngcontent-lcq-c3="" class="col-12"><h2 _ngcontent-lcq-c3="" class="h3-responsive" style="font-family: 'poppins';font-weight: bold;color:#e7c521;width: 100%;
    text-align: center;
    border-bottom: 2px solid #000;
    line-height: .1em;
    margin: 10px 0 20px;"><span _ngcontent-lcq-c3="" class="ng-tns-c3-0" style="    background: #f7f7f7;
    padding: 0 10px;">What's trending </span></h2></div>
	
		<h4 class="text-center " > <a href="<?=base_url;?>productlist/trending" class="float-right">View All</a></h4>
		<br>
		
		<div class="owl-slider">
			<div   class="owl-carousel productcarousel owlcarousel_js">
			<?php 
			foreach($trending as $product){?>
			<div class="item">
	 			<div class="product_list">
					<div class="row">
						<div class="col-4 col-md-12 align-self-center">
						<?php   if($product['disprice'] && $discounts==1){	 					 
					       $discountamount=$product['price']-$product['disprice'] ;
							  $amount=($discountamount / $product['price'] )*100  ;
							  ;?>
							  <p class="offerss p-1"><i class="fa fa-certificate ml-2"></i><span  >
									<?php    echo floor($amount); ?>% <br><small>Off</small> 
								</span></p>
						  <?php } ?>
								
				<?php    foreach($trendingimages as $trendingimag){ 
		 			if($trendingimag['productid']==$product['id']){  ?> 
				<!--  <a href='<?=base_url;?>singleproduct/<?php echo strtolower( str_replace(' ', '-', $product['productname'])); ?>  '>  -->
		 			
        
        <a href='<?=base_url;?>singleproduct/<?php echo clean($product['productname']) ; ?>/<?php  echo  $product['randid']  ;   ?>  '> 
					<img data-imagename="<?php echo $trendingimag['path']; ?>/thumb/<?php echo $trendingimag['image']; ?>"  src="<?=uploads?><?php echo $trendingimag['path']; ?>/thumb/<?php echo $trendingimag['image']; ?> ">
				</a>

        
			<?php break;}  }?>
					</div>
					<div class="col-8 col-md-12"> 
			<a href='<?=base_url;?>singleproduct/<?php echo clean($product['productname']) ; ?>/<?php  echo  $product['randid']  ;   ?>  '> <h6 class="product_name"><?php echo  $product['productname']  ;  ?></h6></a>
 <?php   if($product['variableproduct']==2){ ?> 
<select  class="form-control listdrowdo">
	  <?php foreach ($trendingid as $key => $value): if($product['id']== $value['productid']){ ?>

	<option  value="<?php if($value['disprice']){echo $value['disprice'];} else{echo $value['price'];}  ?>" title="<?php echo $value['quantity']; ?>" for="<?php echo $value['id']; ?>" ><?php echo $value['quantity']; ?> -<?php if($value['disprice']){  ?>&#128; <?php echo $value['disprice'] ?> 
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
	 <?php if($product['disprice']&& $discounts==1){?>
<p class="mrp"><span>MRP:
<s> &#128; <?php echo $product['price'] ?></s></span> &#128; <?php echo $product['disprice'] ?></p>
<?php } else {?>
 <p class="mrp"><span>MRP: </span>   &#128; <?php echo $product['price'] ?></p>
<?php }?>

 <?php } 	?> 

 <?php if($product['stock']==1){	 ?>
  
  <p class="addcart">
	  <i class="fa fa-minus minus" aria-hidden="true" style="background-color: #1ac044;
    color: white;"></i>
	  <span>
		  <input style="border-radius: 8px;" type="number" class="quantity" name="productstock" value="1">&nbsp;&nbsp;<i style="background-color: #1ac044;
    color: white;" class="fa fa-plus add" aria-hidden="true"></i> 
	  </span>
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
		<?php } ?>
	 </div></div>
	</section>



<br>
<br>


	<div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="<?=assets?>img/footer2.png" alt="Image 1" class="img-fluid">
            </div>
            <div class="col-sm-6">
                <img src="<?=assets?>img/footer5.png"  alt="Image 2" class="img-fluid">
            </div>
        </div>
    </div>

	  
	<!-- Button to Open the Modal -->
 

<!-- The Modal -->
<div class="modal" id="myModal" data-backdrop="false">
  <div class="modal-dialog modal-dialog-centered" >
    <div class="modal-content" style="border-radius: 0;padding: 0px;">

      
      <div class="modal-header" style="border-bottom: 0; ">
       <b>Select Location</b>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

   <style type="text/css">
   	.citydiv,.statediv{display: inline-block;}
   	.statediv{display: none}
   	.citydiv .btn,.statediv .btn{background: #fcb001;color:#fff;}
	
   </style>
      <div class="modal-body" style="">

    <!--   	  <select id='sel_city'>
           <option>-- Select city --</option>
           <?php
           foreach($city as $name){
             echo "<option value='".$name['id']."'>".$name['city']."</option>";
           }
           ?>
        </select>
 -->

    <div class="dropdown citydiv"  >
  <button class="btn  dropdown-toggle   " type="button" data-toggle="dropdown">Select City
  <span class="caret"></span></button>
  <br>
  <br>
  <ul class="dropdown-menu citymentu" style=" z-index: 999999;">
    <?php foreach ($city as $key => $name) { ?>
    <li><a title="<?php echo $name['id']; ?>"  style="text-transform: capitalize;"><?php echo $name['city']; ?></a></li>
    <?php   } ?>
  </ul>
</div>     
 <div class="dropdown statediv"  >
  <button class="btn   dropdown-toggle   " type="button" data-toggle="dropdown">Select Location
  <span class="caret"></span></button>
  <ul class="dropdown-menu droepsdfm" style="height:auto;max-height:200px;z-index: 999999;"> 
  </ul> 
</div>  </div> 
    </div>
  </div>
</div>


		<br>
		<br>
   <?php include 'footer.php '?>

 <?php if (!$this->session->userdata('location')){ ?> 
<script type="text/javascript">
	$('#myModal').modal('hide');
</script>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>
 	<?php } ?>