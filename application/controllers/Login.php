<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
public function __construct() {
		// $this->session->unset();
		
		parent::__construct();
		
		define('assets', base_url()."assets/");
			$this->load->database();
			$this->load->model('Login_model');

        if ($this->session->userdata('username') ) 
        { 
           redirect(base_url().'Admin');
        }
      
		
		
}

	public function index()
	{ if(isset($_POST['submit'])){
        $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required',
                        array('required' => 'You must provide a %s.')
                );

                if ($this->form_validation->run() != FALSE)
                {
                	
 $data['value']  =$this->Login_model->login_table($this->input->post('username'),$this->input->post('password'),"username","password","admin_master");

                

                if($data['value'] == 0){
                	$data['error']='Invalid Credentials';
                	  $this->load->view('admin/login',$data);

                }
               
               else{
               	$newdata = array( 
               'username'  => $_POST['username'],
            );

		 $this->session->set_userdata($newdata);

        
             redirect(base_url()."Admin");

               }

                }
                else
                {
             
             $this->load->view('admin/login');
                }

            }
            else{
            	$this->load->view('admin/login');
            }
	}
	
	

    public function logout()  
    {  
        
        $this->session->unset_userdata('username');  
        
    }  
}
