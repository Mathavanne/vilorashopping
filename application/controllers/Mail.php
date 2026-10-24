<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends CI_Controller {
public function __construct() {
 parent::__construct();
		 
 
    $this->load->database();
      $this->load->model('Home_model');
 
    define('adminpath',base_url()."Home/");
 
    define('base_url',base_url() );
 
 

	}

 function sendcontactmail(){
 $data = array(         
           'txtName' =>  $this->input->post('txtName'),
           'txtEmail' => strtolower($this->input->post('txtEmail')),
           'txtPhone' => $this->input->post('txtPhone'),
           'txtMsg' => $this->input->post('txtMsg') );
 

 $from_email = "Dots@gmail.com";
 $to_email = 'Dots@gmail.com';
  
 require APPPATH.'third_party/phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

 //$mail->SMTPDebug = 1;                               // Enable verbose debug output

// $mail->isSMTP();                                      // Set mailer to use SMTP
// $mail->Host = 'smtp.viloratech.com';   
// $mail->SMTPAuth = true;                              
// $mail->Username = 'info@ims.viloratech.com';                 
// $mail->Password = 'Vilora@123';

$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com"; 
$mail->Username   = "Dots@gmail.com";
$mail->Password   = "n@mbikkai";


 $mail->setFrom( $from_email , 'Dots');
 $mail->addAddress($to_email);
 $mail->Subject = 'Contact Form Enquiry';
  $mail->isHTML(true);
 
    
 $mailContent = "<h4>Dots Enquiry Form Details </h4>
            <p>Full Name : ". $data['txtName']."</p>
             <p>Email Id :". $data['txtEmail']." </p>
             <p>Mobile Number : ". $data['txtPhone']." </p>
             <p>Message : ". $data['txtMsg']." </p>";
      
   $mail->Body = $mailContent;
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
          // $this->session->set_flashdata('emailexist',' Mail could not be sent.');
        }

        else{
            echo 'sent';
           //$this->session->set_flashdata('emailexist',' Mail Sent Successfully.');
        }
    }


 public function forgotpassword(){
  if(isset($_POST['forgotsubmit']))
  {
       $email=$this->input->post('forgotpassworddf');
       $que=$this->db->query("select email,customer_id from customer where email='$email'");
       $row=$que->row();
      
     
       if(count($row)>0){
       $user_email=$row->email; 
        $user_id=$row->customer_id;  
 
 
      // echo $user_email; 
$from_email = "Dots@gmail.com";
        require APPPATH.'third_party/phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

 //$mail->SMTPDebug = 1;                               // Enable verbose debug output

// $mail->isSMTP();                                       // Set mailer to use SMTP
// $mail->Host = 'smtp.viloratech.com';   
// $mail->SMTPAuth = true;                              
// $mail->Username = 'info@ims.viloratech.com';                 
// $mail->Password = 'Vilora@123';

$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com"; 
$mail->Username   = "Dots@gmail.com";
$mail->Password   = "n@mbikkai";

 $mail->setFrom($from_email, 'Dots  ');
 $mail->addAddress($user_email);
 $mail->Subject = 'Contact Form Enquiry';
  $mail->isHTML(true);
 
    
 $mailContent = "<h5>Your Password Reset Link:</h5><a href='".base_url."Home/forgotpassword/".$user_id."'>Click Here To Reset Password</a>";
      
   $mail->Body = $mailContent;
 
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            $this->session->set_flashdata('emailexist',' Mail could not be sent.');
        }

        else{
          echo "mailsent";
          $this->session->set_flashdata('emailexist','Please Check Your Email For Reset Password');
        }

      
       }
       else{ 
        echo "not exist";
       
      $this->session->set_flashdata('emailexist','Email Not Exist');
       }

 
 
  }
 
 
}
   

	}

 


	  