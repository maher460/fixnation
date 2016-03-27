<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {
    
    function index()
     {
       //This method will have the credentials validation
       $this->load->library('form_validation');
       $this->load->helper('security');
      $data['is_admin']=0;
       $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
       $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
        $this->load->model('Products');
        if ($this->input->get('logout')) {
                $this->logout();
            }
         if ($this->uri->segment(2)) {
                $data['menu_back'] = 1;
                $data['item'] = $this->Products->showItem($this->uri->segment(2));
                $catid=$data['item']->category_id;
                $data['menu_back_cat'] = $this->Products->getSuperCat($catid);
                $data['current_cat'] = $this->Products->getCurrentCat($catid);
                $data['categories'] = $this->Products->getSubCategories($catid);
            }
            else {
                $data['items'] = $this->Products->getItems(0);
                $data['categories'] = $this->Products->getSubCategories(0);
                $data['menu_back'] = 0;
                
            }
       
       if($this->session->userdata('logged_in'))
           {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['is_admin']=$this->Products->askIfAdmin($data['username']);
            $data['basketcount'] = $this->Products->getBasketCount($data['username']);
            $this->load->view('templates/header_loggedin',$data);
            $this->load->view('item_detail',$data);
           }
        else if($this->form_validation->run() == FALSE)
       {
         //Field validation failed.  User redirected to login page
         
        $this->load->view('templates/header_loggedout');
        $this->load->view('item_detail',$data);
       }
       else
           {
             //If no session, redirect to login page
             $this->load->view('templates/header_loggedout');
            $this->load->view('item_detail',$data);
           }
     
     }

     function logout()
     {
       $this->session->unset_userdata('logged_in');
       session_destroy();
       redirect('', 'refresh');
     }

    function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');
 
   //query the database
   $result = $this->Products->login($username, $password);
 
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'username' => $row->email
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
}
?>