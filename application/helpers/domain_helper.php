<?php
/**
 * Domain Helper
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('get_domain')) {
    function get_domain($url){
        $host = @parse_url($url, PHP_URL_HOST);
        if (!$host){
            $host = $url;
        }
        if (substr($host, 0, 4) == "www."){
            $host = substr($host, 4);
        }
        if (strlen($host) > 50){
            $host = substr($host, 0, 47) . '...';
        }
        return $host;
    }
}
if ( ! function_exists('get_subdomain')) {
    function get_subdomain($url){
        $domain=$this->get_domain($url);
        preg_match('/([^\.]+)\.[^\.]+\.[^\.]+$/', $domain, $rgMatches);
        $sDomain = count($rgMatches)?$rgMatches[1]:null;
        return $sDomain;
    }
}