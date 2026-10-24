<?php include 'header.php' ?>
  
    <div id="main-content">
<?php  //print_r($_SESSION);?>
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Dashboard </h1>   <?php //print_r( $_SESSION);?> 
                    </div>            
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                        
                    </div>
                </div>
            </div>
             <div class="row clearfix">
                <div class="col-sm-3">
                    <div class="card">
                        <div class="body ribbon">
                            <div class="ribbon-box pink">  <?php echo count($myorders);?></div>
                            <a href="<?=adminpath?>assignedorders" class="my_sort_cut text-muted">
                             <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span class="mt-2">New Orders</span>
                            </a>
                        </div>
                    </div>
                </div>
                 
              
                <div class="col-sm-3">
                    <div class="card">
                        <div class="body ribbon">
                            <div class="ribbon-box green">   <?php  echo count($completedorders); ?>  </div>
                            <a href="<?=adminpath?>completedorders" class="my_sort_cut text-muted">
                            <i class="fa fa-check-circle-o  text-success" aria-hidden="true"></i>
                                <span class="mt-2">Completed Orders</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-sm-3">
                    <div class="card">
                        <div class="body">
                            <a href="#" class="my_sort_cut text-muted">
                                <i class="icon-feed"></i>
                                <span class="mt-2">Subscribers</span>
                            </a>
                        </div>
                    </div>
                </div> -->
            </div>
            
        </div>
    </div>

<?php include 'footer.php' ?>