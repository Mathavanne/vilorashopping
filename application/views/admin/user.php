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
                                 <table class="table question_table ">
    <thead>
    
      <tr>
        <th>S.no</th>
        <th>User Name</th>
        <th>User Email</th>  
        <th>Phone</th> 
         <th>Image</th> 
           <th>Edit / Delete</th>
      </tr>
    </thead>
    <tbody> 
      <?php
      $i=1; foreach($user_details as $details):?>
 <tr>
        <td><?php echo $i++;?></td>
        <td><?php echo $details['admin_username']?></td>
        <td><?php echo $details['admin_mail']?></td>  
        <td><?php echo $details['admin_phone']?></td>  
         <td><img style="width: 50px;" src="<?php echo assets.'user_profile_pic/'.$details['admin_prof_pic']?>"></td> 
       
         <td>
    <span data-toggle="modal" href="#edit_modal<?php echo $details['admin_id']?>" id="#edit_modal<?php echo $details['admin_id']?>" class="badge badge-info">Edit</span>

<span class=" badge badge-danger user_delete_request" label="<?php echo $details['admin_id']?>" >Delete</span>


</td>
      </tr>


      <?php endforeach?>
    </tbody>
  </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             

 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add New User</h4><button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <form method="post" action="<?=adminpath?>add_newuser" enctype="multipart/form-data">
        <div class="modals_values user_add_modal">
          <label>Username</label>
          <input  autocomplete="off" type="text" name="user_name" class="form-control"  value="<?php echo set_value('user_name');?>">
          <span class="text-danger"><?php  echo form_error('user_name')?> </span>
           <label>Password</label>
          <input autocomplete="off" type="password" name="user_pass" class="form-control"  value="<?php echo set_value('user_pass');?>" >
          <span class="text-danger"><?php  echo form_error('user_pass')?> </span>
          
           <label>Email</label>
          <input type="email" name="user_email" class="form-control" value="<?php echo set_value('user_email');?>"  >
          <span class="text-danger"><?php  echo form_error('user_email')?> </span>
           <label>Mobile</label>
          <input type="text" name="user_number" class="form-control"  value="<?php echo set_value('user_number');?>" >
          <span class="text-danger"><?php  echo form_error('user_number')?> </span>
        
       
          <label>Profile picture</label>
          <input type="file" name="user_image" class="form-control"  >
      <span class="text-danger"><?php  if(isset($error)){echo $error;}?> </span>
          <div class="buttons_modal">
            <button type="submit" name="add_service_button" class="btn btn-primary mr-2">Add</button>
            <button class="btn btn-default">Cancel</button>
          </div>
        </div>
        </form>
        </div>
        
      </div>
      
    </div>
  </div>



  <!-------Edit zmodal-------->
    <?php  foreach($user_details as $details):?>
  <div class="modal fade" id="edit_modal<?php echo $details['admin_id']?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit User</h4><button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <form method="post" action="<?=adminpath?>edit_user" enctype="multipart/form-data">
        <div class="modals_values ">
          <label>Username</label>
          <input autocomplete="off" type="text" name='user_name_edit<?php echo $details["admin_id"]?>' class="form-control"  
          value="<?php echo set_value('user_name_edit'.$details["admin_id"],$details['admin_username']); ?>"   >
          <span class="text-danger"><?php  echo form_error('user_name_edit'.$details["admin_id"])?> </span>    
          <label>Email</label>
          <input type="email" name='user_email_edit<?php echo $details["admin_id"]?>' class="form-control"  
          value="<?php echo set_value('user_email_edit'.$details["admin_id"],$details['admin_mail']); ?>"   >
          <span class="text-danger"><?php  echo form_error('user_email_edit'.$details["admin_id"])?> </span>   
           <label>Mobile</label>
          <input type="text" name='user_mobile_edit<?php echo $details["admin_id"]?>' class="form-control"  
          value="<?php echo set_value('user_mobile_edit'.$details["admin_id"],$details['admin_phone']); ?>"   >
          <span class="text-danger"><?php  echo form_error('user_mobile_edit'.$details["admin_id"])?> </span>  
           <label>Image</label>
           <img class="image_modal" src="<?php echo assets.'user_profile_pic/'.$details['admin_prof_pic']?>">


            <label class="mt-2">Profile picture</label>
          <input type="file" name="user_edit_image<?php echo $details["admin_id"]?>" class="form-control"  >
     <input type="hidden" name="hidden_image_name<?php echo $details["admin_id"];?>" value="<?php echo $details["admin_prof_pic"];?>"  >
      <input type="hidden" name="hidden_id" value="<?php echo $details["admin_id"];?>"  >
       
          <div class="buttons_modal">
            <button type="submit" name="edit_user_button" class="btn btn-primary mr-2">Update</button>
            <button class="btn btn-default">Cancel</button>
          </div>
        </div>
        </form>
        </div>
        
      </div>
      
    </div>
  </div>
<?php endforeach  ?>
        </div>
    </div>

<?php include 'footer.php' ?>
 <?php
if(isset($reset)){ ?>
<script type="text/javascript">
$("#myModal").modal();
</script>
<?php
}
?>
<?php
if(isset($reset_edit)){ ?>
<script type="text/javascript">
var id="<?php echo $id;?>";
$("#edit_modal"+id).modal();
</script>
<?php
}
?>
 
<script type="text/javascript">
  $(".btn_delete").click(function(){

  
  var id = $(this).attr("id");
  if (confirm('Are you sure you want to delete this?')) {
    $.ajax({url: "<?php echo base_url();?>Admin/deletechapter", 
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