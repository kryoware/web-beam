<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TeacherLogin extends CI_Controller {

  function __construct() {
      parent::__construct();
  }

	public function index($msg = NULL) {
		$data['msg'] = $msg;

		$this->load->view('header');
    $this->load->view('styles/teacher');
		$this->load->view('teacher/login_page', $data);
		$this->load->view('footer');
	}

  public function login(){
    // Load the model
    $this->load->model('teacher_model');
    // Validate the user can login
    $resultCode = $this->teacher_model->validate();
    // Now we verify the result
    switch ($resultCode) {
      case 0:
        # code... No Errors
        redirect('teacher/dashboard');
        break;
      case 1:
        # code... Wrong Password
        $this->index('Password is incorrect');
        break;
      case 2:
        # code... Account does not exist
        $this->index('Account does not exist');
        break;
      case 3:
        # code... Empty Username
        $this->index('ID Number cannot be empty');
        break;
      case 4:
        # code... Empty Password
        $this->index('Password cannot be empty');
        break;
    }
  }

}
