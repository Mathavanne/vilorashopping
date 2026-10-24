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
                            <li class="breadcrumb-item active" aria-current="page">Add - Edit Variants </li>
                            </ol>
                        </nav>
                    </div>    

                     <div class="col-md-6 col-sm-12 text-right  ">
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#parentcategory_add">Add  variants</button>
                    </div>        
                    
                </div>
            </div>
            
            <div class="row clearfix">
                <div class="col-lg-12">
 
<div class="card">
 
                        <div class="header">

                          <?php   ?>
                            <h2>Edit Variants:</h2>
                          
                        </div>
  
 
 
<div class="body">

  <?php if(!$variants){  ?>
<p>No  Variants found please add variants</p>
   <?php  } ?>
 <?php foreach ($variants as $key => $value): ?>
   

<div class="row new_product mb-2">
     <input type="hidden" name="productidedit" value="<?php echo $value['id'];?>">
<div class="col-sm-4 col-lg-3"> 
<label class="font-weight-bold">Quantity    </label>
<input placeholder="Eg: 1pc,100 Gram" class="form-control" name="quantity"   value="<?php echo $value['quantity'] ?>"> 
</div> 
<div class="col-sm-4 col-lg-3"> 
<label class="font-weight-bold">Price<small> (Eg:1000 Rs ) :</small>   </label>
<input type="number"  class="form-control"  name="price"  value="<?php echo $value['price'] ?>"> 
</div>
<div class="col-sm-4 col-lg-3"> 
<label class="font-weight-bold">Discount Price <small>(Eg :900 Rs) : </small>  </label>
<input type="number" name="disprice"   class="form-control" value="<?php echo $value['disprice'] ?>" > 
</div> 
<div class="col-sm-4 col-lg-3"> 
  <label class="invisible">Discount Price <small>(Eg :900 Rs) : </small>  </label><br>
 <i   class="mr-2 edits fa fa-edit"></i>
  <i style="display: none;"  class="mr-2  saves fa fa-save">save</i>
 <i   class="mr-2 deletevariant fa fa-trash"></i>
</div> 
</div>
   <?php endforeach ?>
 

</div>
 
                    </div>

                </div>


            </div>

 
        </div>


    </div>


    <div class="modal" id="parentcategory_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content"> 
          <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Parent Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>
<div class="modal-body pricing_page pt-4 pb-0">
<div class="row clearfix">
<div class="col-sm-12"> 
<form  id="variantform"> 
<input type="hidden" name="productid" value="<?php echo $this->uri->segment(3);?>">
<div class="row  ">
<div class="col-sm-12"> 
<label class="font-weight-bold">Quantity</label>
<input placeholder="Eg: 1pc,100 Gram" class="form-control" name="quantity"    value=""> 
</div> 
<div class="col-sm-12"> 
<label class="font-weight-bold">Price<small> (Eg:1000 Rs ) :</small>   </label>
<input type="number"  class="form-control"  name="price"  value=""> 
</div>
<div class="col-sm-12"> 
<label class="font-weight-bold">Discount Price <small>(Eg :900 Rs) : </small>  </label>
<input type="number" name="disprice"   class="form-control" > 
</div> 
</div>
<div class="row">
<div class="d-block w-100 text-right mt-3">
<button type="submit"   class="btn btn-primary text-center" >Save Details  </button>
</div>
</div> 
</form>
</div>  
                           
                          </div>
                        </div>
                       
                 
                    </div>
                </div>
            </div>
    <style>
      .error{    font-size: 10px;
    color: red;
    font-weight: normal!important;}
    </style>
 <script src="<?=assets?>js/homepage/jquery.validate.min.js"></script>
<?php include 'footer.php' ?>

 

 <script type="text/javascript">
  $('#variantform').validate({ // initialize the plugin
        rules: {
          
            quantity: {
                required: true, 
            },
            price: {
                required: true, 
            }, 
              
        },
         submitHandler: function(form1) { 
         
          $.ajax({
            url: "<?php echo base_url();?>Admin/variantsubmit",  
            type:"post", 
           data: $(form1).serialize(),
            success: function(result){
             //alert(result);
            location.reload(); 
               
            }
        });
    }
    });
  $(document).ready(function(){
    $(".new_product input").attr('readonly', true);
  })

  $(".edits").on("click",function(){
    var parent=$(this).parents(".new_product"); 
parent.find(".saves").show();
$(this).hide();
parent.find("input").attr('readonly', false); 
  });

   $(".saves").on("click",function(){

  var parent=$(this).parents(".new_product");
  var quantity=parent.find('[name="quantity"]').val();
  var price=parent.find('[name="price"]').val();
  var disprice=parent.find('[name="disprice"]').val();
  var variantid=parent.find('[name="productidedit"]').val();
  var productid=$('[name="productidedit"]').val();
  parent.find(".edits").show();
  $(this).hide();
  parent.find("input").attr('readonly', true); 
  if(quantity=="" || price=="" )
  {
    alert("Must Fill Quantity and Price ");
    $(this).show();
    parent.find(".edits").hide();
   parent.find("input").attr('readonly', false); 

  }
  else{
      $.ajax({
            url: "<?php echo base_url();?>Admin/varianteditsubmit",  
            type:"post", 
           data: {productid:productid,variantid:variantid,quantity:quantity,price:price,disprice:disprice},
            success: function(result){
            alert("Updated");
            //alert(result);
            //location.reload(); 
               
            }
        });
  }

 

   });


    $(".deletevariant").click(function(){

  var parent=$(this).parents(".new_product");
 var productid=$('[name="productid"]').val();
  var variantid=parent.find('[name="productidedit"]').val();  
  var id =variantid;  
  console.log(productid,"priductid");
if (confirm('Are you sure you want to delete ?')) {
    $.ajax({url: "<?php echo base_url();?>Admin/variantdelete", 
        type:"post",
        data:{"id":id,"productid":productid }, 
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

<style type="text/css">

</style>
 