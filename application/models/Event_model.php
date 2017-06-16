<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model {

  public function __construct()	{
    parent::__construct();
    $this->load->database();
  }

  function index() {

  }

  function getAttendees($id) {
    $q = $this->db->select('*')->from('accounts_students s')->join('beam_event_attendees ea', 'ea.student_id = s.id')->where('ea.id', $id)->get()->result();
    return $q;
  }

  function getID($code) {
    $q = $this->db->select('id')->from('beam_events')->where('code', $code)->get()->row();
    return $q;
  }

  function fetchAll() {
    $query = $this->db->select('*')->from('beam_events')->get()->result();
    return $query;
  }

  function create($data) {
    // Check if generated code exists
    // $queryCode = $this->db->select('*')->from('beam_events')->where('code', $data->code)->get()->result();

    // if($queryCode) {
    //   create($data, $this->devops->generate(4));
    // }else {
      $query = $this->db->insert('beam_events', $data);
      return $query;
    // }
  }

  function update($id, $data) {
    $query = $this->db->where('id', $id)->update('beam_events', $data);
    return $query;
  }

  function delete($id) {
    $query = $this->db->where('id', $id)->delete('beam_events');
    return $query;
  }

  function fetch($id) {
    // Check if generated code exists
    $q = $this->db->select('*')->from('beam_events')->where('id', $id)->get()->row();
    return $q;
  }

  function getCount() {
    $count = $this->db->select('*')->from('beam_events')->get()->num_rows();
    return $count;
  }
}
