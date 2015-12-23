<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permalinks extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library(array('themes'));
        $this->load->model(array('permalinks_model'));
    }
    public function index(){
	    $data['title']="Permalinks";
        $data['permalinks']=$this->permalinks_model->get_permalinks(1);

        if ($this->input->post('submit')) {
            $this->permalinks_model->edit_permalinks(1);
            $data['permalinks']=$this->permalinks_model->get_permalinks(1);
		}
        $data['container']="admin/permalinks";
        $this->themes->load($data,TRUE);
	}

}