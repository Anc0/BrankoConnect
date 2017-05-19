<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('form_helper');
        $this->load->helper('language_helper');

        $this->load->library('session');

        $this->load->model('Site_model','',TRUE);

    }

    /*** HOME **************************************/
    public function index()
    {
        $this->language("home");
        $data = $this->nav_lang();

        $this->lang->load('home',$_SESSION['language']);

        $data['title'] = $this->lang->line('home_title');
        $data['content'] = $this->lang->line('home_content');

        $this->load->view('common/header');
        $this->load->view('common/navbar', $data);
        $this->load->view('home', $data);
        $this->load->view('common/footer');
    }

    public function home()
    {
        $this->language("home");
        $data = $this->nav_lang();

        $this->lang->load('home',$_SESSION['language']);

        $data['title'] = $this->lang->line('home_title');
        $data['content'] = $this->lang->line('home_content');

        $this->load->view('common/header');
        $this->load->view('common/navbar', $data);
        $this->load->view('home', $data);
        $this->load->view('common/footer');
    }

    /*** ABOUT *************************************/
    public function about()
    {
        $this->language("about");
        $data = $this->nav_lang();

        $this->lang->load('about',$_SESSION['language']);

        $data['title'] = $this->lang->line('about_title');
        $data['content'] = $this->lang->line('about_content');

        $this->load->view('common/header');
        $this->load->view('common/navbar', $data);
        $this->load->view('about', $data);
        $this->load->view('common/footer');
    }

    /*** BLOG **************************************/
    public function blog()
    {
        $this->language("blog");
        $data = $this->nav_lang();

        $this->lang->load('blog',$_SESSION['language']);

        $data['title'] = $this->lang->line('blog_title');
        $data['content'] = $this->lang->line('blog_content');

        $this->load->view('common/header');
        $this->load->view('common/navbar', $data);
        $this->load->view('blog', $data);
        $this->load->view('common/footer');
    }

    public function post_blog()
    {
        $this->language("blog");
        $data = $this->nav_lang();

        $id = $this->input->post('id');
        $blog = $this->Site_model->get_blog($id);

        $data['content'] = $blog->row()->content;

        $this->load->view('common/header');
        $this->load->view('common/navbar', $data);
        $this->load->view('blog', $data);
        $this->load->view('common/footer');
    }

    /*** WORK WITH BRANKO **************************/
    public function work()
    {
        $this->language("work");
        $data = $this->nav_lang();

        $this->lang->load('work',$_SESSION['language']);

        $data['title'] = $this->lang->line('work_title');
        $data['content'] = $this->lang->line('work_content');
        $data['contact'] = $this->lang->line('work_contact');
        $data['name'] = $this->lang->line('work_name');
        $data['email'] = $this->lang->line('work_email');
        $data['message'] = $this->lang->line('work_message');
        $data['send'] = $this->lang->line('work_send');
        $data['schedule'] = $this->lang->line('work_schedule');


        $this->load->view('common/header');
        $this->load->view('common/navbar', $data);
        $this->load->view('work', $data);
        $this->load->view('common/footer');
    }

    public function send_email()
    {
        $this->language("work");

        $this->lang->load('work',$_SESSION['language']);

        $this->load->library('email');

        $name = $this->test_input($this->input->post('name'));
        $email = $this->test_input($this->input->post('email'));
        $content = $this->test_input($this->input->post('content'));

        $this->email->from($email, $name);
        $this->email->to("branko@brankoconnect.com");
        $this->email->subject('Contact Us message');
        $this->email->message($content);

        $sent = $this->email->send();

        $success = $this->Site_model->create_message($name, $email, $content);

        if($success) {
            echo json_encode(array(
                "success" => $success,
                "message" => $this->lang->line('work_success'),
                "email_sent" => $sent,
                "email_failed" => $this->lang->line('work_email_failed')
            ));
        } else {
            echo json_encode(array(
                "success" => $success,
                "message" => $this->lang->line('work_fail'),
                "email_sent" => $sent,
                "email_failed" => $this->lang->line('work_email_failed')
            ));
        }


    }

    /*** INTERNATIONALIZATION **********************/
    public function english()
    {
        $_SESSION['language'] = 'english';
        redirect(base_url() . "site/" . $_SESSION['current_site']);
    }

    public function slovenian()
    {
        $_SESSION['language'] = 'slovenian';
        redirect(base_url() . "site/"  . $_SESSION['current_site']);
    }

    public function get_text_work()
    {
        $this->lang->load('work',$_SESSION['language']);

        echo json_encode(array(
            "name_required" => $this->lang->line('work_required_name'),
            "email_required" => $this->lang->line('work_required_email'),
            "email_valid" => $this->lang->line('work_valid_email'),
            "message_required" => $this->lang->line('work_required_message')
        ));
    }

    /*** PRIVATE FUNCTIONS *************************/
    private function language($site) {
        $_SESSION['current_site'] = $site;
        if( !isset($_SESSION['language']) ) {
            $_SESSION['language'] = 'english';
        }
    }

    private function nav_lang() {
        $this->lang->load('navbar', $_SESSION['language']);

        $data['nav_home'] = $this->lang->line('nav_home');
        $data['nav_about'] = $this->lang->line('nav_about');
        $data['nav_blog'] = $this->lang->line('nav_blog');
        $data['nav_work'] = $this->lang->line('nav_work');
        $data['nav_lang'] = $this->lang->line('nav_lang');
        $data['nav_en'] = $this->lang->line('nav_en');
        $data['nav_sl'] = $this->lang->line('nav_sl');

        return $data;
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
