<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permalinks extends Backend {

    public function __construct(){
        parent::__construct();
        $this->load->model('permalinks_model');
    }
    public function index(){
	    $data['title']="Permalinks";
        $data['permalinks']=$this->permalinks_model->get_permalink_settings();

        if ($this->input->post('submit')) {
            $this->permalinks_model->edit_permalink_settings();
            $data['permalinks']=$this->permalinks_model->get_permalink_settings();
		}
        $data['container']="admin/permalinks";
        $this->themes->load($data,TRUE);
	}

}