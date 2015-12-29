<?php
/**
 * Tools Helper
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('get_ip')) {
    function get_ip() {
		if (function_exists ( 'apache_request_headers' )) {
			$headers = apache_request_headers ();
		} else {
			$headers = $_SERVER;
		}
		if (array_key_exists ( 'X-Forwarded-For', $headers ) && filter_var ( $headers ['X-Forwarded-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 )) {
			$the_ip = $headers ['X-Forwarded-For'];
		} elseif (array_key_exists ( 'HTTP_X_FORWARDED_FOR', $headers ) && filter_var ( $headers ['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 )) {
			$the_ip = $headers ['HTTP_X_FORWARDED_FOR'];
		} else {
			$the_ip = filter_var ( $_SERVER ['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 );
		}
		return $the_ip;
	}
}