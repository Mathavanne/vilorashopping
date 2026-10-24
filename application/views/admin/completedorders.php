<?php include 'header.php' ?>

    <div id="main-content">
 
          <pre><?php //print_r($myorders);?></pre>  
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <!-- <h1>Chapter List</h1> -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=adminpath?>" style="font-size: 18px"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Completed Order Details </li>
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
                            <h2>Completed Order Details :</h2>
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
                                              <th>Order Id</th>
                                              <th>Customer Name</th>
                                              <th>Customer Area</th>
                                                     <th>Total Amount</th>
                                                <th>Order Time</th>  
                                                <th>Status</th>
                                                 <th>Invoice</th>
                                    
                                      </tr>
                                    </thead>
                                    <tbody>
                                       <?php $i=1;foreach($myorders as $item){
                                       
                                        ?>
                                      <tr>
                                       
                                        <td><?php echo  $i++;?></td>
                                        <td> <a class="text-primary"  href="<?=adminpath?>orderview/<?php echo  $item['orderid'];?>"> <?php echo  $item['orderid'];?></a></td>
                                        <td> 
                                            <?php foreach($customerdetails as $custom){

                                                if($custom['customer_id']==$item['customerid']){
                                                    echo  $custom['fname'];

                                                }
                                            }?> </td>
                                          <td> 
                                            <?php foreach($customerdetails as $custom){

                                                if($custom['customer_id']==$item['customerid']){
                                                     echo  $custom['h_addressline1']."<br>";
                                                  echo  $custom['h_addressline2']."<br>";
                                                  echo  $custom['area']."<br>";
                                                  echo  $custom['h_city']."<br>";

                                                }
                                            }?> </td>
                                          <td><i class="fa fa-inr mr-2"></i> 
                                <?php if($item['discount_amount'])
                                { 
                                echo $item['totalamount'].' - '.$item['discount_amount'].' = '.($item['totalamount']-$item['discount_amount']); } 

                                else{ echo $item['totalamount'];
                                }  ?>   
                                </td>
                                          <td><?php

 $d = DateTime::createFromFormat('Y-m-d H:i:s', $item['ordertime']);
 echo $d->format('d-m-Y  h:i A');  

 ?></td>
                                            <td><?php 
                                            if($item['orderstatus']==1){ echo "Order Confirmed";} 
                                            elseif($item['orderstatus']==2){echo "Order Assigned To Delivery Boy";} 
                                            elseif($item['orderstatus']==3){echo "Order Delivered";}?></td>

                                            <td><a target="_blank" href="<?=adminpath?>viewpdf/<?php echo  $item['orderid'];?>"><i class="fa fa-2x text-danger fa-file-pdf-o" aria-hidden="true"></i></a></td>
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
 