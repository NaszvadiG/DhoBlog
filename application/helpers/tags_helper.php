<?php
/**
 * Tags Helper
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('parse_tags')) {
    function parse_tags($tags){
      	$tags = str_replace(' ', '', $tags);
		$tags = explode(',', $tags);
		return $tags;
    }
}