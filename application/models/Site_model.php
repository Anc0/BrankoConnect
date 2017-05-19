<?php
class Site_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function create_message($name, $email, $content) {
        $data = array(
            'name' => $name,
            'email' => $email,
            'content' => $content
        );
        $query = "INSERT INTO message (name, email, content) VALUES (?, ?, ?)";

        return $this->db->query($query, $data);
    }

    public function get_blog($id)
    {
        $query = "SELECT * FROM blog WHERE id = ?";

        return $this->db->query($query, $id);
    }
}