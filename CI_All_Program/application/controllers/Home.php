<?php

class Home extends CI_Controller {

    public function home_page() {
        $this->load->view('home_view');
    }

    public function page_not_found() {
        $this->load->view('page_not_found_view');

        echo base_url();
    }

    public function test() {
        $this->load->model('Test_Model');
        $this->Test_Model->register();
    }

    public function user_register() {
        $this->load->view('register_view');
    }

    public function read_user_data() {

        extract($_POST);
        $data = array(
            'name' => $name,
            'email' => $email,
            'mobile' => $mobile,
            'password' => $password
        );
        $this->load->model('User_model', 'um');
        $this->um->register($data);
    }

    /*  facelook registration start  */

    public function facelook_register() {
        $data['msg'] = "";
        $this->load->view('Facelook_view', $data);
    }

    public function facelook_read_data() {
        /* for checking purpose only value is coming or not */
        // echo 'hello';
        /*  end  */
        $data = array();
        extract($_POST);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fname', 'firstname', 'required|alpha', array('required' => 'Enter First Name', 'alpha' => 'Enter only Character'));
        $this->form_validation->set_rules('lname', 'lastname', 'required|alpha', array('required' => 'Enter Last Name', 'alpha' => 'Enter only Character'));
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[fb_register_tbl.email]', array('required' => 'Enter Email', 'valid_email' => 'Invalid Email id', 'is_unique' => 'Email Already Exists'));
        $this->form_validation->set_rules('password', 'password', 'required|regex_match[/^[a-zA-Z0-9]+$/]', array('required' => 'Enter Password', 'regx_match' => 'Enter only 8 character or number'));
        $this->form_validation->set_rules('date', 'date', 'required', array('required' => 'select Date'));
        $this->form_validation->set_rules('gender', 'gender', 'required', array('required' => 'Select Gender'));
        $this->form_validation->set_error_delimiters('<span class="err">', '</span>');
        if ($this->form_validation->run()) {
            $data = array(
                'fname' => $fname,
                'lname' => $lname,
                'email' => $email,
                'password' => $password,
                'date' => $date,
                'gender' => $gender
            );
            $this->load->model('Facelook_model', 'um');
            $count = $this->um->facelook_register($data);
            if ($count == 1)
                $data['msg'] = 'Registration success';
            if ($count == 2)
                $data['msg'] = 'registration failed';
            $this->load->view('Facelook_view', $data);
        }
        else {
            $data['msg'] = "";
            $this->load->view('facelook_view', $data);
        }
    }

    /* end  */
    /* login start  */

    public function login() {
        extract($_POST);
        if (isset($login)) {
            $login_data = array(
                'email' => $email,
                'password' => $password
            );
            $this->load->model('Facelook_model', 'um');
            $rs = $this->um->user_login($login_data);
            if ($rs) {
                redirect('home/get_user_Multiple_data');
            } else {
                $data['msg'] = "Invalid login Details";
                $this->load->view('login_view', $data);
            }
        } else {
            $data['msg'] = "";
            $this->load->view('login_view', $data);
        }
    }

    /*  end  */

    /* show data in view or retriving only single row data or single record from database  and show to view  start */

    public function get_user_data() {
        $uid = $this->uri->segment(3);
        $this->load->model('Facelook_model', 'um');
        $res = $this->um->get_facelook($uid);
        $data['ret'] = $res;
        $this->load->view('show_Data_table', $data);
    }

    /*  end   */
    /*  show data in view or retriving only multiple row data or all record of table from database  and show to view  start */

    public function get_user_Multiple_data() {

        $this->load->library('session');
        $user_id = $this->session->userdata('user_id');
        $name = $this->session->userdata('name');
        if (!empty($user_id)) {

            echo $name;

            $this->load->model('Facelook_model', 'um');
            $res = $this->um->get_Multiple_record_facelook();
            $data['ret'] = $res;
            $this->load->view('Show_multiple_record', $data);
        } else {
            redirect('home/login');
        }
    }

    /* delete function   */

    public function delete_user_record() {

        $uid = $this->uri->segment(3);
        //echo $uid;
        $this->load->model('Facelook_model', 'um');
        $resp = $this->um->delete_record($uid);
        // echo $resp;
        if ($resp)
            redirect('home/get_user_Multiple_data');
        else
            echo 'Not Deleted';
    }

    /*  end  */

    /* update start  */

    public function get_update_record() {
        $uid = $this->uri->segment(3);
        $this->load->model('Facelook_model', 'um');
        $resp = $this->um->get_user_record_read($uid);
        $data['ret'] = $resp;
        $this->load->view('update_user_record', $data);
    }

    public function update_records() {

        // echo 'hello';
        $uid = $this->uri->segment(3);
        //  echo $uid;
        extract($_POST);
        $data = array(
            'fname' => $fname,
            'email' => $email
        );

        $this->load->model('Facelook_model', 'um');
        $resp = $this->um->update_user_record($uid, $data);
        //echo $resp;
        if ($resp)
            redirect('home/get_user_Multiple_data');
        else
            echo 'Not Updated';
    }

    /* end */

    /* for searching start */

    public function search_user() {
        $this->load->view('search_view');
    }

    public function search_user_data() {
        if (isset($_POST['search_btn']) && !empty($_POST['search_txt'])) {
            $search = $_POST['search_txt'];
            $this->load->model('Facelook_model', 'um');
            $resultset = $this->um->search($search);
            $data['ret'] = $resultset;
            $this->load->view('search_show', $data);
        } else {
            echo 'invalid request';
        }
    }

