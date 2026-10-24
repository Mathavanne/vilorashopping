 <?php

/**
 * 
 */
class Admin_model extends CI_Model
{

	 function selectquery($tablename)
            {

            return $this->db->get($tablename)->result_array();           
            }

             function insertquery($tablename,$insertquery)
            {

            $this->db->insert($tablename , $insertquery);
            $insert_id = $this->db->insert_id();
            return  $insert_id;
            
            }

             function deletequery($id,$idvalue,$tablename)
            {

             $this->db->where($id, $idvalue);
              $this->db->delete($tablename);
           
            }

               function updatequery($id,$idvalue,$tablename,$insertquery)
            {

            $this->db->where($id, $idvalue);
            $this->db->update($tablename, $insertquery);
            }


             function selectquerywhere($tablename,$statusfieldname,$statusfieldvalue)
            {
                $this->db->where($statusfieldname, $statusfieldvalue);
            return $this->db->get($tablename)->result_array();
           
            }
function selectquerytwowhere($tablename,$statusfieldname,$statusfieldvalue,$statusfieldname1,$statusfieldvalue1)
            {
                $this->db->where($statusfieldname, $statusfieldvalue);
                 $this->db->where($statusfieldname1, $statusfieldvalue1);
            return $this->db->get($tablename)->result_array();
           
            }

      function selectqueryin ($tablename,$fieldname,$array)
            { 
           
            $this->db->where_in($fieldname, $array);
             return $this->db->get($tablename)->result_array();        
            }

 public function upload_image($productid,$dbname,$filename,$tablename)
    {
       
      if($filename!='' ){
      $filename1 = explode(',',$filename);

      foreach($filename1 as $file){

         if($dbname="product"){
            $file_data = array(
      'image' => $file,
      'productid' => $productid
      );
        
      }

      elseif($dbname="comboproduct"){
            $file_data = array(
      'image' => $file,
      'comboproductid' => $productid
      );
        
      }
      
      $this->db->insert('images', $file_data);
      }
      }
    }

            
 
}