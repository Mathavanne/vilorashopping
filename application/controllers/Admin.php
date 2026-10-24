  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
public function __construct() {
		// $this->session->unset();
		parent::__construct();
		$this->load->database();
		$this->load->model('Admin_model');
		define('assets', base_url()."assets/");
		define('uploads', base_url()."uploads/");
		define('adminpath',base_url()."Admin/");
	 
if ( ! $this->session->userdata('username') ) { 
      		$this->session->set_flashdata('msg', 'Please login to continue!');
			redirect(base_url().'Login');
		} 

	}
public function index()
	{	//print_r($this->session->userdata('username'));
	$data['myorders']=$this->Admin_model->selectquerywhere('myorders','orderstatus','1');
 	$data['assignedorders']=$this->Admin_model->selectquerywhere('myorders','orderstatus','2');
  $data['completedorders']=$this->Admin_model->selectquerywhere('myorders','orderstatus','3');
		
		$this->load->view('admin/index',$data);

	}
	public function couponCode(){

		//   		 $data=array();
		$data['coupon_code']=$this->Admin_model->selectquery('coupon');
			  $this->load->view('admin/couponCode',$data);
	   
		  
	  }
	public function parentcategory()
	{
		 
		$data['questions']=$this->Admin_model->selectquery('parentcategory');
		$this->load->view('admin/parentcategory',$data);
	}
	public function customer()
	{
		 
		$data['customer']=$this->Admin_model->selectquery('customer');
		$this->load->view('admin/customer',$data);
	}
	public function addparentcategory()
	{
		$data = array();
		$data['questions']=$this->Admin_model->selectquery('parentcategory');	
			if (isset($_POST['submit'])) {
	$this->form_validation->set_rules('parentcategory', 'Parent Category Name ' , 'required|is_unique[parentcategory.name]',
        array('is_unique'=>'{field} Already Exist'));

		
			if ($this->form_validation->run() == false) {
				$data['addmodal'] = true;
						
				$this->load->view('admin/parentcategory',$data);

			} else { 

				   $insertquery = array('name' => $this->input->post('parentcategory'), 
				   'path' =>'parentcategory',
				   'randid'=>round(mt_rand(1000000000, mt_getrandmax()))); 
					$data['value']=$this->Admin_model->insertquery('parentcategory',$insertquery);


		   // $config['upload_path']          = './uploads/parentcategory/';
     //       $config['allowed_types']        = 'jpg|png|jpeg';
     //       $config['encrypt_name']=true;  


     //            $this->load->library('upload', $config);
     //             $this->load->library('image_lib');

     //            if ( ! $this->upload->do_upload('image'))
     //            {              
                	 
     //            	$data['error'] = $this->upload->display_errors();
     //            	$data['addmodal'] = true;
     //               $this->load->view('admin/parentcategory',$data);
     //            }
     //            else{

                
     //           $user_image= $this->upload->data(); 
              
             
     //           $configer =  array(
     //          'image_library'   => 'gd2',
     //          'source_image'    =>  $user_image['full_path'],
     //          'maintain_ratio'  =>  TRUE,
     //          'width'           =>  250,
     //          'height'          =>  250,         
     //        ); 

     //         $this->image_lib->clear();
     //        $this->image_lib->initialize($configer);        
     //        $this->image_lib->resize();
				 //   $insertquery = array('name' => $this->input->post('parentcategory'),
				 //   'image' =>$user_image['file_name'],
				 //   'path' =>'parentcategory',
				 //   'randid'=>round(mt_rand(1000000000, mt_getrandmax())));
					
					// $data['value']=$this->Admin_model->insertquery('parentcategory',$insertquery);

				 	redirect(adminpath."parentcategory");
				 // }
			  }

		} else {
				redirect(adminpath."parentcategory");
		}
		
	}

		public function editparentcategory()
	{
		$data = array();
		$data['questions']=$this->Admin_model->selectquery('parentcategory');	
			if (isset($_POST['submit'])) {

			$id=$this->input->post('id');
			$sub_str=$this->input->post('sub_str');
			$imagename=$this->input->post('imagename');
 
	$original_value = $this->db->query("SELECT name FROM parentcategory WHERE id = ".$id)->row()->name ;

    if($this->input->post('parentcategory_edit'.$id) != $original_value) {
       $is_unique =  '|is_unique[parentcategory.name]';
    } else {
       $is_unique =  '';
    }
$this->form_validation->set_rules('parentcategory_edit'.$id,'Parent Category Name ', 'required'.$is_unique,
        array(
                'is_unique'      => '{field} Already Exist'));
			if ($this->form_validation->run() == false) {
				$data['id'] = $id;
				$data['sub_str'] = $sub_str;
				$data['editmodal'] = true;						
				$this->load->view('admin/parentcategory',$data);

			} else {	
			      $insertquery = array('name' => $this->input->post('parentcategory_edit'.$id),'image' =>$user_image['file_name']) ;
			
			$data['value']=$this->Admin_model->updatequery('id',$id,'parentcategory',$insertquery);	

		// 	 $config['upload_path']          = './uploads/parentcategory/';
  //          $config['allowed_types']        = 'jpg|png|jpeg';
  //          $config['encrypt_name']=true;  


  //               $this->load->library('upload', $config);
  //                $this->load->library('image_lib');

  //               if ( ! $this->upload->do_upload('image'))
  //               {              
                	 
  //               	$data['editerror'] = $this->upload->display_errors();
  //               	$data['editmodal'] = true; 
  //               	$this->load->view('admin/parentcategory',$data);
  //               }


  // else{ $user_image= $this->upload->data(); 
  //         $configer =  array(
  //             'image_library'   => 'gd2',
  //             'source_image'    =>  $user_image['full_path'],
  //             'maintain_ratio'  =>  TRUE,
  //             'width'           =>  250,
  //             'height'          =>  250,         
  //           ); 

  //            $this->image_lib->clear();
  //           $this->image_lib->initialize($configer);        
  //           $this->image_lib->resize(); 
  //            $insertquery = array('name' => $this->input->post('parentcategory_edit'.$id),'image' =>$user_image['file_name']) ;
			
		// 	$data['value']=$this->Admin_model->updatequery('id',$id,'parentcategory',$insertquery);
		// 	$url = FCPATH . 'uploads/parentcategory/';
		// 	unlink( $url.$imagename);
	redirect(adminpath."parentcategory");
				// }
			}

		} else {
				redirect(adminpath."parentcategory");
		}
		
	}

	public function deleteparentcategory()
	{

		$id=$this->input->post('id');
			$imagename=$this->input->post('imagename');

		if(isset($id))
			{
				$this->Admin_model->deletequery('id',$id,'parentcategory');
					$url = FCPATH . 'uploads/parentcategory/';
					unlink( $url.$imagename);
			 

			}

	}


	
	public function category()
	{
	 $data['question']=$this->Admin_model->selectquery('parentcategory');
		$data['chapter']=$this->Admin_model->selectquery('category');
		$this->load->view('admin/category',$data);

	}
	public function addcategory()
	{
		$data = array();
		$data['chapter']=$this->Admin_model->selectquery('category');
			$data['question']=$this->Admin_model->selectquery('parentcategory');

			if (isset($_POST['submit'])) {
			$this->form_validation->set_rules('category_name', 'Category Name ' , 'required|is_unique[category.category_name]',
        array('is_unique'=>'{field} Already Exist'));
			$this->form_validation->set_rules('subject_name', 'Parent Category Name ' , 'required');
		 
			if ($this->form_validation->run() == false) {
				$data['addmodal'] = true;
				$data['chapter']=$this->Admin_model->selectquery('category');			
				$this->load->view('admin/category',$data);

			} else {	


		   $config['upload_path']          = './uploads/category/';
           $config['allowed_types']        = 'jpg|png|jpeg';
           $config['encrypt_name']=true;  


                $this->load->library('upload', $config);
                 $this->load->library('image_lib');

                if ( ! $this->upload->do_upload('image'))
                {              
                	 
                	$data['error'] = $this->upload->display_errors();
                	$data['addmodal'] = true;
                   $this->load->view('admin/category',$data);
                }
                else{

                	
               $user_image= $this->upload->data(); 
               //print_r($user_image);
             
               $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  $user_image['full_path'],
              'maintain_ratio'  =>  TRUE,
              'width'           =>  250,
              'height'          =>  250,         
            ); 

             $this->image_lib->clear();
            $this->image_lib->initialize($configer);        
            $this->image_lib->resize();
			 	
				   $insertquery = array(
				   	'category_name' => $this->input->post('category_name'), 
				   	'parentcategory_id' => $this->input->post('subject_name'),
				    	'popular' => $this->input->post('popular'), 
				    	'image' =>$user_image['file_name'],
				   'path' =>'category',
				   'randid'=>round(mt_rand(1000000000, mt_getrandmax()))
				   	
				    );
					
					$data['value']=$this->Admin_model->insertquery('category',$insertquery);

				 	redirect(adminpath."category");

				 }
			}

		} else {
				redirect(adminpath."category");
		}
		
	}

	public function editcategory()
	{
		$data = array();
		$data['question']=$this->Admin_model->selectquery('parentcategory');
			$data['chapter']=$this->Admin_model->selectquery('category');
			
			if (isset($_POST['submit'])) {

			$id=$this->input->post('id');
			$sub_str=$this->input->post('sub_str');
		 
			 
			$this->form_validation->set_rules('subject_edit'.$id, 'Parent Category Name ' , 'required'); 

	$original_value = $this->db->query("SELECT category_name FROM category WHERE id = ".$id)->row()->category_name ;
    if($this->input->post('chapter_edit'.$id) != $original_value) {
       $is_unique =  '|is_unique[category.category_name]';
    } else {
       $is_unique =  '';
    }
$this->form_validation->set_rules('chapter_edit'.$id,'Category Name ', 'required'.$is_unique,
        array(
                'is_unique'      => '{field} Already Exist'));
			
			if ($this->form_validation->run() == false) {
				$data['id'] = $id;
				$data['sub_str'] = $sub_str;
				$data['editmodal'] = true;	
				
				$this->load->view('admin/category',$data);

			} else { 
            $insertquery = array(
            	
            	 
				   	'category_name' => $this->input->post('chapter_edit'.$id),
				   	'parentcategory_id' => $this->input->post('subject_edit'.$id),
				   	 	'popular' => $this->input->post('popular'.$id),
				   	  
				   	  
				   	
				   	 ); 
            $data['value']=$this->Admin_model->updatequery('id',$id,'category',$insertquery);
           
					redirect(adminpath."category");

				 
			}

		} else {
				redirect(adminpath."category");
		}
		
	}


		public function editcategoryimage()
	{
		$data = array();
	 		$data['question']=$this->Admin_model->selectquery('parentcategory');
			$data['chapter']=$this->Admin_model->selectquery('category');
			
			if (isset($_POST['submit'])) {

			$id=$this->input->post('id');
			$sub_str=$this->input->post('sub_str');
			$imagename=$this->input->post('imagename'); 

		   $config['upload_path']          = './uploads/category/';
           $config['allowed_types']        = 'jpg|png|jpeg';
           $config['encrypt_name']=true;  


                $this->load->library('upload', $config);
                 $this->load->library('image_lib');

                if ( ! $this->upload->do_upload('image'))
                {              
               
                	$data['editerror'] = $this->upload->display_errors();
                	$data['editmodalimage'] = true; 
                	$this->load->view('admin/category',$data);
                }


  else{ $user_image= $this->upload->data(); 
          $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  $user_image['full_path'],
              'maintain_ratio'  =>  TRUE,
              'width'           =>  250,
              'height'          =>  250,         
            ); 

             $this->image_lib->clear();
            $this->image_lib->initialize($configer);        
            $this->image_lib->resize(); 
            $insertquery = array(
		 
				   	 	'image' =>$user_image['file_name']
				   	
				   	 ); 
            $data['value']=$this->Admin_model->updatequery('id',$id,'category',$insertquery);
                $url = FCPATH . 'uploads/category/';
					unlink( $url.$imagename);
				 
					redirect(adminpath."category");

				}
		 

		} else {
				redirect(adminpath."category");
		}
		
	}

	    	    
