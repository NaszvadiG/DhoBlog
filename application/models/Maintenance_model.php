<?php
/**
 * Maintenance Model
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    function edit_maintenance_settings(){
        if($this->input->post('blog_offline')){
            $blog_offline=1;
        }else{
            $blog_offline=0;
        }
        $this->db->set('setting_value', $blog_offline);
        $this->db->where('setting_name', 'blog_offline');
        $this->db->update($this->table_settings);

        $this->db->set('setting_value', $this->db->escape_str($this->input->post('offline_reason')));
        $this->db->where('setting_name', 'offline_reason');
        $this->db->update($this->table_settings);
    }
}