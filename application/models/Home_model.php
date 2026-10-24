 <?php

/**
 * 
 */
class Home_model extends CI_Model
{

	          function selectquery($tablename)
            {


                  return $this->db->get($tablename)->result_array();        
            }
               function selectquerywhere($tablename,$statusfieldname,$statusfieldvalue)
            {
                $this->db->where($statusfieldname, $statusfieldvalue);
            return $this->db->get($tablename)->result_array();
           
            }
              function selectquerywherewithstock($tablename,$statusfieldname,$statusfieldvalue)
            {
                $this->db->where('stock', '1');
                $this->db->where($statusfieldname, $statusfieldvalue);
            return $this->db->get($tablename)->result_array();
           
            }

             function selectquerylimit ($tablename,$count)
            { 
            	$this->db->limit($count);  
             return $this->db->get($tablename)->result_array();        
            }

             function selectqueryin ($tablename,$fieldname,$array)
            { 
           
            $this->db->where_in($fieldname, $array);
             return $this->db->get($tablename)->result_array();        
            }
             function selectquerylimitwithfield($tablename,$count,$fieldname,$fieldvalue)
            { 
            	 $this->db->where($fieldname, $fieldvalue);
            	$this->db->limit($count);  
             return $this->db->get($tablename)->result_array();        
            }
            function selectquerylimitwithfieldstock($tablename,$count,$fieldname,$fieldvalue)
            { 
                 $this->db->where('stock', '1');
                 $this->db->where($fieldname, $fieldvalue);
                $this->db->limit($count);  
             return $this->db->get($tablename)->result_array();        
            }

function insertquery($tablename,$insertquery)
            {

            $this->db->insert($tablename , $insertquery);
            $insert_id = $this->db->insert_id();
            return  $insert_id;
            
            }

          function updatequery($id,$idvalue,$tablename,$insertquery)
            {

            $this->db->where($id, $idvalue);
            $this->db->update($tablename, $insertquery);
            }

            function deletequery($id,$idvalue,$tablename)
            {

             $this->db->where($id, $idvalue);
              $this->db->delete($tablename);
           
            }

   function distinct($tablename)

   {

    $this->db->distinct();
$this->db->select('parentcategory_id');
return $this->db->get($tablename)->result_array();     
   } 


 function tablesjoins($table1,$table2,$value1,$value2,$where,$wherevalue){

    

 $this->db->select('*');    
$this->db->from($table1);
$this->db->join($table2,  $table2.'.'.$value1.'='.$table1.'.'.$value2);
  $this->db->where($table2.'.'.$where, $wherevalue);
 
 
 return $this->db->get()->result_array();
 
 }

 public function GetCatSearchName($search_name){

 $qry = $this->db->select('*')->from('product')
                    ->where("productname LIKE '%$search_name%'")
                    ->get()->result_array(); // select data like rearch value.
    return $qry;
}

           function getCityDepartment($postData){
    $response = array(); 
    // Select record
    $this->db->select('id,name');
    $this->db->where('cityid', $postData['city']);
    $q = $this->db->get('area');
    $response = $q->result_array();

    return $response;
  }
            
 
}