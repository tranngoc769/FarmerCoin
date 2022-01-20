<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
    }
    public function index()
    {
        $data['title'] = "Đăng nhập";
        $this->load->view('layout/login');
    }
    public function login()
    {
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $data = [
            "username" => $username,
            "password" => $password,
        ];
        $result = $this->user_model->login($data);
        if ($result){
            $response = array("code" => 200, "msg" => "success");
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
            return;
        }
        else{
            $response = array("code" => 400, "msg" => "failed");
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
            return;
        }
    }
    public function logout()
    {
        $array_items = array('username', 'usertype');
        $this->session->unset_userdata($array_items);
        redirect('monitor');
    }
}
