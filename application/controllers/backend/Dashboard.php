<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library(array('themes','form_validation'));
        $this->load->model(array('categories_model','posts_model'));
    }
    public function index(){
	    $data['title']="Dashboard";
        $data['container']="admin/home";
	    $this->themes->load($data,TRUE);
	}

}