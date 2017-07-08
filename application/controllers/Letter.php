<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Letter extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('form_helper');
        $this->load->helper('language_helper');

        $this->load->library('session');

        $this->load->model('Letter_model', '', TRUE);

    }

    public function letter($id) {
        $letter = $this->Letter_model->get_letter($id);
        $letter = $letter->result()[0];
        $data['letter'] = $letter;

        $this->load->view('letter/header');
        $this->load->view('letter/letter', $data);
        $this->load->view('letter/footer');
    }
}