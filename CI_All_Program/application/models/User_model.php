<?php

class User_model extends CI_Model {

    public function register($pdata) {
        $resp = $this->db->insert('user_tbl', $pdata);
        if ($resp) {
            echo 'Registration successfull';
        } else {
            echo 'Registration failed';
        }
    }

}
