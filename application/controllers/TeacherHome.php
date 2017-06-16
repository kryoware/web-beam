<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TeacherHome extends CI_Controller {
  private $data = array();

  function __construct(){
    parent::__construct();
    $this->check_isvalidated();
    $this->form_validation->set_message('required', '{field} cannot be empty');
    $this->form_validation->set_message('min_length', '{field} must be at least {param} characters long');
    $this->form_validation->set_message('alpha_numeric_spaces', '{field} only accepts alphanumeric input');
    $this->form_validation->set_message('is_unique', '{field} already in use');
  }

  public function index($error = NULL){
    if(!$_SESSION['isTeacher']) {
      show_404();
    }
    $results = $this->teacher_model->fetchGroups($_SESSION['id']);

		$this->load->view('header');
		$this->load->view('styles/teacher');
		$this->load->view('teacher/dashboard_page', array('results' => $results, 'data' => $this->data, 'error' => $error));
		$this->load->view('footer');
  }

  public function profile(){
    if(!$_SESSION['isTeacher']) {
      show_404();
    }
    $teacher = $this->teacher_model->fetch($_SESSION['id']);

		$this->load->view('header');
		$this->load->view('styles/teacher');
		$this->load->view('common/profile_page', array('data' => $teacher));
		$this->load->view('footer');
  }

  public function create_group() {
    if(!$_SESSION['isTeacher']) {
      // show_404();
    }
    $this->load->view('header');
    $this->load->view('styles/teacher');

    $name = $this->security->xss_clean($this->input->post('group_name'));
    $details = $this->security->xss_clean($this->input->post('group_details'));

    $this->form_validation->set_rules('group_name', 'Group Name', 'required|trim|strip_tags|alpha_numeric_spaces|min_length[3]');
    $this->form_validation->set_rules('group_details', 'Details', 'required|trim|strip_tags|min_length[20]');

    if($this->form_validation->run() == FALSE) {
      $results = $this->teacher_model->fetchGroups($_SESSION['id']);
      $this->load->view('teacher/dashboard_page', array('results' => $results));
    }else {
      $code = $this->devops->generate(6);

      // if($this->group_model->doesExist($code)) {
        $newGroupData = array(
          'name' => $name,
          'details' => $details,
          'code' => $code
        );
        $newGroup = $this->group_model->create($newGroupData, $code);
        var_dump($newGroup);
        if($newGroup) {
          $moddata = array(
            'teacher_id' => $_SESSION['id'],
            'group_id' => $this->db->insert_id()
          );
          $newMod = $this->db->insert('beam_group_moderators', $moddata);
          redirect(base_url('teacher/dashboard'));
        }else {
          show_404();
        }        
      // }
    }
    $this->load->view('footer');
  }

  public function view_group($id = null) {
    $this->load->view('header');
    $this->load->view('styles/teacher');
    if(!is_null($id) && $_SESSION['isTeacher']) {
      if($this->input->get('u') !== null) {
        if(md5($id + $_SESSION['id']) === $this->input->get('u')) {
          $this->load->model('group_model');
          $this->load->model('student_model');

          $result = $this->group_model->fetchByID($id);
          $members = $this->group_model->fetchMembers($id);
          $this->data['message'] = null;

          if(!is_null($result)) {
            $this->load->view('header');
            $this->load->view('styles/teacher');
            $this->data['message'] = "This group has no members yet.<br><br>Tell your students to join - It's FREE!";
            $this->load->view('teacher/group_page', array('data' => $this->data, 'result' => $result, 'members' => $members));
            $this->load->view('footer');
          }else {
            // ID not found
            show_404();
          }
        }else {
          show_404();
        }
      }else {
        show_404();
      }
    }else {
      // ID is null
      show_404();
    }
  }

  public function delete_group($id) {
    if($_SESSION['isTeacher']) {
      if($this->input->get('u') !== null) {
        if(md5($id + $_SESSION['id']) === $this->input->get('u')) {
          $groupDelete = $this->db->where('id', $id)->delete('beam_groups');
          $grpMdDelete = $this->db->where('group_id', $id)->where('teacher_id', $_SESSION['id'])->delete('beam_group_moderators');

          if($groupDelete && $grpMdDelete) {
            redirect(base_url('teacher/dashboard'));
          }
        }else {
          show_404();
        }
      }else {
        show_404();
      }
    }
  }

  public function update_group($id = null){
    $groupName = $this->security->xss_clean($this->input->post('name'));
    $groupDets = $this->security->xss_clean($this->input->post('details'));

    $updatedData = array(
      'name' => $groupName,
      'details' => $groupDets
    );

    $updateResult = $this->group_model->update($id, $updatedData);
    redirect('teacher/group/view/'.$id.'?u='.md5($id + $_SESSION['id']));

  }

  private function check_isvalidated(){
    if(!$this->session->userdata('validated') && !$this->session->userdata('isTeacher')){
      redirect('teacher');
    }
  }

  public function logout(){
    $this->session->sess_destroy();
    redirect('teacher');
  }

}
