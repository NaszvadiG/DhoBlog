<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library(array('themes'));
        $this->load->model(array('general_model'));
    }
    public function index(){
	    $data['title']="General";
        $data['general']=$this->general_model->get_general_settings(1);

        if ($this->input->post('submit')) {
            $this->general_model->edit_general_settings(1);
            $data['general']=$this->general_model->get_general_settings(1);
		}
        $data['container']="admin/general";
        $this->themes->load($data,TRUE);
	}

}