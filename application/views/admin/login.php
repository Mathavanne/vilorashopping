<!doctype html>
<html lang="en">

<head>
<title>Dots | Admin Login</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="">

 <link rel="icon" type="image/png"   href="<?=assets?>img/favicon.png">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="<?=assets?>css/bootstrap.min.css">
 
<!-- MAIN CSS -->
<link rel="stylesheet" href="<?=assets?>css/site.min.css">
<style type="text/css">
    .form-auth-small p{font-size:10px;margin-top:5px;padding-left: 5px; }
</style>
</head>
<body class="theme-cyan font-montserrat light_version"  >

 


<div class="auth-main particles_js">
    <div class="auth_div vivify popIn">
      <img class="mb-2 w-50" src="<?=assets?>img/logo.png" alt="Dots" class="img-fluid logo" style="width:176px;">
        <div class="card">
            <div class="body">
                
             

                <p class="lead text-capitalize" >  Admin   Login </p>

    <form class="form-auth-small m-t-20" method="post" action="<?php echo base_url('Login'); ?>"> 
               
                    <div class="form-group">
                        <label for="signin-email" class="control-label sr-only">Email</label>
                        <input type="text" class="form-control round" name='username'  value="<?php echo set_value('username'); ?>" placeholder="Enter Username">
                          <span class="text-danger text-left"><?php echo form_error('username'); ?></span>
                    </div>
                    <div class="form-group">
                        <label for="signin-password" class="control-label sr-only">Password</label>
                        <input type="password" class="form-control round" name='password' value="<?php echo set_value('password'); ?>" placeholder="Enter Password">
                          <span class="text-danger text-left"><?php echo form_error('password'); ?></span>
                    </div>

          <p class="text-danger text-left">  <?php echo isset($error) ? $error : ''; ?>   </p>          

       
                      
                
                   <!--  <div class="form-group clearfix">
                        <label class="fancy-checkbox element-left">
                            <input type="checkbox">
                            <span>Remember me</span>
                        </label>								
                    </div> -->
                    <button type="submit" name='submit' class="btn btn-primary btn-round btn-block">LOGIN</button>
                  <!--   <div class="bottom">
                        <span class="helper-text m-b-10">
                            <i class="fa fa-lock"></i> 
                            <a href="forgetpassword.php">Forgot password?</a>
                        </span>
                    </div> -->
                </form>
            </div>
        </div>
    </div>
 
</div>
<!-- END WRAPPER -->
    
 
</body>
</html>
