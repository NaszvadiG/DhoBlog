<?php
/**
 * Reading Controller
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Reading extends Backend {

    public function __construct(){
        parent::__construct();
        $this->load->model('reading_model');
    }
    public function index(){
	    $data['title']="Reading";

        if ($this->input->post('submit')) {
            $this->reading_model->edit_reading_settings();
            $this->sites->get_site_settings();
		}
        $data['container']="admin/reading";
        $this->themes->load($data,TRUE);
	}

}