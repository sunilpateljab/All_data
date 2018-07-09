<?php

class Testhook {

    protected $CI;

//    public function f5(){
//        echo 'welcome to ';
//    }

    public function validate_user() {

        $uri = & load_class('URI');
//        $type = $uri->segment(1);
//        $param = $uri->segment(2);
//        if ($type == "admin" && !empty($param)) {

        if (!isset($_SESSION['user_id'])) { // [color=red]I check session here[/color]
            $CI = & get_instance();
            // $CI->load->helper('url');
            echo 'welcome to ';
            //  redirect('home/get_user_Multiple_data');
        }
    }

}
