<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('backend/default/header');
$this->load->view('backend/default/sidebar/sidebar');
$this->load->view('backend/default/container/'.$container);
$this->load->view('backend/default/footer');