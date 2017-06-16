<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Devops {

  // Generates X-digit codes
  public function generate($digits) {
    return rand(pow(10, $digits - 1) - 1, pow(10, $digits) - 1);
  }
  
}
