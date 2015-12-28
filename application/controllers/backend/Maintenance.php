<?php
/**
 * Maintenance Controller
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance extends Backend {

    public function __construct(){
        parent::__construct();
        $this->load->model('maintenance_model');
    }
    public function index(){
	    $data['title']="Maintenance";

        if ($this->input->post('submit')) {
            $this->maintenance_model->edit_maintenance_settings();
            $this->sites->get_site_settings();
		}
        $data['container']="admin/maintenance";
        $this->themes->load($data,TRUE);
	}

}