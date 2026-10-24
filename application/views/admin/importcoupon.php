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
                        <div class="body">
                                <?php echo form_open_multipart(adminpath."importcoupon_submit"); ?>
 
                                <div class="form-group">
                        <label for="exampleInputFile">File Upload</label>
                    <input type="file" name="csvs" id="csvs" size="150" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                     <p class="help-block">Only Excel/CSV File Import.</p>
                    </div>
                    <button type="submit" class="btn btn-default" name="import">Upload</button>
                              </div>
                    </div>
                </div>
            </div>

 
        </div>
    </div>

<?php include 'footer.php' ?>

 

 
 