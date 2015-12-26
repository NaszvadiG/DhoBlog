<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General extends Backend {

    public function __construct(){
        parent::__construct();
        $this->load->model('general_model');
        $this->load->helper('timezone');
    }
    public function index(){
	    $data['title']="General";
        $data['general']=$this->general_model->get_general_settings();
        $data['timezone']=get_timezone_lists();
        if ($this->input->post('submit')) {
            $this->general_model->edit_general_settings();
            $data['general']=$this->general_model->get_general_settings();
		}
        $data['container']="admin/general";
        $this->themes->load($data,TRUE);
	}

}