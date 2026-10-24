<?php include 'header.php' ?>

    <div id="main-content">
   <?php if($this->session->flashdata('msg')):   ?> 
       <div style="position: absolute;right: 0;top: 0;" class="alert alert-<?php echo $this->session->flashdata('msg')['status']; ?> alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong><?php echo $this->session->flashdata('msg')['status']; ?>!</strong> <?php echo $this->session->flashdata('msg')['message']; ?>
      </div>
<?php endif;  ?>
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <!-- <h1>Chapter List</h1> -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=adminpath?>" style="font-size: 18px"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Order Details </li>
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
                            <h2>Order Details :</h2>
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
                                                <th>Payment</th>
                                                <th>Order Time</th>
                                                <th>Assign</th>
                                                <th>Order Status</th>
                                                <!--      <th>Order Time</th> -->
                                             <!--    <th>Order Time</th> -->
                                         
                                    
                                      </tr>
                                    </thead>
                                    <tbody>
                                       <?php $i=1;foreach($myorders as $item){
                                       
                                         ?>
                                <tr>

                                <td><?php echo  $i++;?></td>
                                <td><a class="text-primary"  href="<?=adminpath?>orderview/<?php echo  $item['orderid'];?>"> <?php echo  $item['orderid'];?></a></td>
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
                                <td><i class="fa fa-euro mr-2"></i> 
                                <?php if($item['discount_amount'])
                                { 
                                echo $item['totalamount'].' - '.$item['discount_amount'].' = '.($item['totalamount']-$item['discount_amount']); } 

                                else{ echo $item['totalamount'];
                                }  ?>   
                                </td>
                                <td>
                                <?php if($item['payment']==2)
                                { 
                                echo "Bank Transfer <br/>"; 
                                    
                                } 
                                else{ 
                                    echo "Cash On Delivery";
                                }  
                                ?>   
                                </td>
                              
                                <td><?php

                                $d = DateTime::createFromFormat('Y-m-d H:i:s', $item['ordertime']);
                                echo $d->format('d-m-Y  h:i A');  

                                ?>
                                </td>
                                <td> <a class="text-primary" data-toggle="modal"  href="#myModal<?php echo  $item['orderid'];?>">Assign Order</a>
                                <div class="modal" id="myModal<?php echo  $item['orderid'];?>">
                                <div class="modal-dialog">
                                <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                <h4 class="modal-title">Assign Delivery Boy</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                <form class="form-auth-small m-t-20"   method="post" action="<?=adminpath?>assignorder"> 
                                <input type="hidden" value="<?php echo  $item['orderid'];?>" name="orderid">
                                <label>Delivery Boy</label>
                                <select class="form-control" name="employeeassign">
                                <option value="">Select Option</option>
                                <?php foreach($employeedetails as $employeedet) {?>
                                <option value="<?php echo $employeedet['id'];?>" ><?php echo $employeedet['name'];?></option>
                                <?php }?>
                                </select>
                                <button type="submit" name="submitbutton" class="btn btn-primary mt-2">Assign</button>
                                </form>
                                </div>


                                </div>
                                </div>
                                </div>
                                </td>

                                <!--Order Status-->
                                <td>
                                 <a class="text-primary orderstatus" data-toggle="modal" id="<?php echo  $item['orderid'];?>"  href="#models<?php echo  $item['orderid'];?>">Order status</a>
                                <div class="modal" name="" id="models<?php echo  $item['orderid'];?>">
                                <div class="modal-dialog">
                                <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                <h4 class="modal-title">Assign Order status</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                <form class="form-auth-small m-t-20"   method="post" action="<?=adminpath?>orderStatus"> 
                                <input type="hidden"  value="<?php echo  $item['orderid'];?>" name="orderid">
                                <input type="hidden" value="<?php echo  $item['customerid'];?>" name="customerid">
                                <label>Order Status List</label>
                                <select class="form-control product" name="orderstatus">
                                <option value="">Select Option</option>
                                
                                   <!-- <?php foreach($status as $employeedet){ ?>
                                <option value="<?php echo $employeedet['status'];?>" ><?php echo $employeedet['status'];?></option>
                                
                             
                                <?php  } ?>          -->

                                </select>
                                <button type="submit" name="status_button" class="btn btn-primary mt-2">Assign</button>
                                </form>
                                </div>


                                </div>
                                </div>
                                </div>
                                </td>




                                <!--   <td> <?php echo  $item['ordertime'];?></td>   -->
                                <!--   <td><?php 
                                if($item['orderstatus']==1){ echo "Order Confirmed";} 
                                elseif($item['orderstatus']==2){echo "Order Assigned To Delivery Boy";} 
                                elseif($item['orderstatus']==3){echo "Order Delivered";}?></td>-->
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
    <script type="text/javascript">
    
    $(document).on('click', '.orderstatus ', function(){
        console.log($(this).attr("id"),"ewurueiwurew")
        let totals =$(this).attr("id");
        $.ajax({
    url:"<?php echo base_url();?>Admin/orderlist",
    method:"POST",
    data:{orderid:totals},
    success:function(data)
    { 
        let dbs = JSON.parse(data);
        var options =  '<option value=""><strong>Select Options</strong></option>'; //create your "title" option

        $(dbs).each(function(index, value){ //loop through your elements
        if(value.status){ //check the company
            options += '<option value="'+value.status+'">'+value.status+'</option>'; //add the option element as a string
        }
    });

    $('.product').html(options);
 
   }
   });
     });
    //  $('.none').click(function(){
    //     window.loction=""
    //  })
</script>
<?php include 'footer.php' ?>
 