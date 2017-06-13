<?php
class Site_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function create_message($name, $email, $content) {
        $query = "INSERT INTO message (name, email, content) VALUES (?, ?, ?)";
        $data = array(
            'name' => $name,
            'email' => $email,
            'content' => $content
        );

        return $this->db->query($query, $data);
    }
}