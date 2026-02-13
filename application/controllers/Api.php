<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        header('Content-Type: application/json');
    }

    public function members() {
        $members = $this->Admin_model->get_all('members');
        echo json_encode($members);
    }

    public function events() {
        $events = $this->Admin_model->get_all('events');
        echo json_encode($events);
    }
}
