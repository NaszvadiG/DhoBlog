<?php
/**
 * Install Helper
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('write_database_config')){
    function write_database_config($data) {
		$template_path 	= APPPATH.'config/database_sample.php';
		$output_path 	= APPPATH.'config/database.php';

		$database_file = file_get_contents($template_path);

        if(isset($data['database_hostname'])){
            $database_file= str_replace("%HOSTNAME%",$data['database_hostname'],$database_file);
        }
        if(isset($data['database_username'])){
            $database_file= str_replace("%USERNAME%",$data['database_username'],$database_file);
        }
        if(isset($data['database_password'])){
            $database_file= str_replace("%PASSWORD%",$data['database_password'],$database_file);
        }
        if(isset($data['database_name'])){
            $database_file= str_replace("%DATABASE%",$data['database_name'],$database_file);
        }
        if(isset($data['table_prefix'])){
            $database_file= str_replace("%PREFIX%",$data['table_prefix'],$database_file);
        }

		$handle = fopen($output_path,'w+');
		@chmod($output_path,0777);

		if(is_writable($output_path)) {
			if(fwrite($handle,$database_file)) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
}
if ( ! function_exists('write_dhoblog_config')){
    function write_dhoblog_config($data) {
		$template_path 	= APPPATH.'config/dhoblog_sample.php';
		$output_path 	= APPPATH.'config/dhoblog.php';

	}
}
if ( ! function_exists('write_install_lock')){
    function write_install_lock() {
		$output_path 	= APPPATH.'controllers/install/lock';

        $handle = fopen($output_path,'w+');
        @chmod($output_path,0777);
        fwrite($handle,'installed');
	}
}