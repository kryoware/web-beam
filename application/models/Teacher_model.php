<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher_model extends CI_Model {

  public function __construct()	{
    parent::__construct();
    $this->load->database();
  }

  function index() {}

  function fetch($id) {
    $row = $this->db->select('*')->from('accounts_teachers')->where('id', $id)->get()->row();
    return $row;
  }

  // function newPending($data) {
  //   $result = $this->db->insert('accounts_students', $data);
  //   return $result;
  // }

  function getCount() {
    $count = $this->db->select('*')->from('accounts_teachers')->get()->num_rows();
    return $count;
  }

  function fetchAll() {
    $results = $this->db->select('*')->from('accounts_teachers')->get()->result();
    return $results;
  }

  function create($data) {
    $result = $this->db->insert('accounts_teachers', $data);
    return $result;
  }

  function update($id, $data) {
    $query = $this->db->where('id', $id)->update('accounts_teachers', $data);
    return $query;
  }

  function delete($id) {
    $query = $this->db->where('id', $id)->delete('accounts_teachers');
    return $query;
  }

  // Logic: Login Process
  public function validate(){
    $username = $this->security->xss_clean($this->input->post('username'));
    $password = $this->security->xss_clean($this->input->post('password'));

    if($username == NULL) {
      return 3;
    }elseif ($password == NULL) {
      return 4;
    }else {
      $this->db->where('username', $username);

      $query = $this->db->get('accounts_teachers')->row();

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
              'active' => $query->active,
              'isTeacher' => true,
              'isStudent' => false,
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

  // Fetch the Teacher's Groups
  public function fetchGroups($id = null) {
    if( !is_null($id) ) {
      $this->db->select('g.id, g.code, g.details, g.name');
      $this->db->from('beam_groups g');
      $this->db->join('beam_group_moderators gm', 'gm.group_id = g.id');
      $this->db->join('accounts_teachers t', 'gm.teacher_id = t.id');
      $this->db->where('teacher_id', $id);
      $query = $this->db->get();

      if($query->num_rows() != 0) {
        return $query->result_array();
      }else {
        return false;
      }
    }
  }

  // # of Groups Teacher currently has
  public function getGroupCount($id = null) {
    if( !is_null($id) ) {
      $this->db->select('*');
      $this->db->from('beam_groups g');
      $this->db->join('beam_group_moderators gm', 'gm.group_id = g.id');
      $this->db->join('accounts_teachers t', 'gm.teacher_id = t.id');
      $this->db->where('teacher_id', $id);
      $query = $this->db->get()->result();

      return $query->num_rows();
    }
  }

  // Logic: Teacher Creates New Group
  function createGroup() {
    $name = $this->security->xss_clean($this->input->post('group_name'));
    $details = $this->security->xss_clean($this->input->post('group_details'));

    if(!empty($name)) {
      if(!empty($details)) {
        // Get # of Groups the Teacher currently has
        $current_groupcount = $this->getGroupCount($id);

        // TODO: Not working as expected
        if($current_groupcount > 10) {
          // Exceeded group limit per teacher
          return 4;
        }else {
          $code = $this->devops->generate(6);
          $groupdata = array(
            'code' => $code,
            'name' => $name,
            'details' => $details
          );
          // $newGroup = $this->group_model->create($groupdata);

          if($newGroup) {
          }
        }
      }else {
        // Empty Details
        return 2;
      }
    }else {
      // Empty Group Name
      return 1;
    }
  }

}
