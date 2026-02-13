<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Community_model extends CI_Model {

    public function get_schedules() {
        return $this->db->order_by('day_of_week', 'ASC')->get('schedules')->result();
    }

    public function get_upcoming_events() {
        return $this->db->where('event_date >=', date('Y-m-d'))->order_by('event_date', 'ASC')->get('events')->result();
    }

    public function get_transparency_reports() {
        return $this->db->order_by('report_date', 'DESC')->get('financial_reports')->result();
    }

    public function get_leaderboard() {
        $this->db->select('members.full_name, leaderboard.*');
        $this->db->from('leaderboard');
        $this->db->join('members', 'members.id = leaderboard.member_id');
        $this->db->order_by('points', 'DESC');
        return $this->db->get()->result();
    }

    public function get_gallery() {
        return $this->db->order_by('created_at', 'DESC')->get('gallery')->result();
    }
}
