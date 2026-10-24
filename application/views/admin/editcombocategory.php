<?php include 'header.php' ?>



    <div id="main-content">

        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <!-- <h1>Subject List</h1> -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=adminpath?>" style="font-size: 18px"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Combo Category </li>
                            </ol>
                        </nav>

                     
                    </div>   
                    <div class="col-md-6 col-sm-12 text-right  ">
                      <a  type="button" class="btn btn-sm btn-primary text-white" href="<?=adminpath?>combocategory"  >Go to Combo Category List</a>
                    </div>         
                    
                </div>
            </div>
            
            <div class="row clearfix">
                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Edit Combo Category :</h2>
                            <ul class="header-dropdown dropdown">  
                              <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                            </ul>
                        </div>
                             <form class="form-auth-small m-t-20" enctype="multipart/form-data" method="post" action="<?=adminpath?>editcombocategorysubmit"> 
                        <div class="body">
                        
                       

<?php $i=1;foreach($questions as $item){?>
                        
     <input type='hidden' name='id' value='<?php echo  $item['id'];?>'>
                    
                          <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="font-weight-bold"> Category Name :</label>
                                  <input type="text" name='combocategory_edit' class="form-control" placeholder="Parent Category Name" 
                                    value="<?php   echo set_value('combocategory_edit',$item['name']); ?>">
                             <span class="text-danger text-left"><?php echo form_error('combocategory_edit' ); ?></span>
                           
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold"> Category Amount :</label>
                                    <input type="number" name='combocategoryamount_edit' class="form-control" placeholder="Parent Category Name" 
                                    value="<?php echo set_value('combocategoryamount_edit' ,$item['amount']); ?>">
                             <span class="text-danger text-left"><?php echo form_error('combocategoryamount_edit' ); ?></span>
                           
                                </div>
                               
                                <div class="form-group">
                               
                          <?php  foreach($questions as $questionss){                         
                            $selectedvalue=explode(',',$questionss['products']);                     
                           } 
                            
                            ?>

                      <label class="font-weight-bold w-100">Products:</label>
                              
                   

                                <?php foreach($products as $pro){ 
                                 }

                                  ?>       
                            <select class="form-control js-example-basic-multiple" name='productss[]' multiple="multiple">  
                              <?php foreach($products as $pro){ ?>
                              <option <?php  foreach($selectedvalue as $key=>$res){                           
                                 if($pro['id']==$res){echo "selected";}                                
                                    }  ?>  value="<?php echo $pro['id']; ?>"><?php echo $pro['productname']; ?><s> (<?php echo $pro['quantity']; ?>)</s></option>
                               <?php } ?>   
                            </select>  
                                      <span class="text-danger text-left"><?php echo form_error('productss[]'); ?></span>
                                </div>
                          
                            </div>

                                
                                    <div class="d-block w-100 text-right mt-3">
                                    
                                       <button name='submitbutton' type="submit" class="btn btn-primary text-center  "     >Save  </button>
                                       
                                    </div>
                                  
                             
                          </div>
                <?php } ?>   
                        
                 
                        </div><h5 class="my-3">Edit Images <small style="font-size: 8px;" class="text-muted d-inline "> ( Image Size 150 X 150 )</small></h5>

                        <div class="body mt-2">
                      
                         
     
                            <?php  //print_r( $images); ?>

                          

                             <div class="row">

                               <?php foreach($questions as $item){?>
                              <div class="col-sm-3">
                                <div class="light_back" style="position: relative;padding: 5px" >
                               
                                                               
                                <img src="<?=uploads?><?php echo $item['path'].'/'.$item['image']?>">

                              </div>
                              </div>
                                  <input type="hidden" name="imagename"  value="<?php echo $item['image'];?> ">
                              <?php } ?>
                         

                            
                              <div class="col-sm-12 mt-4" >
                                <label>Change Image</label><br>
                                    <input type="file"  name="userfile"  accept="image/png,image/jpg, image/jpeg">
                                    <span class="text-danger"><?php  
                                    if(isset($editerror)){echo $editerror;}?> 
                                </span>
                                      </div>
                                      
                                    <div class="d-block w-100 text-right mt-3">
                                    
                                       <button name='imagesubmitbutton' type="submit" class="btn btn-primary text-center  "     >Save  </button>
                                       
                                    </div>
                                  </div> 
                           
                               </div>
                                  </form>
                    </div>
                </div>
            </div>

             
 

        </div>
    </div>

<?php include 'footer.php' ?>

 
 