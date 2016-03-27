<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {
    
    function index()
     {
       //This method will have the credentials validation
       $this->load->library('form_validation');
       $this->load->helper('security');
       $data['i_email']='';
        $data['i_new_password']='';
        $data['i_new_password2']='';
        $data['i_first_name']='';
        $data['i_last_name']='';
        $data['i_street']='';
        $data['i_city']='';
        $data['i_zip']='';
        $data['i_country']='';
     
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
            $this->load->view('templates/header_loggedin',$data);
            $this->load->view('view_profile',$data);
           }
        else
       {
         //Field validation failed.  User redirected to login page
        $data['subtitle']='Sign up for GroceryGuru:';
        $data['countries']=$this->getCountries();
        if (($this->uri->segment(2)) and (strtolower($this->uri->segment(2)=='proceed'))) {
          $data['i_email']=$this->input->post('email');
          $data['i_new_password']=$this->input->post('new_password');
          $data['i_new_password2']=$this->input->post('new_password2');
          $data['i_first_name']=$this->input->post('first_name');
          $data['i_last_name']=$this->input->post('last_name');
          $data['i_street']=$this->input->post('street');
          $data['i_city']=$this->input->post('city');
          $data['i_zip']=$this->input->post('zip');
          $data['i_country']=$this->input->post('country');
          if ((!empty($this->input->post('email'))) and (!empty($this->input->post('new_password'))) and (!empty($this->input->post('new_password2'))) and (!empty($this->input->post('first_name'))) and (!empty($this->input->post('last_name'))) and (!empty($this->input->post('street'))) and (!empty($this->input->post('city'))) and (!empty($this->input->post('zip'))) and (!empty($this->input->post('country')))) {
            $username_ok=$this->checkUser($this->input->post('email'));
            if ($username_ok==1){
              if (strlen($this->input->post('new_password'))>=6){
                if ($this->input->post('new_password')==$this->input->post('new_password2')){
                  $val_key=$this->generateRandomString(50);
                  $this->db->query("INSERT INTO eshop_users (first_name, last_name, email, password, is_active, validity_key, street, city, zip, country_id) VALUES ('".$data['i_first_name']."','".$data['i_last_name']."','".$data['i_email']."',MD5('".$data['i_new_password']."'),0,'".$val_key."','".$data['i_street']."','".$data['i_city']."','".$data['i_zip']."',".$data['i_country'].")");
                  $mailret=$this->sendMail($data['i_first_name'],$data['i_email'],$val_key);
                  if ($mailret==1){
                    $data['subtitle']='Your registration was successful!';
                    $data['change_error']='Check your e-mail for activation link.';
                    }
                    else {
                      $data['subtitle']='Mail error'.$mailret;
                      $data['change_error']=$mailret;  
                    } 
                }
                else {
                  $data['change_error']='Provided passwords do not match!';  
                }
              }
              else {
                $data['change_error']='Password must be at least 6 characters long!';  
              }
            }
            else {
              $data['change_error']='User with provided e-mail address already exists!';  
            }
          }
          else {
            $data['change_error']='All fields are mandatory!'; 
          }
          $this->load->view('templates/header_loggedout');
          $this->load->view('registration',$data);  
        }
        else {
          $data['change_error']='';
          $this->load->view('templates/header_loggedout');
          $this->load->view('registration',$data);
          }
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

 function checkUser($userid) {
  $query = $this->db->query("SELECT email FROM eshop_users WHERE email='".$userid."'");
  if ($query->num_rows()>0){
    return 0;
  }
  else {
    return 1;
  }
}
 function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
  
  function sendMail($first_name,$email,$val_key){
    $config = Array( 
  'protocol' => 'smtp', 
  'smtp_host' => 'ssl://smtp.googlemail.com', 
  'smtp_port' => 465, 
  'smtp_user' => 'tomesaros@gmail.com', 
  'smtp_pass' => 'tme,tmsmsrs78', ); 

  $this->load->library('email', $config); 
  $this->email->set_newline("\r\n");
  $this->email->from('tomesaros@gmail.com', 'GroceryGuru');
  $this->email->to($email);
  $this->email->subject('GroceryGuru - Account activation');
  $email_text='Dear '.$first_name.',
here is your activation link: http://www.fixnation.co/eshop/activate/?user='.$email.'&key='.$val_key.'

Yours sincerely,
GroceryGuru';
  $this->email->message($email_text);
  if (!$this->email->send()) {
    return($this->email->print_debugger()); }
  else {
    return 1;
  }
  }

}
?>