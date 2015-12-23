<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menus_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get_menus(){
        $this->db->order_by('menu_position', 'ASC');
		$query = $this->db->get('menus');
		if ($query->num_rows() > 0){
    		$x = 0;
    		foreach ( $query->result_array () as $row ) {
    			$result [$x] ['menu_id'] = $row ['menu_id'];
    			$result [$x] ['menu_title'] = $row ['menu_title'];
                $result [$x] ['menu_url'] = $row ['menu_url'];
                $result [$x] ['menu_type'] = $row ['menu_type'];
                $result [$x] ['menu_position'] = $row ['menu_position'];
    			$x ++;
    		}
    		return $result;
        }
    }
    public function get_menus_limit($limit,$offset) {
        $this->db->order_by('menu_position', 'ASC');
        $this->db->limit($limit, $offset);
		$query = $this->db->get('menus');
		if ($query->num_rows() > 0){
    		$x = 0;
    		foreach ( $query->result_array () as $row ) {
    			$result [$x] ['menu_id'] = $row ['menu_id'];
    			$result [$x] ['menu_title'] = $row ['menu_title'];
                $result [$x] ['menu_url'] = $row ['menu_url'];
                $result [$x] ['menu_type'] = $row ['menu_type'];
                $result [$x] ['menu_position'] = $row ['menu_position'];
    			$x ++;
    		}
    		return $result;
        }
	}
    public function get_menus_count($page_status=NULL){
		$query = $this->db->count_all_results('menus');
		return $query;
	}
}