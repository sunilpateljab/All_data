<?php

class User_controller extends CI_Controller {

    public function __construct() {
        parent::__construct(); //to call parent construct
        $this->load->library('test');
    }

    public function user_register() {
        $this->load->view('register_view');
    }

    public function read_user_data() {

        extract($_POST);
        $this->load->model('User_model');
        $this->User_model->register($name, $email);
    }

    public function f1() {
        $this->test->welcome_message();
    }

    public function f2() {
        $this->test->welcome_message();
    }

    public function f3() {
        $this->test->welcome_message();
    }

}
