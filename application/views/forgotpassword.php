   <?php include 'header.php'?>  
  
 
<section class="py-3">
<div class="container">
	<h3>Forgot Password</h3>
	<div class="card p-3">
	<?php echo form_open(adminpath."forgotpasswordsubmit");?>
	<label class="my-2">New Password </label>
	<input type="text" class="form-control" name="password" value="<?php echo set_value('password'); ?>">
 
	 <span class="text-danger"><small><?php echo form_error('password')?></small></span>
	<label class="my-2">Confirm Password </label>
	  <input type="text" class="form-control" name="resetpassword"  value="<?php echo set_value('username'); ?>"> 
	  
	  	 <span class="text-danger"><small><?php echo form_error('resetpassword')?></small></span>
	  <input type="hidden" value="<?php echo set_value('hiddenval',$this->uri->segment(3) ); ?> " name="hiddenval">
	  <button class="btn primary_button  my-2" type="submit"   name="resetpasswordset">Submit</button>
	</div>
	   </div>

	</section>

	<style>.text-danger *{color:#dc3545!important;}</style>
	<?php include 'footer.php '?>

