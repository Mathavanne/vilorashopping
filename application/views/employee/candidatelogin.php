<!doctype html>
<html lang="en">

<head>
<title>Online Quiz | Candidate Login</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="<?=assets?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?=assets?>/vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?=assets?>css/vivify.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="<?=assets?>css/site.min.css">
<style type="text/css">
    .form-auth-small p{font-size:10px;margin-top:5px;padding-left: 5px; }
</style>
</head>
<body class="theme-cyan font-montserrat light_version">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <div class="bar4"></div>
        <div class="bar5"></div>
    </div>
</div>

<div class="pattern">
    <span class="red"></span>
    <span class="indigo"></span>
    <span class="blue"></span>
    <span class="green"></span>
    <span class="orange"></span>
</div>


<div class="auth-main particles_js">
    <div class="auth_div vivify popIn">
        <div class="auth_brand">
            <a class="navbar-brand" href="javascript:void(0);"><img src=".<?=assets?>images/icon.svg" width="30" height="30" class="d-inline-block align-top mr-2" alt=""></a>
        </div>
        <div class="card">
            <div class="body">
<!-- <?php print_r($_SESSION) ?> -->
             

                <p class="lead">Login to your account </p>

    <form class="form-auth-small m-t-20" method="post" action="<?php echo base_url('Candidatelogin'); ?>"> 
               
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

       
                      
                
                    <div class="form-group clearfix">
                        <label class="fancy-checkbox element-left">
                            <input type="checkbox">
                            <span>Remember me</span>
                        </label>								
                    </div>
                    <button type="submit" name='submit' class="btn btn-primary btn-round btn-block">LOGIN</button>
                    <div class="bottom">
                        <span class="helper-text m-b-10">
                            <i class="fa fa-lock"></i> 
                            <a href="forgetpassword.php">Forgot password?</a>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
</div>
<!-- END WRAPPER -->
    
<script src="<?=assets?>js/libscripts.bundle.js"></script>
<script src="<?=assets?>js/vendorscripts.bundle.js"></script>
<script src="<?=assets?>js/mainscripts.bundle.js"></script>
</body>
</html>
