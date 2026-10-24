    <?php include 'header.php'?>  
    <br>
 <?php //print_r($_SESSION); ?>
<section class="checkout   py-3">
<div class="container">
    <h3 style="font-family: 'Playball', cursive !important;color:#d4a762">My Orders</h3>
    <br>
      <div class="row">
 
 <div class="col-sm-12">
    
    

<div class="address p-2 mb-2 " style="background:#fff;box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);">
 <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom spacing5">
                                    <thead>
                                      <tr>
                                        <th style="color:#7f1416">S.No</th>
                                        <th style="color:#7f1416">Order Id</th>
                                        <th style="color:#7f1416">Total Amount</th>
                                        <th style="color:#7f1416">Order Time</th> 
                                        <th style="color:#7f1416">Order Status</th>
                                        <th style="color:#7f1416">Delivery Date</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                       <?php $i=1;foreach($myorders as $item){
                                       
                                         ?>
                                <tr>

                                <td><?php echo  $i++;?></td>
                                <td><a class="text-primary"  href="<?php echo base_url();?>orderview/<?php echo  $item['orderid'];?>"> <?php echo  $item['orderid'];?></a></td>
                                 

                                 
                                <td><i class="fa fa-inr mr-2"></i> <b>
                                <?php if($item['discount_amount'])
                                { 
                                echo $item['totalamount'].' - '.$item['discount_amount'].' = '.($item['totalamount']-$item['discount_amount']); } 

                                else{ echo $item['totalamount'];
                                }  ?>   
                                </b></td>

                                <td><?php

                                $d = DateTime::createFromFormat('Y-m-d H:i:s', $item['ordertime']);
                                echo $d->format('d-m-Y  h:i A');  

                                ?></td>
                                 <td><?php 
                                if($item['orderstatus']==1){ echo "Order Confirmed";} 
                                elseif($item['orderstatus']==2){echo "Waiting for Delivery";} 
                                elseif($item['orderstatus']==3){echo "Order Delivered";}?></td>
                                <td><?php echo $item['deliverydate'] ?></td>
                                </tr>
                                  <?php  } ?> 
                                    </tbody>
                                </table>
                            </div>
    
  </div>   
  
 
      
      
     
  
   </div>
     
 
 

      </div></div>

    </section>
    <br>
    <br>
    <?php include 'footer.php '?>

 


<link rel="stylesheet" href="<?=assets?>css/jquery.dataTables.min.css">

 <script src="<?=assets?>js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
   $(".dataTable").dataTable();
 </script>