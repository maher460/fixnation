<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
    
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
            if ((!($this->uri->segment(2))) or (strtolower($this->uri->segment(2))=='list')) {
              $data['subtitle']='Orders for user "'.$data['username'].'":';
              $data['basketcount'] = $this->Products->getBasketCount($data['username']);
              $data['orders']=$this->getOrders($data['username']);
              $data['orderitems']=$this->getOrdersItems($data['username']);
              $data['view_mode']='list';
              $this->load->view('templates/header_loggedin',$data);
              $this->load->view('order_list',$data);
            }
            else if (($this->uri->segment(2)) and ((strtolower($this->uri->segment(2))=='confirm'))) {
              $data['subtitle']='Please confirm your order';
              $data['basketcount'] = $this->Products->getBasketCount($data['username']);
              $data['basket']=$this->Products->getBasket($data['username']);
              $data['user'] = $this->getUser($data['username']);
              $data['country'] = $this->getCountry($data['user']->country_id);
              $data['view_mode']='confirm';
              $this->load->view('templates/header_loggedin',$data);
              $this->load->view('order_list',$data);
            }
            else if (($this->uri->segment(2)) and ((strtolower($this->uri->segment(2))=='place'))) {
              $orderid=$this->placeOrder($data['username']);
              $data['subtitle']='Your new order has an ID #'.$orderid.'.'.PHP_EOL.'When it will be ready to be picked-up at our location, our clerk will contact you.';
              $data['basketcount'] = 0;
              $data['view_mode']='place';
              $this->load->view('templates/header_loggedin',$data);
              $this->load->view('order_list',$data);
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

 function getOrdersItems($username){
  $query = $this->db->query("SELECT ID FROM eshop_users WHERE email='".$username."'");
  $userid = $query->row()->ID;
  $query = $this->db->query("SELECT O.ID, O.ordered, O.dispatched, O.completed, OI.quantity, I.ID as 'itemid', I.title, I.price FROM eshop_orders O, eshop_orders_items OI, eshop_items I WHERE O.ID=OI.order_id AND OI.item_id=I.ID AND O.user_id=".$userid." ORDER BY O.ID ASC");
  if ($query->num_rows()>0){
    return $query->result();
  }
  else {
    return NULL;
  }
}
  function getOrders($username){
  $query = $this->db->query("SELECT ID FROM eshop_users WHERE email='".$username."'");
  $userid = $query->row()->ID;
  $query = $this->db->query("SELECT O.ID, O.ordered, O.dispatched, O.completed FROM eshop_orders O WHERE O.user_id=".$userid." ORDER BY O.ID ASC");
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

 function placeOrder($username){
  $query = $this->db->query("SELECT B.*, I.title, I.price FROM eshop_baskets B, eshop_users U, eshop_items I  WHERE B.user_id=U.ID AND B.item_id=I.ID AND U.email='".$username."'");
  $kosik = $query->result();
  $query = $this->db->query("SELECT ID FROM eshop_users WHERE email='".$username."'");
  $userid = $query->row()->ID; 
  $query = $this->db->query("INSERT INTO eshop_orders (user_id, dispatched, completed) VALUES (".$userid.", NULL, NULL)");          
  $orderid = $this->db->insert_id();
  foreach ($kosik as $item){
    $this->db->query("INSERT INTO eshop_orders_items (order_id, item_id, quantity) VALUES (".$orderid.",".$item->item_id.",".$item->quantity.")");
  }
  $this->db->query("DELETE FROM eshop_baskets WHERE user_id=".$userid);
  return $orderid;
 }
}
?>