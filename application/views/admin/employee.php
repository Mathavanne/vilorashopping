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
                            <li class="breadcrumb-item active" aria-current="page">Employee List </li>
                            </ol>
                        </nav>
                    </div>     
                    <?php   $employee=count($user_details); if($employee<5){?>       
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal">Add Employee</button>
                    </div>
                         <?php } ?>     
                </div>
            </div>
            
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Employee List :</h2>
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
        
        <th>Name</th>  
        <th>Username</th>
        <th>Mobile</th> 
        
           <th>Edit / Delete</th>
      </tr>
    </thead>
    <tbody> 
      <?php
      $i=1; foreach($user_details as $details):?>
 <tr>
        <td><?php echo $i++;?></td>
        <td><?php echo $details['name']?></td>  
        <td><?php echo $details['emailaddress']?></td>
        
        <td><?php echo $details['mobilenumber']?></td>  
   
       
         <td><div class="d-inline-flex">
         <a  title="Edit" data-toggle="modal" data-target="#edit_modal<?php echo  $details['id']; ?>" class="btn btn_edit btn-sm2 mx-1" href="#"><i class="fa fa-edit"></i> </a>
         <a id="<?php echo  $details['id']?>" title="Delete"  class="btn btn_delete btn-sm2 mx-1" href="#"><i class="fa fa-trash"></i> </a>  
                                          </div></td>
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
  <div class="modal  " id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add New Employee</h4><button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <form method="post" action="<?=adminpath?>add_newemployee" enctype="multipart/form-data">
        <div class="modals_values user_add_modal">
          <label>Username</label>
          <input  autocomplete="off" type="text" name="user_name" class="form-control"  value="<?php echo set_value('user_name');?>">
          <span class="text-danger"><?php  echo form_error('user_name')?> </span>
           <label>Password</label>
          <input autocomplete="off" type="password" name="user_pass" class="form-control"  value="<?php echo set_value('user_pass');?>" >
          <span class="text-danger"><?php  echo form_error('user_pass')?> </span>
          
           <label>Name</label>
          <input type="text" name="user_email" class="form-control" value="<?php echo set_value('user_email');?>"  >
          <span class="text-danger"><?php  echo form_error('user_email')?> </span>
           <label>Mobile</label>
          <input type="text" name="user_number" class="form-control"  value="<?php echo set_value('user_number');?>" >
          <span class="text-danger"><?php  echo form_error('user_number')?> </span>
        
  <!--        <label>Role</label>
         <select class="form-control" name="user_role">
           <option   value="admin"  <?php echo set_select('user_role', "admin", False); ?> > Admin</option>
            <option  value="delivery" <?php echo set_select('user_role',"delivery", False); ?> > Delivery Boy</option>
         </select>
         
          <span class="text-danger"><?php  echo form_error('user_role')?> </span> -->
      
         
 
          <div class="buttons_modal mt-2">
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
  <div class="modal  " id="edit_modal<?php echo $details['id']?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Employee</h4><button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <form method="post" action="<?=adminpath?>edit_employee"  >
            <input type="hidden" value="<?php echo $details["id"]?>">
        <div class="modals_values ">
          <label>Username</label>
          <input autocomplete="off" type="text" name='user_name_edit<?php echo $details["id"]?>' class="form-control"  
          value="<?php echo set_value('user_name_edit'.$details["id"],$details['emailaddress']); ?>"   >
          <span class="text-danger"><?php  echo form_error('user_name_edit'.$details["id"])?> </span>
            
          <label>Name</label>
          <input type="text" name='user_email_edit<?php echo $details["id"]?>' class="form-control"  
          value="<?php echo set_value('user_email_edit'.$details["id"],$details['name']); ?>"   >
          <span class="text-danger"><?php  echo form_error('user_email_edit'.$details["id"])?> </span>   
           <label>Mobile</label>
          <input type="text" name='user_mobile_edit<?php echo $details["id"]?>' class="form-control"  
          value="<?php echo set_value('user_mobile_edit'.$details["id"],$details['mobilenumber']); ?>"   >
          <span class="text-danger"><?php  echo form_error('user_mobile_edit'.$details["id"])?> </span>  
        
       
         
           
      
         
 
      <input type="hidden" name="hidden_id" value="<?php echo $details["id"];?>"  >
       
          <div class="buttons_modal mt-2">
            <button type="submit" name="edit_user_button" class="btn btn-primary mr-2 ">Update</button>
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
if(isset($editmodal)){ ?>
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
    $.ajax({url: "<?php echo base_url();?>Admin/delete_employee", 
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