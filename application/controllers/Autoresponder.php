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

    public function create_user() {
        if(!isset($_SESSION['auto_signedin'])) {
            header('Location: ' . base_url() . 'autoresponder');
            exit();
        }
        $email = $this->test_input($this->input->post('email'));
        $password = $this->test_input($this->input->post('pwd'));

        echo $this->Autoresponder_model->create_user($email, $password);
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

    /*** CAMPAIGN PAGE *********************************************/

    public function campaign($id) {
        if(!isset($_SESSION['auto_signedin'])) {
            header('Location: ' . base_url() . 'autoresponder');
            exit();
        }
        $campaign = $this->Autoresponder_model->get_campaign($id);
        $campaign = $campaign->result()[0];
        $data['campaign'] = $campaign;

        $messages = $this->Autoresponder_model->get_messages($campaign->id);
        $messages = $messages->result();

        if(count($messages) > 0) {
            $data['messages'] = $messages;

            for($i = 0; $i < count($messages); $i++){
                $serial[$i] = $messages[$i]->serial_number;
            }

            $data['serial'] = $serial;
        }

        echo(isset($data['messages']));

        $this->load->view('autoresponder/header');
        $this->load->view('autoresponder/campaign', $data);
        $this->load->view('autoresponder/footer');
    }

    /*** MESSAGE PAGE **********************************************/

    public function message($id) {
        if(!isset($_SESSION['auto_signedin'])) {
            header('Location: ' . base_url() . 'autoresponder');
            exit();
        }
        $message = $this->Autoresponder_model->get_message($id);
        $message = $message->result()[0];

        echo $message->content;
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