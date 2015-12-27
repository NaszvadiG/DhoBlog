<?php
/**
 * Frontendthemes Controller
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontendthemes extends Backend {

    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $data['title']="Frontend Themes";

        if($this->input->post('activate')){
            $this->themes->switch_theme('frontend');
        }

        $data['themes']=$this->themes->get_themes('frontend');
        $data['container']="admin/frontend";
        $this->themes->load($data,TRUE);
	}
}