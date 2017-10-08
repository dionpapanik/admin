<?php

/**
 * Author: Dionisis Papanikolaou
 * Date: 17/8/2017
 */
class Auth extends CI_Controller
{

    /**
     * Auth constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('authmodel');
    }


    public function isEmailAvailable()
    {
        if ($this->input->is_ajax_request()) {
            $email = $this->security->xss_clean($this->input->post('email', true));
            $isDuplicate = $this->authmodel->isDuplicateMail($email);
            if ($isDuplicate) {
                echo 'false';
            } else {
                echo 'true';
            }
        } else {
            exit('No direct script access allowed');
        }
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function register()
    {
        $this->load->view('register');
    }


    public function userLogin()
    {
        $validation = array(
            array(
                'field' => 'email',
                'label' => 'E-mail',
                'rules' => 'trim|required|xss_clean',
                'errors' => array(
                    'required' => 'Εισάγετε %s.',
                ),
            ),
            array(
                'field' => 'password',
                'label' => 'Κωδικό Πρόσβασης',
                'rules' => 'trim|required|xss_clean',
                'errors' => array(
                    'required' => 'Εισάγετε %s.',
                ),
            )
        );

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules($validation);
        if ($this->form_validation->run() == false) {
            $this->load->view('login');
        } else {
            $email = $this->security->xss_clean($this->input->post('email', true));
            $password = $this->security->xss_clean($this->input->post('password', true));
            $result = $this->authmodel->checkLoginData($email, $password);
            if ($result !== false) {
                $session_data = array(
                    'logged_in' => true,
                    'id' => $result['id'],
                    'username' => $result['username']
                );
                $this->session->set_userdata($session_data);
                redirect('dashboard');
            } else {
                $data = array(
                    'invalid_data' => 'Μη έγκυρα στοιχεία πρόσβασης'
                );
                $this->load->view('login', $data);
            }
        }
    }

    public function newUserRegistration()
    {
        $validation = array(
            array(
                'field' => 'name',
                'label' => 'Όνοματεπώνυμο',
                'rules' => 'trim|required|xss_clean',
                'errors' => array(
                    'required' => 'Εισάγετε %s.'
                )
            ),
            array(
                'field' => 'email',
                'label' => 'E-mail',
                'rules' => 'trim|required|xss_clean|valid_email|is_unique[users.email]',
                'errors' => array(
                    'required' => 'Εισάγετε %s.',
                    'valid_email' => 'Εισάγετε μια έγκυρη διεύθυνση %s',
                    'is_unique' => 'Το %s που δηλώσατε έχει ήδη καταχωρηθεί'
                )
            ),
            array(
                'field' => 'password',
                'label' => 'Κωδικό Πρόσβασης',
                'rules' => 'trim|required|xss_clean|min_length[6]',
                'errors' => array(
                    'required' => 'Εισάγετε %s.',
                    'min_length' => '%s: Εισάγετε τουλάχιστον 6 χαρακτήρες.'
                ),
            ),
            array(
                'field' => 'verify_password',
                'label' => 'Επανάληψη Κωδικού Πρόσβασης',
                'rules' => 'trim|required|xss_clean|min_length[6]|matches[password]',
                'errors' => array(
                    'required' => 'Εισάγετε %s.',
                    'min_length' => '%s: Εισάγετε τουλάχιστον 6 χαρακτήρες.',
                    'matches' => 'Οι κωδικοί πρόσβασης δεν ταιριάζουν.'
                ),
            )
        );

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules($validation);
        if ($this->form_validation->run() == false) {
            $this->load->view('register');
        } else {
            $name = $this->security->xss_clean($this->input->post('name', true));
            $email = $this->security->xss_clean($this->input->post('email', true));
            $pass = $this->security->xss_clean($this->input->post('password', true));
            $result = $this->authmodel->registerNewUser($name, $email, $pass);
            if ($result) {
                $data = array(
                    'email' => $email
                );
                $this->load->view('registersuccess', $data);
            } else {
                $data = array(
                    'invalid_data' => 'Υπήρξε κάποιο σφάλμα κατα την εγγραφή. Παρακαλούμε δοκιμάστε αργότερα'
                );
                $this->load->view('register', $data);
            }
        }

    }

    /**
     *
     */
    public function userLogout()
    {
        $this->session->unset_userdata(array('logged_in', 'id', 'username'));
        redirect(base_url());
    }
}