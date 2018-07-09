<?php

class Country_model extends CI_Model {

    public function create_country($pdata) {
        $res = $this->db->insert('country_tbl', $pdata);
        if ($res)
            return 1;
        else
            return 2;
    }

    public function get_country() {
        $this->db->select('country_name');
        $this->db->from('country_tbl');
        $resultset = $this->db->get();
        return $resultset;
    }

}
