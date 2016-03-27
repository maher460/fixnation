<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
    function index()
     {
       //This method will have the credentials validation
       $this->load->library('form_validation');
       $this->load->helper('security');
        $data['is_admin']=0;
       $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
       $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
        $this->load->model('Products');
        $data['menu_back'] = 0;
        $data['page_header'] = 'Intro';
        if($this->input->post('searchinput')){
            $data['items'] = $this->Products->searchItems($this->input->post('searchinput'));
            $data['subtitle'] = 'Showing search results for "'.$this->input->post('searchinput').'"';
        }
        else {
            $data['items'] = $this->Products->getItems(0);
        }
        $data['categories'] = $this->Products->getSubCategories(0);
        $this->load->helper(array('form'));
        if (($this->uri->segment(1)) and (strtolower($this->uri->segment(1))=='logout')) {
                $this->logout();
            }
       if($this->session->userdata('logged_in'))
           {
             $session_data = $this->session->userdata('logged_in');
             $data['username'] = $session_data['username'];
             $data['is_admin']=$this->Products->askIfAdmin($data['username']);
             $data['basketcount'] = $this->Products->getBasketCount($data['username']);
             $this->load->view('templates/header_loggedin',$data);
            $this->load->view('welcome_message',$data);
           }
        else if($this->form_validation->run() == FALSE)
       {
         //Field validation failed.  User redirected to login page
         
        $this->load->view('templates/header_loggedout');
        $this->load->view('welcome_message',$data);
       }
       else
       {
         //If no session, redirect to login page
         $this->load->view('templates/header_loggedout');
        $this->load->view('welcome_message',$data);
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
     $this->form_validation->set_message('check_database', 'Invalid username or password - or account has not been activated');
     return false;
   }
 }
}
?>