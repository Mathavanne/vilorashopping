   <?php include 'header.php'?>  

   <style>

.image-hover {
  transition: transform 0.2s; /* Add a smooth transition effect */
}

.image-hover:hover {
  transform: scale(1.1); /* Increase the image size on hover */
  /* You can add other styles for the hover effect, such as changing the opacity or adding a border. */
}

.gold-text {
    color: gold; /* Set the text color to gold */
    text-shadow: 1px 1px 0px brown; /* Add a brown text outline */
}
.centered-text {
    text-align: center; /* Center the text horizontally */
}

.design-text {
    color: #ffcc00; /* Set the text color to a specific color (e.g., gold) */
    font-size: 18px; /* Set the font size */
    font-weight: bold; /* Make the text bold */
    /* Add more styling as needed */
}
</style> 

  <div class="margin_top_navbar">
 	</div>

<div class="container">
	<section class="product_fulllist categorypagefull py-3">
		 <!-- <h4 class="d-inline-block fw-bold text-dark text-uppercase bg-light border
     border-danger rounded-pill px-4 py-1 mb-3"> Our Categories </h4>  -->

     <span class="d-inline-block fw-bold text-uppercase bg-danger border border-light rounded-pill px-4 py-1 mb-3 gold-text">
   Our Categories 
</span>
    <!-- <small >Our Categories </small> -->
    
		<!-- <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border #d4a762 rounded-pill px-4 py-1 mb-3">Categories</small> -->
          	<?php foreach($parentcategory as $parentcat)
{  foreach($distinctcategory as  $distinct)
  {
    if($distinct['parentcategory_id']==$parentcat['id']){ ?> 


<div class="category_val">	

<div _ngcontent-lcq-c3="" class="col-12"><h2 _ngcontent-lcq-c3="" class="h3-responsive" style="font-family: 'poppins';font-weight: bold;color:#e7c521;width: 100%;
    text-align: center;
    border-bottom: 2px solid #000;
    line-height: .1em;
    margin: 27px 0 20px;"><span _ngcontent-lcq-c3="" class="ng-tns-c3-0" style="    background: #f7f7f7;
    padding: 0 10px;"><?php echo $parentcat['name'];?></span></h2></div>


<!-- <h5 class="section-title text-center" style="font-size: 46px;color:#d4a762"><?php echo $parentcat['name'];?></h5>	  -->
		



<div class="row">

 <?php  foreach($category  as $cat){ 
                    if($parentcat['id']==$cat['parentcategory_id']): ?>
		<div class="col-6 col-lg-3">

 <a  href="<?=base_url;?>productlist/<?php  echo clean($cat['category_name'] );   ?>/<?php  echo  $cat['randid']  ;   ?>   ">
				<div class="categorypagelist">
					<img  class="image-hover" src="<?=uploads?><?php echo $cat['path']; ?>/<?php echo $cat['image']; ?> ">
					
				 </div>
				</a>
        
				<h6 style="background-color: #4b0603;
  border: none;
  color: white;
  /* padding: 16px 32px; */
  text-align: center;
  font-size: 16px; 
  margin: 4px 2px;
  opacity: 1;
  transition: 0.3s;
  border-radius: 50px 20px;"><?php echo $cat['category_name'];?></h6> 
	</div>
	   <?php  endif;  
             } ?>
	 
 </div>

 <?php  } ?>         
     <?php  } ?>
    <?php  } ?>  
	 
</div>	 	 
	  
	</section>
        
    
    
	 
	</div>
	<br>
 
<hr>
	<?php include 'footer.php '?>