<?php include 'header.php' ?>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <!-- <h1>Chapter List</h1> -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=adminpath?>" style="font-size: 18px"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Customer</li>
                            </ol>
                        </nav>
                    </div>            
                    
                </div>
            </div>
            
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Customer List :</h2>
                            <ul class="header-dropdown dropdown">  
                              <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom spacing5">
                                    <thead>
                                      <tr>
                                        <th>S.No</th>
                                              <th>Customer Name</th>
                                        <th> Email</th>
                                        <th>Phone</th>
               
                                        <th>Address</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                       <?php $i=1;foreach($customer as $item){
                                       
                                        ?>
                                      <tr>
                                       
                                        <td><?php echo  $i++;?></td>
                                            <td><?php echo $item['fname']  ;?></td>
                                             <td><?php echo $item['email']  ;?></td>
                                    
                          <td><?php echo $item['phone']  ;?> </td>
                           <td><?php //echo $item['h_addressline1']  ;?><br>
                             <?php //echo $item['h_addressline2']  ;?><br>
                             <?php echo $item['area']  ;?><br>
                             <?php //echo $item['h_city']  ;?><br>
                           </td>
                                    
                                      </tr>
                                  <?php  } ?>
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
 