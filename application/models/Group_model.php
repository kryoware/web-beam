<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group_model extends CI_Model {

  public function __construct()	{
    parent::__construct();
    $this->load->database();
  }

  function index() {  }

  function getMemberCount($id = null) {
    if( !is_null($id) ) {
      $this->db->select('*');
      $this->db->from('beam_groups g');
      $this->db->join('beam_group_members gm', 'gm.group_id = g.id');
      $this->db->where('group_id', $id);
      $query = $this->db->get();

      return $query->num_rows();
    }
  }

  function doesExist($code) {
    return $this->db->select('*')->from('beam_groups')->where('code', $code)->get()->row();
  }

  function getModerator($groupID = null) {
    if( !is_null($groupID) ) {
      $this->db->select('*');
      $this->db->from('beam_group_moderators');
      $this->db->where('group_id', $groupID);
      $teacherID = $this->db->get()->row();

      $query = $this->db->select('first_name, last_name')->from('accounts_teachers')->where('id', $teacherID->teacher_id)->get()->row();

      return $query;
    }
  }

  function addMember($code) {
    if(!is_null($code) && !empty($code)) {
      if($_SESSION['isStudent']) {
        $groupID = $this->db->select('id')->from('beam_groups')->where('code', $code)->get()->row();
        if( !is_null($groupID) ) {

          $doesExist = $this->db->select('*')->from('beam_group_members')->where('group_id', $groupID->id)->where('student_id', $_SESSION['id'])->get();

          if(!$doesExist->num_rows() > 0) {
            $newMemberData = array(
              'group_id' => $groupID->id,
              'student_id' => $_SESSION['id']
            );

            $newMember = $this->db->insert('beam_group_members', $newMemberData);
            if($newMember) {
              return 0;
            }else {
              // Database Error
              return 1;
            }
          }else {
            // Student already a member
            return 5;
          }
        }else {
          // Group does not exist
          return 4;
        }
      }else {
        // Unauthorized Access
        return 2;
      }
    }else {
      // Null Input
      return 3;
    }
  }

  function removeMember($id) {
    // Delete student_id and group_id from beam_group_members
    if($_SESSION['access_level'] === 'TEACHER') {
      $memberDelete = $this->db->where('group_id', $id)->where('teacher_id', $_SESSION['id'])->delete('beam_group_members');
      return $memberDelete;
    }
  }

  function create($data, $code) {
    var_dump($data);
    // // Check if generated code exists
    // if(is_null($this->doesExist($code))) {
    //   echo "exists";
    // }else {
    //   echo "not exist";
    // $queryCode = $this->db->select('*')->from('beam_groups')->where('code', $code)->get() !== null ? 'false' : 'true';

      $query = $this->db->insert('beam_groups', $data);
    // }

    // do {
    //   var_dump($this->create($data, $this->devops->generate(6)));
    // }while($queryCode);
    return $query;
  }

  function update($id, $data) {
    $query = $this->db->where('id', $id)->update('beam_groups', $data);

    return $query;
  }

  function delete($id) {
    $query = $this->db->where('id', $id)->delete('beam_groups');

  }

  function fetchByID($id) {
    $row = $this->db->where('id', $id)->select('*')->from('beam_groups')->get()->row();

    return $row;
  }

  function getTeacherGroupByID($group_id, $teacher_id) {
    $row = $this->db->where('id', $id)->select('*')->from('beam_groups')->get()->row();

    return $row;
  }

  function fetchAll() {
    $query = $this->db->select('*')->from('beam_groups')->get()->result();
    return $query;
  }

  function fetchMembers($id) {
    $this->db->select('*');
    $this->db->from('beam_groups g');
    $this->db->join('beam_group_members gm', 'gm.group_id = g.id');
    $this->db->join('accounts_students s', 'gm.student_id = s.id');
    $this->db->where('group_id', $id);
    $query = $this->db->get();

    if($query->num_rows() != 0) {
      return $query->result();
    }else {
      return false;
    }
  }




}
