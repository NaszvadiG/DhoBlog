<?php
/**
 * Datetime Helper
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('unix_to_human_date')) {
    function unix_to_human_date($timestamp){
        return date('F j, Y',$timestamp);
    }
}
if ( ! function_exists('unix_to_human_time')) {
    function unix_to_human_time($timestamp){
        return date('h:i:s a',$timestamp);
    }
}
if ( ! function_exists('unix_to_date_slug')) {
    function unix_to_date_slug($timestamp){
        return date('Y/m/d',$timestamp);
    }
}