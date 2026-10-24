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
                            <li class="breadcrumb-item active" aria-current="page">Combo Category </li>
                            </ol>
                        </nav>

                     
                    </div>            
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#combocategory_add">Add Combo Category</button>
                    </div>
                </div>
            </div>
            
            <div class="row clearfix">
                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Combo Category List :</h2>
                            <ul class="header-dropdown dropdown">  
                              <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom spacing5">
                                    <thead>
                                      <tr>
                                        <th>S.No</th>
                                        <th> Category Name</th>
                                      <th> Category Amount</th>
                                        <th>Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                         <?php $i=1;foreach($questions as $item){?>
                                      <tr>
                                       
                                        <td><?php echo  $i++;?></td>
                                        <td class="text-capitalize"><?php echo  $item['name'] ?></td>
                                    <td class="text-capitalize"><?php echo  $item['amount'] ?></td>
                                        <td>
                                          <div class="d-inline-flex">
            <!--       <a  title="Edit <?php echo  $item['name']; ?>" data-toggle="modal" data-target="#edits<?php echo  substr($item['name'], 0, 2).$item['id']; ?>" class="btn btn_edit btn-sm2 mx-1" ><i class="fa fa-edit"></i> </a>  --> 

                  <a  title="Edit <?php echo  $item['name']; ?>"  href="<?php echo base_url().'Admin/editcombocategory/'.$item['id'];?>"  class="btn   btn-sm2 mx-1" ><i class="fa fa-edit"></i> </a> 
                                            <a id="<?php echo  $item['id']?>" title="Delete" data-tooltip="Delete" data-position="bottom" class="btn btn_delete btn-sm2 mx-1" href="#"><i class="fa fa-trash"></i> </a> 
                                          </div>
                                        </td>
                                      </tr>
                                  <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal" id="combocategory_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <form class="form-auth-small m-t-20" enctype="multipart/form-data" method="post" action="<?=adminpath?>addcombocategory"> 
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Combo  Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body pricing_page pt-4 pb-0">

                          <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Category Name :</label>
                                    <input type="text" name='combocategory' class="form-control" placeholder="Combo Category Name" value='<?php echo set_value('combocategory'); ?>'>
                                      <span class="text-danger text-left"><?php echo form_error('combocategory'); ?></span>
                                </div>
                            
                         
                                <div class="form-group">
                                    <label class="font-weight-bold">Category Amount :</label>
                                    <input type="number" name='combocategoryamount' class="form-control" placeholder="Combo Category Amount" value='<?php echo set_value('combocategoryamount'); ?>'>
                                      <span class="text-danger text-left"><?php echo form_error('combocategoryamount'); ?></span>
                                </div>
                             

                          
                                <div class="form-group">
                                    <label class="font-weight-bold w-100">Products:</label>
                              <select class="form-control js-example-basic-multiple" name='productss[]' multiple="multiple">
                                <?php foreach($products as $product){ ?>
                                <option value="<?php echo $product['id'];  ?>"><?php echo $product['productname'];  ?> <small>(  <?php echo $product['quantity'];  ?>)</small></option>
                              <?php } ?>
                              </select>
                                      <span class="text-danger text-left"><?php echo form_error('productss[]'); ?></span>
                                </div>

                                  <div class="form-group">
                                    <label class="font-weight-bold">Image <small style="font-size: 8px;" class="text-muted d-inline "> ( Image Size 150 X 150 )</small> :</label>
                                    <input type="file" accept="image/png,image/jpg, image/jpeg" name='image' class="form-control" placeholder="Category Image" >
                                        <span class="text-danger"><?php  if(isset($error)){echo $error;}?> </span>
                                </div>
                            </div>
                           
                          </div>
                        </div>
                        <div class="modal-footer">
                          <input value='submit' type="submit" class="btn btn-round btn-primary"  name="submit" >
                        </div>
                    </form>
                    </div>
                </div>
            </div>


 

        </div>
    </div>

<?php include 'footer.php' ?>

<?php
if(isset($addmodal)){ ?>
<script type="text/javascript">
$("#combocategory_add").modal();
</script>
<?php
}
?>

<?php
if(isset($editmodal)){ ?>
<script type="text/javascript">
 var id="<?php echo $id;?>";
 var sub_str="<?php echo $sub_str;?>";
$("#edits"+sub_str+id).modal();
</script>
<?php
}
?>
<script type="text/javascript">
  $(".btn_delete").click(function(){

  
  var id = $(this).attr("id");
  if (confirm('Are you sure you want to delete this?')) {
    $.ajax({url: "<?php echo base_url();?>Admin/deletecombocategory", 
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