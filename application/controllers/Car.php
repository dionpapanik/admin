<?php
/**
 * Author: Dionisis Papanikolaou
 * Date: 8/10/2017
 */

class Car extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!isset($this->session->userdata['logged_in'])) {
            $this->session->set_flashdata('auth_error', 'Συνδεθείτε στο λογαριασμό σας!');
            redirect(base_url());
        }
        $this->load->model('carmodel');
    }

    public function index()
    {
        $this->load->view('addcar');
    }

    public function add()
    {
        $this->load->view('addcar');
    }

    public function view()
    {
        $carId = $this->uri->segment(3);
        $userId = $this->session->userdata['id'];
        $carData = $this->carmodel->getCarDataPerUser($carId, $userId);

        if (empty($carData)) {
            $this->session->set_flashdata('general_errors', 'Δεν έχετε δικαίωμα πρόσβασης');
            redirect(base_url('dashboard'));
        } else {
            $this->load->view('viewcar', $carData);
        }
    }


    public function newCarRegistration()
    {
        $validation = array(
            array(
                'field' => 'manufacturer',
                'label' => 'Κατασκευαστής',
                'rules' => 'trim|required|xss_clean',
                'errors' => array(
                    'required' => 'Εισάγετε %s.'
                )
            ),
            array(
                'field' => 'model',
                'label' => 'Μοντέλο',
                'rules' => 'trim|required|xss_clean',
                'errors' => array(
                    'required' => 'Εισάγετε %s.',
                )
            ),
            array(
                'field' => 'plate',
                'label' => 'Αριθμός Κυκλοφορίας',
                'rules' => 'trim|required|xss_clean',
                'errors' => array(
                    'required' => 'Εισάγετε %s.',
                ),
            )
        );

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules($validation);
        if ($this->form_validation->run() == false) {
            $this->load->view('addcar');
        } else {
            // get data from form
            $manufacturer = $this->security->xss_clean($this->input->post('manufacturer', true));
            $model = $this->security->xss_clean($this->input->post('model', true));
            $plate = $this->security->xss_clean($this->input->post('plate', true));
            $displacement = $this->security->xss_clean($this->input->post('displacement', true));
            $mileage = $this->security->xss_clean($this->input->post('mileage', true));
            $registeredDate = $this->security->xss_clean($this->input->post('registered-date', true));
            $userId = $this->session->userdata['id'];

            // send data to model
            $result = $this->carmodel->registerNewCar($userId, $manufacturer, $model, $plate, $displacement, $mileage, $registeredDate);

            if ($result) {
                $this->session->set_flashdata('add_car_success', 'Τό όχημα καταχωρήθηκε επιτυχώς!');
                $this->load->view('addcar');
            } else {
                $data = array(
                    'invalid_data' => 'Υπήρξε κάποιο σφάλμα κατα την εγγραφή. Παρακαλούμε δοκιμάστε αργότερα'
                );
                $this->load->view('addcar', $data);
            }
        }
    }
}