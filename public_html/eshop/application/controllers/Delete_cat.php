<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete_cat extends CI_Controller {
    
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
       
       if($this->session->userdata('logged_in'))
           {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['is_admin']=$this->Products->askIfAdmin($data['username']);
            if (($data['is_admin']==1) and ($this->uri->segment(2))){
              $data['change_error']='';
              $data['categories']=$this->getCategories();
              $catid=$this->uri->segment(2);
              $data['current_cat']=$this->getCurrentCat($catid);
              $data['basketcount'] = $this->Products->getBasketCount($data['username']);
              $data['has_subcats']=$this->hasSubcats($catid);
              if (($this->input->post('action')) and (strtolower($this->input->post('action'))=='proceed')){
                $this->db->query("DELETE FROM eshop_categories WHERE ID=".$catid);
                $this->db->query("UPDATE eshop_items SET showing=0 WHERE category_id=".$catid);
                redirect('', 'refresh');
              }
              $this->load->view('templates/header_loggedin',$data);
              $this->load->view('category_delete',$data);
            }
            else {
              redirect('', 'refresh');
            }
            
           }
        else if($this->form_validation->run() == FALSE)
       {
         redirect('', 'refresh');
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
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
 function getCategories(){
  $query = $this->db->query("SELECT * FROM eshop_categories ORDER BY name ASC");
  return $query->result();
 }
 function getCurrentCat($catid){
  $query = $this->db->query("SELECT * FROM eshop_categories WHERE ID=".$catid);
  return $query->row(); 
 }
 function hasSubcats($catid){
  $query = $this->db->query("SELECT * FROM eshop_categories WHERE super_cat=".$catid);
  if ($query->num_rows()>0){
    return 1;
  }
  else {
    return 0;
  }
 }
}
?>