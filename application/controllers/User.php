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
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('login.php');
            }
        else
            {
                
                if ($this->UserModel->check_email(array('email'=>$this->input->post('email'))) == 0){
                    $data = array(
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password')
                    );
                    $this->UserModel->set_user( $data);
                    echo "Done Successfully";
                    exit;
                }else{
                    echo "This email is already registered with us.";
                    exit;
                }
                
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
                if(count($result) != 0){
                    $r = $result[0];
                    echo "Welcome ".$r["username"];
                    echo "<br>Your Email Adress is : ".$r["email"];
                    exit;
                }else{
                    echo "Invalid Email OR Password ! Try Again !";
                }
                
            }
    }

}