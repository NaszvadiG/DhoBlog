<?php
/**
 * Permalinks Controller
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Permalinks extends Backend {

    public function __construct(){
        parent::__construct();
        $this->load->model('permalinks_model');
    }
    public function index(){
	    $data['title']="Permalinks";

        if ($this->input->post('submit')) {
            $this->permalinks_model->edit_permalink_settings();
            $this->sites->get_site_settings();
		}
        $data['container']="admin/permalinks";
        $this->themes->load($data,TRUE);
	}

}