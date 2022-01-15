<?php

class Blog_model extends CI_Model
{

    // GET ALL BLOG
    public function get_blogs($page, $limit)
    {

        $data =  $this->db->select("*")
            ->limit($limit, ($page - 1) * $limit)
            ->order_by("date", "ASC")
            ->get("blogs");
        return $data->result();
    }
    public function get_blogs_detail($id)
    {

        $data =  $this->db->select("*")
            ->where("id", $id)
            ->get("blogs");
        return $data->result()[0];
    }
    #Kiem the
    public function count_blogs($type = "news")
    {
        $data =  $this->db->select("COUNT(id) as total")
        ->where("post_type", $type)
            ->get("blogs");
        return intval($data->result()[0]->total);
    }
    public function get_top10_blog()
    {
        $data =  $this->db->select("MONTH(date) as month, DAY(date) as day,YEAR(date) as year, id, title, detail,avatar")
        ->order_by("date", "ASC")
        ->limit(10,0)
        ->get("blogs");
        return $data->result();
    }
    
    public function get_top5_blog()
    {
        $data =  $this->db->select("MONTH(date) as month, DAY(date) as day,YEAR(date) as year, id, title, detail,avatar")
        ->order_by("date", "ASC")
        ->get("blogs");
        return $data->result();
    }
    // kiem the
    public function get_5news_blog($limit = 5, $offset = 0)
    {
        $data =  $this->db->select("MONTH(date) as month, DAY(date) as day,YEAR(date) as year,date, id, title, detail")
        ->order_by("date", "DESC")
        ->where("post_type", "news")
        ->limit($limit,$offset)
        ->get("blogs");
        return $data->result();
    }
    // kiem the
    public function get_5events_blog($limit = 5,$offset = 0)
    {
        $data =  $this->db->select("MONTH(date) as month, DAY(date) as day,YEAR(date) as year,date, id, title, detail")
        ->order_by("date", "DESC")
        ->where("post_type", "event")
        ->limit($limit,$offset)
        ->get("blogs");
        return $data->result();
    }
    public function delete_blog($cid){
        return $this->db->where("id", $cid)->delete("blogs");
    }
    
    public function create_blog($data)
    {
        $isOk = $this->db->insert('blogs', $data);
        if ($isOk) {
            return $this->db->insert_id();
        }
        return false;
    }
    public function update_blog($id,$data)
    {
		return $this->db->where("id", $id)->update('blogs', $data);
    }
}
