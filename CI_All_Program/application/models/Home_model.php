<?php

class Home_model extends CI_Model {

    public function register($pdata) {
        $resp = $this->db->insert('register_tbl', $pdata);
        if ($resp)
            return TRUE;
        else
            return FALSE;
    }

    public function insert_login_data($ldata) {
        $this->db->select('*');
        $this->db->from('register_tbl');
        $this->db->where($ldata);
        $resultset = $this->db->get();
        $count = $resultset->num_rows();
        if ($count == 1) {
            $row = $resultset->row();
            $this->load->library('session');
            $userid = $this->session->set_userdata('register_id', $row->register_id);
            $name = $this->session->set_userdata('register_name', $row->register_name);
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
