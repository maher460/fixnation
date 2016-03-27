<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_item extends CI_Controller {
    
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
              $itemid=$this->uri->segment(2);
              $data['current_item']=$this->getCurrentItem($itemid);
              $data['basketcount'] = $this->Products->getBasketCount($data['username']);
              if (($this->input->post('action')) and (strtolower($this->input->post('action'))=='proceed')){
                if ( (!empty($this->input->post('title'))) and (!empty($this->input->post('description'))) and (!empty($this->input->post('price'))) and (!empty($this->input->post('category')))){
                  $this->db->query("UPDATE eshop_items SET title='".$this->input->post('title')."', description='".$this->input->post('description')."', price=".$this->input->post('price').", category_id=".$this->input->post('category')." WHERE ID=".$itemid);
                  $data['current_item']->title=$this->input->post('title');
                  $data['current_item']->description=$this->input->post('description');
                  $data['current_item']->price=$this->input->post('price');
                  $data['current_item']->category_id=$this->input->post('category');
                  $data['change_error']='Saved successfully!';
                }
                else {
                  $data['change_error']='All fields are mandatory!';
                }
              }
              $this->load->view('templates/header_loggedin',$data);
              $this->load->view('item_edit',$data);
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
 function getCurrentItem($itemid){
  $query = $this->db->query("SELECT * FROM eshop_items WHERE ID=".$itemid);
  return $query->row();
 }
}
?>