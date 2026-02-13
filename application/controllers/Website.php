<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Community_model');
    }

    public function index() {
        $data['title'] = 'Home - UBS Gold Badminton Community (UBC)';
        $data['schedules'] = $this->Community_model->get_schedules();
        $data['leaderboard'] = $this->Community_model->get_leaderboard();
        $this->load->view('templates/header', $data);
        $this->load->view('home', $data);
        $this->load->view('templates/footer');
    }

    public function events() {
        $data['title'] = 'Events - UBS Gold Badminton Community (UBC)';
        $data['events'] = $this->Community_model->get_upcoming_events();
        $this->load->view('templates/header', $data);
        $this->load->view('events', $data);
        $this->load->view('templates/footer');
    }

    public function transparency() {
        $data['title'] = 'Transparency - UBS Gold Badminton Community (UBC)';
        $data['reports'] = $this->Community_model->get_transparency_reports();
        $this->load->view('templates/header', $data);
        $this->load->view('transparency', $data);
        $this->load->view('templates/footer');
    }
}
