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
                           <h2>Order ID    : <?php echo $this->uri->segment(3);?></h2>
                            <ul class="header-dropdown dropdown">  
                              <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom spacing5">
                                    <thead>
                                      <tr>
                                        
                                              <th>Product Name</th>
                                               <th>Quantity</th>
                                              <th>Items</th>
                                               <th>  Price</th>
                                                  <th>Total Price</th>
                                              
                                             <!--    <th>Order Time</th> -->
                                         
                                    
                                      </tr>
                                    </thead>
                                    <tbody>
                                  
                                       <?php foreach($myorders as $item){
                                        if($item['category']=="product"){
                                       
                                        ?>
                                      <tr>
                                       
                                     
                                        <td> 

                                          <?php  foreach($productvalue as $productva ){ ?>

                                          <?php if($productva['id']==$item['productid']){
                                           echo  $productva['productname'];}?>

                                        <?php } ?> 
                                        </td>
                                         <td> 

                                          <?php 
                                          if(!$item['variantid']){
                                           foreach($productvalue as $productva ){ 
                                          if($productva['id']==$item['productid']){
                                           echo  $productva['quantity'];} 

                                         } }  if($item['variantid']){
                                          foreach($variantvalue as $variantval ){ 
                                  if($variantval['id']==$item['variantid']){
                                          echo  $variantval['quantity'];
                                        }

                                           }} ?>
                                        </td>
                                         <td> <?php echo  $item['quantity'];?> </td>
                                       
                                            <td> 


                                           <?php 
                                          if(!$item['variantid']){ 
                                          foreach($productvalue as $productva ){  
                                             if($productva['id']==$item['productid'])                                        
                                           if($productva['disprice']){echo  $productva['disprice'] ;}
                                            else{  echo  $productva['price'] ;}
                                           } } ?> 
                                        <?php if($item['variantid']){
                                          foreach($variantvalue as $variantval ){ 
                                  if($variantval['id']==$item['variantid']){
                                         if($variantval['disprice']){echo  $variantval['disprice'] ;}
                                            else{  echo  $variantval['price'] ;}
                                        }

                                           }} ?>                                          

                                            
                                        </td>
                                          <td>   <?php 
                                          if(!$item['variantid']){ 
                                          foreach($productvalue as $productva ){  
                                             if($productva['id']==$item['productid'])                                        
                                           if($productva['disprice']){echo  $productva['disprice']*$item['quantity'] ;}
                                            else{  echo  $productva['price']*$item['quantity'] ;}
                                           } } ?> 
                                        <?php if($item['variantid']){
                                          foreach($variantvalue as $variantval ){ 
                                  if($variantval['id']==$item['variantid']){
                                         if($variantval['disprice']){echo  $variantval['disprice']*$item['quantity'] ;}
                                            else{  echo  $variantval['price']*$item['quantity'] ;}
                                        }

                                           }} ?>  

</td>
                                      </tr> 
                                  <?php  }} ?> 

                                      <?php   foreach($myorders as $item){
                                        if($item['category']=="combo"){
                                       
                                        ?>
                                      <tr>
                                       
                              
                                        <td> 

                                          <?php  foreach($comboproductvalue as $combopro  ){ ?>

                                          <?php if($combopro['id']==$item['productid']){?>


                                           <a class="text-primary" href="<?=adminpath;?>orderviewcombo/<?php echo  $item['productid'];?>"><?php echo  $combopro['name'];?></a>

                                         <?php }?>

                                        <?php } ?> 
                                        </td>
                                         <td> <?php echo  $item['quantity'];?> </td>
                                       
                                         
                                      </tr> 
                                  <?php  }} ?> 
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
 