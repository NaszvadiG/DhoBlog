<?php
/**
 * Themes Library
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Themes {

    public function __construct(){
		$this->CI =& get_instance();
	}
    public function get_default_theme(){
		$theme=array(
               "backend"=>"default",
               "frontend"=>"default"
        );
		return $theme;
	}
    public function load($data=NULL,$admin=FALSE){
        $theme=$this->get_default_theme();
        if($admin==TRUE){
            $this->CI->load->view('backend/'.$theme['backend'].'/layout', $data);
        }else{
            $this->CI->load->view('frontend/'.$theme['frontend'].'/layout', $data);
        }

    }
}