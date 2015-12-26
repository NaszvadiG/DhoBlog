<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Backend {

    public function __construct(){
        parent::__construct();
    }
    public function index(){
	    $data['title']="Dashboard";
        $data['container']="admin/home";
	    $this->themes->load($data,TRUE);
	}

}