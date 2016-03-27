<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verify extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('user','',TRUE);
    }

    /*function noveHeslo($id=null, $code=null)
    {
        $data['id'] = $id;
        $data['code'] = $code;
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');

        $this->form_validation->set_rules('password', 'Heslo', 'trim|required');
        $this->form_validation->set_rules('password2', 'Heslo 2', 'trim|required|matches[password]');

        if( $this->form_validation->run() == FALSE OR !$id OR !$code)
        {
            $this->load->view('templates/header');
            $this->load->view('templates/header_end');
            $this->load->view('overenie/heslo_view', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $this->user->initialize('user_id', $id);
            $this->user->validatePassword( $code, $this->input->post('password') );
            redirect('overenie/heslosuccess', 'refresh');
        }

    }

    function obnovaHesla()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');

        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header');
            $this->load->view('templates/header_end');
            $this->load->view('obnovahesla/obnovahesla_view');
            $this->load->view('templates/footer');
        }
        else
        {
            $this->user->sendEmail_Lost( $this->input->post() );
            redirect('obnovahesla/success', 'refresh');
        }
        
    }

    function registracia()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');

        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|max_length[255]|is_unique[user.email]');
        $this->form_validation->set_rules('company', 'Obchodné meno', 'trim|required|max_length[255]');
        $this->form_validation->set_rules('ico', 'IČO', 'trim|numeric|max_length[10]');
        $this->form_validation->set_rules('dic', 'DIČ', 'trim|numeric|max_length[10]');
        $this->form_validation->set_rules('ic_dph', 'IČ DPH', 'trim|max_length[12]');
        $this->form_validation->set_rules('address', 'Adresa', 'trim|required|max_length[255]');
        $this->form_validation->set_rules('zip_code', 'PSČ', 'trim|required|numeric|exact_length[5]');
        $this->form_validation->set_rules('city', 'Mesto', 'trim|required|max_length[255]');
        $this->form_validation->set_rules('country', 'Krajina', 'trim|required|max_length[255]');
        $this->form_validation->set_rules('password', 'Heslo', 'trim|required');
        $this->form_validation->set_rules('password2', 'Heslo 2', 'trim|required|matches[password]');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header');
            $this->load->view('templates/header_end');
            $this->load->view('registracia/registracia_view');
            $this->load->view('templates/footer');
        }
        else
        {
            $result = $this->user->addUser( $this->input->post() );
            
            if($result)
                redirect('registracia/success', 'refresh');
            else
                redirect('registracia/fail', 'refresh');

        }

    }

    function osobne()
    {
        $session_data = $this->session->userdata('ci_login_status');
        if(!$session_data)
            redirect('login', 'refresh');
        else
            $this->user->initialize('user_id', $session_data['user_id']);

        $user_data = $this->user->getUserData();

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');

        if( $this->input->post('email') != $user_data['email'] )
            $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|max_length[255]|is_unique[user.email]');
        $this->form_validation->set_rules('company', 'Obchodné meno', 'trim|required|max_length[255]');
        $this->form_validation->set_rules('ico', 'IČO', 'trim|numeric|max_length[10]');
        $this->form_validation->set_rules('dic', 'DIČ', 'trim|numeric|max_length[10]');
        $this->form_validation->set_rules('ic_dph', 'IČ DPH', 'trim|max_length[12]');
        $this->form_validation->set_rules('address', 'Adresa', 'trim|required|max_length[255]');
        $this->form_validation->set_rules('zip_code', 'PSČ', 'trim|required|numeric|exact_length[5]');
        $this->form_validation->set_rules('city', 'Mesto', 'trim|required|max_length[255]');
        $this->form_validation->set_rules('country', 'Krajina', 'trim|required|max_length[255]');
        $this->form_validation->set_rules('password_old', 'Súčasné heslo', 'trim|required|callback_passwordverification_old');
        $this->form_validation->set_rules('password', 'Nové heslo', 'trim|matches[password2]');
        $this->form_validation->set_rules('password2', 'Nové heslo 2', 'trim|matches[password]');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header');
            if( $user_data['access_rights']==1 )
                $this->load->view('templates/menu_admin' );
            else
                $this->load->view('templates/menu' );
            $this->load->view('templates/login', $user_data );
            $this->load->view('nastavenie/osobne_view', $user_data );
            $this->load->view('templates/footer');
        }
        else
        {
            $result = $this->user->updateUser( $this->input->post() );
            
            if($result)
                redirect('nastavenie/success', 'refresh');
            else
                redirect('nastavenie/fail', 'refresh');

        }

    }*/

    function login()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Heslo', 'trim|required|callback_passwordverification');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header_loggedout');
            /*if( !empty(validation_errors()) )
                $this->load->view('errors/login');*/
            $this->load->view('welcome_message');
        }
        else
            redirect('welcome', 'refresh');
    }

    function passwordverification()
    {
        if( !$this->input->post() )
            return false;

        $error = $this->user->login($this->input->post('email'), $this->input->post('password'));
        if( is_string($error) )
        {
            $this->form_validation->set_message('passwordverification', $error);
            return false;
        }
        else
            return true;
    }

}
?>