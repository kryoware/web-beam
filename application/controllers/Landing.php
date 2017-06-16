<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

  function __construct() {
      parent::__construct();
  }

	public function index() {
    $this->load->view('header');
		$this->load->view('styles/base');
		$this->load->view('home_page');
		$this->load->view('footer');
	}

	public function help() {
    $this->load->view('header');
		$this->load->view('styles/base');
		$this->load->view('help_page');
		$this->load->view('footer');
	}

}
