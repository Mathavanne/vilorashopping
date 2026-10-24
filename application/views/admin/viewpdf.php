<?php

 
 
 
 
//============================================================+
// File name   : example_002.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 002 for TCPDF class
//               Removing Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Removing Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
//require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
// $pdf->SetAuthor('Nicola Asuni');
// $pdf->SetTitle('TCPDF Example 002');
// $pdf->SetSubject('TCPDF Tutorial');
// $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 14);

// add a page
$pdf->AddPage();
 

 
  $html='<style>
  body{color:#000;}
  p{margin-bottom:5px;font-weight:normal}

   table{color:#000;text-align:center;border:1px solid #ccc;}
   td{border-right: 1px solid #ccc;}
   
    th  {background-color:#ef8200;color:#fff;text-align:center;}
    tr:last-child{border-top:1px solid #ccc;}
</style>
<h2 align="centre" style="color:#ef8200"> Vilora shopping  </h2>

<p style="text-transform:capitalize;margin-bottom:5px;"><b>'.$customerdetails[0]['fname'].'</b><br>'.$customerdetails[0]['h_addressline1'].','.$customerdetails[0]['h_addressline2'].',<br>'.$customerdetails[0]['area'].',<br>'.$customerdetails[0]['h_city'].'<br>'.$customerdetails[0]['phone'].'</p>
  <table   cellpadding="2" cellspacing="2" class="table table-hover js-basic-example dataTable table-custom spacing5">
  <thead style="padding:5px">
  <tr style="font-size:19px;" >
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
 $html.=' <h5  style="color:orange;font-weight:normal;" align="right">Discount Amount : '.$myordersfull[0]['discount_amount'].' </h5>'; 
 $html.=' <h5 style="font-weight:bold;" align="right"> Grand Total : '.($myordersfull[0]['totalamount']-$myordersfull[0]['discount_amount']).' </h5>'; 
  }

  else{
      $html.=' <h5 style="font-weight:bold;" align="right"> Grand Total : '.$myordersfull[0]['totalamount'].' </h5>'; 

  }
 
 
  $html.='<p style="text-align:center">Thank You For Shopping . Visit Again :)<p>';
 

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Dots-estimate-bill-'.$billid, 'I');

//============================================================+
// END OF FILE
//============================================================+