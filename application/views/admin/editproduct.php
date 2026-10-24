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
                            <li class="breadcrumb-item active" aria-current="page">Edit Product </li>
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

                          <?php //print_r($product) ?>
                            <h2>Edit Product:  <a  href="<?php echo base_url().'Admin/editvariant/'.$this->uri->segment(3);?>" class="float-right text-primary" style="font-size: 12px;">  Variant details </a></h2>
                          
                        </div>
                         <?php echo form_open_multipart(adminpath."editproduct_submit"); ?>
                        <div class="body">

<?php foreach ($product as $pro){
                       
                                ?>
                                <input type="hidden" name="id" value="<?php echo $pro['id'];?>">
                                <div class="row new_product">
                                    <div class="col-sm-4 col-lg-3">
                                    
                                     <label class="font-weight-bold">Product Name *  </label>
                                  <input class="form-control" name="productname"  value="<?php   echo set_value('productname',$pro['productname']); ?>">

                                 

                                        <span class="text-danger"><small><?php echo form_error('productname')?></small></span>
                                    </div>
                                    <div class="col-sm-4 col-lg-3">
                                
                                          <label class="font-weight-bold">  Category  :</label>
                               

                                    <select class="form-control subject" name="productcategory">
                                          <option value="">-- Select Subject --</option>
                                         <?php  foreach($category as $key=> $item){ ?>
                                          <option <?php echo $item['id']==$pro['productcategory']?"selected":"";?>  value="<?php echo $item['id']; ?>"><?php echo $item['category_name']; ?></option>
                                           <?php }?>
                                        </select>


                                     <span class="text-danger"><?php echo form_error('productcategory');?></span>
                                    </div>

                                     
                                     <div class="col-sm-4 col-lg-3">
                                    
                                     <label class="font-weight-bold">Price (Eg:90&#128;) </label>
                                  <input type="text"  class="form-control" name="price" value="<?php   echo set_value('price',$pro['price']); ?>">

                                        <span class="text-danger"><small><?php echo form_error('price')?></small></span>
                                    </div>
                                     <!-- <div class="col-sm-4 col-lg-3">
                                    
                                     <label class="font-weight-bold">Discount Price <small>(Eg : 10 Rs) : </small>  </label>
                                  <input type="number"   class="form-control" name="disprice" value="<?php   echo set_value('disprice',$pro['disprice']); ?>">

                                        <span class="text-danger"><small><?php echo form_error('disprice')?></small></span>
                                    </div> -->
                                    <div class="col-sm-12">
                                    
                                     <label class="font-weight-bold">Description   </label>
                                     <textarea class="form-control" name="descrip" > <?php   echo set_value('descrip',$pro['descrip']); ?></textarea>
                            

                                        <span class="text-danger"><small><?php echo form_error('descrip')?></small></span>
                                    </div>
                                     
                                     
                            <div class="col-sm-4 col-lg-3">
                                    
                                     <label class="font-weight-bold">Quantity    </label>
                                  <input placeholder="Eg: 1pc,100 Gram" class="form-control" name="quantity"  value="<?php   echo set_value('quantity',$pro['quantity']); ?>">

                                        <span class="text-danger"><small><?php echo form_error('quantity')?></small></span>
                                    </div>
 
                                    <div class="col-sm-4 col-lg-3">
                                    
                                     <label class="font-weight-bold">Stock Quantity  </label>
                                  <input placeholder="10" class="form-control" name="stockquantity"  value="<?php   echo set_value('stockquantity',$pro['stockquantity']); ?>">

                                        <span class="text-danger"><small><?php echo form_error('stockquantity')?></small></span>
                                    </div>  
                             <div class="col-sm-4 col-lg-3 form-group">
                              <label class="d-block pb-2 font-weight-bold">Stock :</label>
                                <label class="fancy-radio">
                                  <input name="stock"  type="radio" value="1" <?php 
    echo set_value('stock',$pro['stock']) == 1 ? "checked" : ""; 
?>   >
                                    <span><i></i>InStock</span>
                                </label>
                                <label class="fancy-radio">
                                  <input name="stock"  type="radio" value="0"  <?php 
    echo set_value('stock', $pro['stock']) == 0 ? "checked" : ""; 
?> >
                                  <span><i></i>Out Of Stock</span>
                                </label>
                                  <span class="text-danger"><small><?php echo form_error('stock')?></small></span>
                                 
                            </div>

                            <div class="col-sm-4 col-lg-3 form-group">
                              <label class="d-block pb-2 font-weight-bold">Trending :</label>
                                <label class="fancy-radio">
                                  <input name="trending"  type="radio" value="1"  <?php 
    echo set_value('trending', $pro['trending']) == 1 ? "checked" : ""; 
?>   >
                                    <span><i></i>Yes</span>
                                </label>
                                <label class="fancy-radio">
                                  <input name="trending"  type="radio" value="0"  <?php 
    echo set_value('trending', $pro['trending']) == 0 ? "checked" : ""; 
?>   >
                                  <span><i></i>No</span>
                                </label>
                            </div>
                                  
                          </div>



                                  <h5 class="mb-3 mt-4 " style="color:#1b2667">Special Offers</h5>
                                  
                                  <div class="row">
                                  <div class="col-sm-4 col-lg-3">
                                  <label class="font-weight-bold">Starts Date *  </label>
                                    <input  class="form-control" type="date" name="start_date"  value="<?php echo set_value('start_date',$pro['start_date']); ?>">
                                    <!-- <span class="text-danger"><small><?php echo form_error('start_date')?></small></span> -->
                                  </div>

                                  <div class="col-sm-4 col-lg-3 ">
                                  <label class="font-weight-bold">Expires Date*  </label>
                                  <input  type="date" class="form-control" name="end_date"  value="<?php echo set_value('end_date',$pro['end_date']);?>">
                                 <!-- <span class="text-danger"><small><?php echo form_error('end_date')?></small></span> -->
                                 </div>  

                                <div class="col-sm-4 col-lg-3">
                                  <label class="font-weight-bold">Discount Price (Eg:90&#128;) </label>
                                    <input type="text"   class="form-control" name="disprice"   value="<?php   echo set_value('disprice',$pro['disprice']); ?>">
                                     <span class="text-danger"><small><?php echo form_error('disprice')?></small></span>
                                 </div> 



                                 </div>  
                               



                              <?php } ?>
 
                            
                                  <div class="row">
                                      
                                    <div class="d-block w-100 text-right mt-3">

                                       <button name='submitbutton' type="submit" class="btn btn-primary text-center  "     >Save Details  </button>
                                       
                                    </div>
                                  </div> 
                              
                           
                              </div>

 
                            <h5 class="my-3">Edit Images <small style="font-size: 8px;" class="text-muted d-inline "> ( Image Size 150 X 150 )</small></h5>
                           <div class="body mt-2">
                      
                         
     
                            <?php  //print_r( $images); ?>

                            <?php if(count($images)==0){
                              echo '<p class="text-danger">No Images Found Please Add Product Images</p>';
                            }?>

                             <div class="row">

                               <?php //print_r($images); 


                               foreach ($images as $image){ ?>
                              <div class="col-sm-3">
                                <div class="light_back" style="position: relative;padding: 5px" >
                                <i class="deleteimage fa fa-trash"  id="<?php echo  $image['id'] ; ?>" style="    position: absolute;right: 7px; top: 7px;"  ></i>
                                <input type="hidden" value="<?php echo  $image['image'];?>">                               
                                <img src="<?=uploads?><?php echo $image['path'].'/thumb/'.$image['image']?>">

                              </div>
                              </div>
                              <?php } ?>
                         

                                <input type="hidden" name="idval"  value="<?php echo $this->uri->segment(3); ?>">
                              <div class="col-sm-12 mt-4" >
                                <label>Add Image</label><br>
                                    <input type="file" multiple="multiple" name="userfile[]"  accept="image/png,image/jpg, image/jpeg">
                                      </div>
                                      
                                    <div class="d-block w-100 text-right mt-3">
                                    
                                       <button name='imagesubmitbutton' type="submit" class="btn btn-primary text-center  "     >Save Images  </button>
                                       
                                    </div>
                                  </div> 
                                
                               </div>
                    </div>
                </div>
            </div>

 
        </div>
    </div>

<?php include 'footer.php' ?>

 

 <script type="text/javascript">
  $(".deleteimage").click(function(){

  
  var id = $(this).attr("id");
var inputvalue=$(this).next("input").val();

  
if (confirm('Are you sure you want to delete this?')) {
    $.ajax({url: "<?php echo base_url();?>Admin/deleteproductimage", 
        type:"post",
                data:{"id":id,"imagename":inputvalue},

        success: function(result){
          //alert(result);
    location.reload();
    },
    error: function(jqXHR, textStatus, errorThrown) {
  console.log(textStatus, errorThrown);
}
});
};




});
</script>
 