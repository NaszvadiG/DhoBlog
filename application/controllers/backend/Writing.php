<?php
/**
 * Writing Controller
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Writing extends Backend {

    public function __construct(){
        parent::__construct();
        $this->load->model('writing_model');
    }
    public function index(){
	    $data['title']="Writing";
        $data['categories']=$this->categories_model->get_categories();
        if ($this->input->post('submit')) {
            $this->writing_model->edit_writing_settings();
            $this->sites->get_site_settings();
		}
        $data['container']="admin/writing";
        $this->themes->load($data,TRUE);
	}

}