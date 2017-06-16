<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLogin extends CI_Controller {

  function __construct() {
      parent::__construct();
  }

	public function index($msg = NULL) {
		$data['msg'] = $msg;

		$this->load->view('header');
    $this->load->view('styles/admin');
		$this->load->view('admin/login_page', $data);
		$this->load->view('footer');
	}

  public function login(){
    $resultCode = $this->admin_model->validate();

    switch ($resultCode) {
      case 0:
        # code... No Errors
        redirect('admin/dashboard');
        break;
      case 1:
        # code... Wrong Password
        $this->index('Wrong Password');
        break;
      case 2:
        # code... Account does not exist
        $this->index('Account does not exist');
        break;
      case 3:
        # code... Empty Username
        $this->index('Username cannot be empty');
        break;
      case 4:
        # code... Empty Password
        $this->index('Password cannot be empty');
        break;
    }
  }

}
