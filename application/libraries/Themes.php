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
            $theme=$this->CI->backend_theme;
            $this->CI->load->view('backend/'.$theme.'/layout', $data);
        }else{
            $theme=$this->CI->frontend_theme;
            $this->CI->load->view('frontend/'.$theme.'/layout', $data);
        }
    }
    public function theme_info($theme,$section){
        if($section=="backend"){
            require_once("views/backend/".$theme."/index.php");
            return $info;
        }elseif($section=="frontend"){
            require_once("views/frontend/".$theme."/index.php");
            return $info;
        }
    }
    public function get_themes($section){
        if($section=="backend"){
            $data=glob(FCPATH."/views/backend/*",GLOB_ONLYDIR);
    		$themes=array();
    		foreach($data as $index => $theme){
                $name=str_replace(FCPATH."/views/backend/", '', $theme);
                $themes[$index]['theme_name']=$name;
    			$themes[$index]['theme_screenshot']=base_url('views/backend/'.$name.'/screenshot.png');
    			$themes[$index]['info']=$this->theme_info($name,$section);
    		}
    		return $themes;
        }elseif($section=="frontend"){
            $data=glob(FCPATH."/views/frontend/*",GLOB_ONLYDIR);
    		$themes=array();
    		foreach($data as $index => $theme){
                $name=str_replace(FCPATH."/views/frontend/", '', $theme);
                $themes[$index]['theme_name']=$name;
    			$themes[$index]['theme_screenshot']=base_url('views/frontend/'.$name.'/screenshot.png');
    			$themes[$index]['info']=$this->theme_info($name,$section);
    		}
    		return $themes;
        }
	}
    public function switch_theme($section){
        if($section=="backend"){
            $this->CI->db->set('setting_value', $this->CI->input->post('backend_theme'));
            $this->CI->db->where('setting_name', 'backend_theme');
        }elseif($section=="frontend"){
            $this->CI->db->set('setting_value', $this->CI->input->post('frontend_theme'));
            $this->CI->db->where('setting_name', 'frontend_theme');
        }
        $this->CI->db->update($this->CI->table_settings);
    }
}