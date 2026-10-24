<?php include 'header.php'?>  
   <style>
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  border-radius:8px;
  filter: drop-shadow(5px 5px 5px rgba(0,0,0,0.3));
}

.button1 {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}

.button2:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
p {outline-color:red;}

p.dotted {outline-style: dotted;}
p.dashed {outline-style: dashed;}
p.solid {outline-style: solid;}
p.double {outline-style: double;}
p.groove {outline-style: groove;}
p.ridge {outline-style: ridge;}
p.inset {outline-style: inset;}
p.outset {outline-style: outset;
	
}

.product-card {
  position: relative;
  max-width: 355px;
  width: 100%;
  border-radius: 25px;
  padding: 20px 30px 30px 30px;
  background: #fff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  z-index: 3;
  overflow: hidden;
}
.product-card .logo-cart{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.product-card .logo-cart img{
  /* height: 60px; */
  width: 60px;
  object-fit: cover;
}
.product-card .logo-cart i{
  font-size: 27px;
  color: #707070;
  cursor: pointer;
  transition: color 0.3s ease;
}
.product-card .logo-cart i:hover{
  color: #333;
}
.product-card .main-images{
  position: relative;
  height: 210px;
}
.product-card .main-images img{
  position: absolute;
  height: 300px;
  width: 300px;
  object-fit: cover;
  transform: rotate(18deg);
  left: 12px;
  top: -40px;
  z-index: -1;
  opacity: 0;
  transition: opacity 0.5s ease;
}
.product-card .main-images img.active{
  opacity: 1;
}
.product-card .shoe-details .shoe_name{
  font-size: 24px;
  font-weight: 500;
  color: #161616;
}
.product-card .shoe-details p{
  font-size: 12px;
  font-weight: 400;
  color: #333;
  text-align: justify;
}
.product-card .shoe-details .stars i{
  margin: 0 -1px;
  color: #333;
}
.product-card .color-price .color-option{
  display: flex;
  align-items: center;
}
.color-price{
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 10px;
}
.color-price .color-option .color{
  font-size: 18px;
  font-weight: 500;
  color: #333;
  margin-right: 8px;
}
.color-option  .circles{
  display: flex;
}
.color-option  .circles .circle{
  height: 18px;
  width: 18px;
  background: #0071C7;
  border-radius: 50%;
  margin: 0 4px;
  cursor: pointer;
  transition: all 0.4s ease;
}
.color-option  .circles .circle.blue.active{
  box-shadow: 0 0 0 2px #fff,
               0 0 0 4px #0071C7;
}
.color-option  .circles .circle.pink{
  background: #FA1795;
}
.color-option  .circles .circle.pink.active{
  box-shadow: 0 0 0 2px #fff,
               0 0 0 4px #FA1795;
}
.color-option  .circles .circle.yellow{
  background: #F5DA00;
}
.color-option  .circles .circle.yellow.active{
  box-shadow: 0 0 0 2px #fff,
               0 0 0 4px #F5DA00;
}
.color-price .price{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.color-price .price .price_num{
  font-size: 25px;
  font-weight: 600;
  color: #707070;
}
.color-price .price .price_letter{
  font-size: 10px;
  font-weight: 600;
  margin-top: -4px;
  color: #707070;
}
.product-card .button{
  position: relative;
  height: 50px;
  width: 100%;
  border-radius: 25px;
  margin-top: 30px;
  overflow: hidden;
}
.product-card .button .button-layer{
  position: absolute;
  height: 100%;
  width: 300%;
  left: -100%;
  background-image: linear-gradient(135deg,#9708CC, #43CBFF,#9708CC, #43CBFF );
  transition: all 0.4s ease;
  border-radius: 25PX;
}
.product-card .button:hover .button-layer{
  left: 0;
}
.product-card .button button{
  position: relative;
  height: 100%;
  width: 100%;
  background: none;
  outline: none;
  border: none;
  font-size: 18px;
  font-weight: 600;
  letter-spacing: 1px;
  color: #fff;
}
.image-zoom-container {
    width: 300px; /* Set the container's width */
    overflow: hidden; /* Hide the overflowing part of the image */
    position: relative; /* Needed for absolute positioning of zoomed image */
}

.zoom-image {
    width: 100%; /* Make the image 100% the width of the container */
    transition: transform 0.3s; /* Add a smooth transition effect for zoom */
}

.image-zoom-container:hover .zoom-image {
    transform: scale(1.2); /* Increase the image size by 20% on hover */
}

.img-magnifier-container {
  position:relative;
}

.img-magnifier-glass {
  position: absolute;
  border: 3px solid #000;
  border-radius: 50%;
  cursor: none;
  /*Set the size of the magnifier glass:*/
  width: 100px;
  height: 100px;
}
.image-container {
  width: 345px;
  margin-left: 116px;
  margin-top: 17px;
  transition: transform 0.3s; /* Add a smooth transition effect */
}

.image-container:hover {
  animation: shake 0.5s infinite;
}

@keyframes shake {
  0% {
    transform: translateX(0);
  }
  25% {
    transform: translateX(-5px);
  }
  50% {
    transform: translateX(5px);
  }
  75% {
    transform: translateX(-5px);
  }
  100% {
    transform: translateX(5px);
  }
}
/* Add this CSS to your stylesheet */
.img-responsive {
    max-width: 100%;
    height: auto;
}




</style>




 <div class="margin_top_navbar">
 </div>
<div class="container ">
<div class="breadcrumb_val" style="color: darkgreen;">
	<br>
	<?php  foreach($singleproduct as $singlepro){}?>
	<!-- <ul>
		<li ><a href="<?=base_url?>">Home&nbsp;&nbsp;</a></li> 
		<?php foreach($joindedcategorytable as $joindedcategoryt){?>/
		 		<li><a href="<?=base_url;?>allcategory"><?php echo $joindedcategoryt['name'] ?>&nbsp;&nbsp;</a></li>
		 		<li><a href="<?=base_url;?>productlist/<?php echo clean($joindedcategoryt['category_name']) ; ?>/<?php  echo  $joindedcategoryt['randid']  ;   ?>   "><?php echo $joindedcategoryt['category_name'] ?>&nbsp;&nbsp;</a></li>
		 <?php }  ?>
		<li><?php echo $singlepro['productname'] ?></li>
	</ul> -->

  <ol class="breadcrumb">
                            <li class="breadcrumb-item" >
                              <a style=" color: #d4a762;" href="<?=base_url?>">Home&nbsp;&nbsp;</a>
                            </li>
                            <li class="breadcrumb-item" >
                              <a style=" color: #d4a762;" href="<?=base_url;?>allcategory"><?php echo $joindedcategoryt['name'] ?>&nbsp;&nbsp;</a>
                            </li>
                            <li class="breadcrumb-item">
                              <a style=" color: #d4a762;" href="<?=base_url;?>productlist/<?php echo clean($joindedcategoryt['category_name']) ; ?>/<?php  echo  $joindedcategoryt['randid']  ;   ?>   "><?php echo $joindedcategoryt['category_name'] ?>&nbsp;&nbsp;</a>
                          </li>
                            <li class="breadcrumb-item active" aria-current="page" style="color: #7f1416;
    font-family: auto;"><?php echo $singlepro['productname'] ?>
    </li>
                        </ol>
</div>
</div>
 <pre>
 
</pre>  




<div class="container">
	<?php foreach($singleproduct as $singlepro){?> 
	<div class="row product_details">
		<div class="col-sm-6">
 <div id="singleproduct" class="owl-carousel bg-white">  
<?php foreach($singleproductimage as $singleproducti){?> 
	<div class="item "> 
 <img data-imagename="<?php echo $singleproducti['path'];?>/<?php echo $singleproducti['image'] ?>"  src="<?php echo uploads;echo $singleproducti['path']; ?>/<?php echo $singleproducti['image'] ?>">
	</div>	    
 <?php } ?>
 </div>	
		  </div>
		 <div class="col-sm-6" style="margin-top: -27px;">
	
		 	<?php foreach($joindedcategorytable as $joindedcategoryt){?>
        <h5 style="background-color:#d4a762;
  border: none;
  color: white;
  /* padding: 16px 32px; */
  text-align: center;
  font-size: 16px; 
  margin: 4px 2px;
  opacity: 1;
  transition: 0.3s;
  border-radius: 50px 20px;width: 204px;
    margin-left: 87px;    margin-top: 48px;
">
	 <?php echo $joindedcategoryt['category_name'] ?> </h5>
		 		<div class="mb-2  ">
<!-- 	 
		 	 <a  href="<?=base_url;?>productlist/<?php echo clean($joindedcategoryt['category_name']) ; ?>/<?php  echo  $joindedcategoryt['randid']  ;  ?>">
			 <span class="button button2" style="color:    background: #1ac044;"> <?php echo $joindedcategoryt['category_name'] ?></span></a> -->
		 	
			</div>

		 	<?php }    ?> 
   

 <div class="mrp_cart" style="    margin-top: 19px;
    background-color: white;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,.16),0 2px 10px 0 rgba(0,0,0,.12)!important;
    width: 377px;
    height: 302px;border-radius: 8px;    margin-left: -8px;">
    
  
<div style="display: flex; align-items: center;    margin-top: -101px;">
    <img style="width: 118px; margin-left: 0px;" src="<?=assets?>img/pro.png" alt="logo">
    <i class="fas fa-shopping-bag" style="    margin-left: 208px;"></i>
    
</div>

     

   

		
     
    
<h4 class="mb-3" style="color: brown;margin-top: -116px;;
   "><?php echo $singlepro['productname'] ?></h4>
<?php   if($singlepro['variableproduct']==2){ ?> 
<select style="width: 361px;   " class="form-control listdrowdown">
	  <?php foreach ($variantid as $key => $value):   ?>
	<option  value=" <?php if($value['disprice']){echo $value['disprice'];} else{echo $value['price'];}  ?>" title="<?php echo $value['quantity']; ?>" for="<?php echo $value['id']; ?>" ><?php echo $value['quantity']; ?> -<?php if($value['disprice']){  ?>Rs <?php echo $value['disprice'] ?> 
<?php } else{?> Rs <?php echo $value['price'] ?> <?php }  ?></option>
	<?php  endforeach ?> 
</select>         	  	
 <?php }  else{ ?>
  <p class="quantity"><?php echo $singlepro['quantity'] ?></p>
 <?php } 	?>
 
 <!-- <img style="width: 155px;
    margin-top: -54px;
    margin-left: 116px;" data-imagename="<?php echo $singleproducti['path'];?>/<?php echo $singleproducti['image'] ?>"  
 src="<?php echo uploads;echo $singleproducti['path']; ?>/<?php echo $singleproducti['image'] ?>"> -->


  <?php   if($singlepro['variableproduct']==1) { ?>
	 	<?php if($singlepro['disprice']){	 					 
					       $discountamount=$singlepro['price']-$singlepro['disprice'] ; ?>
		 	<div class="price  my-4">
		 		M.R.P: <s><i class="fa fa-inr"></i> <?php echo $singlepro['price'] ?></s> Price :  <b> <i class="fa fa-inr"></i> <?php echo $singlepro['disprice'] ?></b>
		 		  <p class="m-0 secondarycolor"><small>You Save <i class="fa fa-inr"></i> <?php echo $discountamount; ?></small></p>  
		 	</div>
<?php } else{ ?>
<div class="price  my-4">
		 	 Price :  <b> <i class="fa fa-inr"></i> <?php echo $singlepro['price'] ?></b>
		 		 
		 	</div>

	<?php }?> 
 <?php  } else {?> 
 	<br>

 <?php  }  ?> 
  <?php if($singlepro['stock']==1){	 ?>

		 <p class="addcart" style="   
    background-color: #f4f3f2;    border-radius: 8px;
      ">
					<button style="margin-top: 10px;
    margin-bottom: 10px;    margin-left: 50px;" class="transparentbtn minus mr-2"  ><i style="color: #ebf1eb;
    background-color: #1ac044;" class="fa fa-minus minus" aria-hidden="true" style="color:green"></i></button>
					<span>
						<input style="    border-radius: 8px;" type="number" class="quantity" name="productstock" value="1">
						<button class="transparentbtn ml-2 add"   ><i style="color: #ebf1eb;
    background-color: #1ac044;" class="fa fa-plus " aria-hidden="true" style="color:green"></i> </button>
					</span>
					<?php   if($singlepro['variableproduct']==1) {?>
					<button type="button" name="add_cart" style="float:none" class="add_cartsinglepage"
					  data-productname="<?php echo $singlepro['productname'];?>" data-variableproduct="<?php echo $singlepro['variableproduct'];?>"
					 data-quantity="<?php echo $singlepro['quantity'];?>"
					   data-customerid='<?php if(isset($_SESSION["customer_id"])){ echo $_SESSION["customer_id"]; } ; ?>' 
 data-price=" <?php if($singlepro['disprice']){echo $singlepro['disprice'];} else{echo $singlepro['price'];}  ?>" data-productid="<?php echo $singlepro['id'];?>"  />
						<i class="fa fa-shopping-cart mr-2 "></i>Add To Cart
					</button>

          
	<?php } ?>

 <?php   if($singlepro['variableproduct']==2){  ?>

 	<button type="button" name="add_cart" style="float:none" class="add_cartsinglepage"
					  data-productname="<?php echo $singlepro['productname'];?>"
					   data-customerid='<?php if(isset($_SESSION["customer_id"])){ echo $_SESSION["customer_id"]; } ; ?>'  data-productid="<?php echo $singlepro['id'];?>" data-variableproduct="<?php echo $singlepro['variableproduct'];?>"  />	<i class="fa fa-shopping-cart mr-2 "></i>Add To Cart
					</button>


			 
<?php } ?>
				 </p>
				 <!-- <h4 style="color:brown;">Description</h4>
 	<p>    <?php echo  $singlepro['descrip'];	 ?></p> -->
<?php } else{ echo '<p class="text-danger m-1"><small><b>Out of Stock</small></b></p>';}  ?>
		</div>
 </div>

   <?php if(!empty($singlepro['descrip'])){	 ?>
   <div class="descriptionssd mt-4">
 	<!-- <h3>Description</h3>
 	<p>    <?php echo  $singlepro['descrip'];	 ?></p> -->
 <!-- 	 <h3>Features</h3>
   	 <ul>
 	 	<li>Clean and hygienic packaging</li>
	<li>Consistency in taste and aroma</li>
	<li>Long, and fluffy basmati grains</li>
	<li>No sticking even after boiling</li>
 	 </ul>   -->
 </div> 
<?php }?>
<?php }?>
</div>
<br>









 
<hr>
<?php include 'footer.php '?>

<script>
   let circle = document.querySelector(".color-option");

   circle.addEventListener("click", (e)=>{
     let target = e.target;
     if(target.classList.contains("circle")){
       circle.querySelector(".active").classList.remove("active");
       target.classList.add("active");
       document.querySelector(".main-images .active").classList.remove("active");
       document.querySelector(`.main-images .${target.id}`).classList.add("active");
     }
   });

  </script>
 <script>
/* Initiate Magnify Function
with the id of the image, and the strength of the magnifier glass:*/
magnify("myimage", 3);
</script>