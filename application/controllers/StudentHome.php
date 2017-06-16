<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentHome extends CI_Controller {
  private $data = array();

    function __construct(){
      parent::__construct();
      $this->check_isvalidated();
      $this->data['title'] = 'Student';
      $this->data['lower'] = 'student';
    }

    public function index($error = null){
      if(!$_SESSION['isStudent']) {
        show_404();
      }
      $myGroups = $this->student_model->fetchGroups($_SESSION['id']);

  		$this->load->view('header');
  		$this->load->view('styles/student');
  		$this->load->view('student/dashboard_page', array('data' => $this->data, 'groups' => $myGroups, 'error' => $error));
  		$this->load->view('footer');
    }

    function join_group() {
      if(!$_SESSION['isStudent']) {
        show_404();
      }

      $groupCode = $this->security->xss_clean($this->input->post('group_code'));

      $resultCode = $this->group_model->addMember($groupCode);
      switch ($resultCode) {
        case 0:
          # code... Successful
          redirect('student/dashboard');
          break;
        case 1:
          # code...
          $this->index('Database Error');
          break;
        case 2:
          # code...
          $this->index('Access Denied');
          break;
        case 3:
          # code...
          $this->index('Please enter your group code');
          break;
        case 4:
          # code...
          $this->index('Group does not exist');
          break;
        case 5:
          # code...
          $this->index('Already a member of this group');
          break;
      }
    }

    public function profile(){
      if(!$_SESSION['isStudent']) {
        show_404();
      }
      $student = $this->student_model->fetch($this->session->userdata('id'));
  		$this->load->view('header');
  		$this->load->view('styles/student');
  		$this->load->view('common/profile_page', array('data' => $this->data, 'data' => $student));
  		$this->load->view('footer');
    }

    public function view_group($id){
      if(!is_null($id) && $_SESSION['isStudent']) {

        $result = $this->group_model->fetchByID($id);
        $members = $this->group_model->fetchMembers($id);
        $this->data['message'] = null;

        if(!is_null($result)) {
          if(!$members) {
            $this->data['message'] = 'This group has no members yet';
          }
          $this->load->view('header');
      		$this->load->view('styles/student');
          $this->load->view('student/group_page', array('data' => $this->data, 'result' => $result, 'members' => $members));
          $this->load->view('footer');
        }else {
          // ID not found
          show_404();
        }
      }else {
        // ID is null
        show_404();
      }

    }

    public function help(){
      if(!$_SESSION['isStudent']) {
        show_404();
      }

  		$this->load->view('header');
  		$this->load->view('styles/student');
  		$this->load->view('student/help_page');
  		$this->load->view('footer');
    }

    private function check_isvalidated(){
      if(!$this->session->userdata('validated')){
        redirect('student');
      }
    }

    public function logout(){
      $this->session->sess_destroy();
      redirect('student');
    }

}
