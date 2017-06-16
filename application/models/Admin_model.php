<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

  public function __construct()	{
    parent::__construct();
    $this->load->database();
  }

  function index() { }

  public function validate(){
    $username = $this->security->xss_clean($this->input->post('username'));
    $password = $this->security->xss_clean($this->input->post('password'));

    if($username == NULL) {
      return 3;
    }elseif ($password == NULL) {
      return 4;
    }else {
      $this->db->where('username', $username);

      $query = $this->db->get('accounts_admins')->row();

      if($query != NULL) {
        if(password_verify($password, $query->password_hash)) {
          $userdata =
            array(
              'id' => $query->id,
              'first_name' => $query->first_name,
              'last_name' => $query->last_name,
              'middle_name' => $query->middle_name,
              'verified' => $query->verified,
              'last_verified' => $query->last_verified,
              'phone_number' => $query->phone_number,
              'username' => $query->username,
              'isStudent' => false,
              'isTeacher' => false,
              'isAdmin' => true,
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
    return $this->db->insert('accounts_admins', $data);
  }

  function fetch($id = null) {
    return $adminData = $this->db->select('*')->from('accounts_admins')->where('id', $id)->get()->row(); 
  }
  
  function fetchAll() {
    return $adminData = $this->db->select('*')->from('accounts_admins')->get()->result();
  }

  function update($id, $data) {
    return $result = $this->db->where('id', $id)->update('accounts_admins', $data);
  }

  function delete($id) {
    return $result = $this->db->where('id', $id)->delete('accounts_admins');
  }

}
