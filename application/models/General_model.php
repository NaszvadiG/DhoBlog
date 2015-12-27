<?php
/**
 * General Model
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class General_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    function edit_general_settings(){
        $this->db->set('setting_value', $this->input->post('blog_title'));
        $this->db->where('setting_name', 'blog_title');
        $this->db->update($this->table_settings);

        $this->db->set('setting_value', $this->input->post('blog_tagline'));
        $this->db->where('setting_name', 'blog_tagline');
        $this->db->update($this->table_settings);

        $this->db->set('setting_value', $this->input->post('blog_description'));
        $this->db->where('setting_name', 'blog_description');
        $this->db->update($this->table_settings);

        $this->db->set('setting_value', $this->input->post('blog_keywords'));
        $this->db->where('setting_name', 'blog_keywords');
        $this->db->update($this->table_settings);

        $this->db->set('setting_value', $this->input->post('blog_url'));
        $this->db->where('setting_name', 'blog_url');
        $this->db->update($this->table_settings);

        $this->db->set('setting_value', $this->input->post('admin_email'));
        $this->db->where('setting_name', 'admin_email');
        $this->db->update($this->table_settings);

        $this->db->set('setting_value', $this->input->post('timezone'));
        $this->db->where('setting_name', 'timezone');
        $this->db->update($this->table_settings);

        $this->db->set('setting_value', $this->input->post('date_format'));
        $this->db->where('setting_name', 'date_format');
        $this->db->update($this->table_settings);

        $this->db->set('setting_value', $this->input->post('time_format'));
        $this->db->where('setting_name', 'time_format');
        $this->db->update($this->table_settings);
    }
}