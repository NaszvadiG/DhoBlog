<?php
/**
 * Themes Library
 *
 * @author Dhosoft Community
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Themes {

    public function load_front_theme($theme,$part,$data){
        $CI=& get_instance();
        require_once("views/frontend/".$theme."/functions.php");
        $function="theme_".$part;
        foreach($function() as $func){
                $CI->load->view ('frontend/default/'.$func,$data);
        }
    }
	public function load_back_theme($theme,$part,$data){
	    $CI=& get_instance();
        require_once("views/backend/".$theme."/functions.php");
        $function="theme_".$part;
        foreach($function() as $func){
                $CI->load->view ('backend/default/'.$func,$data);
        }
    }
}