<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poll_model extends CI_Model {

  public function __construct()	{
    parent::__construct();
    $this->load->database();
  }

  function index() {

  }

  function create($data) {
    $query = $this->db->insert('beam_polls', $data);
    return $query;
  }

  function fetchAll() {
    $query = $this->db->select('*')->from('beam_events e')->join('beam_polls p', 'p.event_id = e.id')->get()->result();
    return $query;
  }

  function fetch($id) {
    $query = $this->db->select('*')->from('beam_events e')->join('beam_polls p', 'p.event_id = e.id')->get()->row();
    return $query;
  }

  function getCounts($id) {
    $d = array();
    $d['IT'] = intval($this->db->select('*')->from('accounts_students e')->join('logs_poll_replies p', 'p.student_id = e.id')->where('course_abv', 'IT')->get()->num_rows());
    $d['BA'] = intval($this->db->select('*')->from('accounts_students e')->join('logs_poll_replies p', 'p.student_id = e.id')->where('course_abv', 'BA')->get()->num_rows());
    $d['CR'] = intval($this->db->select('*')->from('accounts_students e')->join('logs_poll_replies p', 'p.student_id = e.id')->where('course_abv', 'CR')->get()->num_rows());
    $d['ED'] = intval($this->db->select('*')->from('accounts_students e')->join('logs_poll_replies p', 'p.student_id = e.id')->where('course_abv', 'ED')->get()->num_rows());
    
    return $d;
  }

  function getRespondents($id) {
    $query = $this->db->select('*')->from('accounts_students e')->join('logs_poll_replies p', 'p.student_id = e.id')->get()->result();
    return $query;
  }

  function delete($id) {
    $query = $this->db->where('id', $id)->delete('beam_polls');
    return $query;
  }

  function getCount() {
    $query = $this->db->select('*')->from('beam_polls')->get()->num_rows();
    return $query;
  }



}
