<?php
/**
 * Settings Library
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings{
    public function __construct(){
		$this->CI =& get_instance();
	}
    public function get_blog_settings($blog_id){
        return $this->CI->settings_model->get_blog_settings($blog_id);
    }
}