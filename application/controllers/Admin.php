<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
        $this->load->model('Admin_model');
    }

    public function dashboard() {
        $data['title'] = 'Dashboard';
        $data['stats'] = $this->Admin_model->get_stats();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/admin_footer');
    }

    // --- MEMBERS ---
    public function members() {
        $data['title'] = 'Members';
        $data['members'] = $this->Admin_model->get_all('members');
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/members', $data);
        $this->load->view('templates/admin_footer');
    }

    // --- EVENTS ---
    public function events() {
        $data['title'] = 'Events';
        $data['events'] = $this->Admin_model->get_all('events');
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/events', $data);
        $this->load->view('templates/admin_footer');
    }

    // --- FINANCIAL ---
    public function financial() {
        $data['title'] = 'Finance';
        $data['reports'] = $this->Admin_model->get_all('financial_reports');
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/financial', $data);
        $this->load->view('templates/admin_footer');
    }

    // --- GALLERY ---
    public function gallery() {
        $data['title'] = 'Gallery';
        $data['gallery'] = $this->Admin_model->get_all('gallery');
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/gallery', $data);
        $this->load->view('templates/admin_footer');
    }

    // --- SCHEDULES ---
    public function schedules() {
        $data['title'] = 'Schedules';
        $data['schedules'] = $this->Admin_model->get_all('schedules');
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/schedules', $data);
        $this->load->view('templates/admin_footer');
    }

    // --- ATTENDANCE ---
    public function attendance() {
        $data['title'] = 'Attendance';
        $data['attendance'] = $this->Admin_model->get_attendance_with_members();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/attendance', $data);
        $this->load->view('templates/admin_footer');
    }

    // --- LEADERBOARD ---
    public function leaderboard() {
        $data['title'] = 'Leaderboard';
        $data['leaderboard'] = $this->Admin_model->get_leaderboard_with_members();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/leaderboard', $data);
        $this->load->view('templates/admin_footer');
    }

    // --- SAVE METHODS ---

    public function save_member() {
        $id = $this->input->post('id');
        $data = [
            'full_name' => $this->input->post('full_name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address'),
            'status' => $this->input->post('status')
        ];

        if ($id) {
            $this->Admin_model->update('members', $id, $data);
        } else {
            $this->Admin_model->insert('members', $data);
        }
        redirect('admin/members');
    }

    public function save_event() {
        $id = $this->input->post('id');
        $data = [
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'event_date' => $this->input->post('event_date'),
            'location' => $this->input->post('location')
        ];

        if (!empty($_FILES['image']['name'])) {
            $upload = $this->_do_upload('image');
            if ($upload) {
                $data['image'] = $upload;
                // Delete old image if updating
                if ($id) {
                    $old = $this->Admin_model->get_by_id('events', $id);
                    if ($old && $old->image) unlink('./assets/uploads/' . $old->image);
                }
            }
        }

        if ($id) {
            $this->Admin_model->update('events', $id, $data);
        } else {
            $this->Admin_model->insert('events', $data);
        }
        redirect('admin/events');
    }

    public function save_financial() {
        $id = $this->input->post('id');
        $data = [
            'title' => $this->input->post('title'),
            'type' => $this->input->post('type'),
            'amount' => $this->input->post('amount'),
            'report_date' => $this->input->post('report_date'),
            'description' => $this->input->post('description')
        ];

        if ($id) {
            $this->Admin_model->update('financial_reports', $id, $data);
        } else {
            $this->Admin_model->insert('financial_reports', $data);
        }
        redirect('admin/financial');
    }

    public function save_attendance() {
        $data = [
            'member_id' => $this->input->post('member_id'),
            'attendance_date' => $this->input->post('attendance_date'),
            'status' => $this->input->post('status')
        ];
        $this->Admin_model->insert('attendance', $data);
        redirect('admin/attendance');
    }

    public function save_leaderboard() {
        $member_id = $this->input->post('member_id');
        $existing = $this->db->get_where('leaderboard', ['member_id' => $member_id])->row();
        
        $data = [
            'member_id' => $member_id,
            'points' => $this->input->post('points'),
            'win' => $this->input->post('win'),
            'loss' => $this->input->post('loss')
        ];

        if ($existing) {
            $this->Admin_model->update('leaderboard', $existing->id, $data);
        } else {
            $this->Admin_model->insert('leaderboard', $data);
        }
        redirect('admin/leaderboard');
    }

    public function save_gallery() {
        $data = [
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description')
        ];

        if (!empty($_FILES['image']['name'])) {
            $upload = $this->_do_upload('image');
            $data['image'] = $upload;
        }

        $this->Admin_model->insert('gallery', $data);
        redirect('admin/gallery');
    }

    public function save_schedule() {
        $data = [
            'title' => $this->input->post('title'),
            'day_of_week' => $this->input->post('day_of_week'),
            'start_time' => $this->input->post('start_time'),
            'end_time' => $this->input->post('end_time'),
            'location' => $this->input->post('location')
        ];
        $this->Admin_model->insert('schedules', $data);
        redirect('admin/schedules');
    }

    // --- DELETE METHODS ---

    public function delete_member($id) {
        $this->Admin_model->delete('members', $id);
        redirect('admin/members');
    }

    public function delete_event($id) {
        $item = $this->Admin_model->get_by_id('events', $id);
        if ($item && $item->image) {
            unlink('./assets/uploads/' . $item->image);
        }
        $this->Admin_model->delete('events', $id);
        redirect('admin/events');
    }

    public function delete_financial($id) {
        $this->Admin_model->delete('financial_reports', $id);
        redirect('admin/financial');
    }

    public function delete_attendance($id) {
        $this->Admin_model->delete('attendance', $id);
        redirect('admin/attendance');
    }

    public function delete_leaderboard($id) {
        $this->Admin_model->delete('leaderboard', $id);
        redirect('admin/leaderboard');
    }

    public function delete_gallery($id) {
        $item = $this->Admin_model->get_by_id('gallery', $id);
        if ($item && $item->image) {
            unlink('./assets/uploads/' . $item->image);
        }
        $this->Admin_model->delete('gallery', $id);
        redirect('admin/gallery');
    }

    public function delete_schedule($id) {
        $this->Admin_model->delete('schedules', $id);
        redirect('admin/schedules');
    }

    // --- UPLOAD HELPER ---
    private function _do_upload($field_name) {
        $config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048; // 2MB
        $config['file_name']            = round(microtime(true) * 1000);

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($field_name)) {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            return null;
        }
        return $this->upload->data('file_name');
    }

    // Export Financial to Excel (CSV for simplicity)
    public function export_financial() {
        $reports = $this->Admin_model->get_all('financial_reports');
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="financial_report_'.date('Ymd').'.csv"');
        $output = fopen('php://output', 'w');
        fputcsv($output, ['ID', 'Title', 'Type', 'Amount', 'Date', 'Description']);
        foreach ($reports as $report) {
            fputcsv($output, [$report->id, $report->title, $report->type, $report->amount, $report->report_date, $report->description]);
        }
        fclose($output);
    }
}
