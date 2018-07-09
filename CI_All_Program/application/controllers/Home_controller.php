<?php

class Home_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Home_model', 'um');
    }

    public function landpage() {
        $this->load->view('home_view/land_view');
    }

    public function home() {

        $this->load->library('session');
        $userid = $this->session->userdata('register_id');
        $name = $this->session->userdata('register_name');
        if (!empty($userid)) {

            echo $name;
            $data['msg'] = "";
            $this->load->view('home_view/home_page_view', $data);
        } else {
            redirect(home_controller / login);
        }
    }

    public function signup() {
        extract($_POST);
        if (isset($register)) {

            $config['upload_path'] = "upload/register_img/";
            $config['allowed_types'] = "jpg|jpeg|png";
            $config['file_name'] = "Register_" . rand(1000, 9999);
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {

                $file_name = $this->upload->data('file_name');
                $data = array(
                    'register_name' => $name,
                    'register_email' => $email,
                    'register_mobile' => $mobile,
                    'register_password' => $password,
                    'register_pic' => $file_name
                );
                $resp = $this->um->register($data);
                if ($resp) {
                    redirect('Home_controller/signup');
                } else {
                    $data['msg'] = "Not inserted";
                    $this->load->view('home_view/register_view', $data);
                }
            }
            $data['msg'] = '';
            $this->load->view('home_view/register_view', $data);
        } else {
            $data['msg'] = '';
            $this->load->view('home_view/register_view', $data);
        }
    }

    public function login() {
        extract($_POST);
        if (isset($login)) {
            $login_data = array(
                'register_email' => $email,
                'register_password' => $password
            );

            $resp = $this->um->insert_login_data($login_data);
            if ($resp) {
                redirect('home_controller/home');
            } else {
                $data['msg'] = 'Invalid login Detail';
                $this->load->view('home_view/login_view', $data);
            }
        } else {
            $data['msg'] = "";
            $this->load->view('home_view/login_view', $data);
        }
    }

}
