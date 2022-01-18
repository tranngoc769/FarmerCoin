<?php

class Template_model extends CI_Model {

    public function get_all_template()
    {
        return $this->db->get("template")->result();
    }
    
    public function get_all_template_by_type($type = "")
    {
        return $this->db->select("*")->from("template")->join('daily_cost', 'daily_cost.id = template.id')->join('mine', 'mine.id = template.id')
        ->where("group", $type)
        ->get()->result();
    }
    
    public function get_all_template_with_dm()
    {
        return $this->db->select("*")->from("template")->join('daily_cost', 'daily_cost.id = template.id')->join('mine', 'mine.id = template.id')->join('craft', 'craft.id = template.id')->join('exchange', 'exchange.id = template.id')->get()->result();
    }
}
