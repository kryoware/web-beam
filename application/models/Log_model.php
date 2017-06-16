<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_model extends CI_Model {

  public function __construct()	{
    parent::__construct();
    $this->load->database();
  }

  function index() {

  }

  function fetchRequests() {
    $req = $this->db->select('*')->from('pending_requests pr')->get()->result();
    // ->join('logs_sent_messages sm', 'sm.request_id = pr.id')
    return $req;
  }

  function fetchReq($id) {
    $req = $this->db->select('*')->from('pending_requests pr')->where('id', $id)->get()->row();
    // ->join('logs_sent_messages sm', 'sm.request_id = pr.id')
    return $req;
  }

  function getRecipients($id) {
    $req = $this->db->select('sm.timestamp, sm.student_id, first_name, middle_name, last_name, course, course_abv, year_level')->from('logs_sent_messages sm')->join('accounts_students s', 's.id = sm.student_id')->where('sm.request_id', $id)->get()->result();
    // ->join('logs_sent_messages sm', 'sm.request_id = pr.id')
    // var_dump($req);
    return $req;
  }

  function action($log) {
    $result = $this->db->insert('logs_admin_actions', $log);
    return $result;
  }

  function fetchAll() {
    $l = $this->db->select('aa.last_name, aa.first_name, action, l.id, timestamp')->order_by('timestamp', 'desc')->from('logs_admin_actions l')->join('accounts_admins aa', 'l.admin_id = aa.id')->get()->result();
    return $l;
  }
  function fetch($id) {
    $l = $this->db->select('*')->from('logs_admin_actions l')->join('accounts_admins aa', 'l.admin_id = aa.id')->where('l.id', $id)->get()->row();
    return $l;
  }


}
