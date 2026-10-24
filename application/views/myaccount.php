    <?php include 'header.php'?>  
 <?php //print_r($_SESSION); ?>
<section class="checkout cart py-3">
<div class="container">
    <h3>My Account</h3>
       
      <div class="row">
 
 <div class="col-sm-9">
<div class="address p-2 mb-2 " style="background:#fff">
 

    <div class="p-2">
   

   <div class=" "  >
     <h6> Personal Details </h6>
    <?php foreach ($customerdetails as $key => $customerdet) { ?>
 

      
      
      <p><b>Name : </b><?php echo $customerdet['fname']; ?></p>
 <p><b>Phone : </b><?php echo $customerdet['phone']; ?></p>
  <p><b>Email : </b> <?php echo $customerdet['email']; ?></p>
  <p><b>Your Referal Code :  </b> <?php echo $customerdet['referalcode']; ?></p>
   
   <?php     } ?>
    
             </div> 
      
    </div>

    
  </div>
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
   <select class="form-control" name="area"   >
     <option value="" >Select Option</option>
    <?php foreach($areaname as $areas){ ?>
 <option value="<?php echo  $areas['name']; ?>" ><?php echo  $areas['name']; ?></option>

   <?php } ?>
 
   </select></div>
      <div class="col-md-6"><label><small>City</small></label>
   <select class="form-control" name="city" >
   <?php foreach($city as $citys){ ?>
 <option value="<?php echo  $citys['city']; ?>" ><?php echo  $citys['city']; ?></option>

   <?php } ?>
     
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
 
           
      
     
  
   </div>
     
<div class="col-sm-3">
           
  <div class="cart_listdiv  mb-2 p-2" style="background:#fff">

  
  <p style="color:var(--primarycolor);"><i class="fa fa-gift"></i>   <b>Your Points :</b> <?php echo $customerdetails[0]['points'] ; ?></p>
    <a style="color:var(--primarycolor);" class="  text-info mb-2 d-block"  href="<?php echo base_url();?>myorders"><i class="fa fa fa-file-text-o"></i> My Orders</a>  
 <a style="color:var(--secondarycolor);"    href="<?php echo base_url();?>logout"><i class="fa fa-sign-out"></i> Logout</a>

                </div>
            </div>
 

      </div></div>

    </section>
    <?php include 'footer.php '?>

 



  <script type="text/javascript">
 $(".edit_address").on('click',function(){
$(".addresshow").hide();
$(".addresshowedit").show();
    });
  </script>