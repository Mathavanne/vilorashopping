<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userlogin extends CI_Controller {

    public function __construct() {
        parent::__construct(); 
            $this->load->database();
            $this->load->model('Home_model');
             $this->load->model('Login_model');

        define('assets', base_url()."assets/");
        define('adminpath',base_url()."Home/");
       define('userpath',base_url()."Userlogin/");
        define('base_url',base_url());
     define('uploads', base_url()."uploads/");
        
    }

   
 

    public function login_validation()
    {

         
   $value= $this->Login_model->check_login($this->input->post('loginusername'),$this->input->post('loginpassword')); 
            if($value==2){
            echo "Wrong Password";
            
          } 
           else if($value==0){
            echo "No Account Found.Please Register";
            
          } 

 else{

          
       
 if(isset($_SESSION['cart_contents'])){    
 
$values=$this->cart->contents();
  foreach ( $values as $key=>$items){ 
 $insertquery  = array(
   "productid"  => $items['id'],
   "name"  => $items['name'],
   "qty"  => $items['qty'],
   "price"  => $items['price'],
    "image"  => $items['image'],
	   "quantity"  => $items['quantitys'], 
	   "variantid"  => $items['variantid'], 
    "customer_id"  => $value,
	  
	 
  );  
 $this->db->where('productid', $insertquery['productid']);
$this->db->where('quantity', $insertquery['qty']);
 $this->db->where('customer_id', $insertquery['customer_id']); 
 $result = $this->db->get('cart')->result_array();  
 if(count($result)>0){
$updatequery = array( 
   "qty"  => ( $items['qty'] + $result[0]['qty'])  
  );
$this->Home_model->updatequery('id',$result[0]['id'],'cart',$updatequery);
 
 }
 else{
 $this->Home_model->insertquery('cart',$insertquery ) ;
 
 }         

 

    end($values);
    if ($key === key($values)){
 $this->cart->destroy();
   echo "Account Verified";
 
    }
                 
               
                }
 
            }

            else{
   echo "Account Verified";
 

            }




          } 
         


    }
 
public function registration() {
  
   $data = array(  
            'profile_pic' => empty($this->input->post('optradio')) ? '' : $this->input->post('optradio'),       
            'fname' => empty($this->input->post('username')) ? '' : $this->input->post('username'),
            'email' => empty($this->input->post('email')) ? '' : strtolower($this->input->post('email')),
            'phone' => empty($this->input->post('phone')) ? '' : $this->input->post('phone'),
            'password' => empty($this->input->post('password')) ? '' : md5($this->input->post('password') ),
            'referalcode' => empty($this->input->post('referalcode')) ? '' : $this->input->post('referalcode'),
            'points' => '0',


        );
 
 
 $this->db->where('email', $data['email']);
  $result = $this->db->get('customer')->result();
 if (empty($result)){
 //echo "bot registered";
 $customer_id = $this->Home_model->insertquery('customer',$data);
    if(!empty( $this->input->post('refercodeuser'))){
 
   $this->db->where('referalcode', $this->input->post('refercodeuser'));
   $referalcoderesult = $this->db->get('customer')->result_array();
   if(count($referalcoderesult)>0){
 
$upadteuqeur=array('points'=>$referalcoderesult[0]['points']+50);
$this->Home_model->updatequery('customer_id',$referalcoderesult[0]['customer_id'],'customer',$upadteuqeur);
$updaterefereid=array('referercustid'=>$referalcoderesult[0]['customer_id']);
$this->Home_model->updatequery('customer_id', $customer_id,'customer',$updaterefereid);
   }
 
 }


  if(isset($_SESSION['cart_contents'])){   
            $values=$this->cart->contents();
  foreach ( $values as $key=>$items){ 
 $insertquery  = array(
   "productid"  => $items['id'],
   "name"  => $items['name'],
   "qty"  => $items['qty'],
   "price"  => $items['price'],
    "image"  => $items['image'], 
	    "quantity"  => $items['quantitys'], 
	   "variantid"  => $items['variantid'], 
    "customer_id"  => $customer_id,   
  ); 
  $this->Home_model->insertquery('cart',$insertquery ) ;
    end($values);
    if ($key === key($values)){
 $this->cart->destroy();
    }

}
}

            $this->session->set_userdata('customer_id', $customer_id);
            $this->session->set_userdata('customer_username', $this->input->post('username'));
             echo 'Account Registered Successfully';
        } else {
             echo "Email Already Registered"; 
        }
 


         }

    public function registration_add() {
        if ($this->session->userdata('customer_id')) {
          redirect(base_url());
        }
        else{

            if (isset($_POST['registersubmit'])) {
            $data = array(         
            'fname' => empty($this->input->post('username')) ? '' : strtoupper($this->input->post('username')),
            'email' => empty($this->input->post('email')) ? '' : strtolower($this->input->post('email')),
            'phone' => empty($this->input->post('phone')) ? '' : $this->input->post('phone'),
            'password' => empty($this->input->post('password')) ? '' : password_hash($this->input->post('password'), PASSWORD_DEFAULT)
        );
       

        $this->form_validation->set_rules('email', 'Email ' , 'required|is_unique[customer.email]',
        array('is_unique'=>'{field} Already Exist'));
            $this->form_validation->set_rules('username', 'Name ' , 'required');
            $this->form_validation->set_rules('phone', 'Phone Number ' , 'required');
            $this->form_validation->set_rules('password', 'Password ' , 'required');
            if ($this->form_validation->run() == false) {
                $data['registermodal'] = true;
                $data['chapter']=$this->Admin_model->selectquery('category');           
                $this->load->view('admin/category',$data);

            }


        if (empty($result)){
            $customer_id = $this->Home_model->insertquery('customer',$data);          
            $this->session->set_userdata('customer_id', $customer_id);
            $this->session->set_userdata('customer_username', $this->input->post('username'));
            redirect(site_url());
        } else {
         
            $data['registermodal'] = true;
            $message = $this->session->set_tempdata('error', 'You details are already Registered !', 5);
            redirect(site_url('',$message));
        }

            }

            
     

    }
    }


 


}