<?php include 'header.php' ?>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
       <?php if($this->session->flashdata('msg')): ?>
       <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      <?php echo $this->session->flashdata('msg'); ?>
       </div>
      <?php endif; ?> 
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <!-- <h1>Chapter List</h1> -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=adminpath?>" style="font-size: 18px"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Product </li>
                            </ol>
                        </nav>
                    </div>   

                      <div class="col-md-6 col-sm-12 text-right  ">
                      <a  type="button" class="btn btn-sm btn-primary text-white" href="<?=adminpath?>product"  >Go to Product List</a>
                    </div>            
                    
                </div>
            </div>
            
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Add Product:</h2>
                        </div>
                        <div class="body">

                       
                                <?php echo form_open_multipart(adminpath."addproduct_submit"); ?>
 
                                <div class="row new_product">
                                    <div class="col-sm-4 col-lg-3">
                                    
                                     <label class="font-weight-bold">Product Name *  </label>
                                  <input class="form-control" name="productname"  value="<?php echo set_value('productname'); ?>">

                                        <span class="text-danger"><small><?php echo form_error('productname')?></small></span>
                                    </div>
                                    <div class="col-sm-4 col-lg-3">
                                
                                          <label class="font-weight-bold">  Category *  :</label>
                                    <select class="form-control" name="productcategory">
                                      <option value="">Select Option</option>
                                        <?php foreach ($question as $questionlist){ ?>
                                        <option value="<?php echo $questionlist['id']?>" 
                                          <?php echo set_select('productcategory', $questionlist['id'], False); ?>
                                          > <?php echo $questionlist['category_name']?> </option>
                                       <?php  } ?>
                                    </select>
                                     <span class="text-danger"><?php echo form_error('productcategory');?></span>
                                    </div>

                                     
                                     <div class="col-sm-4 col-lg-3">
                                    
                                     <label class="font-weight-bold">Price (Eg:90&#128;)  </label>
                                  <input type="text"  class="form-control" name="price"  value="<?php echo set_value('price'); ?>">

                                        <span class="text-danger"><small><?php echo form_error('price')?></small></span>
                                    </div>

                                     <!-- <div class="col-sm-4 col-lg-3">
                                    
                                     <label class="font-weight-bold">Discount Price <small>(Eg : 900 Rs) : </small>  </label>
                                  <input type="number"   class="form-control" name="disprice"  value="<?php echo set_value('disprice'); ?>">

                                        <span class="text-danger"><small><?php echo form_error('disprice')?></small></span>
                                    </div> -->

                                    <div class="col-sm-12">
                                    
                                     <label class="font-weight-bold">Description   </label>
                                     <textarea class="form-control" name="descrip" ><?php echo set_value('descrip'); ?></textarea>
                            

                                        <span class="text-danger"><small><?php echo form_error('descrip')?></small></span>
                                    </div>
                                     
                                     
                                  <div class="col-sm-4 col-lg-3">
                                    
                                     <label class="font-weight-bold">Quantity *  </label>
                                  <input placeholder="Eg: 1pc,100 Gram" class="form-control" name="quantity"  value="<?php echo set_value('quantity'); ?>">

                                        <span class="text-danger"><small><?php echo form_error('quantity')?></small></span>
                                    </div>

                                    <div class="col-sm-4 col-lg-3">
                                    
                                     <label class="font-weight-bold">Stock Quantity *  </label>
                                      <input type="number" placeholder="Eg:20" class="form-control" name="stockquantity"  value="<?php echo set_value('stockquantity'); ?>">
                                      <span class="text-danger"><small><?php echo form_error('stockquantity')?></small></span>
                                    </div>  

                                <div class="col-sm-4 col-lg-3 form-group">
                              <label class="d-block pb-2 font-weight-bold">Stock :</label>
                                <label class="fancy-radio">
                                  <input name="stock"  type="radio" value="1" checked   >
                                    <span><i></i>InStock</span>
                                </label>
                                <label class="fancy-radio">
                                  <input name="stock"  type="radio" value="0"   >
                                  <span><i></i>Out Of Stock</span>
                                </label>
                                  <span class="text-danger"><small><?php echo form_error('stock')?></small></span>
                                 </div>

                            <div class="col-sm-4 col-lg-3 form-group">
                              <label class="d-block pb-2 font-weight-bold">Trending :</label>
                                <label class="fancy-radio">
                                  <input name="trending"  type="radio" value="1"   >
                                    <span><i></i>Yes</span>
                                </label>
                                <label class="fancy-radio">
                                  <input name="trending"  type="radio" value="0"  checked  >
                                  <span><i></i>No</span>
                                </label>
                                 
                            </div>
                                 

                                  <div class="col-sm-4 col-lg-3">
                                  <label class="font-weight-bold">Product Image <small style="font-size: 8px;" class="text-muted d-inline "> ( Image Size 150 X 150 )</small></label>
                                   <!--   <input class="form-control" name="productimage" type="file" accept="image/x-png ,image/jpeg,image/jpg"  value="<?php echo set_value('productimage'); ?>">-->
                                   <input type="file" multiple="multiple" name="userfile[]"  accept="image/png,image/jpg, image/jpeg">
                                    </div>
                                  </div>
                                  <h5 class="mb-3 mt-4 " style="color:#1b2667">Special Offers</h5>
                                  
                                    <div class="row">
                                    <div class="col-sm-4 col-lg-3">
                                    <label class="font-weight-bold">Starts Date *  </label>
                                      <input  class="form-control" type="date" name="start_date"  value="<?php echo set_value('start_date'); ?>">
                                      <!-- <span class="text-danger"><small><?php echo form_error('start_date')?></small></span> -->
                                    </div>

                                    <div class="col-sm-4 col-lg-3 ">
                                    <label class="font-weight-bold">Expires Date*  </label>
                                    <input  type="date" class="form-control" name="end_date"  value="<?php echo set_value('end_date'); ?>">
                                   <!-- <span class="text-danger"><small><?php echo form_error('end_date')?></small></span> -->
                                   </div>  

                                  <div class="col-sm-4 col-lg-3">
                                    <label class="font-weight-bold">Discount Price (Eg:90&#128;) </label>
                                      <input type="text"   class="form-control" name="disprice"  value="<?php echo set_value('disprice'); ?>">
                                       <span class="text-danger"><small><?php echo form_error('disprice')?></small></span>
                                   </div> 

                                   </div>      
 
                            
                                  <div class="row">
                                    <div class="d-block w-100 text-right mt-3">
                                    
                                       <button name='submitbutton' type="submit" class="btn btn-primary text-center  "     >Save  </button>
                                       
                                    </div>
                                  </div> 
                              
                           
                              </div>
                    </div>
                </div>
            </div>

 
        </div>
    </div>

<?php include 'footer.php' ?>

 

 
 