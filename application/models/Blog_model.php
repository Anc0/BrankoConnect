<?php

class Blog_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_blogs() {
        return $this->db->query("SELECT * FROM blog_post");
    }

    public function get_blog($id) {
        $query = "SELECT * FROM blog_post WHERE id = ?";
        $data = array (
          'id' => $id
        );

        return $this->db->query($query, $data);
    }

    public function create_blog($title, $author, $content) {
        $query = "INSERT INTO blog_post (title, author, content) VALUES (?, ?, ?)";
        $data = array(
            'title' => $title,
            'author' => $author,
            'content' => $content
        );

        return $this->db->query($query, $data);
    }


    public function update_blog($id, $title, $author, $content) {
        $query = "UPDATE blog_post SET title = ?, author = ?, content = ? WHERE id = ?";
        $data = array(
            'title' => $title,
            'author' => $author,
            'content' => $content,
            'id' => $id
        );

        return $this->db->query($query, $data);
    }

    public function delete_blog($id) {
        $query = "DELETE FROM blog_post WHERE id = ?";
        $data = array(
            'id' => $id
        );

        return $this->db->query($query, $data);
    }

}