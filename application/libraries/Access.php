<?php
/**
 * Access Library
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Access {
    public function __construct(){
		$this->CI =& get_instance();
	}
    public function is_logged_in(){
		if ($this->CI->session->userdata('logged_in') === 1){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	public function is_role($role){
		if ($this->CI->session->userdata('level') === $role){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}