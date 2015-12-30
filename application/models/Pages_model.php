<?php
/**
 * Pages Model
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    public function add_page(){
	    $data = array(
			'user_id' => 1,
			'page_title' => $this->db->escape_str($this->input->post('title')),
			'page_date'  => time(),
            'page_content'  => $this->db->escape_str($this->input->post('content')),
            'page_status'  => $this->input->post('status'),
            'page_slug'  =>$this->slug->create($this->db->escape_str($this->input->post('title')))
		);
	   $this->db->insert($this->table_pages, $data);
       return $this->db->insert_id();
	}
    public function edit_page($page_id){
	    $data = array(
			'user_id' => 1,
			'page_title' => $this->db->escape_str($this->input->post('title')),
			'page_last_updated'  => time(),
            'page_content'  => $this->db->escape_str($this->input->post('content')),
            'page_status'  => $this->input->post('status'),
            'page_slug'  =>$this->slug->create($this->db->escape_str($this->input->post('title')),$page_id)
		);

        $this->db->where('page_id', $page_id);
        $this->db->update($this->table_pages, $data);
	}
    public function get_page_by_id($page_id){
	    $this->db->where('page_id', $page_id);
        $query=$this->db->get($this->table_pages);

        if ($query->num_rows() ==1)	{
			$result = $query->row_array();

            $result['page_permalink'] = $this->permalinks->get_page_permalinks($result['page_slug']);
			return $result;
		}
	}
    public function get_page_by_slug($page_slug){
        $this->db->where('page_slug', $page_slug);
        $query=$this->db->get($this->table_pages);

		if ($query->num_rows() ==1)	{
			$result = $query->row_array();

            $result['page_permalink'] = $this->permalinks->get_page_permalinks($result['page_slug']);
			return $result;
		}
	}
    public function get_pages_limit($limit,$offset,$page_status=NULL) {
        if($page_status){
            $this->db->where('page_status',$page_status);
        }
        $this->db->order_by('page_date', 'DESC');
        $this->db->limit($limit, $offset);
		$query = $this->db->get($this->table_pages);

        if ($query->num_rows() > 0)	{
			$result = $query->result_array();

			foreach (array_keys($result) as $key){
			   	$result[$key]['page_permalink'] = $this->permalinks->get_page_permalinks($result[$key]['page_slug']);
			}
			return $result;
		}
	}
    public function get_pages($page_status=NULL) {
        if($page_status){
            $this->db->where('page_status',$page_status);
        }
        $this->db->order_by('page_order', 'ASC');
		$query = $this->db->get($this->table_pages);

        if ($query->num_rows() > 0)	{
			$result = $query->result_array();

			foreach (array_keys($result) as $key){
			   	$result[$key]['page_permalink'] = $this->permalinks->get_page_permalinks($result[$key]['page_slug']);
			}
			return $result;
		}
	}
    public function get_pages_count($page_status=NULL){
        if(!$page_status){
		    $query = $this->db->count_all_results($this->table_pages);
        }else{
            $this->db->where('page_status',$page_status);
		    $query = $this->db->count_all_results($this->table_pages);
        }
		return $query;
	}
    function delete_page($page_id){
	    $this->db->where('page_id', $page_id);
        $this->db->delete($this->table_pages);
	}
}