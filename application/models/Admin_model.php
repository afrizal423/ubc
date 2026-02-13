<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    // Dashboard Stats
    public function get_stats() {
        return [
            'total_members' => $this->db->count_all('members'),
            'total_saldo' => $this->db->select_sum('amount')->where('type', 'income')->get('financial_reports')->row()->amount - $this->db->select_sum('amount')->where('type', 'expense')->get('financial_reports')->row()->amount,
            'upcoming_events' => $this->db->where('event_date >=', date('Y-m-d'))->count_all_results('events'),
            'active_members' => $this->db->where('status', 'active')->count_all_results('members')
        ];
    }

    // Generic CRUD
    public function get_all($table) {
        return $this->db->get($table)->result();
    }

    public function get_by_id($table, $id) {
        return $this->db->get_where($table, ['id' => $id])->row();
    }

    public function insert($table, $data) {
        return $this->db->insert($table, $data);
    }

    public function update($table, $id, $data) {
        return $this->db->where('id', $id)->update($table, $data);
    }

    public function delete($table, $id) {
        return $this->db->where('id', $id)->delete($table);
    }

    // Financial Chart Data
    public function get_financial_chart_data() {
        $query = $this->db->query("
            SELECT 
                DATE_FORMAT(report_date, '%Y-%m') as month,
                SUM(CASE WHEN type = 'income' THEN amount ELSE 0 END) as income,
                SUM(CASE WHEN type = 'expense' THEN amount ELSE 0 END) as expense
            FROM financial_reports
            GROUP BY DATE_FORMAT(report_date, '%Y-%m')
            ORDER BY month ASC
            LIMIT 12
        ");
        return $query->result();
    }

    // Attendance Ranking
    public function get_leaderboard_with_members() {
        $this->db->select('leaderboard.*, members.full_name, members.email');
        $this->db->from('leaderboard');
        $this->db->join('members', 'members.id = leaderboard.member_id');
        $this->db->order_by('points', 'DESC');
        return $this->db->get()->result();
    }

    public function get_attendance_with_members() {
        $this->db->select('attendance.*, members.full_name');
        $this->db->from('attendance');
        $this->db->join('members', 'members.id = attendance.member_id');
        $this->db->order_by('attendance_date', 'DESC');
        return $this->db->get()->result();
    }
}
