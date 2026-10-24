<?php include 'header.php' ?>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
               
            </div>
            
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Image Upload :</h2>
                             
                        </div>
                        <div class="body"> 
 <?php print_r($images) ?>

                            
                                <input type="hidden" name='productid' value="<?php echo $this->uri->segment('3'); ?>">
                                 <input type="hidden" name='dbname' value="<?php echo $this->uri->segment('4'); ?>">
                                  
                                  <div class="row"> 
                                    <div class="col-sm-12">
                                      <?php foreach($images as $image){ ?>
                                      <img src="<?php echo base_url()."uploads/products/".$image['image']; ?>">
                                     <?php } ?>
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
  $(".btn_delete").click(function(){

  
  var id = $(this).attr("id");
  if (confirm('Are you sure you want to delete this?')) {
    $.ajax({url: "<?php echo base_url();?>Admin/deleteproduct", 
        type:"post",
                data:{"id":id},

        success: function(result){
   location.reload();
    },
    error: function(jqXHR, textStatus, errorThrown) {
  console.log(textStatus, errorThrown);
}
});
};




});
</script>
 
 