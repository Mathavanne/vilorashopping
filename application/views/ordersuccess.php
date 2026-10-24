   <?php include 'header.php'?>  
 
<section class="cart py-3">
<div class="container">
 
	   <div class="text-center p-3"   >

<img style="width: 300px" src="<?=assets?>img/success.png">
<h5 ><?php if(isset($errormessage)){
  echo $errormessage;
} ?></h5>
       
     </div>
</div>

	</section>

   <?php include 'footer.php '?>

