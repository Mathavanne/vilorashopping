<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employeelogin extends CI_Controller {
public function __construct() {
		// $this->session->unset();
		
		parent::__construct();
		
		define('assets', base_url()."assets/");
			$this->load->database();
			$this->load->model('Login_model');

  if ($this->session->userdata('employee_username') ) {
           
            redirect(base_url().'Employee');
        }
      
		
		
}

	public function index() 
	{
   
        if(isset($_POST['submit'])){
        $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required',
                        array('required' => 'You must provide a %s.')
                );

                if ($this->form_validation->run() != FALSE)
                {
                	


                $data['value']  =$this->Login_model->login_table_employee($this->input->post('username'),$this->input->post('password'),"emailaddress","password","employee"); 
            
                if($data['value'] == 0){
                	$data['error']='Invalid Credentials';
                	$this->load->view('employee/employeelogin',$data);
                }               
               else{
                $value= $this->db->query("SELECT name FROM employee WHERE emailaddress = '".$_POST['username']."'")->row()->name ;

              

               	$newdata = array( 
               'employee_username'  => $_POST['username'],
                 'employee_name'  =>  $value,

            );
                
		 $this->session->set_userdata($newdata);
                
             redirect(base_url()."Employee");

               }

                }
                else
                {
             
             $this->load->view('employee/employeelogin');
                }

            }
            else{
            	$this->load->view('employee/employeelogin');
            }
	}
	
	

    public function logout()  
    {  
        $arrayvalue=array('employee_id', 'employee_name');        
        $this->session->unset_userdata($arrayvalue);  
        
    }  
}
