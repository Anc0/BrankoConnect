<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autoresponder extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('form_helper');
        $this->load->helper('language_helper');

        $this->load->library('session');
        $this->load->library('email');

        $this->load->model('Autoresponder_model','',TRUE);

    }

    /*** LOGIN PAGE ************************************************/

    public function index() {
        if(isset($_SESSION['auto_signedin'])) {
            header('Location: ' . base_url() . 'autoresponder/home');
            exit;
        }

        $this->load->view('autoresponder/header');
        $this->load->view('autoresponder/login');
        $this->load->view('autoresponder/footer');
    }

    public function login() {
        $email = $this->test_input($this->input->post('email'));
        $password = $this->test_input($this->input->post('pwd'));

        $user = $this->Autoresponder_model->get_user($email);
        $user = $user->result()[0];

        if (password_verify($password, $user->password)) {
            $_SESSION["auto_signedin"] = true;
            header('Location: ' . base_url() . 'autoresponder/home');
            exit();
        } else {
            header('Location: ' . base_url() . 'autoresponder');
            exit();
        }
    }

    /*** HOME PAGE *************************************************/

    public function home() {
        if(!isset($_SESSION['auto_signedin'])) {
            header('Location: ' . base_url() . 'autoresponder');
            exit();
        }
        $data['campaigns'] = $this->Autoresponder_model->get_campaigns();

        $this->load->view('autoresponder/header');
        $this->load->view('autoresponder/home', $data);
        $this->load->view('autoresponder/footer');
    }

    /*** USER PAGE *************************************************/

    public function new_user() {
        if(!isset($_SESSION['auto_signedin'])) {
            header('Location: ' . base_url() . 'autoresponder');
            exit();
        }

        $this->load->view('autoresponder/header');
        $this->load->view('autoresponder/new_user');
        $this->load->view('autoresponder/footer');
    }

    public function create_user() {
        if(!isset($_SESSION['auto_signedin'])) {
            header('Location: ' . base_url() . 'autoresponder');
            exit();
        }
        $email = $this->test_input($this->input->post('email'));
        $password = $this->test_input($this->input->post('password'));

        $this->Autoresponder_model->create_user($email, $password);

        header('Location: ' . base_url() . 'autoresponder/home');
        exit();
    }

    /*** CAMPAIGN PAGE *********************************************/

    public function campaign($id) {
        if(!isset($_SESSION['auto_signedin'])) {
            header('Location: ' . base_url() . 'autoresponder');
            exit();
        }

        $campaign = $this->Autoresponder_model->get_campaign($id);
        $campaign = $campaign->result()[0];
        $data['campaign'] = $campaign;
        $_SESSION['auto_campaign'] = $id;
        $_SESSION['auto_campaignname'] = $campaign->name;

        $messages = $this->Autoresponder_model->get_messages($campaign->id);
        $messages = $messages->result();

        if(count($messages) > 0) {
            $data['messages'] = $messages;

            for($i = 0; $i < count($messages); $i++){
                $serial[$i] = $messages[$i]->serial_number;
            }

            $data['serial'] = $serial;
        }

        $this->load->view('autoresponder/header');
        $this->load->view('autoresponder/campaign', $data);
        $this->load->view('autoresponder/footer');
    }

    public function new_campaign() {
        if(!isset($_SESSION['auto_signedin'])) {
            header('Location: ' . base_url() . 'autoresponder');
            exit();
        }

        $this->load->view('autoresponder/header');
        $this->load->view('autoresponder/new_campaign');
        $this->load->view('autoresponder/footer');
    }

    public function create_campaign() {
        if(!isset($_SESSION['auto_signedin'])) {
            header('Location: ' . base_url() . 'autoresponder');
            exit();
        }

        $name = $this->test_input($this->input->post('name'));

        $this->Autoresponder_model->create_campaign($name);

        header('Location: ' . base_url() . 'autoresponder/home');
        exit();
    }

    public function delete_campaign($id) {
        if(!isset($_SESSION['auto_signedin'])) {
            header('Location: ' . base_url() . 'autoresponder');
            exit();
        }

        $messages = $this->Autoresponder_model->get_messages($_SESSION['auto_campaign']);
        $messages = $messages->result();

        foreach($messages as $row) {
            $this->Autoresponder_model->delete_message($row->id);
        }

        $contacts = $this->Autoresponder_model->get_contacts($_SESSION['auto_campaign']);
        $contacts = $contacts->result();

        foreach($contacts as $row) {
            $this->Autoresponder_model->delete_contact($row->id);
        }

        $this->Autoresponder_model->delete_campaign($id);

        header('Location: ' . base_url() . 'autoresponder/home');
        exit();
    }

    public function send_messages() {
        if(!isset($_SESSION['auto_signedin'])) {
            header('Location: ' . base_url() . 'autoresponder');
            exit();
        }

        $ses_id = $_SESSION['auto_campaign'];
        $valid = true;
        $res = 1;

        $contacts = $this->Autoresponder_model->get_contacts($ses_id);
        $contacts = $contacts->result();

        $messages = $this->Autoresponder_model->get_messages($ses_id);
        $messages = $messages->result();

        for($i = 1; $i <= 30; $i++) {
            $day_con = array();
            $day_mes = array();

            foreach($contacts as $row) {
                if($i == $row->serial_number) {
                    array_push($day_con, $row);
                }
            }
            foreach($messages as $row) {
                if($i == $row->serial_number) {
                    array_push($day_mes, $row);
                    break;
                }
            }

            if(count($day_mes) > 0 & count($day_con) > 0) {
                $day_mes = $day_mes[0];
                $emails = array();
                foreach($day_con as $row) {
                    array_push($emails, $row->email);
                }
                var_dump($day_con);
                $this->email->from("branko@brankoconnect.com", "Branko Krašovec");
                $this->email->bcc($emails, 10);
                $this->email->subject($day_mes->subject);
                $this->email->message($day_mes->content);
                #$res = $this->email->send();
                $res = 1;
                if($res == 1) {
                    foreach ($day_con as $row) {
                        $day = intval($row->serial_number) + 1;
                        $this->Autoresponder_model->update_contact($row->id, $day, $row->name, $row->email);
                    }
                }
            } else if (count($day_con) > 0) {
                foreach ($day_con as $row) {
                    $day = intval($row->serial_number) + 1;
                    $this->Autoresponder_model->update_contact($row->id, $day, $row->name, $row->email);
                }
            }
            if($res != 1) {
                $valid = false;
            }
        }
        if($valid) {
            echo 1;
        } else {
            echo 0;
        }
    }

    /*** MESSAGE PAGE **********************************************/

    public function message($id) {
        if(!isset($_SESSION['auto_signedin'])) {
            header('Location: ' . base_url() . 'autoresponder');
            exit();
        }
        $message = $this->Autoresponder_model->get_message($id);
        $data['message'] = $message->result()[0];

        $messages = $this->Autoresponder_model->get_messages($_SESSION['auto_campaign']);
        $messages = $messages->result();

        for($i = 0; $i < count($messages); $i++) {
            $serials[$i] = $messages[$i]->serial_number;
        }
        $data['serials'] = $serials;

        $this->load->view('autoresponder/header');
        $this->load->view('autoresponder/message', $data);
        $this->load->view('autoresponder/footer');
    }

    public function update_message($id) {
        if(!isset($_SESSION['auto_signedin'])) {
            header('Location: ' . base_url() . 'autoresponder');
            exit();
        }
        $serial = $this->test_input($this->input->post('serial'));
        $subject = $this->test_input($this->input->post('subject'));
        $sender = $this->test_input($this->input->post('sender'));
        $content = $this->test_input($this->input->post('content'));

        $this->Autoresponder_model->update_message($id, $serial, $subject, $sender, $content);

        header('Location: ' . base_url() . 'autoresponder/campaign/' . $_SESSION['auto_campaign']);        exit();
    }

    public function new_message($serial) {
        if(!isset($_SESSION['auto_signedin'])) {
            header('Location: ' . base_url() . 'autoresponder');
            exit();
        }

        $data['serial'] = $serial;
        $data['campaign'] = $_SESSION['auto_campaign'];

        $this->load->view('autoresponder/header');
        $this->load->view('autoresponder/new_message', $data);
        $this->load->view('autoresponder/footer');
    }

    public function create_message() {
        if(!isset($_SESSION['auto_signedin'])) {
            header('Location: ' . base_url() . 'autoresponder');
            exit();
        }
        $serial = $this->test_input($this->input->post('serial'));
        $subject = $this->test_input($this->input->post('subject'));
        $sender = $this->test_input($this->input->post('sender'));
        $content = $this->test_input($this->input->post('content'));

        $this->Autoresponder_model->create_message($serial, $_SESSION['auto_campaign'], $subject, $sender, $content);

        header('Location: ' . base_url() . 'autoresponder/campaign/' . $_SESSION['auto_campaign']);
        exit();
    }

    public function delete_message($id) {
        if(!isset($_SESSION['auto_signedin'])) {
            header('Location: ' . base_url() . 'autoresponder');
            exit();
        }

        $this->Autoresponder_model->delete_message($id);

        header('Location: ' . base_url() . 'autoresponder/campaign/' . $_SESSION['auto_campaign']);
        exit();
    }

    /*** CONTACT PAGE **********************************************/

    public function contacts() {
        if(!isset($_SESSION['auto_signedin'])) {
            header('Location: ' . base_url() . 'autoresponder');
            exit();
        }

        $data['campaign'] = $_SESSION['auto_campaign'];
        $data['campaign_name'] = $_SESSION['auto_campaignname'];

        $contacts = $this->Autoresponder_model->get_contacts($_SESSION['auto_campaign']);
        $contacts = $contacts->result();

        $data['contacts'] = $contacts;

        $this->load->view('autoresponder/header');
        $this->load->view('autoresponder/contacts', $data);
        $this->load->view('autoresponder/footer');
    }

    public function contact($id) {
        if(!isset($_SESSION['auto_signedin'])) {
            header('Location: ' . base_url() . 'autoresponder');
            exit();
        }

        $data['campaign'] = $_SESSION['auto_campaign'];

        $contact = $this->Autoresponder_model->get_contact($id);
        $contact = $contact->result()[0];

        $data['contact'] = $contact;

        $this->load->view('autoresponder/header');
        $this->load->view('autoresponder/contact', $data);
        $this->load->view('autoresponder/footer');
    }

    public function new_contact() {
        if(!isset($_SESSION['auto_signedin'])) {
            header('Location: ' . base_url() . 'autoresponder');
            exit();
        }

        $this->load->view('autoresponder/header');
        $this->load->view('autoresponder/new_contact');
        $this->load->view('autoresponder/footer');
    }

    public function import_contacts() {
        if(!isset($_SESSION['auto_signedin'])) {
            header('Location: ' . base_url() . 'autoresponder');
            exit();
        }

        $this->load->view('autoresponder/header');
        $this->load->view('autoresponder/import_contacts');
        $this->load->view('autoresponder/footer');
    }

    public function create_contact() {
        if(!isset($_SESSION['auto_signedin'])) {
            header('Location: ' . base_url() . 'autoresponder');
            exit();
        }
        $serial = $this->test_input($this->input->post('serial'));
        $name = $this->test_input($this->input->post('name'));
        $email = $this->test_input($this->input->post('email'));

        $result = $this->Autoresponder_model->create_contact($serial, $_SESSION['auto_campaign'], $name, $email);

        header('Location: ' . base_url() . 'autoresponder/contacts');
        exit();
    }

    public function update_contact($id) {
        if(!isset($_SESSION['auto_signedin'])) {
            header('Location: ' . base_url() . 'autoresponder');
            exit();
        }
        $serial = $this->test_input($this->input->post('serial'));
        $name = $this->test_input($this->input->post('name'));
        $email = $this->test_input($this->input->post('email'));

        $this->Autoresponder_model->update_contact($id, $serial, $name, $email);

        header('Location: ' . base_url() . 'autoresponder/contacts');
        exit();
    }

    public function delete_contact($id) {
        if(!isset($_SESSION['auto_signedin'])) {
            header('Location: ' . base_url() . 'autoresponder');
            exit();
        }

        $this->Autoresponder_model->delete_contact($id);

        header('Location: ' . base_url() . 'autoresponder/contacts');
        exit();
    }

    public function import() {
        if(!isset($_SESSION['auto_signedin'])) {
            header('Location: ' . base_url() . 'autoresponder');
            exit();
        }

        $emails = $this->test_input($this->input->post('emails'));

        $emails = explode(PHP_EOL, $emails);

        foreach ($emails as $email) {
            $this->Autoresponder_model->create_contact(1, $_SESSION['auto_campaign'], "", $email);
        }

        header('Location: ' . base_url() . 'autoresponder/campaign/' . $_SESSION['auto_campaign']);
        exit();
    }


    /*** PRIVATE FUNCTIONS *************************/

    // Format data before entering it into the database
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

}
























