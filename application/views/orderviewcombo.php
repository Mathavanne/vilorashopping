 





  <?php include 'header.php'?>  
 <?php //print_r($_SESSION); ?>
<section class="checkout   py-3">
<div class="container">
    <h3> Combo Products Details</h3>
       
      <div class="row">
 
 <div class="col-sm-12">
   
    

<div class="address p-2 mb-2 " style="background:#fff">
   
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
     
 
 

      </div></div>

    </section>
    <?php include 'footer.php '?>

 


<link rel="stylesheet" href="<?=assets?>css/jquery.dataTables.min.css">

 <script src="<?=assets?>js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
   $(".dataTable").dataTable();
 </script>
 
 