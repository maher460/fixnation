<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_orders extends CI_Controller {
    
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
            $data['is_admin']=$this->Products->askIfAdmin($data['username']);
            if ($data['is_admin']==1) {
              $data['subtitle']='Edit statuses of orders:';
              $data['basketcount'] = $this->Products->getBasketCount($data['username']);
              $data['orders']=$this->getAllOrders();
              $data['orderitems']=$this->getAllOrdersItems();
              $data['view_mode']='list';
              if ($this->input->post('action')){
                $orderid=$this->input->post('orderid');
                if (strtolower($this->input->post('action'))=='dispatch'){
                  $this->db->query("UPDATE eshop_orders SET dispatched=now() WHERE ID=".$orderid);
                  redirect('edit_orders', 'refresh');
                }
                else if (strtolower($this->input->post('action'))=='complete'){
                  $this->db->query("UPDATE eshop_orders SET completed=now() WHERE ID=".$orderid);
                  redirect('edit_orders', 'refresh');  
                }
              }
              $this->load->view('templates/header_loggedin',$data);
              $this->load->view('order_edit',$data);
            }
            else {
              redirect('', 'refresh');
            }
            
            
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

 function getALLOrdersItems(){
  $query = $this->db->query("SELECT O.ID, O.ordered, O.dispatched, O.completed, OI.quantity, I.ID as 'itemid', I.title, I.price FROM eshop_orders O, eshop_orders_items OI, eshop_items I WHERE O.ID=OI.order_id AND OI.item_id=I.ID ORDER BY O.ID ASC");
  if ($query->num_rows()>0){
    return $query->result();
  }
  else {
    return NULL;
  }
}
  function getAllOrders(){
  $query = $this->db->query("SELECT O.ID, O.ordered, O.dispatched, O.completed, O.user_id, U.first_name, U.last_name, U.street, U.city, U.zip, C.country, U.email FROM eshop_orders O, eshop_users U, eshop_country C WHERE O.user_id=U.ID AND U.country_id=C.ID ORDER BY O.ID ASC");
  if ($query->num_rows()>0){
    return $query->result();
  }
  else {
    return NULL;
  }
 }

 function getUser($userid) {
  $query = $this->db->query("SELECT * FROM eshop_users WHERE email='".$userid."'");
  return $query->row();
 }

 function getCountry($countryid) {
  $query = $this->db->query("SELECT * FROM eshop_country WHERE ID=".$countryid);
  return $query->row();
 }
}
?>