public function deletecategory()
	{

		$id=$this->input->post('id');
		$imagename=$this->input->post('imagename12');

		if(isset($id))
			{
				$this->Admin_model->deletequery('id',$id,'category');
				$url = FCPATH . 'uploads/category/';
					unlink( $url.$imagename);
				 

			}

	}	

	    	    
 
	 

public function product()
	{
	    $data['productimage']=$this->Admin_model->selectquery('images');
	    $data['category']=$this->Admin_model->selectquery('category');
		$data['chapter']=$this->Admin_model->selectquery('product');
		
		$this->load->view('admin/product',$data);

	}
	public function addproduct()
	{
  $data['question']=$this->Admin_model->selectquery('category');
		$this->load->view('admin/addproduct',$data);

	}
	public function addcoupon()
	{
		$this->load->view('admin/addcoupon');

	}
public function addproduct_submit(){
  $data['question']=$this->Admin_model->selectquery('category');
  		if(isset($_POST['submitbutton'])){ 

   $config1 = array(  				 	
        array('field' => 'productname','label' => 'Product Name','rules' => 'required|is_unique[product.productname] '),
        array('field' => 'productcategory','label' => 'Product category','rules' => 'required'),       
        array('field' => 'price','label' => 'Price','rules' => 'required' ),    
        array('field' => 'quantity','label' => 'quantity','rules' => 'required' ),
      	array('field' => 'stockquantity','label' => 'quantity','rules' => 'required' ),
        array('field' => 'stock','label' => 'stock','rules' => 'required' ),
        //array('field' => 'productimage','label' => 'Image','rules' => 'required' ),

        
        );
		 $this->form_validation->set_rules($config1);	

		 	if ($this->form_validation->run() == false) {
		 
	    $this->load->view('admin/addproduct',$data);
}

else{



  		    if(isset($_FILES['userfile']) && $_FILES['userfile']['error'] != '4') :
            $files = $_FILES;
            $count = count($_FILES['userfile']['name']); // count element 
            for($i=0; $i<$count; $i++):
                $_FILES['userfile']['name']= $files['userfile']['name'][$i];
                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                $_FILES['userfile']['size']= $files['userfile']['size'][$i];
                $config['upload_path'] = './uploads/products/';
                $target_path = './uploads/products/thumb/';                
                $config['allowed_types'] = 'jpg|png|jpeg';                            
                $config['remove_spaces'] = FALSE;
                $config['encrypt_name']     = TRUE;
                           
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('userfile');
                $fileName = $this->upload->data('file_name');
                $data = array('upload_data' => $this->upload->data());        
                $path=$data['upload_data']['full_path'];
                 $q['name']=$data['upload_data']['file_name'];                 
                 $configi['image_library'] = 'gd2';
                 $configi['source_image']   = $path;
                 $configi['new_image']   = $target_path;
                 $configi['maintain_ratio'] = TRUE;
                 $configi['create_thumb'] = TRUE;
                 $configi['thumb_marker'] ='';
                
                 $configi['width']  = 150; // new size
                 $configi['height'] = 150;

                $this->load->library('image_lib');
                $this->image_lib->initialize($configi);    
                $this->image_lib->resize();
                $images[] = $fileName;
               // print_r($fileName);
             
                         
            endfor;
        endif;

 
                 $insertquery = array(
				   	'productname' => $this->input->post('productname'), 
				   	'productcategory' => $this->input->post('productcategory'), 
				   	'price' => $this->input->post('price'), 				  
				   	'quantity' => $this->input->post('quantity'), 
				   	'stockquantity' => $this->input->post('stockquantity'), 
				   	'stock' => $this->input->post('stock'), 
				   	'disprice' => $this->input->post('disprice'), 
				   	'descrip' => $this->input->post('descrip'), 
				   	'trending' => $this->input->post('trending'),
				   	'randid' => round(mt_rand(1000000000, mt_getrandmax())), 
					'start_date' =>$this->input->post('start_date'),
					'end_date' =>$this->input->post('end_date')
				);
				   	$data['value']= $this->Admin_model->insertquery('product',$insertquery); 
				  //print_r( $data['value']);
	   				$insert_id = $this->db->insert_id();
	 
				  
  // print_r( $images);
 
				   foreach($images as $file){
				   	  $insertquery2=array(
				    
				   	'productid' => $data['value'],
				   	'image' => $file,
				   	 'path' => 'products', );
					 $this->Admin_model->insertquery('images',$insertquery2);

				   }
                  
					 $this->session->set_flashdata('msg', 'Product Added');
					redirect(adminpath.'editvariant/'.$insert_id);
	 

    }

    }
				else{
					redirect(adminpath.'product');
				}

}
public function addcoupon_submit(){
			if(isset($_POST['coupon'])){ 
	 		$config1 = array(  				 	
		  	array('field' => 'coupon_code','label' => 'Coupon Code','rules' => 'required|is_unique[coupon.coupon_code] '),
		  	array('field' => 'type','label' => 'Type','rules' => 'required'),       
		 	 array('field' => 'discount_amount','label' => 'Discount_amount','rules' => 'required' ),    
		   array('field' => 'uses','label' => 'Uses','rules' => 'required' ),
			array('field' => 'description','label' => 'Description','rules' => 'required' ),
		   array('field' => 'starts_at','label' => 'Starts Date','rules' => 'required' ),
		  array('field' => 'expires_at','label' => 'Expires Date','rules' => 'required' ),
		  array('field' => 'status','label' => 'Status','rules' => 'required' ),
		  );
		   $this->form_validation->set_rules($config1);	
  
			   if ($this->form_validation->run() == false) {
		   
		  $this->load->view('admin/addcoupon');
  }
  
  else{
				   $insertquery = array(
						 'coupon_code' => $this->input->post('coupon_code'), 
						 'type' => $this->input->post('type'), 
						 'discount_amount' => $this->input->post('discount_amount'), 				  
						 'uses' => $this->input->post('uses'), 
						 'description' => $this->input->post('description'), 
						 'starts_at' => $this->input->post('starts_at'), 
						 'expires_at' => $this->input->post('expires_at'), 
						 'status' => $this->input->post('status'),
						 'created_date'=>date("Y-m-d H:i:s"),
						  );
  
					 $data['value']=$this->Admin_model->insertquery('coupon',$insertquery); 
					 redirect(adminpath.'couponCode');

  
	  }
  
	  }
				  else{
					  redirect(adminpath.'couponCode');
				  }
  
  }
  

 

