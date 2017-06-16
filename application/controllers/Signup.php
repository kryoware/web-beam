<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

  function __construct() {
    parent::__construct();
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

	public function index() {	}

  public function student_signup() {
    $this->load->view('header');
    $this->load->view('styles/student');
    $this->load->view('student/signup_page');
    $this->load->view('footer');
  }

  public function student_process() {
    $this->load->view('header');
    $this->load->view('styles/student');
    // Get Inputs
    $username = $this->input->post('username');
    $phoneNum = $this->input->post('phone_num');
    $password = $this->input->post('password');
    $firstName = $this->input->post('first_name');
    $middleName = $this->input->post('middle_name');
    $lastName = $this->input->post('last_name');
    $course = $this->input->post('course');
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
    $year = $this->input->post('year');

    $this->form_validation->set_rules('username', 'ID Number', 'required|trim|strip_tags|numeric|is_unique[accounts_students.username]');
    $this->form_validation->set_rules('phone_num', 'Phone Number', 'required|trim|strip_tags|is_unique[accounts_students.phone_number]');
    $this->form_validation->set_rules('password', 'Password', 'required|trim|strip_tags');
    $this->form_validation->set_rules('password2', 'Re-Enter Password', 'required|trim|strip_tags|matches[password]');
    $this->form_validation->set_rules('first_name', 'First Name', 'required|trim|strip_tags');
    $this->form_validation->set_rules('middle_name', 'Middle Name', 'required|trim|strip_tags');
    $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim|strip_tags');
    $this->form_validation->set_rules('course', 'Course', 'required|trim|strip_tags');
    $this->form_validation->set_rules('year', 'Year', 'required|integer|trim|strip_tags');

    if($this->form_validation->run() == FALSE) {
      $this->load->view('student/signup_page');
    }else {
      $newStudentData = array(
        'username' => $username,
        'password_hash' => password_hash($password, PASSWORD_BCRYPT),
        'first_name' => $firstName,
        'middle_name' => $middleName,
        'last_name' => $lastName,
        'phone_number' => $phoneNum,
        'year_level' => $year,
        'course_abv' => $course_abv,
        'course' => $course
      );
      $newStudent = $this->student_model->create($newStudentData);
      if($newStudent) {
        $action = array(
          'admin_id' => $_SESSION['id'],
          'action' => 'Registered Student: ID# '.$username.' "'.$lastName.', '.$firstName.'"'
        );
        $this->log_model->action($action);
        $code = $this->devops->generate(6);
        $pendingUserData = array(
          'phone_number' => $phoneNum,
          'verification_code' => $code
        );

        $this->student_model->newPending($pendingUserData);

        redirect('admin/view_all/students');
      }else { show_404(); }
    }
    $this->load->view('footer');
  }

  public function teacher_signup(){
    $this->load->view('header');
    $this->load->view('styles/teacher');
    $this->load->view('teacher/signup_page');
    $this->load->view('footer');
  }

  public function teacher_process(){
    $this->load->view('header');
    $this->load->view('styles/teacher');
    $this->form_validation->set_rules('username', 'ID Number', 'required|trim|strip_tags|numeric|is_unique[accounts_teachers.username]');
    $this->form_validation->set_rules('phone_num', 'Phone Number', 'required|trim|strip_tags|is_unique[accounts_teachers.phone_number]');
    $this->form_validation->set_rules('department', 'Department', 'required|trim|strip_tags');
    $this->form_validation->set_rules('password', 'Password', 'required|trim|strip_tags|min_length[8]|max_length[24]');
    $this->form_validation->set_rules('password2', 'Re-Enter Password', 'required|trim|strip_tags|min_length[8]|max_length[24]|matches[password]');
    $this->form_validation->set_rules('first_name', 'First Name', 'required|trim|strip_tags');
    $this->form_validation->set_rules('middle_name', 'Middle Name', 'required|trim|strip_tags');
    $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim|strip_tags');

    $username = !is_null($this->input->post('username')) ? $this->input->post('username') : null;
    $password = $this->input->post('password');
    $firstName = $this->input->post('first_name');
    $middleName = $this->input->post('middle_name');
    $lastName = $this->input->post('last_name');
    $department = $this->input->post('department');
    $phoneNum = $this->input->post('phone_num');

    if($this->form_validation->run() == FALSE) {
      $this->load->view('teacher/signup_page');
    }else {
      $newTeacherData = array(
        'username' => $username,
        'password_hash' => password_hash($password, PASSWORD_BCRYPT),
        'first_name' => $firstName,
        'middle_name' => $middleName,
        'last_name' => $lastName,
        'department' => $department,
        'phone_number' => $phoneNum
      );
      var_dump($newTeacherData);
      $newTeacher = $this->teacher_model->create($newTeacherData);
      if($newTeacher) {
        $action = array(
          'admin_id' => $_SESSION['id'],
          'action' => 'Registered Teacher: ID# '.$username.' "'.$lastName.', '.$firstName.'"'
        );
        $this->log_model->action($action);
        $code = $this->devops->generate(6);
        $pendingUserData = array(
          'phone_number' => $phoneNum,
          'verification_code' => $code
        );
        $this->student_model->newPending($pendingUserData);
        redirect('admin/view_all/teachers');
      }else { show_404(); }
    }
    $this->load->view('footer');
  }

  public function admin_signup(){
    if(!$this->session->userdata('isAdmin')) show_404();
    else {
      $this->load->view('header');
      $this->load->view('styles/admin');
      $this->load->view('admin/signup_page');
      $this->load->view('footer');
    }
  }

  public function admin_process(){
    $this->load->view('header');
    $this->load->view('styles/admin');
    $this->form_validation->set_rules('username', 'ID Number', 'required|trim|strip_tags|numeric|min_length[5]|max_length[5]|is_unique[accounts_admins.username]');
    $this->form_validation->set_rules('phone_num', 'Phone Number', 'required|trim|strip_tags|is_unique[accounts_admins.phone_number]');
    $this->form_validation->set_rules('department', 'Department', 'required|trim|alpha|strip_tags|min_length[2]|max_length[5]');
    $this->form_validation->set_rules('password', 'Password', 'required|trim|strip_tags');
    $this->form_validation->set_rules('password2', 'Re-Enter Password', 'required|trim|strip_tags|matches[password]');
    $this->form_validation->set_rules('first_name', 'First Name', 'required|trim|strip_tags|alpha|min_length[2]');
    $this->form_validation->set_rules('middle_name', 'Middle Name', 'required|trim|strip_tags|alpha|min_length[2]');
    $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim|strip_tags|alpha|min_length[2]');

    $username = !is_null($this->input->post('username')) ? $this->input->post('username') : null;
    $password = $this->input->post('password');
    $firstName = $this->input->post('first_name');
    $middleName = $this->input->post('middle_name');
    $lastName = $this->input->post('last_name');
    $phoneNum = $this->input->post('phone_num');
    $phoneNum = $this->input->post('department');

    if($this->form_validation->run() == FALSE) {
      $this->load->view('admin/signup_page');
    }else {
      $newAdminData = array(
        'username' => $username,
        'password_hash' => password_hash($password, PASSWORD_BCRYPT),
        'first_name' => $firstName,
        'middle_name' => $middleName,
        'last_name' => $lastName,
        'department' => $department,
        'phone_number' => $phoneNum
      );
      $newAdmin = $this->admin_model->create($newAdminData);
      if($newAdmin) {
        $action = array(
          'admin_id' => $_SESSION['id'],
          'action' => 'Registered Admin: ID# '.$username.' "'.$lastName.', '.$firstName.'"'
        );
        $this->log_model->action($action);
        $code = $this->devops->generate(6);
        $pendingUserData = array(
          'phone_number' => $phoneNum,
          'verification_code' => $code
        );
        $this->student_model->newPending($pendingUserData);
        redirect(base_url('admin'));
      }else { show_404(); }
    }
    $this->load->view('footer');
  }
}
