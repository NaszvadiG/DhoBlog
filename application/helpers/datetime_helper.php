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
    function human_date($timestamp){
        $CI=& get_instance();
        return date($CI->date_format,$timestamp);
    }
}
if ( ! function_exists('human_time')) {
    function human_time($timestamp){
        $CI=& get_instance();
        return date($CI->time_format,$timestamp);
    }
}
if ( ! function_exists('human_datetime')) {
    function human_datetime($timestamp){
        $CI=& get_instance();
        return date($CI->date_format.' '.$CI->time_format,$timestamp);
    }
}
if ( ! function_exists('date_slug')) {
    function date_slug($timestamp){
        return date('Y/m/d',$timestamp);
    }
}