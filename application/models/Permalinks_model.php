<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permalinks_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get_permalink_settings($blog_id){
        $this->db->where_in('setting_name', array('post_permalink','category_permalink','page_permalink','tag_permalink'));

        if($this->config->item('blog_id_current_site')==$blog_id){
            $query = $this->db->get('settings');
        }else{
            $query = $this->db->get($blog_id.'_settings');
        }
        $result=array();
		foreach ( $query->result_array () as $row ) {
			$result [$row['setting_name']] = $row['setting_value'];
		}
		return $result;
    }
    function edit_permalink_settings($blog_id){
        if($this->config->item('blog_id_current_site')==$blog_id){
            $this->db->set('setting_value', $this->input->post('post_permalink'));
            $this->db->where('setting_name', 'post_permalink');
            $this->db->update('settings');

            if($this->input->post('category_permalink')==="category_custom"){
                $this->db->set('setting_value', $this->input->post('category_custom_permalink'));
            }else{
                $this->db->set('setting_value', $this->input->post('category_permalink'));
            }
            $this->db->where('setting_name', 'category_permalink');
            $this->db->update('settings');

            if($this->input->post('page_permalink')==="page_custom"){
                $this->db->set('setting_value', $this->input->post('page_custom_permalink'));
            }else{
                $this->db->set('setting_value', $this->input->post('page_permalink'));
            }
            $this->db->where('setting_name', 'page_permalink');
            $this->db->update('settings');

            if($this->input->post('tag_permalink')==="tag_custom"){
                $this->db->set('setting_value', $this->input->post('tag_custom_permalink'));
            }else{
                $this->db->set('setting_value', $this->input->post('tag_permalink'));
            }
            $this->db->where('setting_name', 'tag_permalink');
            $this->db->update('settings');
        }else{
            $this->db->set('setting_value', $this->input->post('post_permalink'));
            $this->db->where('setting_name', 'post_permalink');
            $this->db->update($blog_id.'_settings');

            if($this->input->post('category_permalink')==="category_custom"){
                $this->db->set('setting_value', $this->input->post('category_custom_permalink'));
            }else{
                $this->db->set('setting_value', $this->input->post('category_permalink'));
            }
            $this->db->where('setting_name', 'category_permalink');
            $this->db->update($blog_id.'_settings');

            if($this->input->post('page_permalink')==="page_custom"){
                $this->db->set('setting_value', $this->input->post('page_custom_permalink'));
            }else{
                $this->db->set('setting_value', $this->input->post('page_permalink'));
            }
            $this->db->where('setting_name', 'page_permalink');
            $this->db->update($blog_id.'_settings');

            if($this->input->post('tag_permalink')==="tag_custom"){
                $this->db->set('setting_value', $this->input->post('tag_custom_permalink'));
            }else{
                $this->db->set('setting_value', $this->input->post('tag_permalink'));
            }
            $this->db->where('setting_name', 'tag_permalink');
            $this->db->update($blog_id.'_settings');
        }
    }
}