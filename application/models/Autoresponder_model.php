<?php

class Autoresponder_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    /*** USERS *******************************************/

    public function create_user($email, $password) {
        $query = "INSERT INTO auto_user (email, password) VALUES (?, ?);";
        $data = array(
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        );

        return $this->db->query($query, $data);
    }

    public function get_user($email) {
        $query = "SELECT * FROM auto_user WHERE email = ?;";
        $data = array(
            'email' => $email
        );

        return $this->db->query($query, $data);
    }

    /*** CAMPAIGNS ***************************************/

    public function create_campaign($name) {
        $query = "INSERT INTO auto_campaign (name) VALUES (?);";
        $data = array(
            'name' => $name
        );

        return $this->db->query($query, $data);
    }

    public function get_campaigns() {
        $query = "SELECT * FROM auto_campaign";

        return $this->db->query($query);
    }

    public function get_campaign($id) {
        $query = "SELECT * FROM auto_campaign WHERE id = ?";
        $data = array (
            'id' => $id
        );

        return $this->db->query($query, $data);
    }

    /*** MESSAGES ****************************************/

    public function get_messages($campaign_id) {
        $query = "SELECT * FROM auto_message WHERE campaign_id = ?";
        $data = array (
            'campaign_id' => $campaign_id
        );

        return $this->db->query($query, $data);
    }

    public function get_message($id) {
        $query = "SELECT * FROM auto_message WHERE id = ?";
        $data = array (
            'id' => $id
        );

        return $this->db->query($query, $data);
    }

}