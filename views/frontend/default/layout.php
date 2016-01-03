<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('frontend/default/header');
$this->load->view('frontend/default/container/'.$container);
$this->load->view('frontend/default/sidebar/sidebar');
$this->load->view('frontend/default/footer');