<?php

class History_model extends CI_Model {
    public function save_form($data)
    {
        return $this->db->insert("history", $data);
    }
}
