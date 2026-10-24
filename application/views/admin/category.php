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
                            <li class="breadcrumb-item active" aria-current="page">Category List </li>
                            </ol>
                        </nav>
                    </div>            
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#chapter_add">Add Category</button>
                    </div>
                </div>
            </div>
            
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Category List :</h2>
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
                                              <th>Category Name</th>
                                        <th>Parent Category Name</th>
                                        <th>Popular</th>
                
                                        <th>Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                       <?php $i=1;foreach($chapter as $item){
                                       
                                        ?>
                                      <tr>
                                       
                                        <td><?php echo  $i++;?></td>
                                      
                                        <td><?php echo  $item['category_name'] ?></td>
                         <td><?php foreach ($question as $key => $value){
        if ($item['parentcategory_id']==$value['id']) { echo $value['name'];} } ?></td>
        <td>
          <?php   if(isset($item['popular'])){
            echo   $item['popular']==1 ? '<span class="text-success">Yes</span>' : '<span class="text-danger">No<span>';   
          } ?>
        </td>
         

                                        <td>
                                          <div class="d-inline-flex">
                                            <a  title="Edit" data-toggle="modal" data-target="#<?php echo  substr($item['category_name'], 0, 2).$item['id']; ?>" class="btn btn_edit btn-sm2 mx-1" href="#"><i class="fa fa-edit"></i> </a>
<a  title="Edit" data-toggle="modal" data-target="#<?php echo  substr($item['category_name'], 0, 2).'image'.$item['id']; ?>" class="btn btn_edit btn-sm2 mx-1" href="#"><i class="fa fa-picture-o"></i> </a>

                                          <a id="<?php echo  $item['id']?>" title="Delete" data-tooltip="Delete" data-position="bottom" class="btn btn_delete btn-sm2 mx-1" href="#"><i class="fa fa-trash"></i> </a>  
                                             <input type="hidden"   value="<?php echo  $item['image'] ?> ">
                                          </div>
                                        </td>
                                      </tr>
                                  <?php  } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal  " id="chapter_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form class="form-auth-small m-t-20" enctype="multipart/form-data" method="post" action="<?=adminpath?>addcategory"> 
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body pricing_page pt-4 pb-0">
                          <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Parent Category Name :</label>
                                    <select class="form-control" name="subject_name">
                                      <option value="">Select Option</option>
                                        <?php foreach ($question as $questionlist){ ?>
                                        <option value="<?php echo $questionlist['id']?>" 
                                          <?php echo set_select('subject_name', $questionlist['id'], False); ?>
                                          > <?php echo $questionlist['name']?> </option>
                                       <?php  } ?>
                                    </select>
                                     <span class="text-danger"><?php echo form_error('subject_name');?></span>
                                </div>                           
                           
                                <div class="form-group">
                                    <label class="font-weight-bold">Category Name :</label>
                                    <input type="text" name='category_name' class="form-control" placeholder="Category Name" value="<?php echo set_value('category_name'); ?>">
                                    <span class="text-danger"><?php echo form_error('category_name');?></span>
                                </div>    
                                 

                                  <div class="form-group">
                                    <label class="font-weight-bold">Image :</label>
                                    <input type="file" accept="image/png,image/jpg, image/jpeg" name='image' class="form-control" placeholder="Category Image" >
                                        <span class="text-danger"><?php  if(isset($error)){echo $error;}?> </span>
                                </div>
                                <div class="form-group">
                              <label class="d-block pb-2 font-weight-bold">Popular :</label>
                                <label class="fancy-radio">
                                  <input name="popular"  type="radio" value="1"   >
                                    <span><i></i>Yes</span>
                                </label>
                                <label class="fancy-radio">
                                  <input name="popular" checked=""  type="radio" value="0"   >
                                  <span><i></i>No</span>
                                </label>
                                 
                            </div>
                             
                          </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" name='submit' class="btn btn-round btn-primary">Submit</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>


  <?php $i=1;foreach($chapter as $item){?>

            <div class="modal  " id="<?php echo  substr($item['category_name'], 0, 2).$item['id']; ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form class="form-auth-small m-t-20" enctype="multipart/form-data" method="post" action="<?=adminpath?>editcategory"> 

                            <input type='hidden' name='id' value='<?php echo  $item['id'];?>'>
                            <input type='hidden' name='sub_str' value='<?php echo  substr($item['category_name'], 0, 2)?>'>
                           
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body pricing_page pt-4 pb-0">
                          <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Parent Category Name :</label>

                                        
                                    <select class="form-control" name='subject_edit<?php echo  $item['id']; ?>'>
                                      <option value="">Select Option</option>
                                        <?php foreach ($question as $questionlist){ ?>
                                        <option  <?php echo set_select('subject_edit', $item['id'], False); ?> value="<?php echo $questionlist['id']?>" <?php echo  $questionlist['id']==$item['parentcategory_id'] ?'selected':'';?>
                                        
                                        > <?php echo $questionlist['name'] ?> </option>
                                       <?php  } ?>
                                    </select>
                                      <span class="text-danger text-left"><?php echo form_error('subject_edit'.$item["id"]); ?></span>
                                 
                                </div>
                           
                             
                                <div class="form-group">
                                    <label class="font-weight-bold">Category Name :</label>
                                    <input type="text" name='chapter_edit<?php echo  $item['id']; ?>' class="form-control" placeholder="Chapters Name" value="<?php echo set_value('chapter_edit'.$item['id'],$item['category_name']); ?>">
                                  <span class="text-danger text-left"><?php echo form_error('chapter_edit'.$item["id"]); ?></span>
                                </div>
                                 
                                
                                  
                              <div class="  form-group">
                              <label class="d-block pb-2 font-weight-bold">Popular :</label>
                                <label class="fancy-radio">
                                  <input name="popular<?php echo  $item['id']; ?>"  type="radio" value="1"  <?php 
    echo set_value('popular'.$item['id'], $item['popular']) == 1 ? "checked" : ""; 
?>   >
                                    <span><i></i>Yes</span>
                                </label>
                                <label class="fancy-radio">
                                  <input name="popular<?php echo  $item['id']; ?>"  type="radio" value="0"  <?php 
    echo set_value('popular'.$item['id'], $item['popular']) == 0 ? "checked" : ""; 
?>   >
                                  <span><i></i>No</span>
                                </label>
                                 
                            </div>
                           
                               </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" name='submit' class="btn btn-round btn-primary">Submit</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

<?php } ?>
        </div>
    </div>

  <?php $i=1;foreach($chapter as $item){?>

            <div class="modal  " id="<?php echo  substr($item['category_name'], 0, 2).'image'.$item['id']; ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form class="form-auth-small m-t-20" enctype="multipart/form-data" method="post" action="<?=adminpath?>editcategoryimage"> 

                            <input type='hidden' name='id' value='<?php echo  $item['id'];?>'>
                            <input type='hidden' name='sub_str' value='<?php echo  substr($item['category_name'], 0, 2)?>'>
                            <input type='hidden' name='imagename' value='<?php echo  $item['image'];?>'>
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Image</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body pricing_page pt-4 pb-0">
                          <div class="row clearfix">
                            <div class="col-sm-12"> 
                                   <div class="form-group">
                                    <img src="<?=uploads?><?php echo $item['path'].'/'.$item['image']?>">
                                  </div> 
                        
                          <div class="form-group">
                                    <label class="font-weight-bold">Change Image :</label>
                                    <input type="file" accept="image/png,image/jpg, image/jpeg" name='image' class="form-control" placeholder="Category Image" >
                                <!--     <span class="text-danger"><?php  
                                    if(isset($editerror)){echo $editerror;}?> 
                                </span> -->
                                </div>
                           
                             
                               </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" name='submit' class="btn btn-round btn-primary">Submit</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

<?php } ?>
<?php include 'footer.php' ?>

<?php
if(isset($addmodal)){ ?>
<script type="text/javascript">
$("#chapter_add").modal();
</script>
<?php
}
?>

<?php
if(isset($editmodal)){ ?>
<script type="text/javascript">
  var id="<?php echo $id;?>";
  var sub_str="<?php echo $sub_str;?>";
$("#"+sub_str+id).modal();
</script>
<?php
}
?>
<?php
if(isset($editmodalimage)){ ?>
<script type="text/javascript">
  var id="<?php echo $id;?>";
  var sub_str="<?php echo $sub_str;?>";
$("#"+sub_str+"image"+id).modal();
</script>
<?php
}
?>
<script type="text/javascript">
  $(".btn_delete").click(function(){

  
  var id = $(this).attr("id");
   var inputvalue=$(this).next("input").val();
  if (confirm('Are you sure you want to delete this?')) {
    $.ajax({url: "<?php echo base_url();?>Admin/deletecategory", 
        type:"post",
                data:{"id":id,"imagename12":inputvalue},

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