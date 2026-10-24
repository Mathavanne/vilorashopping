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
                            <li class="breadcrumb-item active" aria-current="page">Product List </li>
                            </ol>
                        </nav>
                    </div>            
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                      <a type="button" href="<?=adminpath?>addproduct"  class="btn btn-sm btn-primary"  >Add Product</a>
                    </div>
                </div>
            </div>
            
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                          <?php //print_r($productimage) ?>
                            <h2>Product List :</h2>
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
                                        <th>Product Name</th>
                                        <th>Category Name</th>
                                        <th>Stock</th>
                                         <th>Trending</th>

                                      <!--     <th>Add Image</th> -->
               
                                        <th>Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                       <?php $i=1;foreach($chapter as $item){
                                       
                                        ?>
                                      <tr>
                                       
                                        <td><?php echo  $i++;?></td>
                                        <td> <?php echo  $item['productname']; ?></td>
                                      <!--   <pre><?php //print_r($category); ?></pre>
                                        <pre><?php //print_r($item); ?></pre> -->
                                        <td><?php  foreach($category as $parentcat ){

                                          if($parentcat['id']==$item['productcategory']){
                                            echo   $parentcat['category_name'];
                                          }
                                        }  ?></td>
                                                                            <td>
          <?php   if(isset($item['stock'])){
            echo   $item['stock']==1 ? '<span class="text-success">In Stock</span>' : '<span class="text-danger">Out Of Stock<span>';   
          } ?>
        </td>
                                           <td>
          <?php   if(isset($item['trending'])){
            echo   $item['trending']==1 ? '<span class="text-success">Yes</span>' : '<span class="text-danger">No<span>';   
          } ?>
        </td>
                                       <!-- <td>

                                        <?php 
                                        $m=0;
                                       foreach($productimage as $image)
                                       { 
                                          if($image['productid'] == $item['id'] ){ $m=$m+1;}  
                                        } 
                                      
                                        if($m>=1){
                                     echo "<a href=".adminpath."viewimage/".$item['id']."/product>View / Edit Image</a>";
                                        }

                                        else{
                                               echo "<a href=".adminpath."addimage/".$item['id']."/product>Add Image</a>";

                                        }

                                        ?>
     
                                       </td> -->
                                        <td>
                                          <div class="d-inline-flex">
                                            <a  title="Edit"  href="<?php echo base_url().'Admin/editproduct/'.$item['id'];?>"  class="btn   btn-sm2 mx-1" href="#"><i class="fa fa-edit"></i> </a>
                                            <a id="<?php echo  $item['id']?>" title="Delete" data-tooltip="Delete" data-position="bottom" class="btn btn_delete btn-sm2 mx-1" href="#"><i class="fa fa-trash"></i> </a> 
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
 
 