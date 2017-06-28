<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . "libraries/REST_Controller.php";

class Blog extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('form_helper');
        $this->load->helper('language_helper');

        $this->load->library('session');

        $this->load->model('Blog_model','',TRUE);

    }

    public function blogs_get()
    {
        $this->language("blog");
        $data = $this->nav_lang();

        if($_SESSION["language"] == "slovenian") {
            $lang = "slo";
        } else {
            $lang = "eng";
        }
        $res = $this->Blog_model->get_blogs($lang);

        $this->lang->load('blog', $_SESSION['language']);
        $data["blogs_title"] = $this->lang->line('blog_title');
        $data["written"] = $this->lang->line('blog_written');

        $this->load->view('common/header');
        $this->load->view('common/navbar', $data);
        $this->load->view('blogs', $data);

        foreach ($res->result() as $row)
        {
            $data["id"] = $row->id;
            $data["title"] = $row->title;
            $data["image"] = $row->title_image;
            $data["author"] = $row->author;
            $data["text"] = $row->title_text;

            $this->load->view('blog_tile', $data);
        }

        $this->load->view('common/footer');
    }

    public function index_get($id)
    {
        $this->language("blog");
        $data = $this->nav_lang();

        $res = $this->Blog_model->get_blog($id);

        $res = $res->result()[0];
        $data["content"] = $res->content;

        $this->load->view('common/header');
        $this->load->view('common/navbar', $data);
        $this->load->view('blog', $data);
        $this->load->view('common/footer');
    }

    /* Implement authentication
    public function index_post()
    {
        $res = $this->Blog_model->create_blog(
            $this->post("title"),
            $this->post("author"),
            $this->post("content")
        );

        echo $res;
    }

    public function index_put($id)
    {
        $res = $this->Blog_model->update_blog(
            $id,
            $this->put('title'),
            $this->put("author"),
            $this->put("content")
        );

        echo $id . "<br>";
        echo $this->put('title') . "<br>";
        echo $this->put("author") . "<br>";
        echo $this->put("content") . "<br>";
        echo var_dump($res);

    }

    public function index_delete($id)
    {
        $res = $this->Blog_model->delete_blog($id);

        echo $res;
    }
    */

    /*** PRIVATE FUNCTIONS *************************/
    // Set the current site and language (based on url) into session
    private function language($site) {
        $_SESSION['current_site'] = $site;
        $host = $_SERVER['HTTP_HOST'];
        $tmp = explode(".", $host);
        $tld = end($tmp);
        if($tld == 'com' | $tld == 'net') {
            $_SESSION['language'] = 'english';
        } elseif($tld == 'si') {
            $_SESSION['language'] = 'slovenian';
        } else {
            $_SESSION['language'] = 'english';
        }
    }

    // Set the navbar language
    private function nav_lang() {
        $this->lang->load('navbar', $_SESSION['language']);

        $data['nav_home'] = $this->lang->line('nav_home');
        $data['nav_about'] = $this->lang->line('nav_about');
        $data['nav_blog'] = $this->lang->line('nav_blog');
        $data['nav_work'] = $this->lang->line('nav_work');
        $data['nav_lang'] = $this->lang->line('nav_lang');
        $data['nav_en'] = $this->lang->line('nav_en');
        $data['nav_sl'] = $this->lang->line('nav_sl');

        return $data;
    }

    // Format data before entering it into the database
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}