public function deleteproduct()
	{

		$id=$this->input->post('id');

		if(isset($id))
			{
				$this->Admin_model->deletequery('id',$id,'product');

			}

	}	
	public function deletecoupon()
	{

		$id=$this->input->post('id');

		if(isset($id))
			{
				$this->Admin_model->deletequery('id',$id,'coupon');

			}

	}
public function deleteproductimage()
	{

		$id=$this->input->post('id');
		$imagename=$this->input->post('imagename');

		if(isset($id))
			{

				 
				$this->Admin_model->deletequery('id',$id,'images');
					$url = FCPATH . 'uploads/products/';
					unlink( $url.$imagename);
				 
					$url1 = FCPATH . 'uploads/products/thumb/';
					unlink( $url.$imagename);
				 

		 
				

			}

	}	

	public function editproduct($id)
	{

	$data['product']=$this->Admin_model->selectquerywhere('product','id',$id);
  $data['category']=$this->Admin_model->selectquery('category');
  $data['images']=$this->Admin_model->selectquerywhere('images','productid',$id);
  
	
	$this->load->view('admin/editproduct',$data);
	}


	public function editcoupon($id)
	{

	$data['product']=$this->Admin_model->selectquerywhere('coupon','id',$id);
	$this->load->view('admin/editcoupon',$data);
	}

	public function editcoupon_submit(){
		$id=$this->input->post('id');
		$data['product']=$this->Admin_model->selectquerywhere('coupon','id',$id);
		if(isset($_POST['coupon'])){ 
			$original_value = $this->db->query("SELECT coupon_code FROM coupon WHERE id = ".$id)->row()->coupon_code ;
			if($this->input->post('coupon_code') != $original_value) {
			   $is_unique =  '|is_unique[coupon.coupon_code]';
			} else {
			   $is_unique =  '';
			}$config1 = array(  				 	
	  array('field' => 'coupon_code','label' => 'Coupon Code','rules' => 'required'.$is_unique),
	  array('field' => 'type','label' => 'Type','rules' => 'required'),       
	  array('field' => 'discount_amount','label' => 'Discount_amount','rules' => 'required' ),    
		 
	   array('field' => 'uses','label' => 'Uses','rules' => 'required' ),
	array('field' => 'description','label' => 'Description','rules' => 'required' ),
	   array('field' => 'starts_at','label' => 'Starts Date','rules' => 'required' ),
	  array('field' => 'expires_at','label' => 'Expires Date','rules' => 'required' ),
	  array('field' => 'status','label' => 'Status','rules' => 'required' ),

	  
	  );
	   $this->form_validation->set_rules($config1);	

		   if ($this->form_validation->run() == false) {
	   
	  $this->load->view('admin/editcoupon',$data);
}

else{
			   $insertquery = array(
					 'coupon_code' => $this->input->post('coupon_code'), 
					 'type' => $this->input->post('type'), 
					 'discount_amount' => $this->input->post('discount_amount'), 				  
					 'uses' => $this->input->post('uses'), 
					 'description' => $this->input->post('description'), 
					 'starts_at' => $this->input->post('starts_at'), 
					 'expires_at' => $this->input->post('expires_at'), 
					 'status' => $this->input->post('status'),
					 'created_date'=>date("Y-m-d H:i:s"),
					  );

					  $this->Admin_model->updatequery('id',$id,'coupon',$insertquery);
			
					  $this->session->set_flashdata('msg', 'Updated Successfully');
					
					   redirect(adminpath."couponCode");				//print_r( $data['value']);

  }

  }
			  else{
				  redirect(adminpath.'couponCode');
			  }

}

	public function editproduct_submit()
	{
	 $id=$this->input->post('id');
	$data['product']=$this->Admin_model->selectquerywhere('product','id',$id);
 	 $data['category']=$this->Admin_model->selectquery('category');
  	 $data['images']=$this->Admin_model->selectquerywhere('images','productid',$id);
		if (isset($_POST['submitbutton'])) {
	 $original_value = $this->db->query("SELECT productname FROM product WHERE id = ".$id)->row()->productname ;
    if($this->input->post('productname') != $original_value) {
       $is_unique =  '|is_unique[product.productname]';
    } else {
       $is_unique =  '';
    }	$config1 =array(
        array('field' => 'productname','label' => 'Product Name','rules' => 'required'.$is_unique,
        array(
                'is_unique'      => '{field} Already Exist')),
        array('field' => 'productcategory','label' => 'Product category','rules' => 'required'),       
        array('field' => 'price','label' => 'Price','rules' => 'required' ),           
         array('field' => 'quantity','label' => 'Quantity','rules' => 'required' ),
         array('field' => 'stockquantity','label' => 'Stock quantity','rules' => 'required' ),
         array('field' => 'stock','label' => 'Stock','rules' => 'required' ),
         
        );$this->form_validation->set_rules($config1);	

			if ($this->form_validation->run() == false) { 
				
				$this->load->view('admin/editproduct',$data);
			} 
			else 

		 	{
				//  print_r("printin");
		 	 $insertquery = array(
				   	'productname' => $this->input->post('productname'), 
				   	'productcategory' => $this->input->post('productcategory'), 
				   	'price' => $this->input->post('price'), 				  
				   	'quantity' => $this->input->post('quantity'), 
				   	'stockquantity' => $this->input->post('stockquantity'), 
				   	'stock' => $this->input->post('stock'), 
				   	'disprice' => $this->input->post('disprice'), 
				   	'descrip' => $this->input->post('descrip'), 
				   	'trending' => $this->input->post('trending'), 
					'start_date' => $this->input->post('start_date'), 
					'end_date' => $this->input->post('end_date'), 
				  );
				//   print_r($insertquery);
			 $this->Admin_model->updatequery('id',$id,'product',$insertquery);
			// print_r($data['errors']);
				$this->session->set_flashdata('msg', 'Updated Successfully');
		 	 
				 redirect(adminpath."product");

				}

		}



	else if(isset($_POST['imagesubmitbutton'])){ 
	   if(isset($_FILES['userfile']) && $_FILES['userfile']['error'] != '4') :
            $files = $_FILES;
            $count = count($_FILES['userfile']['name']); // count element 
            for($i=0; $i<$count; $i++):
                $_FILES['userfile']['name']= $files['userfile']['name'][$i];
                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                $_FILES['userfile']['size']= $files['userfile']['size'][$i];
                $config['upload_path'] = './uploads/products/';
                $target_path = './uploads/products/thumb/';                
                $config['allowed_types'] = 'jpg|png|jpeg';                            
                $config['remove_spaces'] = FALSE;
                $config['encrypt_name']     = TRUE;
                           
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('userfile');
                $fileName = $this->upload->data('file_name');
                $data = array('upload_data' => $this->upload->data());        
                $path=$data['upload_data']['full_path'];
                 $q['name']=$data['upload_data']['file_name'];                 
                 $configi['image_library'] = 'gd2';
                 $configi['source_image']   = $path;
                 $configi['new_image']   = $target_path;
                 $configi['maintain_ratio'] = TRUE;
                 $configi['create_thumb'] = TRUE;
                 $configi['thumb_marker'] ='';
                
                 $configi['width']  = 150; // new size
                 $configi['height'] = 150;

                $this->load->library('image_lib');
                $this->image_lib->initialize($configi);    
                $this->image_lib->resize();
                $images[] = $fileName;
               // print_r($fileName);
             
                         
            endfor;
     

       // print_r($images);


 				   foreach($images as $file){
				   	  $insertquery2=array(
				    
				   	'productid' =>$this->input->post('idval'),
				   	'image' => $file,
				   	 'path' => 'products', );
					 $this->Admin_model->insertquery('images',$insertquery2);
					

				   }
				      endif;
				   redirect(adminpath."product");

				}

				else{ 
					redirect(adminpath."product");
				}


	 
 }

 	public function editvariant($id)
	{

	$data['variants']=$this->Admin_model->selectquerywhere('productvariation','productid',$id);  
	$this->load->view('admin/editvariant',$data);
	}

	public function variantsubmit(){ 
	$data['variants']=$this->Admin_model->selectquerywhere('productvariation','productid',$this->input->post('productid')); 
		if(isset($_POST['productid'])){ 
		  $insertquery = array('productid' => $this->input->post('productid'),'price' => $this->input->post('price'),'disprice' => $this->input->post('disprice'), 'quantity' => $this->input->post('quantity'), );
		 $this->Admin_model->insertquery('productvariation',$insertquery);		 
		  if(count($data['variants']==0)){	 
		 	 $updatequerys = array('variableproduct' =>"2" );
            $this->Admin_model->updatequery('id',$this->input->post('productid'),'product',$updatequerys);
		 }
	 
		}

	}

	public function varianteditsubmit(){ 
		//echo $this->input->post('productid');
		$data['variants']=$this->Admin_model->selectquerywhere('productvariation','productid',$this->input->post('productid')); 
    $insertquery = array('price' => $this->input->post('price'),'disprice' => $this->input->post('disprice'), 'quantity' => $this->input->post('quantity'), ); 
		 
		  print_r($this->Admin_model->updatequery('id',$this->input->post('variantid'),'productvariation',$insertquery));
		  
		 
	}


	public function variantdelete()
	{
        $productid=$this->input->post('productid');
		$id=$this->input->post('id');
		$variant=$this->Admin_model->selectquerywhere('productvariation','productid',$productid);
  if(isset($id))
			{
				$this->Admin_model->deletequery('id',$id,'productvariation');
				if(count($variant)==1){
			  $updatequerys = array('variableproduct' =>"1" );
            $this->Admin_model->updatequery('id',$productid,'product',$updatequerys);
					
				}		 

			}
	}


 public function combocategory()
	{
		$data['products']=$this->Admin_model->selectquery('product');
		$data['questions']=$this->Admin_model->selectquery('combocategory');
		$this->load->view('admin/combocategory',$data);
	}

	public function addcombocategory()
	{
		$data = array();
		$data['questions']=$this->Admin_model->selectquery('combocategory');	
		$data['products']=$this->Admin_model->selectquery('product');
			if (isset($_POST['submit'])) {
	$this->form_validation->set_rules('combocategory',  'Category Name ' , 'required|is_unique[combocategory.name]',
        array('is_unique'=>'{field} Already Exist'));
$this->form_validation->set_rules('combocategoryamount', ' Category Amount ' , 'required' );
$this->form_validation->set_rules('productss[]', ' Products ' , 'required' );

		
			if ($this->form_validation->run() == false) {
				$data['addmodal'] = true;
						
				$this->load->view('admin/combocategory',$data);

			} else {


		   $config['upload_path']          = './uploads/combocategory/';
           $config['allowed_types']        = 'jpg|png|jpeg';
           $config['encrypt_name']=true;  


                $this->load->library('upload', $config);
                 $this->load->library('image_lib');

                if ( ! $this->upload->do_upload('image'))
                {              
                	 
                	$data['error'] = $this->upload->display_errors();
                	$data['addmodal'] = true;
                   $this->load->view('admin/combocategory',$data);
                }
                else{

                	
               $user_image= $this->upload->data(); 
               //print_r($user_image);
             
               $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  $user_image['full_path'],
              'maintain_ratio'  =>  TRUE,
              'width'           =>  250,
              'height'          =>  250,         
            ); 

            $this->image_lib->clear();
            $this->image_lib->initialize($configer);        
            $this->image_lib->resize();
			 	
				  

				 $value=implode(',',$this->input->post('productss[]'));

		 	
				   $insertquery = array('name' => $this->input->post('combocategory'),'amount' => $this->input->post('combocategoryamount'),'products' => $value, 'image' =>$user_image['file_name'],
				   'path' =>'combocategory','randid' =>round(mt_rand(1000000000, mt_getrandmax())));
					
					$data['value']=$this->Admin_model->insertquery('combocategory',$insertquery);

				 	redirect(adminpath."combocategory");

				 }
			}

		} else {
				redirect(adminpath."combocategory");
		}
		
	}

		public function editcombocategory($id)

		{
			 
				$data['questions']=$this->Admin_model->selectquerywhere('combocategory','id',$id);
				$data['products']=$this->Admin_model->selectquery('product');
			$this->load->view('admin/editcombocategory',$data );
		}
 public function editcombocategorysubmit( )
	{ 

  $id=$this->input->post('id');
 $data['questions']=$this->Admin_model->selectquerywhere('combocategory','id',$id);
$data['products']=$this->Admin_model->selectquery('product');
  

		if (isset($_POST['submitbutton'])) {

	 $original_value = $this->db->query("SELECT name FROM combocategory WHERE id = ".$id)->row()->name ;
    if($this->input->post('combocategory_edit') != $original_value) {
       $is_unique =  '|is_unique[combocategory.name]';
    } else {
       $is_unique =  '';
    }
$this->form_validation->set_rules('combocategory_edit','Category Name ', 'required'.$is_unique,
        array(
                'is_unique'      => '{field} Already Exist'));


$this->form_validation->set_rules('combocategoryamount_edit', ' Category Amount ' , 'required' );
$this->form_validation->set_rules('productss[]', ' Products ' , 'required' ); 
if ($this->form_validation->run() == false) {//echo "aaa";die();

		
				$this->load->view('admin/editcombocategory',$data);
			} else 

		 	{
		 	  $value=implode(',',$this->input->post('productss[]'));

		 	
			 $insertquery = array('name' => $this->input->post('combocategory_edit'),'amount' => $this->input->post('combocategoryamount_edit'),'products' => $value );

				 $this->Admin_model->updatequery('id',$id,'combocategory',$insertquery);
			
				 
		 
					redirect(adminpath."combocategory" );

				}

		}


	else if (isset($_POST['imagesubmitbutton'])) { 
		$imagename=$this->input->post('imagename');

		 $config['upload_path']          = './uploads/combocategory/';
           $config['allowed_types']        = 'jpg|png|jpeg';
           $config['encrypt_name']=true;  
            $this->load->library('upload', $config);
             $this->load->library('image_lib');
	 if ( ! $this->upload->do_upload('userfile'))
                {              
                	//print_r("not uploadaed");
                	$data['editerror'] = $this->upload->display_errors();
                	 
                	$this->load->view('admin/editcombocategory',$data);
                } 
  else{ $user_image= $this->upload->data(); 
          $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  $user_image['full_path'],
              'maintain_ratio'  =>  TRUE,
              'width'           =>  250,
              'height'          =>  250,         
            ); 

             $this->image_lib->clear();
            $this->image_lib->initialize($configer);        
            $this->image_lib->resize();
            $insertquery = array('image' =>$user_image['file_name'] );
            $this->Admin_model->updatequery('id',$id,'combocategory',$insertquery);
            $url = FCPATH . 'uploads/combocategory/';
					unlink( $url.$imagename);
				 
		 
				 
		 
					redirect(adminpath."combocategory");

}
	}


		else{

		redirect(adminpath."combocategory");

		}
 }

	public function deletecombocategory()
	{

		$id=$this->input->post('id');

		if(isset($id))
			{
				$this->Admin_model->deletequery('id',$id,'combocategory');

			}

	}


