<?php
/**
 * Backendthemes Controller
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Backendthemes extends Backend {

    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $data['title']="Backend Themes";

        if($this->input->post('activate')){
            $this->themes->switch_theme('backend');
            $this->sites->get_site_settings();
        }

        $data['themes']=$this->themes->get_themes('backend');
        $data['container']="admin/backend";
        $this->themes->load($data,TRUE);
	}
}