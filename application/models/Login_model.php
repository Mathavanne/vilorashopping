<?php

/**
 * 
 */
class Login_model extends CI_Model
{

   function login_table_employee($username,$password,$usernamefield,$passwordfield,$tablename) {
  $this->db->where($usernamefield,$username);
  $this->db->where($passwordfield,$password); 
  $query = $this->db->get($tablename);
    
  $count = $query->num_rows();
  if ($count>0) {
    return $query->result_array();
  } 

  else {
    return 0;
  }
 }
 function login_table($username,$password,$usernamefield,$passwordfield,$tablename) {
  $this->db->where($usernamefield,$username);
  $this->db->where($passwordfield,$password); 
  $query = $this->db->get($tablename);
   
  $count = $query->num_rows();
  if ($count>0) {
    return $query->result_array();
  } 

  else {
    return 0;
  }
 }
   function customer_login_table($username,$password,$usernamefield,$passwordfield,$tablename) {
  $this->db->where($usernamefield,$username);
  $this->db->where($passwordfield,$password);
  $query = $this->db->get($tablename);
  $count = $query->num_rows();
  if ($count>0) {
    return $query->result_array();
  } 

  else {
    return 0;
  }
 }

 public function check_login($field1,$field2){
 

      $username = $field1;
      $password = $field2;  
      $this->db->where('email', $username);
      $result = $this->db->get('customer')->result();   
      if (!empty($result)){   
       if ($result[0]->password==md5($password) ) {
       $this->session->set_userdata('customer_id', $result[0]->customer_id);
      $this->session->set_userdata('customer_username', $result[0]->fname);
      return $result[0]->customer_id;
     
        } else {
          return 2;
        }
      } else {
         return 0;
      }
  }
}