public function comboproduct()
	{
	 
		$data['chapter']=$this->Admin_model->selectquery('comboproduct');
		$this->load->view('admin/comboproduct',$data);

	}
	public function addcomboproduct()
	{
  $data['question']=$this->Admin_model->selectquery('combocategory');
		$this->load->view('admin/addcomboproduct',$data);

	}

public function addcomboproduct_submit(){
  $data['question']=$this->Admin_model->selectquery('combocategory');
		 $config1 = array(
        array('field' => 'comboproductname','label' => 'comboproduct Name','rules' => 'required'),
        array('field' => 'comboproductcategory','label' => 'comboproduct category','rules' => 'required'),       
        
          
       
         array('field' => 'stock','label' => 'stock','rules' => 'required' ),
           // array('field' => 'image','label' => 'Image','rules' => 'required' ),

        
        );
		 $this->form_validation->set_rules($config1);	

			if ($this->form_validation->run() == false) {
	    $this->load->view('admin/addcomboproduct',$data);
}
 else{

	if (isset($_POST['submitbutton'])) {

			   $insertquery = array(
				   	'comboproductname' => $this->input->post('comboproductname'), 
				   	'comboproductcategory' => $this->input->post('comboproductcategory'), 
				    			  
				   	 
				   	'stock' => $this->input->post('stock'), 
				   	'disprice' => $this->input->post('disprice'), 
				   	'descrip' => $this->input->post('descrip'), 
				   	'trending' => $this->input->post('trending'), 
				  );
			   
					
					$data['value']=$this->Admin_model->insertquery('comboproduct',$insertquery);
					 $this->session->set_flashdata('msg', 'comboproduct Added');
					redirect(adminpath.'comboproduct');

						}

						else{
							echo "not submit";
						}
					}

}

