<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();
$autoload['libraries'] = array('database', 'session', 'devops', 'form_validation', 'encrypt');
$autoload['drivers'] = array();
$autoload['helper'] = array('url', 'form');
$autoload['config'] = array();
$autoload['language'] = array();
$autoload['model'] = array('teacher_model', 'student_model', 'log_model', 'group_model', 'admin_model', 'account_model', 'event_model', 'poll_model');
