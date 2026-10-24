 <?php 
 
  $html='<style>
  body{color:#000;}
  p{margin-bottom:5px;font-weight:normal}

   table{color:#000;text-align:center;border:1px solid #ccc;}
   td{border-right: 1px solid #ccc;}
   
    th  {background-color: #1b2667;color:#fff;text-align:center;}
    tr:last-child{border-top:1px solid #ccc;}
</style>
<img src="http://www.Dots.com/assets/img/logodashboard.png">
 
<p style="text-transform:capitalize;margin-bottom:5px;"><b>'.$customerdetails[0]['fname'].'</b><br>'.$customerdetails[0]['h_addressline1'].','.$customerdetails[0]['h_addressline2'].',<br>'.$customerdetails[0]['area'].',<br>'.$customerdetails[0]['h_city'].'<br>'.$customerdetails[0]['phone'].'</p>
  <table border="1"   cellpadding="2" cellspacing="2" class="table table-hover js-basic-example dataTable table-custom spacing5">
  <thead style="padding:5px">
  <tr style="font-size:15px;" >
       <th style="width:40px;">S.no</th>                                 
 <th  style="width:200px;">Product Name</th>
 
 <th>Price</th>

  <th>Selling Price</th>
   <th>Item</th>
   <th>Amount</th>
 </tr>
 </thead><tbody>'; 
 $i=1;foreach($myorders as $item){  
   if($item['category']=="product"){
  $html.='<tr style="font-size:15px;"><td style="width:40px;">'.$i++.'</td><td style="width:200px;text-align:left">'; 
 foreach($productvalue as $productva ){ 
 if($productva['id']==$item['productid']){
    $html.=$productva['productname'].'('.$productva['quantity'].')'; 
  } 

  }  
  
  $html.='</td> <td >' ;
    foreach($productvalue as $productva ){ 
 if($productva['id']==$item['productid']){
    $html.=$productva['price']; 
  } 

  }
   $html.='</td><td>';
   foreach($productvalue as $productva ){ 
 if($productva['id']==$item['productid']){
    if($productva['disprice']){
    $html.=$productva['disprice']; 
  }
  else{
    $html.=$productva['price']; 
  }
  } 

  }
$html.='</td><td>';
   foreach($productvalue as $productva ){ 
 if($productva['id']==$item['productid']){
    $html.=$item['quantity']; 
  } 

  }
   $html.=' </td>'; 
$html.=' <td>';
   foreach($productvalue as $productva ){ 
 if($productva['id']==$item['productid']){
  if($productva['disprice']){
    $html.=$item['quantity']*$productva['disprice']; 
  }
  else{
    $html.=$item['quantity']*$productva['price']; 
  }
  } 

  }
   $html.=' </td></tr>'; 

}   
  if($item['category']=="combo"){ 
  $html.='<tr style="font-size:15px;"><td>'.$i++.'</td> <td style="width:200px;text-align:left"> '; 
  foreach($comboproductvalue as $combopro){  

 if($combopro['id']==$item['productid']){ 
      $html.=$combopro['name'].'(Combo)'; 
  
 } 

  } 

 $html.='</td><td>-</td> <td>';
 foreach($comboproductvalue as $combopro  ){  

 if($combopro['id']==$item['productid']){ 
      $html.=$combopro['amount']; 
  
 } 

  } 

$html.='</td> <td>'.$item['quantity'].'</td><td>';
 foreach($comboproductvalue as $combopro  ){  

 if($combopro['id']==$item['productid']){ 
      $html.=$combopro['amount']*$item['quantity']; 
  
 } 

  } 


$html.='</td> </tr>'; 
  } }


 
 
 $html.='</tbody> </table>';


  if($myordersfull[0]['discount_amount'])
                                  { 
    $html.='  <h5 style="font-weight:bold;" align="right"> Sub Total : '.$myordersfull[0]['totalamount'].' </h5>'; 
 $html.=' <h5  style="color:orange;font-weight:normal;" align="right">Wallet Amount : '.$myordersfull[0]['discount_amount'].' </h5>'; 
 $html.=' <h5 style="font-weight:bold;" align="right"> Grand Total : '.($myordersfull[0]['totalamount']-$myordersfull[0]['discount_amount']).' </h5>'; 
  }

  else{
      $html.=' <h5 style="font-weight:bold;" align="right"> Grand Total : '.$myordersfull[0]['totalamount'].' </h5>'; 

  }
 
  $html.='<p style="text-align:left">Thank You For Shopping . Visit Again :)<p>';
 echo $html;