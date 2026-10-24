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
                            <li class="breadcrumb-item active" aria-current="page">Add comboproduct </li>
                            </ol>
                        </nav>
                    </div>            
                    
                </div>
            </div>
            
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Add comboproduct:</h2>
                          
                        </div>
                        <div class="body">

                       
                                <?php echo form_open(adminpath."addcomboproduct_submit"); ?>
 
                                <div class="row new_comboproduct">
                                    <div class="col-sm-4 col-lg-3">
                                    
                                     <label class="font-weight-bold">comboproduct Name *  </label>
                                  <input class="form-control" name="comboproductname"  value="<?php echo set_value('comboproductname'); ?>">

                                        <span class="text-danger"><small><?php echo form_error('comboproductname')?></small></span>
                                    </div>
                                    <div class="col-sm-4 col-lg-3">
                                
                                          <label class="font-weight-bold">Parent Category  :</label>
                                    <select class="form-control" name="comboproductcategory">
                                      <option value="">Select Option</option>
                                        <?php foreach ($question as $questionlist){ ?>
                                        <option value="<?php echo $questionlist['id']?>" 
                                          <?php echo set_select('comboproductcategory', $questionlist['id'], False); ?>
                                          > <?php echo $questionlist['name']?> </option>
                                       <?php  } ?>
                                    </select>
                                     <span class="text-danger"><?php echo form_error('comboproductcategory');?></span>
                                    </div>

                                     
                                    
                                     <div class="col-sm-4 col-lg-3">
                                    
                                     <label class="font-weight-bold">Actual Price <small>(Eg : 900 Rs) : </small>  </label>
                                  <input type="number"   class="form-control" name="disprice"  value="<?php echo set_value('disprice'); ?>">

                                        <span class="text-danger"><small><?php echo form_error('disprice')?></small></span>
                                    </div>
                                    <div class="col-sm-12">
                                    
                                     <label class="font-weight-bold">Description   </label>
                                     <textarea class="form-control" name="descrip" ><?php echo set_value('descrip'); ?></textarea>
                            

                                        <span class="text-danger"><small><?php echo form_error('descrip')?></small></span>
                                    </div>
                                     
                                     
                             
                             <div class="col-sm-4 col-lg-3 form-group">
                              <label class="d-block pb-2 font-weight-bold">Stock :</label>
                                <label class="fancy-radio">
                                  <input name="stock"  type="radio" value="1"   >
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
                                  <input name="trending"  type="radio" value="0"   >
                                  <span><i></i>No</span>
                                </label>
                                 
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

 

 
 