<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content=" ">
    <meta name="keywords" content=" ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 
  <title>Vilora Shopping</title>
    <!-- Google Font -->
 <link rel="icon" type="image/png"   href="<?=assets?>img/favicon.png">
 
    <!-- Css Styles -->
    <link rel="stylesheet" href="<?=assets?>css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
          integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- <link rel="stylesheet" href="<?=assets?>vendor/font-awesome/css/font-awesome.min.css"> --> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=assets?>css/homepage/owl.carousel.min.css" type="text/css">   
     <link rel="stylesheet" href="<?=assets?>css/homepage/slider.css" type="text/css">
    <link rel="stylesheet" href="<?=assets?>css/homepage/style.css" type="text/css">
  <link rel="stylesheet" href="<?=assets?>css/homepage/responsive.css" type="text/css">


  
  <script type="text/javascript" src="<?=assets?>js/jquery-3.3.1.min.js"></script>
  <style>
    <style>
    /* Define styles for the label and input container */
    .menu-button {
        width: 70px;
        height: 34px;
        margin-top: 10px;
        outline: none;
        background: #7f1416;
        text-align: center;
        padding-top: 5px;
        border-radius: 15px 0px 0px 0px;
        color: white;
        cursor: pointer;
    }

    .search-input-container {
        display: flex;
        align-items: center;
        background: white;
        border-radius: 0px 0px 15px 0px;
        height: 34px;
        margin-top: 10px;
        outline: none;
    }

    /* Define styles for the search input */
    .custom-search {
        border: none;
        width: 100%;
        outline: none;
        padding-right: 80px;
    }

    /* Define styles for the search button */
    .search-button {
        position: absolute;
        right: 10px; /* Adjust this value as needed */
        border: none;
        background: transparent;
        width: 40px;
        height: 34px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    /* Add responsive styles for smaller screens */
    @media (max-width: 768px) {
        .menu-button {
            width: 50px;
            height: 30px;
            padding-top: 3px;
            font-size: 12px;
        }

        .search-input-container {
            height: 30px;
            margin-top: 8px;
        }

        .custom-search {
            padding-right: 60px;
        }

        .search-button {
            width: 30px;
            height: 30px;
        }
    }
</style>

    </style>
</head>

<?php  
function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    $string = strtolower($string); // Convert to lowercase
    return $string;
      }
 ?>
<body style="
background-color:white;"
            >
<?php if($this->session->flashdata('emailexist')){ ?>
  <div class="alert alert-warning   alert-dismissible" style="width: 300px;font-size: 10px;z-index: 9999;
    right: 0; position: absolute;">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
 <?php echo $this->session->flashdata('emailexist'); ?>
</div>
<?php } ?>


