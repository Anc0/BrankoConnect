<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . "libraries/REST_Controller.php";

class Blog extends REST_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Blog_model','',TRUE);

    }

    public function blogs_get() {
        $res = $this->Blog_model->get_blogs();

        foreach ($res->result() as $row)
        {
            echo "Id: " . $row->id . "<br>";
            echo "Title: " . $row->title . "<br>";
            echo "Author: " . $row->author . "<br>";
            echo "Content: " . $row->content . "<br>";
            echo "Created at: " . $row->created_at . "<br>";
            echo "Updated at: " . $row->updated_at . "<br><br>";
        }
    }

    public function index_get($id) {
        $res = $this->Blog_model->get_blog($id);

        foreach ($res->result() as $row)
        {
            echo "Id: " . $row->id . "<br>";
            echo "Title: " . $row->title . "<br>";
            echo "Author: " . $row->author . "<br>";
            echo "Content: " . $row->content . "<br>";
            echo "Created at: " . $row->created_at . "<br>";
            echo "Updated at: " . $row->updated_at . "<br><br>";
        }
    }

    public function index_post() {
        $res = $this->Blog_model->create_blog(
            $this->post("title"),
            $this->post("author"),
            $this->post("content")
        );

        echo $res;
    }

    public function index_put($id) {
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

    public function index_delete($id) {
        $res = $this->Blog_model->delete_blog($id);

        echo $res;
    }
}