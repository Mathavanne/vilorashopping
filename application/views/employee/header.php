
<!DOCTYPE html>
<html lang="en">

<head>
<title>Mr.Grocers Employee Login </title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="">
<meta name="keywords" content="">

 <link rel="icon" type="image/png"   href="<?=assets?>img/favicon.png">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="<?=assets?>css/bootstrap.min.css">
   <!-- <link rel="stylesheet" href="<?=assets?>vendor/font-awesome/css/font-awesome.min.css"> --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="<?=assets?>css/jquery.dataTables.min.css">

<link rel="stylesheet" href="<?=assets?>css/site.min.css">
<link rel="stylesheet" href="<?=assets?>css/style.css">
<link rel="stylesheet" href="<?=assets?>css/stylenew.css">
<script type="text/javascript" src="<?=assets?>js/jquery-3.3.1.min.js"></script>

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



<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<div id="wrapper">

    <nav class="navbar top-navbar">
        <div class="container-fluid">

            <div class="navbar-left">
                <div class="navbar-btn">
                    <a href="<?=adminpath?>/index"><img src="<?=assets?>img/logodashboard.png" alt="Dots" class="img-fluid logo"></a>
                    <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                </div>
            </div>
            
            <div class="navbar-right">
                <div id="navbar-menu">
                    <ul class="nav navbar-nav">
                        <!-- <li><a href="javascript:void(0);" class="search_toggle icon-menu" title="Search Result"><i class="icon-magnifier"></i></a></li>
                        <li><a href="javascript:void(0);" class="right_toggle icon-menu" title="Right Menu"><i class="icon-bubbles"></i><span class="notification-dot bg-pink">2</span></a></li> -->
                        <li><a href="<?=adminpath?>logout" title="logout" class="icon-menu"><i class="icon-power"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="progress-container"><div class="progress-bar" id="myBar"></div></div>
    </nav>

    <div class="search_div">
        <div class="card">
            <div class="body">
                <form id="navbar-search" class="navbar-form search-form">
                    <div class="input-group mb-0">
                        <input type="text" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="icon-magnifier"></i></span>
                            <a href="javascript:void(0);" class="search_toggle btn btn-danger"><i class="icon-close"></i></a>
                        </div>
                    </div>
                </form>
            </div>            
        </div>
    </div>

    <div id="left-sidebar" class="sidebar">
        <div class="navbar-brand">
            <a href="<?=adminpath?>index"><img src="<?=assets?>img/logo.png" alt="Dots" class="img-fluid logo"> </a>
            <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu icon-close"></i></button>
        </div>
        <div class="sidebar-scroll">
            <div class="user-account">
                <div class="user_div">
<!--                     <img src="<?=assets?>images/user.png" class="user-photo" alt="User Profile Picture">
 -->                </div>
                <div class="dropdown">
                    <span>Welcome,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong class="text-capitalize"><?php echo $_SESSION['employee_name'];?></strong></a>
                    <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                   
                        <li><a href="<?=adminpath?>logout"><i class="icon-power"></i>Logout</a></li>
                    </ul>
                </div>                
            </div>  
            <nav id="left-sidebar-nav" class="sidebar-nav">
              <ul id="main-menu" class="metismenu">
                <li class="header">Main</li>
                  <li><a href="http://192.168.0.112:8080/ganapathy_shopping/" target="_blank"><!-- <i class="icon-speedometer"></i> --><span>Homepage <i class="fa fa-external-link"></i> </span></a></li>
                <li><a href="<?=adminpath?>"><!-- <i class="icon-speedometer"></i> --><span>DashBoard </span></a></li>
                 

                 
              
                  <li><a href="<?=adminpath?>assignedorders"><!-- <i class="icon-speedometer"></i> --><span>Assigned Orders </span></a></li>
<li><a href="<?=adminpath?>completedorders"><!-- <i class="icon-speedometer"></i> --><span>Completed Orders </span></a></li>
                      </ul>
            </nav>     
        </div>
    </div>

