<?php include 'header.php' ?>

 <div id="main-content">

        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                       
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=adminpath?>" style="font-size: 18px"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Coupon </li>
                            </ol>
                        </nav>

                     
                    </div>            
                    <div class="col-md-3 col-sm-6 text-right hidden-xs">
                    <a type="button" href="<?=adminpath?>importcoupon"  class="btn btn-sm btn-primary"  >Import Coupon</a>
                    </div>
                    <div class="col-md-3 col-sm-6 text-left hidden-xs">
                    <a type="button" href="<?=adminpath?>addcoupon"  class="btn btn-sm btn-primary"  >Add Coupon</a>
                    </div>
                </div>
            </div>
            
            <div class="row clearfix">
                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Coupon List :</h2>
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
                                        <th>Coupon Code</th>
                                        <th>Description</th>
                                        <th>Uses</th>
                                        <th>Type</th>
                                        <th>Discount Amount</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                         <?php $i=1;foreach($coupon_code as $item){?>
                                      <tr>
                                        <td><?php echo  $i++;?></td>
                                        <td class="text-capitalize"><?php echo  $item['coupon_code'] ?></td>
                                        <td class="text-capitalize"><?php echo  $item['description'] ?></td>
                                        <td class="text-capitalize">
                                        <?php   if(isset($item['uses'])){
                                        echo   $item['uses']==1 ? '<span class="text-success">Single User</span>' : '<span class="text-info">Multipe Users<span>';   
                                         } ?>
                                        </td>
                                        <td class="text-capitalize"><?php echo  $item['type'] ?></td>
                                        <td class="text-capitalize"><?php echo  $item['discount_amount'] ?></td>
                                        <td class="text-capitalize"><?php echo  $item['starts_at'] ?></td>
                                        <td class="text-capitalize"><?php echo  $item['expires_at'] ?></td>

                                        <td>
                                          <div class="d-inline-flex">
                                            <a  title="Edit"  href="<?php echo base_url().'Admin/editcoupon/'.$item['id'];?>"  class="btn   btn-sm2 mx-1" href="#"><i class="fa fa-edit"></i> </a>
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


<?php include 'footer.php' ?>


<script type="text/javascript">
  $(".btn_delete").click(function(){

  
  var id = $(this).attr("id");
  if (confirm('Are you sure you want to delete this?')) {
    $.ajax({url: "<?php echo base_url();?>Admin/deletecoupon", 
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