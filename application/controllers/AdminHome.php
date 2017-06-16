<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminHome extends CI_Controller {
  private $data = array();

  function __construct(){
    parent::__construct();
    $this->check_isvalidated();
    $this->form_validation->set_error_delimiters('', '<br>');
    $this->form_validation->set_message('required', '{field} cannot be empty');
    $this->form_validation->set_message('min_length', '{field} must be at least {param} characters long');
    $this->form_validation->set_message('max_length', '{field} must not exceed {param} characters');
    $this->form_validation->set_message('numeric', '{field} only accepts numeric input');
    $this->form_validation->set_message('alpha', '{field} only accepts alphabetical input');
    $this->form_validation->set_message('alpha_numeric', '{field} only accepts alphanumeric input');
    $this->form_validation->set_message('matches', 'Passwords do not match');
    $this->form_validation->set_message('is_unique', '{field} is already in use');
  }
  function manage_admins() {
    $data = $this->admin_model->fetchAll();

    $this->load->view('header');
    $this->load->view('styles/admin');
    $this->load->view('admin/list/admins_page', array('data' => $data));
    $this->load->view('footer');
  }
  function view_admin($id = null) {
    if($id && !is_null($this->input->get('v'))) {
      $v = $this->security->xss_clean($this->input->get('v'));
      $o = md5($id+$_SESSION['id']);
      if($v === $o) {
        $admin = $this->admin_model->fetch($id);

        $this->load->view('header');
        $this->load->view('styles/admin');
        $this->load->view('admin/view/admin_page', array('teacher' => $admin));
        $this->load->view('footer');
      }else {
        show_404();
      }
    }else {
      redirect(base_url('admin/manage'));
    }    
  }
  function edit_admin() {
    $this->load->view('header');
    $this->load->view('styles/admin');

    if($this->security->xss_clean($this->input->post('admin_id'))) {
      $id = $this->security->xss_clean($this->input->post('admin_id'));

      $firstName = $this->input->post('first_name');
      $middleName = $this->input->post('middle_name');
      $lastName = $this->input->post('last_name');

      $this->form_validation->set_rules('first_name', 'First Name', 'required|trim|strip_tags|min_length[2]');
      $this->form_validation->set_rules('middle_name', 'Middle Name', 'required|trim|strip_tags|min_length[2]');
      $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim|strip_tags|min_length[2]');

      if($this->form_validation->run() == FALSE) {      
        $this->load->view('admin/view/admin_page', array('teacher' => $this->admin_model->fetch($id)));
      }else {
        $newStudentData = array(
          'first_name' => $firstName,
          'middle_name' => $middleName,
          'last_name' => $lastName,
        );
        $newStudent = $this->admin_model->update($id, $newStudentData);

        if($newStudent) {
          redirect('admin/manage');
        }else {
          show_404();
        }
      }
      $this->load->view('footer');
    }else {
      redirect(base_url('admin/manage'));
    }
  }
  function delete_admin($id = null) {
    if($_SESSION['isAdmin']) {
      $d = $this->security->xss_clean($this->input->get('d'));
      if(!is_null($id) && !is_null($d)) {
        if(md5($id+$_SESSION['id']) === $d) {
          $teacher = $this->admin_model->fetch($id);
          $this->admin_model->delete($id);
          $log = array(
            'admin_id' => $this->session->userdata('id'),
            'action' => "Deleted Admin: ID# ".$teacher->username,
            'details' => "Name: ".$teacher->first_name." ".$teacher->middle_name." ".$teacher->last_name."\nDepartment: ".$teacher->department
          );
          $action = $this->log_model->action($log);
          redirect('admin/manage');
        }
      }else {
        show_404();
      }
    }else {
      show_404();
    }
  }
  // Admin Account Control
  function disable_admin($id = null) {
    if($id && !is_null($this->input->get('token'))) {
      $v = $this->security->xss_clean($this->input->get('token'));
      $o = md5($id+$_SESSION['id']);
      if($v === $o) {
        $data = array('active' => 0);
        $this->admin_model->update($id, $data);
        redirect(base_url('admin/manage'));
      }else { show_404(); }
    }else { redirect(base_url('admin/manage')); }
  }
  function enable_admin($id = null) {
    if($id && !is_null($this->input->get('token'))) {
      $v = $this->security->xss_clean($this->input->get('token'));
      $o = md5($id+$_SESSION['id']);
      if($v === $o) {
        $data = array('active' => 1);
        $this->admin_model->update($id, $data);
        redirect(base_url('admin/manage'));
      }else { show_404(); }
    }else { redirect(base_url('admin/manage')); }
  }
  function reset_admin($id = null) {
    if($id && !is_null($this->input->get('token'))) {
      $v = $this->security->xss_clean($this->input->get('token'));
      $o = md5($id+$_SESSION['id']);
      if($v === $o) {
        $data = array('password_hash' => password_hash('password', PASSWORD_BCRYPT));
        $this->admin_model->update($id, $data);
        redirect(base_url('admin/manage'));
      }else { show_404(); }
    }else { redirect(base_url('admin/manage')); }
  }
  // Teacher Account Control
  function disable_teacher($id = null) {
    if($id && !is_null($this->input->get('token'))) {
      $v = $this->security->xss_clean($this->input->get('token'));
      $o = md5($id+$_SESSION['id']);
      if($v === $o) {
        $data = array('active' => 0);
        $this->teacher_model->update($id, $data);
        redirect(base_url('admin/view_all/teachers'));
      }else { show_404(); }
    }else { redirect(base_url('admin/view_all/teachers')); }
  }
  function enable_teacher($id = null) {
    if($id && !is_null($this->input->get('token'))) {
      $v = $this->security->xss_clean($this->input->get('token'));
      $o = md5($id+$_SESSION['id']);
      if($v === $o) {
        $data = array('active' => 1);
        $this->teacher_model->update($id, $data);
        redirect(base_url('admin/view_all/teachers'));
      }else { show_404(); }
    }else { redirect(base_url('admin/view_all/teachers')); }
  }
  function reset_teacher($id = null) {
    if($id && !is_null($this->input->get('token'))) {
      $v = $this->security->xss_clean($this->input->get('token'));
      $o = md5($id+$_SESSION['id']);
      if($v === $o) {
        $data = array('password_hash' => password_hash('password', PASSWORD_BCRYPT));
        $this->teacher_model->update($id, $data);
        redirect(base_url('admin/view_all/teachers'));
      }else { show_404(); }
    }else { redirect(base_url('admin/view_all/teachers')); }
  }

  // Student Account Control
  function disable_student($id = null) {
    if($id && !is_null($this->input->get('token'))) {
      $v = $this->security->xss_clean($this->input->get('token'));
      $o = md5($id+$_SESSION['id']);
      if($v === $o) {
        $data = array('active' => 0);
        $this->student_model->update($id, $data);
        redirect(base_url('admin/view_all/students'));
      }else { show_404(); }
    }else { redirect(base_url('admin/view_all/students')); }
  }
  function enable_student($id = null) {
    if($id && !is_null($this->input->get('token'))) {
      $v = $this->security->xss_clean($this->input->get('token'));
      $o = md5($id+$_SESSION['id']);
      if($v === $o) {
        $data = array('active' => 1);
        $this->student_model->update($id, $data);
        redirect(base_url('admin/view_all/students'));
      }else { show_404(); }
    }else { redirect(base_url('admin/view_all/students')); }
  }
  function reset_student($id = null) {
    if($id && !is_null($this->input->get('token'))) {
      $v = $this->security->xss_clean($this->input->get('token'));
      $o = md5($id+$_SESSION['id']);
      if($v === $o) {
        $data = array('password_hash' => password_hash('password', PASSWORD_BCRYPT));
        $this->student_model->update($id, $data);
        redirect(base_url('admin/view_all/students'));
      }else { show_404(); }
    }else { redirect(base_url('admin/view_all/students')); }
  }

  function view_requests() {
    if(!isset($_SESSION['isAdmin'])) {
      redirect(base_url('admin'));
    }else {
      $requests = $this->log_model->fetchRequests();

  		$this->load->view('header');
  		$this->load->view('styles/admin');
  		$this->load->view('admin/list/requests_page', array('requests' => $requests));
  		$this->load->view('footer');
    }
  }
  function view_request($id = null) {
    if($id && !is_null($this->input->get('v'))) {
      $v = $this->security->xss_clean($this->input->get('v'));
      $o = md5($id+$_SESSION['id']);
      if($v === $o) {
        $request = $this->log_model->fetchReq($id);

        $targets = $this->log_model->getRecipients($id);
        // var_dump($id);
        $this->load->view('header');
        $this->load->view('styles/admin');
        $this->load->view('admin/view/request_page', array('targets' => $targets, 'request' => $request));
        $this->load->view('footer');
      }else {
        show_404();
      }
    }else {
      redirect(base_url('admin/view_all/students'));
    }
  }

  function view_accounts() {
    if(!isset($_SESSION['isAdmin'])) {
      redirect(base_url('admin'));
    }else {
      $logs = $this->account_model->fetchPending();

  		$this->load->view('header');
  		$this->load->view('styles/admin');
  		$this->load->view('admin/list/accounts_page', array('logs' => $logs));
  		$this->load->view('footer');
    }
  }

  function view_logs() {
    if(!isset($_SESSION['isAdmin'])) {
      redirect(base_url('admin'));
    }else {
      $logs = $this->log_model->fetchAll();

  		$this->load->view('header');
  		$this->load->view('styles/admin');
  		$this->load->view('admin/list/logs_page', array('logs' => $logs));
  		$this->load->view('footer');
    }
  }
  function view_log($id = null) {
    if($id && !is_null($this->input->get('v'))) {
      $v = $this->security->xss_clean($this->input->get('v'));
      $o = md5($id+$_SESSION['id']);
      if($v === $o) {
        $log = $this->log_model->fetch($id);

        $this->load->view('header');
        $this->load->view('styles/admin');
        $this->load->view('admin/logs/log_page', array('log' => $log));
        $this->load->view('footer');
      }else {
        show_404();
      }
    }else {
      redirect(base_url('admin/view_all/students'));
    }
  }

  function index($error = NULL){
    if(!isset($_SESSION['isAdmin'])) {
      redirect(base_url('admin'));
    }else {
  		$this->load->view('header');
  		$this->load->view('styles/teacher');
  		$this->load->view('admin/dashboard_page', array('error' => $error));
  		$this->load->view('footer');
    }
  }
  function profile(){
    if(!isset($_SESSION['isAdmin'])) {
      redirect(base_url('admin'));
    }
    // DB ACTIONS
    $admin = $this->admin_model->fetch($this->session->userdata('id'));

		$this->load->view('header');
		$this->load->view('styles/admin');
		$this->load->view('common/profile_page', array('data' => $admin,));
		$this->load->view('footer');
  }
  function help(){
    if(!isset($_SESSION['isAdmin'])) {
      redirect(base_url('admin'));
    }
    $user = null;

		$this->load->view('header');
		$this->load->view('styles/admin');
		$this->load->view('admin/help_page', array('data' => $user));
		$this->load->view('footer');
  }
  private function check_isvalidated(){
    if(!$this->session->userdata('validated') && !isset($_SESSION['isAdmin'])){
      redirect('admin');
    }
  }

  function manage_students(){
    $data = $this->student_model->fetchAll();

    $this->load->view('header');
    $this->load->view('styles/admin');
    $this->load->view('admin/list/students_page', array('data' => $data));
    $this->load->view('footer');
  }
  function view_student($id = null) {
    if($id && !is_null($this->input->get('v'))) {
      $v = $this->security->xss_clean($this->input->get('v'));
      $o = md5($id+$_SESSION['id']);
      if($v === $o) {
        $student = $this->student_model->fetch($id);

        $this->load->view('header');
        $this->load->view('styles/admin');
        $this->load->view('admin/view/student_page', array('student' => $student));
        $this->load->view('footer');
      }else {
        show_404();
      }
    }else {
      redirect(base_url('admin/view_all/students'));
    }
  }
  function edit_student() {
    $this->load->view('header');
    $this->load->view('styles/admin');

    if($this->security->xss_clean($this->input->post('student_id'))) {
      $id = $this->security->xss_clean($this->input->post('student_id'));

      $firstName = $this->input->post('first_name');
      $middleName = $this->input->post('middle_name');
      $lastName = $this->input->post('last_name');
      $course = $this->input->post('course');
      $year = $this->input->post('year');
      switch ($course) {
        case 'Information Technology':
          $course_abv = 'IT';
          break;
        case 'Business Administration':
          $course_abv = 'BA';
          break;
        case 'Education':
          $course_abv = 'ED';
          break;
        case 'Criminology':
          $course_abv = 'CR';
          break;
      }

      $this->form_validation->set_rules('first_name', 'First Name', 'required|trim|strip_tags');
      $this->form_validation->set_rules('middle_name', 'Middle Name', 'required|trim|strip_tags');
      $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim|strip_tags');
      $this->form_validation->set_rules('course', 'Course', 'required|trim|strip_tags');
      $this->form_validation->set_rules('year', 'Year', 'required|integer|trim|strip_tags');

      if($this->form_validation->run() == FALSE) {
        $this->load->view('admin/view/student_page', array('student' => $this->student_model->fetch($id)));
      }else {
        $newStudentData = array(
          'first_name' => $firstName,
          'middle_name' => $middleName,
          'last_name' => $lastName,
          'year_level' => $year,
          'course_abv' => $course_abv,
          'course' => $course
        );
        $newStudent = $this->student_model->update($id, $newStudentData);
        if($newStudent) {
          redirect('admin/view_all/students');
        }else {
          show_404();
        }
      }
      $this->load->view('footer');
    }else {
      redirect(base_url('admin/view_all/students'));
    }
  }
  function delete_student($id = null) {
    if($_SESSION['isAdmin']) {
      $d = $this->security->xss_clean($this->input->get('d'));
      if(!is_null($id) && !is_null($d)) {
        if(md5($id+$_SESSION['id']) === $d) {
          $student = $this->student_model->fetch($id);
          $this->student_model->delete($id);
          $suffix = "";
          switch ($student->year_level) {
            case '1': $suffix = "st Year"; break;
            case '2': $suffix = "nd Year"; break;
            case '3': $suffix = "rd Year"; break;
            default: $suffix = "th Year"; break;
          }
          $log = array(
            'admin_id' => $this->session->userdata('id'),
            'action' => "Deleted Student: ID# ".$student->username,
            'details' => "Name: ".$student->first_name." ".$student->middle_name." ".$student->last_name."\nStudent Info: ".$student->year_level.$suffix." ".$student->course
          );
          $action = $this->log_model->action($log);
          redirect(base_url('admin/view_all/students'));
        }
      }else {
        show_404();
      }
    }else {
      show_404();
    }
  }

  function manage_teachers(){
    $data = $this->teacher_model->fetchAll();

    $this->load->view('header');
    $this->load->view('styles/admin');
    $this->load->view('admin/list/teachers_page', array('data' => $data));
    $this->load->view('footer');
  }
  function view_teacher($id = null) {
    if($id && !is_null($this->input->get('v'))) {
      $v = $this->security->xss_clean($this->input->get('v'));
      $o = md5($id+$_SESSION['id']);
      if($v === $o) {
        $teacher = $this->teacher_model->fetch($id);

        $this->load->view('header');
        $this->load->view('styles/admin');
        $this->load->view('admin/view/teacher_page', array('teacher' => $teacher));
        $this->load->view('footer');
      }else {
        show_404();
      }
    }else {
      redirect(base_url('admin/view_all/teachers'));
    }
  }
  function edit_teacher() {
    $this->load->view('header');
    $this->load->view('styles/admin');

    if($this->security->xss_clean($this->input->post('teacher_id'))) {
      $id = $this->security->xss_clean($this->input->post('teacher_id'));

      $firstName = $this->input->post('first_name');
      $middleName = $this->input->post('middle_name');
      $lastName = $this->input->post('last_name');

      $this->form_validation->set_rules('first_name', 'First Name', 'required|trim|strip_tags');
      $this->form_validation->set_rules('middle_name', 'Middle Name', 'required|trim|strip_tags');
      $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim|strip_tags');

      if($this->form_validation->run() == FALSE) {
        $this->load->view('admin/view/teacher_page', array('teacher' => $this->teacher_model->fetch($id)));
      }else {
        $newStudentData = array(
          'first_name' => $firstName,
          'middle_name' => $middleName,
          'last_name' => $lastName,
        );
        $newStudent = $this->teacher_model->update($id, $newStudentData);

        if($newStudent) {
          redirect('admin/view_all/teachers');
        }else {
          show_404();
        }
      }
      $this->load->view('footer');
    }else {
      redirect(base_url('admin/view_all/teachers'));
    }
  }
  function delete_teacher($id = null) {
    if($_SESSION['isAdmin']) {
      $d = $this->security->xss_clean($this->input->get('d'));
      if(!is_null($id) && !is_null($d)) {
        if(md5($id+$_SESSION['id']) === $d) {
          $teacher = $this->teacher_model->fetch($id);
          $this->teacher_model->delete($id);
          $log = array(
            'admin_id' => $this->session->userdata('id'),
            'action' => "Deleted Teacher: ID# ".$teacher->username,
            'details' => "Name: ".$teacher->first_name." ".$teacher->middle_name." ".$teacher->last_name."\nDepartment: ".$teacher->department
          );
          $action = $this->log_model->action($log);
          redirect('admin/view_all/teachers');
        }
      }else {
        show_404();
      }
    }else {
      show_404();
    }
  }

  function manage_polls(){
    $data = $this->poll_model->fetchAll();

    $this->load->view('header');
    $this->load->view('styles/admin');
    $this->load->view('admin/list/polls_page', array('data' => $data));
    $this->load->view('footer');
  }
  function view_poll($id = null){
    if($id && !is_null($this->input->get('v'))) {
      $v = $this->security->xss_clean($this->input->get('v'));
      $o = md5($id);
      if($v === $o) {
        $poll = $this->poll_model->fetch($id);
        $respondents = $this->poll_model->getRespondents($id);

        $this->load->view('header');
        $this->load->view('styles/admin');
        $this->load->view('admin/view/poll_page', array('poll' => $poll, 'respondents' => $respondents));
        $this->load->view('footer');
      }else {
        show_404();
      }
    }else {
      redirect(base_url('admin/view_all/polls'));
    }
  }
  function delete_poll($id = null) {
    if($_SESSION['isAdmin']) {
      $d = $this->security->xss_clean($this->input->get('d'));
      if(!is_null($id) && !is_null($d)) {
        if(md5($id+$_SESSION['id']) === $d) {
          $poll = $this->poll_model->fetch($id);
          $this->poll_model->delete($id);
          $log = array(
            'admin_id' => $this->session->userdata('id'),
            'action' => "Deleted Poll: ".$poll->name,
            'details' => "Attending - ".$poll->attending."\nNot Going - ".$poll->not_going."\nUndecided - ".$poll->undecided
          );
          $action = $this->log_model->action($log);
          redirect('admin/view_all/polls');
        }
      }else {
        show_404();
      }
    }else {
      show_404();
    }
  }

  function create_event(){
    if($_SESSION['isAdmin']) {
      $this->load->view('header');
      $this->load->view('styles/admin');

      $this->form_validation->set_rules('event_name', 'Event Name', 'required|trim|strip_tags');
      $this->form_validation->set_rules('schedule', 'Schedule', 'required|trim|strip_tags');
      $this->form_validation->set_rules('location', 'Location', 'required|trim|strip_tags');
      $this->form_validation->set_rules('details', 'Details', 'required|trim|strip_tags');

      $schedule = $this->security->xss_clean($this->input->post('schedule'));
      $location = $this->security->xss_clean($this->input->post('location'));
      $name = $this->security->xss_clean($this->input->post('event_name'));
      $details = $this->security->xss_clean($this->input->post('details'));
      $toggle = $this->security->xss_clean($this->input->post('toggle'));

      if($this->form_validation->run() == FALSE) {
        $this->load->view('admin/forms/create_event');
      }else {
        $code = $this->devops->generate(4);

        $newEventData = array(
          'code' => $code,
          'name' => $name,
          'details' => $details,
          'schedule' => $schedule,
          'location' => $location
        );
        $newEvent = $this->event_model->create($newEventData);
        if($newEvent) {
          $action = array(
            'admin_id' => $_SESSION['id'],
            'action' => 'Created Event: '.$name.' ('.$code.')'
          );

          $this->log_model->action($action);

          if($toggle == 'on') {
            $row = $this->event_model->getID($code);
            $newPollData = array(
              'event_id' => $row->id
            );
            $newPoll = $this->poll_model->create($newPollData);
          }
          redirect('admin/view_all/events');
        }else {
          show_404();
        }
      }
      $this->load->view('footer');
    }else {
      show_404();
    }
  }
  function manage_events(){
    $data = $this->event_model->fetchAll();

    $this->load->view('header');
    $this->load->view('styles/admin');
    $this->load->view('admin/list/events_page', array('data' => $data));
    $this->load->view('footer');
  }
  function view_event($id = null){
    if($id && !is_null($this->input->get('v'))) {
      $v = $this->security->xss_clean($this->input->get('v'));
      $o = md5($id+$_SESSION['id']);
      if($v === $o) {
        $event = $this->event_model->fetch($id);
        $attendees = $this->event_model->getAttendees($id);

        $this->load->view('header');
        $this->load->view('styles/admin');
        $this->load->view('admin/view/event_page', array('event' => $event, 'attendees' => $attendees));
        $this->load->view('footer');
      }else {
        show_404();
      }
    }else {
      redirect(base_url('admin/view_all/events'));
    }
  }
  function delete_event($id = null){
    if($_SESSION['isAdmin']) {
      $d = $this->security->xss_clean($this->input->get('d'));
      if(!is_null($id) && !is_null($d)) {
        if(md5($id+$_SESSION['id']) === $d) {
          $event = $this->event_model->fetch($id);
          $this->event_model->delete($id);
          $log = array(
            'admin_id' => $this->session->userdata('id'),
            'action' => "Deleted Event: ".$event->name
          );
          $action = $this->log_model->action($log);
          redirect('admin/view_all/events');
        }
      }else {
        show_404();
      }
    }else {
      show_404();
    }
  }
  function edit_event(){
    $this->load->view('header');
    $this->load->view('styles/admin');

    if($this->security->xss_clean($this->input->post('event_id'))) {
      $id = $this->security->xss_clean($this->input->post('event_id'));
      $code = $this->security->xss_clean($this->input->post('event_code'));
      $name = $this->security->xss_clean($this->input->post('event_name'));
      $details = $this->security->xss_clean($this->input->post('details'));
      $schedule = $this->security->xss_clean($this->input->post('schedule'));
      $location = $this->security->xss_clean($this->input->post('location'));

      $this->form_validation->set_rules('event_code', 'Event Name', 'required|trim|strip_tags');
      $this->form_validation->set_rules('event_name', 'Event Name', 'required|trim|strip_tags');
      $this->form_validation->set_rules('details', 'Details', 'required|trim|strip_tags');
      $this->form_validation->set_rules('schedule', 'Schedule', 'required|trim|strip_tags');
      $this->form_validation->set_rules('location', 'Location', 'required|trim|strip_tags');

      if($this->form_validation->run() == FALSE) {
        $event = $this->event_model->fetch($id);
        $this->load->view('admin/view/event_page', array('event' => $event));
      }else {
        $newData = array(
          'name' => $name,
          'code' => $code,
          'details' => $details,
          'schedule' => $schedule,
          'location' => $location
        );
        $new = $this->event_model->update($id, $newData);

        if($new) {
          redirect('admin/view_all/events');
        }else {
          show_404();
        }
      }
      $this->load->view('footer');
    }else {
      redirect(base_url('admin/view_all/events'));
    }
  }

  function logout(){
    $this->session->sess_destroy();
    redirect('admin');
  }

}
