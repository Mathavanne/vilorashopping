   <?php include 'header.php'?>  
 
<section class="cart py-3">
<div class="container">
 
	   <div class="text-center p-3"   >

<img style="width: 300px" src="<?=assets?>img/empty.png">
<h4 ><?php if(isset($errormessage)){
  echo $errormessage;
} ?></h4>
       
     </div>
</div>

	</section>

   <?php include 'footer.php '?>

