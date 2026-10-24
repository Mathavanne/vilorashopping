<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
public function __construct() {
		// $this->session->unset();
		
		parent::__construct();
		$this->load->database();
			$this->load->model('Admin_model');
		define('assets', base_url()."assets/");
		define('adminpath',base_url()."Employee/");
		 
if ( ! $this->session->userdata('employee_username') ) {
      		$this->session->set_flashdata('msg', 'Please login to continue!');
			redirect(base_url().'Employeelogin');
		} 

	}

	
	
	public function index()
	{
$data['employee']=$this->Admin_model->selectquerywhere('employee','emailaddress', $_SESSION['employee_username']);
 
		$data['myorders']=$this->Admin_model->selectquerytwowhere('myorders','assignemployeeid',$data['employee'][0]['id'],'orderstatus','2');  
 
		$data['completedorders']=$this->Admin_model->selectquerytwowhere('myorders','assignemployeeid',$data['employee'][0]['id'],'orderstatus','3'); 
	 
		$this->load->view('employee/index',$data);
		
	}

 
public function assignedorders()
	{
		$data['employee']=$this->Admin_model->selectquerywhere('employee','emailaddress', $_SESSION['employee_username']);
		$data['customerdetails']=$this->Admin_model->selectquery('customer');
		$data['orders']=$this->Admin_model->selectquerytwowhere('myorders','assignemployeeid',$data['employee'][0]['id'],'orderstatus','2');  
		// $data['username']=$this->Admin_model->fetchselectbyid('candidates','emailaddress', $_SESSION['candidate_username']);	 	 
	  
		$this->load->view('employee/assignedorders',$data);
	}
public function completedorders()
	{
		$data['employee']=$this->Admin_model->selectquerywhere('employee','emailaddress', $_SESSION['employee_username']);
		 $data['customerdetails']=$this->Admin_model->selectquery('customer');
		$data['orders']=$this->Admin_model->selectquerytwowhere('myorders','assignemployeeid',$data['employee'][0]['id'],'orderstatus','3'); 
		// $data['username']=$this->Admin_model->fetchselectbyid('candidates','emailaddress', $_SESSION['candidate_username']);	 	 
	  
		$this->load->view('employee/completedorders',$data);
	}

	public function orderview()
		{

		$data['myorders']=$this->Admin_model->selectquerywhere('orderproducts','orderid', $this->uri->segment(3)); 
            $productid[]='';
             $comboproductid[]='';
			foreach($data['myorders'] as $datasdfd)
			{
				if($datasdfd['category']=="combo"){
					 $comboproductid[]=$datasdfd['productid'];

				}
				else{ $productid[]=$datasdfd['productid'];} 
			}
			 $data['comboproductvalue']=$this->Admin_model->selectqueryin ('combocategory','id',$comboproductid);
			 $data['productvalue']=$this->Admin_model->selectqueryin ('product','id',$productid);
			  $data['variantvalue']=$this->Admin_model->selectqueryin ('productvariation','productid',$productid); 

			 $this->load->view('employee/orderview',$data);
			
			
		}
		public function orderviewcombo($id)

		{
 	
			$data['myorders']=$this->Admin_model->selectquerywhere('combocategory','id', $id);
			    
			$data['productvalue']=$this->Admin_model->selectqueryin ('product','id',explode(',',$data['myorders'][0]['products']));

			 $this->load->view('admin/orderviewcombo',$data);

		}
		public function cashreceived()

	  	{   
		 
 $customervalue=$this->Admin_model->selectquerywhere('customer','customer_id',$this->input->post('customerid'));
 
 	if($customervalue[0]['referercustid']){
 	   $customerpoinst=$this->Admin_model->selectquerywhere('customer','customer_id',$customervalue[0]['referercustid']);
 		$pointinsertquery = array('points'=>$customerpoinst[0]['points']+$this->input->post('pointonepercentage')) ;		 
		 $data['value']=$this->Admin_model->updatequery('customer_id',$customerpoinst[0]['customer_id'],'customer',$pointinsertquery);

 } 
 $pointteninsertquery = array('points'=>$customervalue[0]['points']+$this->input->post('pointpercentage')) ;		 
 $data['value']=$this->Admin_model->updatequery('customer_id',$this->input->post('customerid'),'customer',$pointteninsertquery);
 $insertquery = array('orderstatus'=>'3') ;				 
 $data['value']=$this->Admin_model->updatequery('orderid',$this->input->post('id'),'myorders',$insertquery);	
 $this->sendpdf($this->input->post('id'));
  	}


		 public function viewpdf($id)
	{
		$data['billid']=$id;
         $data['myordersfull']=$this->Admin_model->selectquerywhere('myorders','orderid',$id);
 
	 $data['customerdetails']=$this->Admin_model->selectquerywhere('customer','customer_id', $data['myordersfull'][0]['customerid']); 
		$data['myorders']=$this->Admin_model->selectquerywhere('orderproducts','orderid', $id); 


            $productid[]='';
             $comboproductid[]='';
			foreach($data['myorders'] as $datasdfd)
			{
				if($datasdfd['category']=="combo"){
					 $comboproductid[]=$datasdfd['productid'];

				}
				else{ $productid[]=$datasdfd['productid'];} 
			}
	 $data['comboproductvalue']=$this->Admin_model->selectqueryin ('combocategory','id',$comboproductid);
	  $data['productvalue']=$this->Admin_model->selectqueryin ('product','id',$productid);
	   $data['variantvalue']=$this->Admin_model->selectqueryin ('productvariation','productid',$productid); 
	   // print_r( $data['variantvalue'] );
	   // die();
	 $this->load->library('Pdf');
     $this->load->view('employee/viewpdf',$data);
	

	}



 public function sendpdf($id)
	{		 
	 $data['billid']=$id;
     $data['myordersfull']=$this->Admin_model->selectquerywhere('myorders','orderid',$id);
     $data['customerdetails']=$this->Admin_model->selectquerywhere('customer','customer_id', $data['myordersfull'][0]['customerid']); 
     
	 $data['myorders']=$this->Admin_model->selectquerywhere('orderproducts','orderid', $id); 
     $productid[]='';
      $comboproductid[]='';
			foreach($data['myorders'] as $datasdfd)
			{
				if($datasdfd['category']=="combo"){
					 $comboproductid[]=$datasdfd['productid'];

				}
	  else{ $productid[]=$datasdfd['productid'];} 
			}
$data['comboproductvalue']=$this->Admin_model->selectqueryin ('combocategory','id',$comboproductid);
$data['productvalue']=$this->Admin_model->selectqueryin ('product','id',$productid); 
$from_email = "info@ims.viloratech.com";
 $to_email = $data['customerdetails'][0]['email']; 
 
require APPPATH.'third_party/phpmailer/PHPMailerAutoload.php'; 
$mail = new PHPMailer;  
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.viloratech.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'info@ims.viloratech.com';                 // SMTP username
$mail->Password = 'Vilora@123';
$mail->setFrom($from_email, 'Dots  ');
$mail->addAddress($to_email);
$mail->Subject = 'Contact Form Enquiry';
$mail->isHTML(true);  
 
$mailContent =  $this->load->view('employee/sendpdf',$data,true);   
$mail->Body = $mailContent;
if(!$mail->send())
{
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            $value=false;
}

else{
            echo 'sent';
            $value=true;
        }
    
  

	}

 

	  

    public function logout()  
    {  
        $arrayvalue=array('employee_username', 'employee_name');  
        $this->session->unset_userdata( $arrayvalue);  
        redirect(base_url().'Employeelogin');
    }  

    

}
