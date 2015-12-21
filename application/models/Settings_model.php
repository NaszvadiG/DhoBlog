<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get_blog_settings($blog_id){
        if($this->config->item('blog_id_current_site')==$blog_id){
            $query = $this->db->get('settings');
        }else{
            $query = $this->db->get($blog_id.'_settings');
        }
		foreach ( $query->result_array () as $row ) {
			$result [$row['setting']] = $row['value'];
		}
		return $result;
    }
}