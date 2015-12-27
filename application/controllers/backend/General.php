<?php
/**
 * General Controller
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class General extends Backend {

    public function __construct(){
        parent::__construct();
        $this->load->model('general_model');
        $this->load->helper('timezone');
    }
    public function index(){
	    $data['title']="General";

        $data['timezone']=get_timezone_lists();
        if ($this->input->post('submit')) {
            $this->general_model->edit_general_settings();
            $this->sites->get_site_settings();
		}
        $data['container']="admin/general";
        $this->themes->load($data,TRUE);
	}

}