<section class="logo">
          <div class="container-fluid bg-dark">
        <div class="row py-2 px-lg-5" style="background: #870000;
        background: linear-gradient(to right, #190A05, #870000);background-color: #1E1F29;">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center text-white">
                    <!-- <small><i class="fa fa-phone-alt mr-2"></i> 9944025562</small>
                    <small class="px-3">|</small>
                    <small><i class="fa fa-envelope mr-2"></i>viloratech@gmail.com</small> -->
                    <small><i class="fa fa-phone-alt mr-2"></i> <a style="color:white;" href="tel:9944025562">9944025562</a></small>
                    <small class="px-3">|</small>
                   <small><i class="fa fa-envelope mr-2"></i><a style="color:white;" href="mailto:viloratech@gmail.com">viloratech@gmail.com</a></small>

                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-white pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

   
  <!-- sample code -->




  
  <input type="hidden" value="<?php echo base_url();?>" class="base_url">
 
  
  <!-- Brand -->


  
 <div class="row" style="background: floralwhite;">
  <div class="col-md-2 col-6  align-self-center" >
 
      <a  href="<?php echo base_url();?>"><img style="max-width: 63%;
    height: auto;
    display: block;
    margin: 8px auto;" class="logoimgs" style="width: 158px; width: 158px;" src="<?=assets?>img/logo.png"> </a>
   <!-- <button style="text-align:center;float: right;"  class="navbar-toggler  " type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
           <i class="fa fa-bars" style="color:#ffbb1d"></i> 
           <p style="font-size: 15px;">Menu</p>
      </button>  -->
 
     </div> 
      <!-- <button style="text-align:center;float: right;"  class="navbar-toggler  " type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
           <i class="fa fa-bars" style="color: #7f1416;"></i> 
           <p style="font-size: 15px;">Menu</p>
      </button>   -->
       <div class="d-md-none col-6 col-md-3 align-self-center text-center">

            <?php if (!$this->session->userdata('customer_id')){ ?> 
             
              <a  class="carticons" href="#signupmodal" data-toggle="modal" > <img class="login_image"  src="<?=assets?>img/login.png"> <p   style=" font-size: 12px;">  Sign In   </p>  
 
          </a>  
  
    <?php } else{?> 
    <div class="carticons">

  <img style=" max-width: 50%; /* Set the maximum width to 100% */
    height: auto; /* Allow the height to adjust proportionally */
    display: block; /* Remove any default inline spacing */
    margin: 0 auto; /* Center the image horizontally (optional) */" class="logoimgs"  src="<?=assets?>img/userimage/<?php echo $customerdetails[0]['profile_pic']; ?>.png"> 
		<div class="dropdown ">
		 <span   class="dropdown-toggle" data-toggle="dropdown"><span style="font-size: 12px;">Hi...</span> <div class="dropdown-menu menudripdown">
    <a style="background: none!important;    font-size: 10px;" class="dropdown-item"> Hi <?php echo $this->session->userdata('customer_username') ?> </a>
    <a class="dropdown-item" href="<?php echo base_url(); ?>myaccount"  >My Account</a>
     <!-- <a class="dropdown-item" href="<?php echo base_url(); ?>myorders"  >My Orders</a> -->
	 <a class="dropdown-item" href="<?php echo base_url(); ?>logout"  >Logout</a> 
	 
  </div>
</div>
</div>
    <?php  } ?>

     <a class="carticons" href="<?php echo base_url(); ?>cart" >  
     <img class="cart_image" style="color:#ffbb1d"  src="<?=assets?>img/cart.png"> <span class="cartitems" style="background:green;color:white;margin-left: -8px;" >0 </span><p   style=" font-size: 12px;"> Cart  </p>  

<!--  <span class="cartitems" >0 </span> -->
  </a> 
  <a  class="carticons basket_div" href="<?php echo base_url(); ?>myorders"  >
  
  <img class="cart_image"  src="<?=assets?>img/order.png"> 
  <p   style=" font-size: 12px;"> My Orders  </p>
  </a>
         </div>
         <div class="col-md-5 col-sm-12 align-self-center" style="margin-left: 57px;margin-top: -14px;">
    <div class="input_texts">
        <form class="form-auth-small m-t-20" method="post" action="<?php echo base_url(); ?>searchresult">
            <!-- <label for="cars" class="menu-button">Menu</label> -->
            <div class="search-input-container">
            <label for="cars"  type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation"
                                              style="    width: 70px;
    height: 34px;
    margin-top: -7px;
    outline: none;
    background: #7f1416;
    text-align: center;
    padding-top: 5px;
    border-radius: 15px 0px 0px 0px;
    color: white;">Menu</label>
                <input style="border:none; order: none;
    border-radius: 0;
    /* width: 70px; */
    height: 34px;
    margin-top: -9px;
    outline: none;
    background: white;
    text-align: center;border-radius: 0px 0px 15px 0px ;
	padding-right:80px;" placeholder="Search For Products" class="custom-search" type="text" name="searchbars" id="category_search_name" autocomplete="off">
                <ul id="more_result"></ul>
                <button class="search-button" type="submit">
                    <i class="fa fa-search" style="color:brown;margin-top:-8px;"></i>
                </button>
            </div>
        </form>
    </div>
</div>
         
         <!-- <div class="col-md-2  align-self-center   "  >  
   <?php if (!$this->session->userdata('location')){ ?> 
 <div class="dropdown menudripdofn deliverylocation">
  <button  >Select Location </button>
 <ul class="dropdown-menu droepsdfm">
    <?php foreach ($area as $key => $name) { ?>
    <li><a href="#" style="text-transform: capitalize;"><?php echo $name['name']; ?></a></li>
    <?php   } ?>
  </ul> 
</div>
<?php } else{  ?>
  <div style="text-align: center;" class="deliverylocation">
<p style="margin-bottom: 0"><b>Selected Location</b></p>
<p style="margin-bottom: 0"><?php echo $this->session->userdata('location'); ?></p>
</div>
  <?php } ?>
         </div>  -->
           <div  class="d-none d-md-block col-md-3 align-self-center text-center">

            <?php if (!$this->session->userdata('customer_id')){ ?> 
             
              <a  class="carticons" href="#signupmodal" data-toggle="modal" > <img class="login_image"  src="<?=assets?>img/login.png"> <p   style=" font-size: 12px;">  Sign In   </p>  
 
          </a>  
  
    <?php } else{?> 
      <div class="carticons">

  <img class="cart_image"   src="<?=assets?>img/userimage/<?php echo $customerdetails[0]['profile_pic']; ?>.png">
  <p     style=" font-size: 12px;">Hi... </p>
 
     <div class="dropdown " style="position: absolute;
    bottom: 10px;
    right: -11px;">
  <span   class="dropdown-toggle" data-toggle="dropdown"> </span>
  <div class="dropdown-menu menudripdown">
    <a style="background: none!important;    font-size: 10px;" class="dropdown-item"> Hi <?php echo $this->session->userdata('customer_username') ?> </a>
    <a class="dropdown-item" href="<?php echo base_url(); ?>myaccount"  >My Account</a>
     <!-- <a class="dropdown-item" href="<?php echo base_url(); ?>myorders"  >My Orders</a> -->
     <a class="dropdown-item" href="<?php echo base_url(); ?>logout"  >Logout</a> 
 
  </div>
</div>
</div>
    <?php  } ?>

     <a class="carticons basket_div" href="#"> 
		  <span class="cartitems" style="background:green;color:white" >0 </span>
		 <img class="cart_image"  src="<?=assets?>img/cart.png"> 
		 <p   style=" font-size: 12px;"> Cart  </p>  


     
  </a>

  
  <a  class="carticons basket_div" href="<?php echo base_url(); ?>myorders"  >
  <img class="cart_image"  src="<?=assets?>img/order.png"> 
  <p   style=" font-size: 12px;"> My Orders  </p>
  </a>
   


<div class="cart_items">
<div class="arrow_top">
</div>
 

 <div class="cart_details">
   <h3 align="center">Cart is Empty</h3>
  </div>

 
  </div>


 </div>
  </div>
</div>
</div>
</div>

</section>


<style></style>
<section class="menu" style="background: #FF4E50;
    background: -webkit-linear-gradient(to right, #F9D423, #FF4E50);
    background: linear-gradient(to right, #F9D423, #FF4E50);">
<div class="container  ">
 <div class="row">
  <div class="col-12"> 
   <div class="nav-prev arrow" style="display: none;"><i class="fa fa-angle-left" aria-hidden="true"></i></div> 
     <nav class="navbar   p-0 cata-sub-nav ">
      
      <!-- <a class="navbar-brand" href="#">Bootstrap 4 Mega Menu</a> -->
     
      <div class="collapse navbar-collapse" id="navbar">
       <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown megamenu-li">
         <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Categories</a>
         <div class="dropdown-menu megamenu" aria-labelledby="dropdown01">
          <div class="row">
  <?php foreach($parentcategory as $parentcat)
  {  foreach($distinctcategory as  $distinct)
    {
      if($distinct['parentcategory_id']==$parentcat['id']){ ?> 
           <div class="col-sm-6 col-lg-3">
            <h5>  <?php echo $parentcat['name'];?></h5>
             <?php foreach($category  as $cat){ 
                      if($parentcat['id']==$cat['parentcategory_id']): ?>
            <a class="dropdown-item"  href="<?=base_url;?>productlist/<?php  echo clean($cat['category_name'] );   ?>/<?php  echo  $cat['randid']  ;   ?>"><?php echo $cat['category_name'];?></a>
          <?php  endif;  
               } ?>
           </div>
   <?php  } ?>         
       <?php  } ?>
      <?php  } ?>         

       
            
          </div>
         </div>
        </li>
  <?php foreach($parentcategory as $parentcat)
  {  

    foreach($distinctcategory as  $distinct)
    {
      if($distinct['parentcategory_id']==$parentcat['id']){?>

               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#"   data-toggle="dropdown">
                 <?php echo $parentcat['name'];?>
                 
                  </a>
                  <div class="dropdown-menu">
                    <?php //print_r($category);  ?>
                   <?php   
                   foreach($category  as $cat){ 
                      if($parentcat['id']==$cat['parentcategory_id']): ?>
                       <a class="dropdown-item"  href="<?=base_url;?>productlist/<?php echo clean($cat['category_name'] ); ?>/<?php  echo  $cat['randid']  ;   ?>"> <?php echo $cat['category_name'];?></a> 

                   <?php  endif;  
               } ?>

                        
                  </div>
                </li>
            <?php  } ?>
      <?php  } ?>
  <?php  } ?>
 
      
         
       </ul>
      </div>


     </nav>
       <!-- <div class="nav-next arrow"  ><i class="fa fa-angle-right" aria-hidden="true"></i></div>   -->
  </div>
 </div>


 </section>

<!-- Button to Open the Modal -->
 <div class="fulldivs">

<!-- The Modal -->
<div class="modal" id="signupmodal">
  <div class="modal-dialog  ">
    <div class="modal-content p-3 signupmodal">

      <!-- Modal Header -->
 

 
      <!-- Modal body -->
      <div class="modal-body">
         <?php //echo form_open_multipart(userpath."registration_add"); ?>
      <div class="formdiv signupdivs" style="display: none">
        <form id="myform" method="post" >
         <h4 class="modal-title w-100 text-center">Sign Up <button type="button" class="close" data-dismiss="modal">&times;</button></h4>
         
<input type="hidden" name="base_url" value="<?php echo base_url(); ?>">
   <label >Avatar</label>
   <style type="text/css">
      .inputsssdd .form-check-inline  {position: relative;}
        .inputsssdd .form-check-input{margin-right: 3.313rem;}
     .inputsssdd .form-check-inline img{    width: 26px;
    position: absolute;
    left: 21px;
    top: -6px;
 }
 /* body{
   background-color:yellow;
 } */
   </style>
<div class="inputsssdd" >
<div class="form-check-inline" >
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="optradio" value="1" checked=""><img src="<?=assets?>img/userimage/1.png">
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="optradio" value="2"><img src="<?=assets?>img/userimage/2.png">
  </label>
</div>
<div class="form-check-inline  ">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="optradio"  value="3" ><img src="<?=assets?>img/userimage/3.png">
  </label>
</div>
<div class="form-check-inline  ">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="optradio"  value="4" ><img src="<?=assets?>img/userimage/4.png">
  </label>
</div>

</div>
<br>
   <label >Full Name</label>
     <div class="inputsss" >
<span class='fa fa-user-circle-o'></span>
<input class="input100" minlength="3" type="text" name="username" placeholder="Type your Full Name">

</div>
<label >Email</label>
<div class="inputsss" >
<span class='fa fa-user-circle-o'></span>
<input class="input100" type="email" name="email" placeholder="Type your Email">

</div>
<label >Password</label>
     <div class="inputsss" >
<span class='fa fa-key'></span>
<input class="input100" type="password" name="password" placeholder="Type your Password">

</div>
<label >Mobile Number</label>
 <div class="inputsss  " >
<span class='fa fa-phone'></span>
<input class="input100" type="text" maxlength="10" minlength="10" name="phone" placeholder="Type your Mobile Number">

</div>
<label >Referal Code(Optional)</label>
 <div class="inputsss mb-5" >
<span class='fa fa-tag'></span>
<input class="input100" type="text" maxlength="8" minlength="8" name="refercodeuser" placeholder="Type Referal Code"> 
</div>
 
<div class="form_div">
<div class="loginbutton"></div>
<button class="loginbtn" type="submit" name="registersubmit">
Sign Up
</button>
</div>
      <p class="bottombar bottombar1">Already Have Account Sign In</p>
    </form>
      </div>


         <div class="logindiv">
 <form id="loginform" method="post"  >
            <h4 class="modal-title w-100 text-center">Sign In  <button type="button" class="close" data-dismiss="modal">&times;</button></h4>

<label >Email</label>
<div class="inputsss" >
<span class='fa fa-user-circle-o'></span>
<input class="input100" type="email" name="loginusername" placeholder="Type your Email">

</div>
<label >Password</label>
     <div class="inputsss" >
<span class='fa fa-key'></span>
<input class="input100" type="password" name="loginpassword" placeholder="Type your Password">

</div>
    <a data-dismiss="modal" href="#forgotpass" data-toggle="modal" class="bottombar d-block text-left mb-4"><small>Forgot Password ?</small></a>
<div class="form_div">
<div class="loginbutton"></div>
<button class="loginbtn" type="submit" name="loginsubmit">
Log In
</button>
</div>
 
 
<p class="bottombar">Not Registered?  Create Your Account  </p>
</form>
</div>
      </div>
 

    </div>
  </div>
</div>

 <div class="modal" id="forgotpass">
  <div class="modal-dialog  ">
    <div class="modal-content p-3 signupmodal">
 
      <div class="modal-body"> 
<form id="forgotpassword">
 <h4 class="modal-title w-100 text-center">Forgot Password  <button type="button" class="close" data-dismiss="modal">&times;</button></h4>

<label >Email</label>
<div class="inputsss" >
<span class='fa fa-user-circle-o'></span>
<input class="input100" type="email" name="forgotpassworddf" placeholder="Type your Email">

</div>
 
 
<div class="form_div">
<div class="loginbutton"></div>
<button class="loginbtn btnforgot" type="submit" name="forgotsubmit">
Submit
</button>
</div>
 </form>
 
<!-- <p class="bottombar">Not Registered?  Create Your Account  </p> -->
 
 
      </div>
 

    </div>
  </div>
</div>