    public function search_by_like() {
        extract($_POST);

        $this->load->model('Facelook_model', 'um');
        $resultset = $this->um->get_search_user_by_like($search_txt);
        $data['ret'] = $resultset;
        $this->load->view('Show_multiple_record', $data);
    }

    /*  end */

    /* create country start */

    public function add_country() {
        $data['msg'] = "";
        $this->load->view('country_add_view', $data);
    }

    public function read_add_country() {
        extract($_POST);

        /* server side validation start */
        $this->load->library('form_validation');
        $this->form_validation->set_rules('country_name', 'counteryname', 'required|alpha|is_unique[country_tbl.country_name]', array('required' => 'It is Empty ', 'alpha' => 'Enter only alphabet', 'is_unique' => 'This is already exists'));
        $this->form_validation->set_error_delimiters('<span class="err">', '</span>');
        if ($this->form_validation->run()) {
            $data = array(
                'country_name' => $country_name
            );
            $this->load->model('Country_model', 'um');
            $count = $this->um->create_country($data);
            //echo $count;
            if ($count == 1)
                $data['msg'] = 'Registration is success';
            if ($count == 2)
                $data['msg'] = 'Registration is Failed';
            $this->load->view('country_add_view', $data);
        }
        else {
            $data['msg'] = "";
            $this->load->view('country_add_view', $data);
        }
        /*  end */
    }

    /*  get country data from database  */

    public function get_country_data() {
        $this->load->model('Country_model', 'um');
        $res = $this->um->get_country();
        $data['ret'] = $res;
        $this->load->view('Country_show', $data);
    }

    /* end */

    /*  url routing start */

    public function test_routing() {
        $this->load->view('url_routing_view');
    }

    /* end  */
    /*  user defined helper start  */

    public function test_my_helper() {
        $this->load->helper('test');
        message();
    }

    /*  end */

    /*  user defined helper start  */

    public function test_my_library() {
        $this->load->library('test');
        $this->test->welcome_message();
    }

    /*  end */
    /* start pagination */

    public function test_pagination() {
        $si = $this->uri->segment(3);
        if (empty($si))
            $si = 0;
        else
            $si = $si - 1;

        $this->load->model('Facelook_model', 'um');
        $config['base_url'] = base_url() . "index.php/Home/test_pagination";
        $config['total_rows'] = $this->um->get_total_record();
        $config['per_page'] = 2;
        $config['attributes'] = array('class' => 'peffect');
        $config['num_links'] = 5;
        $config['use_page_numbers'] = TRUE;

        $this->load->library('pagination', $config);
        $plinks = $this->pagination->create_links();
        $data['links'] = $plinks;
        $res = $this->um->get_limit_fb_register($config['per_page'], $si);
        $data['ret'] = $res;

        $this->load->view('pagination_view', $data);
    }

    /* end */

    public function test_download() {
        $this->load->helper('download');
        /*  Download text file */
//        $fname="test.txt";
//        $data="Hello this from download";
//        force_download($fname,$data);
        /*  for existing file */
        force_download('download/1.JPG', NULL);
        $this->load->view('download_view');
    }

    /* file upload start  */

    public function upload_view() {
        $data['msg'] = "";
        $this->load->view('upload_view', $data);
    }

    public function test_upload() {

        extract($_POST);

        $config['upload_path'] = "upload/image";
        $config['allowed_types'] = "jpg|jpeg|png";
        $config['file_name'] = "Facelook_" . rand(1000, 9999);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {

            $data['msg'] = 'uploaded';
            $file_name = $this->upload->data('file_name');
            $user_data = array(
                'fname' => $fname,
                'image' => $file_name
            );
            $this->load->model('Facelook_model', 'um');
            $rs = $this->um->insert_user_image($user_data);
            if ($rs)
                $this->load->view('upload_view', $data);
        } else {
            $data['msg'] = 'not uploaded';
            $this->load->view('upload_view', $data);
        }
    }

    /* end */
    /* product start */

    public function product_view() {
        $this->load->view('product_view');
    }

    public function product_read() {
        extract($_POST);

        $config['upload_path'] = "upload/product";
        $config['allowed_types'] = "jpg|jpeg|png";
        $config['file_name'] = "Product_" . rand(1000, 9999);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('product_image')) {

            $file_name = $this->upload->data('file_name');
            $user_data = array(
                'product_name' => $product_name,
                'mrp' => $mrp,
                'sp' => $sp,
                'brand' => $brand,
                'description' => $description,
                'product_image' => $file_name
            );
            $this->load->model('Facelook_model', 'um');
            $this->um->insert_product_data($user_data);
            redirect('home/product_view');
        } else {
            echo 'not upload';
        }
    }

    /*  end  */

    /*  constant variable start */

    public function test_constant() {
        echo IMG_PATH;
        echo '<br>';
        echo '<br>';
        echo constant('IMG_PATH');
    }

    /*  end  */
    /*  logout start  */

    public function logout() {
// Removing session data
        $this->load->library('session');
        $sess_array = array(
            'user_id' => $this->session->userdata('user_id'),
            'fname' => $this->session->userdata('name')
        );
        $this->session->unset_userdata('user_id', $sess_array);
        $data['msg'] = 'Successfully Logout';
        $this->load->view('login_view', $data);
    }

    /*  end  */

    public function f3() {
        echo ' php';
    }

    public function f4() {
        echo ' mysql';
    }

}
