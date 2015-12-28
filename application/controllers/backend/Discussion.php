<?php
/**
 * Discussion Controller
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Discussion extends Backend {

    public function __construct(){
        parent::__construct();
        $this->load->model('discussion_model');
    }
    public function index(){
	    $data['title']="Discussion";

        if ($this->input->post('submit')) {
            $this->discussion_model->edit_discussion_settings();
            $this->sites->get_site_settings();
		}
        $data['container']="admin/discussion";
        $this->themes->load($data,TRUE);
	}

}