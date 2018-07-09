<?php

class Facelook_model extends CI_Model {

    public function facelook_register($pdata) {
        $resp = $this->db->insert('fb_register_tbl', $pdata);
        if ($resp) {
            return 1;
        } else {
            return 2;
        }
    }

    /*  login functionality start  */

    public function user_login($ldata) {
        $this->db->select('user_id,fname');
        $this->db->from('fb_register_tbl');
        $this->db->where($ldata);
        $resultset = $this->db->get();
        $count = $resultset->num_rows();
        if ($count == 1) {
            $row = $resultset->row();
            $this->load->library('session');
            $user_id = $this->session->set_userdata('user_id', $row->user_id);
            $name = $this->session->set_userdata('name', $row->fname);
            return TRUE;
        } else
            return FALSE;
    }

    /*  end  */
    /* only single record read or fetch from database start */

    public function get_facelook($userid) {
        $this->db->select('fname,email');
        $this->db->from('fb_register_tbl');
        $this->db->where('user_id', $userid);
        $resultset = $this->db->get();
        return $resultset;
    }

    /*  ecd */
    /*  only multipal record read or fetch from database start6  */

    public function get_Multiple_record_facelook() {
        $this->db->select('user_id,fname,email,image');
        $this->db->from('fb_register_tbl');
        // $this->db->order_by('fname','desc'); //desc means decending order
        $this->db->order_by('fname', 'asc'); //asc means decending order
        $resultset = $this->db->get();
        return $resultset;
    }

    /*  end  */

    /*  for delete start  */

    public function delete_record($user_id) {
        $this->db->where('user_id', $user_id);
        $result = $this->db->delete('fb_register_tbl');
        if ($result)
            return TRUE;
        else
            return FALSE;
    }

    /*   end */

    /* for update using two function given below start */

    public function get_user_record_read($user_id) {
        $this->db->select('user_id,fname,email');
        $this->db->from('fb_register_tbl');
        $this->db->where('user_id', $user_id);
        $resultset = $this->db->get();
        return $resultset;
    }

    public function update_user_record($uid, $data) {
        $this->db->where('user_id', $uid);
        $result = $this->db->update('fb_register_tbl', $data);
        return $result;
    }

    /* end  */
    /* search start  */

    public function search($userid) {
        $this->db->select('user_id,fname,email,password');
        $this->db->from('fb_register_tbl');
        $this->db->where('email', $userid);
        $resultset = $this->db->get();
        return $resultset;
    }

    public function get_search_user_by_like($data) {
        $this->db->select('fname,email,user_id,image');
        $this->db->from('fb_register_tbl');
        $this->db->like('fname', $data, 'after');
        $resultset = $this->db->get();
        return $resultset;
    }

    /*  end */
    /* start pagination concept */

    public function get_total_record() {
        $count = $this->db->count_all('fb_register_tbl');
        return $count;
    }

    public function get_limit_fb_register($n, $si) {
        $this->db->select('fname,image');
        $this->db->from('fb_register_tbl');
        $this->db->limit($n, $si);
        $result = $this->db->get();
        return $result;
    }

    /* end  */
    /* image upload start */

    public function insert_user_image($pdata) {
        $res = $this->db->insert('fb_register_tbl', $pdata);
        if ($res)
            return TRUE;
        else
            return FALSE;
    }

    /*  end  */
    /* product start */

    public function insert_product_data($pdata) {
        $this->db->insert('product_tbl', $pdata);
    }

    /* end  */
}
