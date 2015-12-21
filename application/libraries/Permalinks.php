<?php
/**
 * Permalinks Library
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Permalinks{
    public function __construct(){
		$this->CI =& get_instance();
        $this->CI->load->helper('datetime');
	}
    public function get_default_post_permalink(){
        return "postname";
    }
    public function get_default_category_permalink(){
        return "category";
    }
    public function get_post_permalinks($post_id,$post_date,$post_slug){
        $default_permalink=$this->get_default_post_permalink();
        $permalink="";
        if($default_permalink=="datename"){
            $permalink=base_url(unix_to_date_slug($post_date).'/'.$post_slug.'.html');
        }elseif($default_permalink=="numeric"){
            $permalink=base_url('post/'.$post_id);
        }elseif($default_permalink=="postname"){
            $permalink=base_url($post_slug.'.html');
        }
        return $permalink;
    }
    public function get_page_permalinks($post_slug){
        return $permalink=base_url($post_slug.'.html');
    }
    public function get_category_permalinks($category_slug){
        $default_permalink=$this->get_default_category_permalink();
        $permalink=base_url($default_permalink.'/'.$category_slug);
        return $permalink;
    }
}