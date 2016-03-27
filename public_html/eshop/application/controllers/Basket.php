<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Basket extends CI_Controller {
    
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
            $data['basket']=$this->Products->getBasket($data['username']);
            $data['basketcount'] = $this->Products->getBasketCount($data['username']);
            if ($this->input->post('itemid_add')){
              $itemid=$this->input->post('itemid_add');
              $this->addBasket($data['username'],$itemid);
              redirect('basket', 'refresh');
            }
            else if ($this->input->post('itemid_chg')){
              $quantity_chg=$this->input->post('quantity_chg');
              $itemid_chg=$this->input->post('itemid_chg');
              $this->updateBasket($data['username'],$itemid_chg,$quantity_chg);
              redirect('basket', 'refresh');
            }
            $this->load->view('templates/header_loggedin',$data);
            $this->load->view('view_basket',$data);
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
  function updateBasket($username,$itemid,$quantity) {
    $query = $this->db->query("SELECT ID FROM eshop_users WHERE email='".$username."'");
    $userid = $query->row()->ID;
    if ($quantity==0){
      $this->db->query("DELETE FROM eshop_baskets WHERE user_id=".$userid." AND item_id=".$itemid);
    }
    else {
      //update quantity
      $this->db->query("UPDATE eshop_baskets SET quantity=".$quantity." WHERE item_id=".$itemid." AND user_id=".$userid);
    }
    return 1;
  }

  function addBasket($username,$itemid) {
    $query = $this->db->query("SELECT ID FROM eshop_users WHERE email='".$username."'");
    $userid = $query->row()->ID;
    $this->db->query("INSERT INTO eshop_baskets (user_id, item_id, quantity) VALUES (".$userid.",".$itemid.",1) ON DUPLICATE KEY UPDATE quantity=quantity+1");
  }
}
?>