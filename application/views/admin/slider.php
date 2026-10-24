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
                            <li class="breadcrumb-item active" aria-current="page">Add Or Edit Slider & Sliding Text   </li>
                            </ol>
                        </nav>
                    </div>    
        
                    
                </div>
            </div>
            
            <div class="row clearfix">
                <div class="col-lg-12">
 <?php echo form_open_multipart(adminpath."slider_submit"); ?>
                  <div class="card">
                        <div class="header">

                          <?php  // print_r  ($slidertext) ?>
                            <h2>Sliding Text </h2>

                          
                        </div>
                        
                    
 
                           <div class="body mt-2">
                      
                         
     
                  
 
                         
      
          <div class="row ">
                          
                              <div class="col-sm-12 mt-4 " > 
                                    
                                    <textarea name="slidetest"    class="form-control"> <?php echo set_value('slidetest' ,$slidertext[0]['text']); ?>  </textarea>
                                    <input type="hidden" name="slidetestfield" value="<?php echo $slidertext[0]['id']; ?>">
                                    <span class="text-danger"><?php echo form_error('slidetest'); ?></span>
                                    <div class="col-sm-12 text-right">  <button  name='testsubmitbutton' type="submit" class="btn btn-primary text-center  mt-3 "     >Save  </button></div>
                              
                               
                                  
                                    
                                    
                                  
                                  </div> 
                                
                               </div>
                    </div>
                    <div class="card mt-2">
                        <div class="header">

                          <?php //print_r($product) ?>
                            <h2>Add / Edit Slider (<small class="text-muted d-inline "> Image Resolution 1680 X 320 </small>)  :</h2>

                          
                        </div>
                        
                   
 
                           <div class="body mt-2">
                      
                         
     
                 

                           <?php if(count($images)==0){
                              echo '<p class="text-danger">No Images Found Please Add Slider Images</p>';
                            }?>
 
                             <div class="row">
 
                               <?php  


                               foreach ($images as $image){ ?>
                              <div class="col-sm-12">
                                <div class="light_back" style="position: relative;padding: 5px" >
                                <i class="deleteimage fa fa-trash"  id="<?php echo  $image['id'] ; ?>" style="    position: absolute;right: 7px; top: 7px;background: #fff;"  ></i>
                                <input type="hidden" value="<?php echo  $image['image'];?>">                             
                                <img class="w-100" src="<?=uploads?><?php echo $image['path'].'/'.$image['image']?>">

                              </div>
                              </div>
                              <?php } ?>  
                    
</div>
   

       
<div class="row ">
                          
                              <div class="col-sm-6 mt-4 " >
                                <div class="border p-2">
                                  <div class="row">
                                    <div class="col-sm-8"> <label>Add Image</label><br>
                                    <input type="file" multiple="multiple" name="userfile[]"  accept="image/png,image/jpg, image/jpeg"></div>
                                    <div class="col-sm-4 text-right">  <button  name='imagesubmitbutton' type="submit" class="btn btn-primary text-center  mt-3 "     >Save  </button></div>
                                  </div> 
                                      </div> 
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
 //alert(id);
var inputvalue=$(this).next("input").val();
 //alert(inputvalue);

  
if (confirm('Are you sure you want to delete this?')) {
    $.ajax({url: "<?php echo base_url();?>Admin/deletesliderimage", 
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
 