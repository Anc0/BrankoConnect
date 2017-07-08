<?php
class Letter_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function create_letter($content, $language) {
        $query = "INSERT INTO letter (content, language) VALUES (?, ?)";
        $data = array(
            'content' <= $content,
            'language' <= $language
        );

        return $this->db->query($query, $data);
    }

    public function get_letter($id) {
        $query = "SELECT * FROM letter WHERE id = ?";
        $data = array (
            'id' => $id
        );

        return $this->db->query($query, $data);
    }
}