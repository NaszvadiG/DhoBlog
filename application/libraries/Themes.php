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
    public function load($data=NULL,$admin=FALSE){
        if($admin==TRUE){
            $theme=$this->CI->frontend_theme;
            $this->CI->load->view('backend/'.$theme.'/layout', $data);
        }else{
            $theme=$this->CI->backend_theme;
            $this->CI->load->view('frontend/'.$theme.'/layout', $data);
        }
    }
}