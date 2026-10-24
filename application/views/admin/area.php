<?php include 'header.php' ?>

 <div id="main-content">

        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                       
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=adminpath?>" style="font-size: 18px"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Area </li>
                            </ol>
                        </nav>

                     
                    </div>            
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#parentcategory_add">Add Area</button>
                    </div>
                </div>
            </div>
            
            <div class="row clearfix">
                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Area List :</h2>
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
                                        <th>Area Name</th>
                                        <th>City Name</th> 
                                        <th>Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                         <?php $i=1;foreach($questions as $item){?>
                                      <tr>
                                       
                                        <td><?php echo  $i++;?></td>
                                        <td class="text-capitalize"><?php echo  $item['name'] ?></td>
                                        <td class="text-capitalize"><?php foreach ($city as $key => $value) {
                                           if($value['id']==$item['cityid']){
                                            echo $value['city'];
                                           }
                                        }  ?></td>
                                        <td>
                                          <div class="d-inline-flex">
                                           <a  title="Edit <?php echo  $item['name']; ?>" data-toggle="modal" data-target="#<?php echo  substr($item['name'], 0, 2).$item['id']; ?>" class="btn btn_edit btn-sm2 mx-1" ><i class="fa fa-edit"></i> </a>  
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

            <div class="modal" id="parentcategory_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <form class="form-auth-small m-t-20"   method="post" action="<?=adminpath?>addarea"> 
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Area</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body pricing_page pt-4 pb-0">

                          <div class="row clearfix">
                            <div class="col-sm-12">

                               <div class="form-group">
                                    <label class="font-weight-bold">Area Name :</label>
                                     <select class="form-control" name="subject_name">
                                      <option value="">Select Option</option>
                                        <?php foreach ($city as $questionlist){ ?>
                                        <option value="<?php echo $questionlist['id']?>" 
                                          <?php echo set_select('cityname', $questionlist['id'], False); ?>
                                          > <?php echo $questionlist['city']?> </option>
                                       <?php  } ?>
                                    </select>

                                      <span class="text-danger text-left"><?php echo form_error('subject_name'); ?></span>
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Area Name :</label>
                                    <input type="text" name='parentcategory' class="form-control" placeholder="Area Name" value='<?php echo set_value('parentcategory'); ?>'>
                                      <span class="text-danger text-left"><?php echo form_error('parentcategory'); ?></span>
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


  <?php $i=1;foreach($questions as $item){?>

             <div class="modal" id="<?php echo  substr($item['name'], 0, 2).$item['id']; ?>" tabindex="-1" role="dialog"  aria-hidden="true">  
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <form class="form-auth-small m-t-20"  method="post" action="<?=adminpath?>editarea"> 
                            <input type='hidden' name='id' value='<?php echo  $item['id'];?>'>
                            <input type='hidden' name='sub_str' value='<?php echo  substr($item['name'], 0, 2)?>'>
                           

                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Area</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body pricing_page pt-4 pb-0">

                          <div class="row clearfix">
                            <div class="col-sm-12">
                               <div class="form-group">
                                    <label class="font-weight-bold">City Name :</label>
                                    
                                 <select class="form-control" name='subject_edit<?php echo  $item['id']; ?>'>
                                      <option value="">Select Option</option>
                                        <?php foreach ($city as $questionlist){ ?>
                                        <option  <?php echo set_select('subject_edit', $item['id'], False); ?> value="<?php echo $questionlist['id']?>" <?php echo  $questionlist['id']==$item['cityid'] ?'selected':'';?> ><?php echo $questionlist['city'] ?> </option>
                                       <?php  } ?>
                                    </select>
                                      <span class="text-danger text-left"><?php echo form_error('subject_edit'.$item["id"]); ?></span>
                                 
                           
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Area Name :</label>
                                    <input type="text" name='parentcategory_edit<?php echo  $item['id']; ?>' class="form-control" placeholder="Area Name" 
                                    value="<?php echo set_value('parentcategory_edit'.$item['id'],$item['name']); ?>">
                             <span class="text-danger text-left"><?php echo form_error('parentcategory_edit'.$item["id"]); ?></span>
                           
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
<?php }?>

        </div>
    </div>

<?php include 'footer.php' ?>

<?php
if(isset($addmodal)){ ?>
<script type="text/javascript">
$("#parentcategory_add").modal();
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
<script type="text/javascript">
  $(".btn_delete").click(function(){

  
  var id = $(this).attr("id");
  var inputvalue=$(this).next("input").val();
  if (confirm('Are you sure you want to delete this?')) {
    $.ajax({url: "<?php echo base_url();?>Admin/deletearea", 
        type:"post",
                data:{"id":id, },

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