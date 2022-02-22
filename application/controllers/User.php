<?php
class User extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('UserModel');
                $this->load->helper('url_helper');
        }

        public function index()
        {
                $data['users'] = $this->UserModel->get_all_users();

                $this->load->view("users_details.php",$data);
        }

        public function register()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('login.php');
            }
        else
            {
                $data = array(
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password')
                );
                $this->UserModel->set_user( $data);
                echo "Done Successfully";
                exit;
            }
    }

        public function login()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('login.php');
            }
        else
            {
                $data = array(
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password')
                );
                $result = $this->UserModel->verify_user( $data);
                $r = $result[0];
                echo "Welcome ".$r["username"];
                exit;
            }
    }

}