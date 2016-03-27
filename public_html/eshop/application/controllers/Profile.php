<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    
    function index()
     {
       //This method will have the credentials validation
       $this->load->library('form_validation');
       $this->load->helper('security');
     
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
            $data['basketcount'] = $this->Products->getBasketCount($data['username']);
            $data['countries'] = $this->getCountries();
            $data['user'] = $this->getUser($data['username']);
            if (!empty($this->input->post('action_name'))) {
              if ($this->input->post('action_name')=='change_profile'){
                $this->db->query("UPDATE eshop_users SET first_name='".$this->input->post('first_name')."', last_name='".$this->input->post('last_name')."', street='".$this->input->post('street')."', city='".$this->input->post('city')."', zip='".$this->input->post('zip')."', country_id=".$this->input->post('country')." WHERE email='".$data['username']."'");
                $data['change_error']='';
                redirect('profile', 'refresh');
              }
              else if ($this->input->post('action_name')=='change_password'){
                $data['change_error']='';
                $query = $this->db->query("SELECT email FROM eshop_users WHERE password=MD5('".$this->input->post('old_password')."') AND email='".$data['username']."'");
                if ($query->num_rows()>0){
                  if (strlen($this->input->post('new_password'))>=6){
                    if ($this->input->post('new_password')==$this->input->post('new_password2')) {
                      $this->db->query("UPDATE eshop_users SET password=MD5('".$this->input->post('new_password')."') WHERE email='".$data['username']."'");
                      $data['change_error']='Password changed successfully!';
                    }
                    else {$data['change_error']='New password does not match!';}
                  }
                  else {$data['change_error']='New password needs to be at least 6 characters long!';}
                }
                else {$data['change_error']='Wrong current password!';}
              }
            }
            else {
                $data['change_error']='';
              }
            $this->load->view('templates/header_loggedin',$data);
            $this->load->view('view_profile',$data);
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
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }

 function getCountries() {
  $query = $this->db->query("SELECT * FROM eshop_country ORDER BY country ASC");
  return $query->result();
 }

 function getUser($userid) {
  $query = $this->db->query("SELECT * FROM eshop_users WHERE email='".$userid."'");
  return $query->row();
 }

}
?>