public function deletecomboproduct()
	{

		$id=$this->input->post('id');

		if(isset($id))
			{
				$this->Admin_model->deletequery('id',$id,'comboproduct');

			}

	}	


	public function editcomboproduct($id)
	{

	$data['comboproduct']=$this->Admin_model->selectquerywhere('comboproduct','id',$id);
  $data['category']=$this->Admin_model->selectquery('combocategory');
	
	$this->load->view('admin/editcomboproduct',$data);
	}


	public function editcomboproduct_submit()
	{
		$id=$this->input->post('id');
	$data['comboproduct']=$this->Admin_model->selectquerywhere('comboproduct','id',$id);
  $data['category']=$this->Admin_model->selectquery('combocategory');
  

		if (isset($_POST['submitbutton'])) {

			$config1 =array(
        array('field' => 'comboproductname','label' => 'comboproduct Name','rules' => 'required'),
        array('field' => 'comboproductcategory','label' => 'comboproduct category','rules' => 'required'),       
    
         array('field' => 'stock','label' => 'stock','rules' => 'required' ),
         
        );


			$this->form_validation->set_rules($config1);	

		

			if ($this->form_validation->run() == false) {//echo "aaa";die();

		
				$this->load->view('admin/editcomboproduct',$data);
			} else 

		 	{
		 	 $insertquery = array(
				   	'comboproductname' => $this->input->post('comboproductname'), 
				   	'comboproductcategory' => $this->input->post('comboproductcategory'), 
				  
				   	'stock' => $this->input->post('stock'), 
				   	'disprice' => $this->input->post('disprice'), 
				   	'descrip' => $this->input->post('descrip'), 
				   	'trending' => $this->input->post('trending'), 
				  );

				 $this->Admin_model->updatequery('id',$id,'comboproduct',$insertquery);
			
				$this->session->set_flashdata('msg', 'Updated Successfully');
		 
				redirect(adminpath."editcomboproduct/".$id);

				}

		}

		else{

		redirect(adminpath."comboproduct");

		}
 }

 public function employee()
	{
	 $data=array();
	 $data['user_details']=$this->Admin_model->selectquery('employee');
		$this->load->view('admin/employee',$data);
	}
	public function add_newemployee()
	{ 
		$data['user_details']=$this->Admin_model->selectquery('employee');
		if(isset($_POST['add_service_button'])){

			$this->form_validation->set_rules('user_name','Username','required|min_length[7]|is_unique[employee.emailaddress]',
				  array('is_unique'=>'{field} Already Exist'));
			$this->form_validation->set_rules('user_pass','User Password','required|min_length[5]|max_length[12]');
		 $this->form_validation->set_rules('user_email','Name','required|min_length[3] ');
		 
			if($this->form_validation->run() == false)
			{
				$data['reset'] = true;
				$this->load->view('admin/employee',$data);
				
			}

			else{ 
                	$insertquery = array(
                	'emailaddress' => $this->input->post('user_name'),
                	'password' => md5($this->input->post('user_pass')),
                	'name' => $this->input->post('user_email'),
                	'mobilenumber' => $this->input->post('user_number'),
                	//'role' => $this->input->post('user_role'),
                	 
                	);
               	
		$this->Admin_model->insertquery('employee',$insertquery);
	 
		redirect(adminpath.'employee');
	

             
			}
		}
		else{
			redirect(adminpath.'employee');
		}

		
	}
	
 

    public function edit_employee()
	{
 $data = array();
	$data['user_details']=$this->Admin_model->selectquery('employee');

	
			if (isset($_POST['edit_user_button'])) {


			$id=$this->input->post('hidden_id');
		 


	$original_value = $this->db->query("SELECT emailaddress FROM employee WHERE id = ".$id)->row()->emailaddress ;
    if($this->input->post('user_name_edit'.$id) != $original_value) {
       $is_unique =  '|is_unique[employee.emailaddress]';
    } else {
       $is_unique =  '';
    }
$this->form_validation->set_rules('user_name_edit'.$id,'Username ', 'required|min_length[7]'.$is_unique,
        array(
                'is_unique'      => '{field} Already Exist'));
  $this->form_validation->set_rules('user_email_edit'.$id,' Name','required|min_length[3] ');

		 
			//$this->form_validation->set_rules('user_role'.$id,'User Role','required');
			if ($this->form_validation->run() == false) {
				$data['id'] = $id;	 
				$data['editmodal'] = true;	
				$data['questions']=$this->Admin_model->selectquery('combocategory');		
				$this->load->view('admin/employee',$data);

			} else 
			{		
				  $insertquery = array(
                	'emailaddress' => $this->input->post('user_name_edit'.$id),
                	'name' => $this->input->post('user_email_edit'.$id),
                	'mobilenumber' => $this->input->post('user_mobile_edit'.$id),
                	//'role' => $this->input->post('user_role'.$id),
                	 
                	);
					$data['value']=$this->Admin_model->updatequery('id',$id,'employee',$insertquery);
				 

					 redirect(adminpath."employee");
			}

		} else {
		 
				 redirect(adminpath."employee");
		}

	}
