<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {

  public function __construct()	{
    parent::__construct();
    $this->load->database();
  }

  function index() { }

  function fetchAll() {
    return $this->db->select('*')->from('accounts_students')->get()->result();
  }

  function getCount() {
    return $this->db->select('*')->from('accounts_students')->get()->num_rows();
  }

  function newPending($data) {
    return $this->db->insert('accounts_pending', $data);
  }

  function fetchGroups($id = null) {
    if( !is_null($id) ) {
      $this->db->select('g.id, g.code, g.details, g.name');
      $this->db->from('beam_groups g');
      $this->db->join('beam_group_members gm', 'gm.group_id = g.id');
      $this->db->join('accounts_students s', 'gm.student_id = s.id');
      $this->db->where('student_id', $id);
      // Order by descending id from group_members
      // $this->db->sort('gm.id', 'desc');

      $query = $this->db->get();

      if($query->num_rows() != 0) {
        return $query->result_array();
      }else {
        return false;
      }
    }
  }

  public function validate(){
    $username = $this->security->xss_clean($this->input->post('username'));
    $password = $this->security->xss_clean($this->input->post('password'));

    if($username == NULL) {
      return 3;
    }elseif ($password == NULL) {
      return 4;
    }else {
      $this->db->where('username', $username);

      $query = $this->db->get('accounts_students')->row();

      if($query != NULL) {
        if(password_verify($password, $query->password_hash)) {
          $userdata =
            array(
              'id' => $query->id,
              'first_name' => $query->first_name,
              'last_name' => $query->last_name,
              'middle_name' => $query->middle_name,
              'year_level' => $query->year_level,
              'course_abv' => $query->course_abv,
              'course' => $query->course,
              'verified' => $query->verified,
              'last_verified' => $query->last_verified,
              'phone_number' => $query->phone_number,
              'username' => $query->username,
              'isStudent' => true,
              'isTeacher' => false,
              'isAdmin' => false,
              'validated' => true );

          $this->session->set_userdata($userdata);
          return 0;
        }else {
          return 1;
        }
      }
      return 2;
    }
  }

  function create($data) {
    return $result = $this->db->insert('accounts_students', $data);
  }

  function fetch($id) {
    return $row = $this->db->select('*')->from('accounts_students')->where('id', $id)->get()->row();
  }

  function update($id, $data) {
    return $result = $this->db->where('id', $id)->update('accounts_students', $data);
  }

  function delete($id) {
    return $result = $this->db->where('id', $id)->delete('accounts_students');
  }

}
