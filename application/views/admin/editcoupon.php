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
                            <li class="breadcrumb-item active" aria-current="page">Add Coupon </li>
                            </ol>
                        </nav>
                    </div>   

                      <div class="col-md-6 col-sm-12 text-right  ">
                      <a  type="button" class="btn btn-sm btn-primary text-white" href="<?=adminpath?>couponCode"  >Go to Coupon List</a>
                    </div>            
                    
                </div>
            </div>
            
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Add Coupon:</h2>
                          
                        </div>

                                <?php echo form_open_multipart(adminpath."editcoupon_submit"); ?>
                                <div class="body">
                                    
<?php foreach ($product as $pro){
                       
                       ?>
                                <input type="hidden" name="id" value="<?php echo $pro['id'];?>">
 
                                <div class="row new_product">
                                    <div class="col-sm-4 col-lg-3">
                                    
                                     <label class="font-weight-bold">Coupon Code *  </label>
                                  <input class="form-control" name="coupon_code"  value="<?php echo set_value('coupon_code',$pro['coupon_code']); ?>">

                                        <span class="text-danger"><small><?php echo form_error('coupon_code')?></small></span>
                                    </div>
                                    <div class="col-sm-4 col-lg-3">
                                
                                          <label class="font-weight-bold">  Type *  :</label>
                                    <select class="form-control" name="type">
                                      <option value="">Select Option</option>
                                      <option value="percentage" <?php echo $pro['type']=="percentage"?"selected":"";?> >Percentage</option>
                                      <option value="amount" <?php echo $pro['type']=="amount"?"selected":"";?> >Amount</option>
                                    </select>
                                     <span class="text-danger"><?php echo form_error('type');?></span>
                                    </div>

                                     
                                     <div class="col-sm-4 col-lg-3">
                                    
                                     <label class="font-weight-bold">Discount_amount *<small> (Eg:1000 Rs )  :</small>   </label>
                                  <input type="number"  class="form-control" name="discount_amount"  value="<?php echo set_value('discount_amount',$pro['discount_amount']); ?>">

                                        <span class="text-danger"><small><?php echo form_error('discount_amount')?></small></span>
                                    </div>
                                     <div class="col-sm-4 col-lg-3">
                                    
                                     <label class="font-weight-bold">Uses  *</label>
                                     <select class="form-control" name="uses">
                                      <option value="">Select Option</option>
                                      <option value="2" <?php echo $pro['uses']==2?"selected":"";?> >Multiple Users</option>
                                      <option value="1" <?php echo $pro['uses']==1?"selected":"";?> >Single User</option>
                                    </select>
                                        <span class="text-danger"><small><?php echo form_error('uses')?></small></span>
                                    </div>
                                    <div class="col-sm-12">
                                    
                                     <label class="font-weight-bold">Description  * </label>
                                     <textarea class="form-control" name="description" ><?php echo set_value('description',$pro['description']); ?></textarea>
                            

                                        <span class="text-danger"><small><?php echo form_error('description')?></small></span>
                                    </div>
                                     
                                     
                            <div class="col-sm-4 col-lg-3">
                                    
                                     <label class="font-weight-bold">Starts Date *  </label>
                                  <input  class="form-control" type="date" name="starts_at"  value="<?php echo set_value('starts_at',$pro['starts_at']); ?>">

                                        <span class="text-danger"><small><?php echo form_error('starts_at')?></small></span>
                                    </div>
                                    <div class="col-sm-4 col-lg-3">
                                    
                                     <label class="font-weight-bold">Expires Date*  </label>
                                  <input  type="date" class="form-control" name="expires_at"  value="<?php echo set_value('expires_at',$pro['expires_at']); ?>">
               <span class="text-danger"><small><?php echo form_error('expires_at')?></small></span>
                                    </div>  
                            

                            <div class="col-sm-4 col-lg-3 form-group">
                              <label class="d-block pb-2 font-weight-bold">Status :</label>
                                <label class="fancy-radio">
                                  <input name="status"  type="radio" value="1"  <?php 
    echo set_value('status', $pro['status']) == 1 ? "checked" : "";?>   >
                                    <span><i></i>Active</span>
                                </label>
                                <label class="fancy-radio">
                                  <input name="status"  type="radio" value="0"   <?php 
    echo set_value('status', $pro['status']) == 0 ? "checked" : "";?>  >
                                  <span><i></i>Inactive</span>
                                </label>
                                 
                            </div>
                    </div> 
                    <?php }?>
                                  <div class="row">
                                    <div class="d-block w-100 text-right mt-3">
                                    
                                       <button name='coupon' type="submit" class="btn btn-primary text-center  "     >Save  </button>
                                       
                                    </div>
                                  </div> 
                              
                           
                              </div>
                    </div>
                </div>
            </div>

 
        </div>
    </div>

<?php include 'footer.php' ?>

 

 
 