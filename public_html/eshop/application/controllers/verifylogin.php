<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class VerifyLogin extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->model('Products','',TRUE);
 }
 
 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');
 
   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
 
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $this->load->model('Products');
     if ($this->uri->segment(2)) {
            $data['categories'] = $this->Products->getSubCategories($this->uri->segment(2));
            $data['menu_back'] = 1;
            $data['menu_back_cat'] = $this->Products->getSuperCat($this->uri->segment(2));
            $data['current_cat'] = $this->Products->getCurrentCat($this->uri->segment(2));
            $data['items'] = $this->Products->getItems($this->uri->segment(2));
        }
        else {
            $data['categories'] = $this->Products->getSubCategories(0);
            $data['menu_back'] = 0;
            $data['items'] = $this->Products->getItems(0);
        }
   }
   else
   {
     //Go to private area
     redirect('home', 'refresh');
   }
 
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