public function delete_employee()
		{
			$id=$this->input->post('id');
			if(isset($_POST['id']))
			{
				 
				$this->Admin_model->deletequery('id',$id,'employee');
						

			}
			
			
		}
public function orderdetails()
		{
			 $data['myorders']=$this->Admin_model->selectquerywhere('myorders','orderstatus','1');
			 $data['status']=$this->Admin_model->selectquery('status');
			  $data['customerdetails']=$this->Admin_model->selectquery('customer');
			  $data['employeedetails']=$this->Admin_model->selectquery('employee');
			  $data['orderrecipt']=$this->Admin_model->selectquerywhere('orderrecipt','orderid', $this->input->post('orderid'));

			 $this->load->view('admin/orderdetails',$data);
			
			
		}

public function orderlist(){
	$data['orderlists']=$this->db->query("SELECT `status` FROM `status` 
	WHERE `status` NOT IN (SELECT `newstatus` FROM `orderstatus` WHERE `orderid`=".$this->input->post('orderid').")");
	$result = $data['orderlists']->result_array();
	echo json_encode($result);

}
		public function orderview()
		{

			$data['myorders']=$this->Admin_model->selectquerywhere('orderproducts','orderid', $this->uri->segment(3)); 
			$data['orderrecipt']=$this->Admin_model->selectquerywhere('orderrecipt','orderid', $this->uri->segment(3)); 

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
			 $this->load->view('admin/orderview',$data);
			
			
		}
		public function orderviewcombo($id)

		{
 	
			$data['myorders']=$this->Admin_model->selectquerywhere('combocategory','id', $id);
			    
			$data['productvalue']=$this->Admin_model->selectqueryin ('product','id',explode(',',$data['myorders'][0]['products']));

			 $this->load->view('admin/orderviewcombo',$data);

		}
		public function assignedorders()
		{ $data['employeedetails']=$this->Admin_model->selectquery('employee');
			 $data['myorders']=$this->Admin_model->selectquerywhere('myorders','orderstatus','2');
			  $data['customerdetails']=$this->Admin_model->selectquery('customer');
			 $this->load->view('admin/assignedorders',$data);
			
			
		}
		public function completedorders()
		{

			 $data['myorders']=$this->Admin_model->selectquerywhere('myorders','orderstatus','3');
			  $data['customerdetails']=$this->Admin_model->selectquery('customer');
			 $this->load->view('admin/completedorders',$data);
			
			
		}

		public function assignorder()
		{
			//print_r($_SESSION);
			if(isset($_POST['submitbutton']) ){

			print_r($this->input->post('employeeassign')	);
			if($this->input->post('employeeassign')==''){
				$flashmessage=array('status'=>"warning","message"=>"Select Delivery Boy");
				$this->session->set_flashdata('msg',$flashmessage);
				 redirect(adminpath."orderdetails");
			}
			else{
			$insertquery = array('assignemployeeid' => $this->input->post('employeeassign') ,'orderstatus'=>'2','deliverydate'=>date("Y-m-d")) ;	
			 
			$data['value']=$this->Admin_model->updatequery('orderid',$this->input->post('orderid'),'myorders',$insertquery);
			$flashmessage=array('status'=>"success","message"=>"Delivery Boy Assigned");
				$this->session->set_flashdata('msg',$flashmessage);
			 redirect(adminpath."orderdetails");
			 
			}
				 
 
			


			}
			else{
				redirect(adminpath."orderdetails");

			}
			
			
		}






		public function orderStatus()
		{
			//print_r($_SESSION);
			if(isset($_POST['status_button']) ){

			print_r($this->input->post('orderstatus')	);
			if($this->input->post('orderstatus')==''){
				$flashmessage=array('status'=>"warning","message"=>"Select orderstatus");
				$this->session->set_flashdata('msg',$flashmessage);
				 redirect(adminpath."orderdetails");
			}
			else{
			$insertquery = array('newstatus' => $this->input->post('orderstatus') ,'orderid'=>$this->input->post('orderid'),'userid'=>$this->input->post('customerid')) ;	
			 
			$data['value']=$this->Admin_model->insertquery('orderstatus',$insertquery);
			$flashmessage=array('status'=>"success","message"=>"Order Status Inserted");
				$this->session->set_flashdata('msg',$flashmessage);
			 redirect(adminpath."orderdetails");
			 
			}
				 
 
			


			}
			else{
				redirect(adminpath."orderdetails");

			}
			
			
		}




		public function area()
	{
		 
		$data['questions']=$this->Admin_model->selectquery('area');
		$data['city']=$this->Admin_model->selectquery('city');
		$this->load->view('admin/area',$data);
	}

	public function addarea()
	{
		$data = array();
		$data['questions']=$this->Admin_model->selectquery('area');	
		$data['city']=$this->Admin_model->selectquery('city');
			if (isset($_POST['submit'])) {
	$this->form_validation->set_rules('parentcategory', 'Area Name ' , 'required|is_unique[area.name]',
        array('is_unique'=>'{field} Already Exist')); 
	$this->form_validation->set_rules('subject_name', 'City Name ' , 'required'); 
			if ($this->form_validation->run() == false) {
				$data['addmodal'] = true;
						
				$this->load->view('admin/area',$data);

			} else {	 
				   $insertquery = array('name' => $this->input->post('parentcategory'),'cityid' => $this->input->post('subject_name'), );
					
					$data['value']=$this->Admin_model->insertquery('area',$insertquery);

				 	redirect(adminpath."area");
			 
			}

		} else {
				redirect(adminpath."area");
		}
		
	}

		public function editarea()
	{
		$data = array();
		$data['questions']=$this->Admin_model->selectquery('area');	
		$data['city']=$this->Admin_model->selectquery('city');
			if (isset($_POST['submit'])) { 
			$id=$this->input->post('id');
			$sub_str=$this->input->post('sub_str'); 
 
	$original_value = $this->db->query("SELECT name FROM area WHERE id = ".$id)->row()->name ;

    if($this->input->post('parentcategory_edit'.$id) != $original_value) {
       $is_unique =  '|is_unique[area.name]';
    } else {
       $is_unique =  '';
    }
$this->form_validation->set_rules('parentcategory_edit'.$id,'Area Name ', 'required'.$is_unique,
        array(
                'is_unique'      => '{field} Already Exist'));
$this->form_validation->set_rules('subject_edit'.$id, 'City Name ' , 'required'); 

			if ($this->form_validation->run() == false) {
				$data['id'] = $id;
				$data['sub_str'] = $sub_str;
				$data['editmodal'] = true;						
				$this->load->view('admin/area',$data);

			} else {		

	  
             $insertquery = array(
             	'name' => $this->input->post('parentcategory_edit'.$id),
             'cityid' => $this->input->post('subject_edit'.$id) ) ;
			
			$data['value']=$this->Admin_model->updatequery('id',$id,'area',$insertquery);
				 
	redirect(adminpath."area");
			 
			}

		} else {
				redirect(adminpath."area");
		}
		
	}

	public function deletearea()
	{

		$id=$this->input->post('id');
		 

		if(isset($id))
			{
				$this->Admin_model->deletequery('id',$id,'area');
			 

			}

	}




		public function city()
	{
		 
		$data['questions']=$this->Admin_model->selectquery('city');
		$this->load->view('admin/city',$data);
	}

	public function addcity()
	{
		$data = array();
		$data['questions']=$this->Admin_model->selectquery('city');	
			if (isset($_POST['submit'])) {
	$this->form_validation->set_rules('parentcategory', 'City Name ' , 'required|is_unique[city.city]',
        array('is_unique'=>'{field} Already Exist'));


		
			if ($this->form_validation->run() == false) {
				$data['addmodal'] = true;
						
				$this->load->view('admin/city',$data);

			} else {	

  
				   $insertquery = array('city' => $this->input->post('parentcategory'), );
					
					$data['value']=$this->Admin_model->insertquery('city',$insertquery);

				 	redirect(adminpath."city");
			 
			}

		} else {
				redirect(adminpath."city");
		}
		
	}

		public function editcity()
	{
		$data = array();
		$data['questions']=$this->Admin_model->selectquery('city');	
			if (isset($_POST['submit'])) {

			$id=$this->input->post('id');
			$sub_str=$this->input->post('sub_str');
			 
 
	$original_value = $this->db->query("SELECT city FROM city WHERE id = ".$id)->row()->city3 ;

    if($this->input->post('parentcategory_edit'.$id) != $original_value) {
       $is_unique =  '|is_unique[city.city]';
    } else {
       $is_unique =  '';
    }
$this->form_validation->set_rules('parentcategory_edit'.$id,'City Name ', 'required'.$is_unique,
        array(
                'is_unique'      => '{field} Already Exist'));
			if ($this->form_validation->run() == false) {
				$data['id'] = $id;
				$data['sub_str'] = $sub_str;
				$data['editmodal'] = true;						
				$this->load->view('admin/city',$data);

			} else {		

	  
             $insertquery = array('city' => $this->input->post('parentcategory_edit'.$id) ) ;
			
			$data['value']=$this->Admin_model->updatequery('id',$id,'city',$insertquery);
				 
	redirect(adminpath."city");
			 
			}

		} else {
				redirect(adminpath."city");
		}
		
	}

	public function deletecity()
	{

		$id=$this->input->post('id');
		 

		if(isset($id))
			{
				$this->Admin_model->deletequery('id',$id,'city'); 
			}

	}




		 public function logout()  
    {  
        
        $this->session->unset_userdata('username');  
        redirect(base_url().'Login');  
    } 

    public function addimage(){

  //   		 $data=array();
	 // $data['user_details']=$this->Admin_model->selectquery('admin_master');
		$this->load->view('admin/addimage');
 
    
}

    public function imagesupload(){

 	if(isset($_POST['submitbutton'])){ 

 	$productid=$this->input->post('productid');
 	$dbname=$this->input->post('dbname');

   $files = $_FILES;
 $count = count($_FILES['userfile']['name']);
  
echo count($_FILES['userfile']['name']);
  for($i=0; $i<$count; $i++)
                {
                $_FILES['userfile']['name']= time().$files['userfile']['name'][$i];
                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                $_FILES['userfile']['size']= $files['userfile']['size'][$i];
                $config['upload_path'] = './uploads/products';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2000000';
                $config['remove_spaces'] = true;
                $config['overwrite'] = false;
                $config['max_width'] = '';
                $config['max_height'] = '';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload();
                $fileName = $_FILES['userfile']['name'];
                $images[] = $fileName;
                }
                  $fileName = implode(',',$images);
                 
                  $this->Admin_model->upload_image($productid,$dbname,$fileName,"images");
                  if($dbname=='product'){
                  	redirect(adminpath.'product');

                  }
                   elseif($dbname=='comboproduct'){
                   	redirect(adminpath.'comboproduct');
                  	
                  }

          }

 	else{
			redirect(adminpath.'addimage');

		}
 
    
}

  public function viewimage(){ 
     $data=array();
	  $data['images']=$this->Admin_model->selectquerywhere('images',$this->uri->segment('4').'id',$this->uri->segment('3')); 
		$this->load->view('admin/viewimage',$data);
    
}

public function slider( )
	{
  $data['slidertext']=$this->Admin_model->selectquery('slidertext');
   $data['images']=$this->Admin_model->selectquery('slider');
  $this->load->view('admin/slider',$data );
	
	}


	public function slider_submit()
	{
 	 $data['slidertext']=$this->Admin_model->selectquery('slidertext');
   $data['images']=$this->Admin_model->selectquery('slider');

	if(isset($_POST['imagesubmitbutton'])){ 
	   if(isset($_FILES['userfile']) && $_FILES['userfile']['error'] != '4') :
            $files = $_FILES;
            $count = count($_FILES['userfile']['name']); // count element 
            for($i=0; $i<$count; $i++):
                $_FILES['userfile']['name']= $files['userfile']['name'][$i];
                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                $_FILES['userfile']['size']= $files['userfile']['size'][$i];
                $config['upload_path'] = './uploads/slider/';
                $target_path = './uploads/slider/thumb/';                
                $config['allowed_types'] = 'jpg|png|jpeg';                            
                $config['remove_spaces'] = FALSE;
                $config['encrypt_name']     = TRUE;
                           
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('userfile');
                $fileName = $this->upload->data('file_name');
                $data = array('upload_data' => $this->upload->data());        
                $path=$data['upload_data']['full_path'];
                 $q['name']=$data['upload_data']['file_name'];                 
                 $configi['image_library'] = 'gd2';
                 $configi['source_image']   = $path;
                 $configi['new_image']   = $target_path;
                 $configi['maintain_ratio'] = TRUE;
                 $configi['create_thumb'] = TRUE;
                 $configi['thumb_marker'] ='';
                
                 $configi['width']  = 500; // new size
                 $configi['height'] = 100;

                $this->load->library('image_lib');
                $this->image_lib->initialize($configi);    
                $this->image_lib->resize();
                $images[] = $fileName;
               // print_r($fileName);
             
                         
            endfor;
        endif;

       // print_r($images);


 				   foreach($images as $file){
				   	  $insertquery2=array(
				    
				    
				   	'image' => $file,
				   	 'path' => 'slider', );
					 $this->Admin_model->insertquery('slider',$insertquery2);
					

				   }
				   
 redirect(adminpath."slider");
				}

				else  if (isset($_POST['testsubmitbutton'])) {
 	$id=$this->input->post('slidetestfield') ;
	$this->form_validation->set_rules('slidetest', 'Slider Text ' , 'required'); 
			if ($this->form_validation->run() == false) {  
				$this->load->view('admin/slider',$data);

			} else 
			{ $insertquery = array('text' => $this->input->post('slidetest') ) ;
			
			$data['value']=$this->Admin_model->updatequery('id',$id,'slidertext',$insertquery);
		redirect(adminpath."slider");

			}
		}


		else{

	 redirect(adminpath."slider");

		}
 }

 // public function slider_textsubmit()
	// {
	// 	 $data['slidertext']=$this->Admin_model->selectquery('slidertext');
 //   $data['images']=$this->Admin_model->selectquery('slider');
		 
 // if (isset($_POST['testsubmitbutton'])) {
 // 	$id=$this->input->post('slidetestfield') ;
	// $this->form_validation->set_rules('slidetest', 'Slider Text ' , 'required'); 
	// 		if ($this->form_validation->run() == false) {  
	// 			$this->load->view('admin/slider',$data);

	// 		} else 
	// 		{ $insertquery = array('text' => $this->input->post('slidetest') ) ;
			
	// 		$data['value']=$this->Admin_model->updatequery('id',$id,'slidertext',$insertquery);
	// 	redirect(adminpath."slider");

	// 		}
	// 	}

	// 	else{
	// 		redirect(adminpath."slider");

	// 	}	



	// }
 public function deletesliderimage()
	{

		$id=$this->input->post('id');
		$imagename=$this->input->post('imagename');

		if(isset($id))
			{

				 
				$this->Admin_model->deletequery('id',$id,'slider');
					$url = FCPATH . 'uploads/slider/';
					unlink( $url.$imagename);
				 
					$url1 = FCPATH . 'uploads/slider/thumb/';
					unlink( $url1.$imagename);
				 

		 
				

			}

	}

	public function importcoupon_submit(){
	if(isset($_POST['import'])){
		echo $filename=$_FILES["csvs"]["tmp_name"];
		if($_FILES["csvs"]["size"]>0){
			$file = fopen($filename, "r");
		echo json_encode(['status'=>$file ]);
			$count = 0;
			if($file){
				while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
				{
					$count++; 
					if($count>1){ 
					$insertquery = array(
						'coupon_code' => $emapData[0], 
						'type' => $emapData[1], 
						'discount_amount' => $emapData[2], 				  
						'uses' => $emapData[3], 
						'description' => $emapData[4], 
						'starts_at' => $emapData[5], 
						'expires_at' =>$emapData[6], 
						'status' =>$emapData[7],
						'created_date'=>date("Y-m-d H:i:s"),
						 );
	
					$data['value']=$this->Admin_model->insertquery('coupon',$insertquery); 
					//redirect(adminpath.'couponCode');
				}
				
		}
		fclose($file);
		redirect(adminpath.'couponCode');
			}else{
				echo json_encode(['status'=>'Invalid ewrw:Please Upload CSV File']);
				redirect(adminpath.'couponCode');

			}
	
		}else{
			echo json_encode(['status'=>'Invalid File:Please Upload CSV File']);
			redirect(adminpath.'couponCode');

		}
	}
	}
	public function importcoupon()
	{
		$this->load->view('admin/importcoupon');

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
	 $this->load->library('Pdf');
     $this->load->view('admin/viewpdf',$data);
	}


 

}
