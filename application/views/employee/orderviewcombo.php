<?php include 'header.php' ?>

    <div id="main-content">
<!--  <?php   print_r(  $productvalue ); ?>
 <br>
  <?php   print_r(  $myorders ); ?> -->
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <!-- <h1>Chapter List</h1> -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=adminpath?>" style="font-size: 18px"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page"> </li>
                            </ol>
                        </nav>
                    </div>            
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                     
                    </div>
                </div>
            </div>
            
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="text-capitalize"><?php echo $myorders[0]['name']; ?>  :</h2>
                            <ul class="header-dropdown dropdown">  
                              <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom spacing5">
                                    <thead>
                                      <tr>
                                        <th>S.No </th>
                                              <th>Product Name</th>
                                              <th>Price</th>
                                              <th>Quantity</th>
                                              
                                             <!--    <th>Order Time</th> -->
                                         
                                    
                                      </tr>
                                    </thead>
                                    <tbody>
                                
                                     <!--   <pre><?php print_r($myorders);?></pre>
                                       <pre> <?php  print_r(  $productvalue);?></pre> -->

                                       <?php $i=1; foreach($productvalue as $item){ 
                                        ?>
                                      <tr>
                                          <td> <?php echo $i++;?> </td>
                                      
                                         <td> <?php echo  $item['productname'];?> </td>
                                       
                                         <td> <?php echo  $item['disprice'];?> </td>
                                         <td> <?php echo  $item['quantity'];?> </td>
                                      </tr> 
                    <?php } ?>
 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             


 
        </div>
    </div>

<?php include 'footer.php' ?>
 