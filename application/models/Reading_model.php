<?php
/**
 * Reading Model
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Reading_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    function edit_reading_settings(){
        $this->db->set('setting_value', $this->input->post('posts_per_page'));
        $this->db->where('setting_name', 'posts_per_page');
        $this->db->update($this->table_settings);

        $this->db->set('setting_value', $this->input->post('feed_show_count'));
        $this->db->where('setting_name', 'feed_show_count');
        $this->db->update($this->table_settings);

        $this->db->set('setting_value', $this->input->post('feed_use_excerpt'));
        $this->db->where('setting_name', 'feed_use_excerpt');
        $this->db->update($this->table_settings);

        if($this->input->post('search_engine_visibility')){
            $search_engine_visibility=1;
        }else{
            $search_engine_visibility=0;
        }
        $this->db->set('setting_value', $search_engine_visibility);
        $this->db->where('setting_name', 'search_engine_visibility');
        $this->db->update($this->table_settings);
    }
}