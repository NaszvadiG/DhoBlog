<?php
/**
 * Writing Model
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Writing_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    function edit_writing_settings(){
        $this->db->set('setting_value', $this->input->post('default_category'));
        $this->db->where('setting_name', 'default_category');
        $this->db->update($this->table_settings);
    }
}