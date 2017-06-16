<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model {

  public function __construct()	{
    parent::__construct();
    $this->load->database();
  }

  function index() { }

  function fetchCode($phone) {
    $q = $this->db->select('verification_code')->from('accounts_pending')->where('phone_number', $phone)->get()->row();
    return $q;
  }

  function fetchPending() {
    $q = $this->db->select('*')->from('accounts_pending')->get()->result();
    return $q;
  }

  function getUsertype($phone_number) {
    $t = $this->db->select('*')->from('accounts_teachers')->where('phone_number', $phone_number)->get()->row();
    $s = $this->db->select('*')->from('accounts_students')->where('phone_number', $phone_number)->get()->row();
    if(is_null($t)) {
      return "Student";
    }else {
      return "Teacher";
    }
  }

  public function update($id, $data) {
    $this->db->where('id', $id);
    if($this->session->userdata['isAdmin']) {
      $query = $this->db->update('accounts_admins', $data);
    }else if($this->session->userdata['isStudent']) {
      $query = $this->db->update('accounts_students', $data);
    }else if($this->session->userdata['isTeacher']) {
      $query = $this->db->update('accounts_teachers', $data);
    }
    return $query;
  }

  public function fetch($id) {
    $this->db->select('*');
    if($this->session->userdata['isAdmin']) {
      $this->db->from('accounts_admins');
    }else if($this->session->userdata['isStudent']) {
      $this->db->from('accounts_students');
    }else if($this->session->userdata['isTeacher']) {
      $this->db->from('accounts_teachers');
    }
    $query = $this->db->where('id', $id)->get()->row();
    return $query;
  }

  public function fetchCol($col, $id) {
    $this->db->select($col);
    if($this->session->userdata['isAdmin']) {
      $this->db->from('accounts_admins');
    }else if($this->session->userdata['isStudent']) {
      $this->db->from('accounts_students');
    }else if($this->session->userdata['isTeacher']) {
      $this->db->from('accounts_teachers');
    }
    $query = $this->db->where('id', $id)->get()->row();
    return $query;
  }

  public function doesExist($col, $val) {
    $this->db->select($col);
    if($this->session->userdata['isAdmin']) {
      $this->db->from('accounts_admins');
    }else if($this->session->userdata['isStudent']) {
      $this->db->from('accounts_students');
    }else if($this->session->userdata['isTeacher']) {
      $this->db->from('accounts_teachers');
    }
    $query = $this->db->where($col, $val)->get();
    // var_dump("col: ".$col." val: ".$val);
    return $query->num_rows();
  }

  private function getHash($id) {
    $this->db->select('password_hash');

    if($this->session->userdata['isStudent']) {
      $this->db->from('accounts_admins');
    }else if($this->session->userdata['isStudent']) {
      $this->db->from('accounts_students');
    }else if($this->session->userdata['isTeacher']) {
      $this->db->from('accounts_teachers');
    }
    $hash = $this->db->where('id', $id)->get();
    var_dump($hash);
  }

}
