<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Blog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->model('category_model');
        $this->load->model('blog_model');
        $this->load->model('setting_model');
    }
    // Not update kiem the
    public function index()
    {
        $type = $_GET['type'];
        if (!isset($type)) {
            return redirect("");
        }
        if ($type != "event" && $type != "news"){
            return redirect("");
        }
        $perpage = 15;
        if ($type == "news"){
            $first_page = $this->blog_model->get_5news_blog($perpage);
            $top = $this->blog_model->get_5news_blog();
        }else{
            $first_page = $this->blog_model->get_5events_blog($perpage);
            $top = $this->blog_model->get_5events_blog();
        }
        $total =  $this->blog_model->count_blogs($type);
        $data['top'] = $top;
        $data['type'] = $type;
        $data['first_page'] = $first_page;
        $data['perpage'] = $perpage;
        $data['total'] = $total;
        // $data['products'] = $products;
        $config['base_url'] = site_url('shop/index');
        $active['title'] = " - Home";
        $this->load->view('layout/subpage/subpage_head', $data);
        $this->load->view('layout/subpage/subpage_header', $data);
        $this->load->view('pages/tintuc', $data);
        $this->load->view('layout/subpage/subpage_footer', $data);
    }
    public function detail()
    {
        $id = $_GET['id'];
        if (!isset($id)) {
            return redirect("blog");
        }
        $blogs = $this->blog_model->get_blogs_detail($id);
        $type = $blogs->post_type;
        if ($type == "news"){
            $top = $this->blog_model->get_5news_blog();
        }else{
            $top = $this->blog_model->get_5events_blog();
        }
        $data['top'] = $top;
        $data['type'] = $type;
        $data['blogs'] = $blogs;
        // $data['products'] = $products;
        $config['base_url'] = site_url('shop/index');
        $active['title'] = " - Home";
        $this->load->view('layout/subpage/subpage_head', $data);
        $this->load->view('layout/subpage/subpage_header', $data);
        $this->load->view('pages/chitiet_tintuc', $data);
        $this->load->view('layout/subpage/subpage_footer', $data);
    }
    public function get_top_5_news(){
        $top5news = $this->blog_model->get_5news_blog();
        $data_string = "";
        for ($i = 0; $i < count($top5news); $i++) {
            $news = $top5news[$i];
            $data_string.= "<li><a class='posts__post-title' href='/index.php/blog/detail?id={$news->id}' title='{$news->title}'><span>{$news->title}</span><time datetime='{$news->date}'>{$news->date}</time></a></li>";
        }
        header('Content-type: application/json');
        echo json_encode($data_string);
        return;
    }
    
    public function get_top_5_events(){
        $top5event = $this->blog_model->get_5events_blog();
        $data_string = "";
        for ($i = 0; $i < count($top5event); $i++) {
            $news = $top5event[$i];
            $data_string.= "<li><a class='posts__post-title' href='/index.php/blog/detail?id={$news->id}' title='{$news->title}'><span>{$news->title}</span><time datetime='{$news->date}'>{$news->date}</time></a></li>";
        }
        header('Content-type: application/json');
        echo json_encode($data_string);
        return;
    }

    public function loadnews(){
        $type = $_GET['type'];
        $page = $_GET['page'];
        
        if (!isset($page)) {
            $page = 2;
        }
        $perpage = 15;
        $offset = ($page-1)*$perpage;
        if ($type == "news"){
            $first_page = $this->blog_model->get_5news_blog($perpage,$offset);
            $type_str = "Tin tức";
        }else{
            $first_page = $this->blog_model->get_5events_blog($perpage,$offset);
            $type_str = "Sự kiện";
        }
        $total =  $this->blog_model->count_blogs($type);
        $data_string = "";
        for ($i = 0; $i < count($first_page); $i++) {
            $news = $first_page[$i];
            $data_string.= "<li><a href='/index.php/blog/detail?id={$news->id}' title='$news->title' rel=nofollow ><span class='posts__post-cate'>{$type_str}</span><span class='posts__post-title'>{$news->title}</span><span class='posts__post-date'>{$news->date}</span></a></li>";
        }
        $last_str = "
       <article>
            <div class='posts__list' id='posts__list'>
                <ul>
                    {$data_string}
                </ul>
            </div>
            <input type='hidden' id='itemTotal' value='{$total}' ><input type='hidden' id='itemPerPage' value='{$perpage}' ><input type='hidden' id='currentSection' value='{$type}' ><input type='hidden' id='shortUri' value='/index.php/blog/loadnews' >
        </article>";
        header('Content-type: application/json');
        echo json_encode($last_str);
        return;
    }
}
