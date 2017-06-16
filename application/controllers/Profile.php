<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

  function __construct() {
    parent::__construct();
    // $this->form_validation->set_error_delimiters('<div class="form-error"><p>', '</p></div>');
    $this->form_validation->set_error_delimiters('', '<br>');
    $this->form_validation->set_message('required', '{field} cannot be empty');
    $this->form_validation->set_message('matches', 'Passwords do not match');
    $this->form_validation->set_message('is_unique', '{field} already in use');
  }

	public function index() {	}

  public function verify_number() {
    $this->load->view('header');

    if($_SESSION['isAdmin']) {
      $user = 'admin';
      $this->load->view('styles/admin');
    }else if($_SESSION['isStudent']) {
      $user = 'student';
      $this->load->view('styles/student');
    }else if($_SESSION['isTeacher']) {
      $user = 'teacher';
      $this->load->view('styles/teacher');
    }

    $old = $this->account_model->fetchCol('phone_number', $this->session->userdata('id'));
    $q = $this->account_model->fetchCode($old->phone_number);

    $this->form_validation->set_rules('code', 'Verification Code', 'required|trim|strip_tags');
    $code = $this->security->xss_clean($this->input->post('code'));

    if($this->form_validation->run() === FALSE) {
      $u = $this->account_model->fetch($this->session->userdata('id'));
      $this->load->view('common/profile_page', array('data' => $u));
    }else {
      if($q->verification_code === $code) {
        // Delete from pending
        $this->db->where('phone_number', $old->phone_number)->delete('accounts_pending');
        // Update verified, last verified
        $userdata = array(
          'verified_user' => 1
        );
        $userUpdate = $this->account_model->update($this->session->userdata('id'), $userdata);
        redirect(base_url($user.'/profile'));
      }else {
        // Codes do not match
        $this->session->set_flashdata('flash_error', 'Incorrect Verification Code');
        redirect(base_url($user.'/profile'));
      }
    }
    $this->load->view('footer');
  }


  public function change_number() {
    $this->load->view('header');

    if($_SESSION['isAdmin']) {
      $user = 'admin';
      $this->load->view('styles/admin');
    }else if($_SESSION['isStudent']) {
      $user = 'student';
      $this->load->view('styles/student');
    }else if($_SESSION['isTeacher']) {
      $user = 'teacher';
      $this->load->view('styles/teacher');
    }

    $old = $this->account_model->fetchCol('phone_number', $this->session->userdata('id'));

    $this->form_validation->set_rules('new_number', 'Phone Number', 'required|trim|strip_tags');

    $new = $this->security->xss_clean($this->input->post('new_number'));

    if($this->form_validation->run() === FALSE) {
      $u = $this->account_model->fetch($this->session->userdata('id'));
      $this->load->view('common/profile_page', array('data' => $u));
    }else {
      $check = $this->account_model->doesExist('phone_number', $new);

      if($check) {
        $this->session->set_flashdata('flash_error', 'Phone Number already in use');
        redirect(base_url($user.'/profile'));
      }else {
        $phone = array(
          'phone_number' => $new,
          'verified_user' => 0,
          'last_verified' => null
        );
        $query = $this->account_model->update($this->session->userdata('id'), $phone);
        if($query) {
          $this->session->set_flashdata('flash_success', '<span class="mdl-color-text--green-700">Phone Number updated successfully!</span>');

          $code = $this->devops->generate(6);

          // Pending User
          $pendingUserData = array(
            'phone_number' => $new,
            'verification_code' => $code
          );

          $this->student_model->newPending($pendingUserData);

          redirect(base_url($user.'/profile'));
        }else {
          show_404();
        }
      }
    }
    $this->load->view('footer');
  }

  public function change_password() {
    $this->load->view('header');

    if($_SESSION['isAdmin']) {
      $user = 'admin';
      $this->load->view('styles/admin');
    }else if($_SESSION['isStudent']) {
      $user = 'student';
      $this->load->view('styles/student');
    }else if($_SESSION['isTeacher']) {
      $user = 'teacher';
      $this->load->view('styles/teacher');
    }

    $this->form_validation->set_rules('curr', 'Current Password', 'required|trim|strip_tags');
    $this->form_validation->set_rules('pass', 'Password', 'required|trim|strip_tags');
    $this->form_validation->set_rules('repw', 'Re-enter Password', 'required|trim|strip_tags|matches[pass]');

    $curr = $this->security->xss_clean($this->input->post('curr'));
    $pass = $this->security->xss_clean($this->input->post('pass'));
    $repw = $this->security->xss_clean($this->input->post('repw'));

    if($this->form_validation->run() === FALSE) {
      $fetchUser = $this->account_model->fetch($this->session->userdata('id'));
      $this->load->view('common/profile_page', array('data' => $fetchUser));
    }else {
      $hash = $this->account_model->fetchCol('password_hash', $this->session->userdata('id'));

      if(password_verify($curr, $hash->password_hash)) {
        $userData = array(
          'password_hash' => password_hash($pass, PASSWORD_BCRYPT)
        );

        $query = $this->account_model->update($this->session->userdata('id'), $userData);
        if($query) {
          $this->session->set_flashdata('flash_success2', '<span class="mdl-color-text--green-700">Password updated successfully!</span>');
          redirect(base_url($user.'/profile'));
        }
      }else {
        $this->session->set_flashdata('flash_error2', 'Current Password is wrong');
        redirect(base_url($user.'/profile'));
      }

    }
    $this->load->view('footer');
  }

}
