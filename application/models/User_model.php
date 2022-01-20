<?php

class User_model extends CI_Model {

    public function login($data) {
        $query = $this->db
            ->limit(1)
            ->get_where("users", array("username" => $data["username"]))
            ->row();
        $en_pass = md5($data['password']);
        $vv = $en_pass == $query->password;
        if ($vv) {
            $data = array ("username" => $query->username, "usertype" => $query->usertype, "userid" => $query->id);
            $this->session->set_userdata($data);
            return  $query->usertype;
        }  else { 
            return false; 
        }	
    }
    public function update_userdetail($userid, $data)
    {
        return $this->db->where("user_id", $userid)->update(USER, $data);
    }
    public function update_cash($userid, $data)
    {
        return $this->db->where("user_id", $userid)->update(USER, $data);
    }

    public function get_userdetail()
    {
        return $this->db->get_where(USER, array("user_id" => $this->session->userdata('userid')));
    }
}
