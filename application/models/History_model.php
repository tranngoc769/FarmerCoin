<?php

class History_model extends CI_Model {
    public function save_form($data)
    {
        return $this->db->insert("history", $data);
    }
    public function get_hanhdong($hd)
    {
        return $this->db->select("*")->from("history")
        ->where("hanhdong", $hd)
        ->get()->result();
    }
}
