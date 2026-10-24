  <?php include 'header.php'?>  
  <style>
    ol.progtrckr {
    margin: 0 ;
    padding: 0;
    list-style-type none;
    
}

ol.progtrckr li {
    display: inline-block;
    text-align: center;
    line-height: 3.5em;
}

ol.progtrckr[data-progtrckr-steps="2"] li { width: 49%; }
ol.progtrckr[data-progtrckr-steps="3"] li { width: 33%; }
ol.progtrckr[data-progtrckr-steps="4"] li { width: 24%; }
ol.progtrckr[data-progtrckr-steps="5"] li { width: 19%; }
ol.progtrckr[data-progtrckr-steps="6"] li { width: 16%; }
ol.progtrckr[data-progtrckr-steps="7"] li { width: 14%; }
ol.progtrckr[data-progtrckr-steps="8"] li { width: 12%; }
ol.progtrckr[data-progtrckr-steps="9"] li { width: 11%; }

ol.progtrckr li.progtrckr-done {
    color: black;
    border-bottom: 4px solid yellowgreen;
}
ol.progtrckr li.progtrckr-todo {
    color: silver; 
    border-bottom: 4px solid silver;
}

ol.progtrckr li:after {
    content: "\00a0\00a0";
}
ol.progtrckr li:before {
    position: relative;
    bottom: -2.5em;
    float: left;
    left: 50%;
    line-height: 1em;
}
ol.progtrckr li.progtrckr-done:before {
    content: "\2713";
    color: white;
    background-color: yellowgreen;
    height: 2.2em;
    width: 2.2em;
    line-height: 2.2em;
    border: none;
    border-radius: 2.2em;
}
ol.progtrckr li.progtrckr-todo:before {
    content: "\039F";
    color: silver;
    background-color: white;
    font-size: 2.2em;
    bottom: -1.2em;
}


  </style>
 <?php //print_r($_SESSION); ?>
<section class="checkout   py-3">
<div class="container">
    <h3  style="font-family: 'Playball', cursive !important;color:#d4a762">My Orders ID : <?php echo $this->uri->segment(2); ?></h3>
       <br>
      <div class="row">
 
 <div class="col-sm-12">
   
    
 
<div class="address p-2 mb-2 " style="background:#fff;box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);">
  <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom spacing5">
                                    <thead>
                                      <tr>
                                        
                                              <th style="color:#7f1416">Product Name</th>
                                              <th style="color:#7f1416">Quantity</th>
                                              <th style="color:#7f1416">Items</th>
                                               <th style="color:#7f1416">Price</th>
                                               <th style="color:#7f1416">Total</th>
                                              
                                         
                                         
                                    
                                      </tr>
                                    </thead>
                                    <tbody>
                                  
                                       <?php   foreach($myorders as $item){
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

<b>
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

                                          </b>
                                        </td>


                                          <td> <b>  <?php 
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

                                           }} ?>  </b>

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


                                           <a class="text-primary" href=" <?php echo base_url();?>orderviewcombo/<?php echo  $item['productid'];?>"><?php echo  $combopro['name'];?></a>

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
     
 
 

      </div></div>
      <!-- <div class="card mt-5" style="width:80%;margin:0px auto;">
      <div class="card-header">
      Order Status
      </div>   
       <div class="card-body">
       <ol class="progtrckr" data-progtrckr-steps="5">
       <?php foreach($listorder as $item1){ ?>
        <li class="<?php echo isset($item1['result'])? 'progtrckr-done': 'progtrckr-todo' ;?>"> <?php echo  $item1['status'] ?> </li>
      <?php }?>

      </ol> 
      </div>   

      </div> -->
    </section>
    <?php include 'footer.php '?>

 


<link rel="stylesheet" href="<?=assets?>css/jquery.dataTables.min.css">

 <script src="<?=assets?>js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
   $(".dataTable").dataTable();
 </script>
 
 