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

    public function delete_campaign($id) {
        $query = "DELETE FROM auto_campaign WHERE id = ?;";
        $data = array(
            'id' => $id
        );

        return $this->db->query($query, $data);
    }

    /*** MESSAGES ****************************************/

    public function create_message($serial, $campaign, $subject, $sender, $content) {
        $query = "INSERT INTO auto_message (serial_number, campaign_id, subject, sender, content) VALUES (?, ?, ?, ?, ?);";
        $data = array (
            'serial' => $serial,
            'campaign_id' => $campaign,
            'subject' => $subject,
            'sender' => $sender,
            'content' => $content
        );

        return $this->db->query($query, $data);
    }

    public function get_messages($campaign) {
        $query = "SELECT * FROM auto_message WHERE campaign_id = ?";
        $data = array (
            'campaign_id' => $campaign
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

    public function update_message($id, $serial, $subject, $sender, $content) {
        $query = "UPDATE auto_message SET serial_number = ?, subject = ?, sender = ?, content = ? WHERE id = ?;";
        $data = array (
            'serial' => $serial,
            'subject' => $subject,
            'sender' => $sender,
            'content' => $content,
            'id' => $id
        );

        return $this->db->query($query, $data);
    }

    public function delete_message($id) {
        $query = "DELETE FROM auto_message WHERE id = ?;";
        $data = array(
            'id' => $id
        );

        return $this->db->query($query, $data);
    }

    /*** CONTACTS ****************************************/

    public function create_contact($serial, $campaign, $name, $email) {
        $query = "INSERT INTO auto_contact (serial_number, campaign_id, name, email) VALUES (?, ?, ?, ?);";
        $data = array(
            'serial_number' => $serial,
            'campaign_id' => $campaign,
            'name' => $name,
            'email' => $email
        );

        return $this->db->query($query, $data);
    }

    public function get_contacts($campaign) {
        $query = "SELECT * FROM auto_contact WHERE campaign_id = ?";
        $data = array (
            'campaign_id' => $campaign
        );

        return $this->db->query($query, $data);
    }

    public function get_contact($id) {
        $query = "SELECT * FROM auto_contact WHERE id = ?";
        $data = array (
            'id' => $id
        );

        return $this->db->query($query, $data);
    }

    public function update_contact($id, $serial, $name, $email) {
        $query = "UPDATE auto_contact SET serial_number = ?, name = ?, email = ? WHERE id = ?;";
        $data = array (
            'serial' => $serial,
            'name' => $name,
            'email' => $email,
            'id' => $id
        );

        return $this->db->query($query, $data);
    }

    public function delete_contact($id) {
        $query = "DELETE FROM auto_contact WHERE id = ?;";
        $data = array(
            'id' => $id
        );

        return $this->db->query($query, $data);
    }

}