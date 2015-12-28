<?php
/**
 * Discussion Model
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Discussion_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    function edit_discussion_settings(){
        if($this->input->post('comments_registration')){
            $comments_registration=1;
        }else{
            $comments_registration=0;
        }
        $this->db->set('setting_value', $comments_registration);
        $this->db->where('setting_name', 'comments_registration');
        $this->db->update($this->table_settings);

        if($this->input->post('comments_moderation')){
            $comments_moderation=1;
        }else{
            $comments_moderation=0;
        }
        $this->db->set('setting_value', $comments_moderation);
        $this->db->where('setting_name', 'comments_moderation');
        $this->db->update($this->table_settings);
    }
}