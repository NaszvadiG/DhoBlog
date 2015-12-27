<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menus_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    public function get_menus(){
        $this->db->order_by('menu_position', 'ASC');
		$query = $this->db->get($this->table_menus);

        if ($query->num_rows() > 0)	{
			$result = $query->result_array();
			return $result;
		}
    }
    public function get_menus_limit($limit,$offset) {
        $this->db->order_by('menu_position', 'ASC');
        $this->db->limit($limit, $offset);
		$query = $this->db->get($this->table_menus);

		if ($query->num_rows() > 0)	{
			$result = $query->result_array();
			return $result;
		}
	}
    public function get_menus_count($page_status=NULL){
		$query = $this->db->count_all_results($this->table_menus);
		return $query;
	}
}