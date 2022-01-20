<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Monitor extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('gate_model');
    }
    public function index(){
        $this->gate_model->user_gate();
        // $top5news = $this->blog_model->get_5news_blog();
        $data['username'] = $this->session->userdata['username'];
        $data['title'] = "Trang chủ";
        $this->load->view('layout/head');
        // $this->load->view('layout/pre');
        $this->load->view('trangchu', $data);
        $this->load->view('layout/footer');
    }
    
}
