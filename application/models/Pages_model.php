<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
        $config=array(
            'table'=>'pages',
            'field_id'=>'page_id',
            'field_title'=>'page_title',
            'field_slug'=>'page_slug'
        );
        $this->load->library(array('slug','permalinks'));
        $this->load->helper('datetime');
        $this->slug->set_config($config);
    }
    public function add_page(){
        if($this->input->post('allow_comments')){
            $page_allow_comments=1;
        }else{
            $page_allow_comments=0;
        }
	    $data = array(
			'user_id' => 1,
			'page_title' => $this->db->escape_str($this->input->post('title')),
			'page_date'  => time(),
            'page_content'  => $this->db->escape_str($this->input->post('content')),
            'page_status'  => $this->input->post('status'),
            'page_allow_comments'=>$page_allow_comments,
            'page_slug'  =>$this->slug->create($this->db->escape_str($this->input->post('title')))
		);
	   $this->db->insert('pages', $data);
       return $this->db->insert_id();
	}
    public function edit_page($page_id){
        if($this->input->post('allow_comments')){
            $page_allow_comments=1;
        }else{
            $page_allow_comments=0;
        }
	    $data = array(
			'user_id' => 1,
			'page_title' => $this->db->escape_str($this->input->post('title')),
			'page_last_updated'  => time(),
            'page_content'  => $this->db->escape_str($this->input->post('content')),
            'page_status'  => $this->input->post('status'),
            'page_allow_comments'=>$page_allow_comments,
            'page_slug'  =>$this->slug->create($this->db->escape_str($this->input->post('title')),$page_id)
		);

        $this->db->where('page_id', $page_id);
        $this->db->update('pages', $data);
	}
    public function get_page_by_id($page_id){
	    $this->db->where('page_id', $page_id);
        $query=$this->db->get('pages');

		$page=$query->row();
		$result['page_id']= $page->page_id;
		$result['page_title']= $page->page_title;
		$result['page_content']= $page->page_content;
        $result['page_allow_comments']= $page->page_allow_comments;
        $result['page_date']= unix_to_human_date($page->page_date);
		$result['page_status'] = $page->page_status;
        $result['page_permalink'] = $this->permalinks->get_page_permalinks($page->page_slug);
		return $result;
	}
    public function get_page_by_slug($page_slug){
        $this->db->where('page_slug', $page_slug);
        $query=$this->db->get('pages');

		$page=$query->row();
		$result['page_id']= $page->page_id;
		$result['page_title']= $page->page_title;
		$result['page_content']= $page->page_content;
        $result['page_allow_comments']= $page->page_allow_comments;
        $result['page_date']= unix_to_human_date($page->page_date);
		$result['page_status'] = $page->page_status;
        $result['page_permalink'] = $this->permalinks->get_page_permalinks($page->page_slug);
		return $result;
	}
    public function get_pages_limit($limit,$offset,$page_status=NULL) {
        if($page_status){
            $this->db->where('page_status',$page_status);
        }
        $this->db->order_by('page_date', 'DESC');
        $this->db->limit($limit, $offset);
		$query = $this->db->get('pages');
		if ($query->num_rows() > 0){
    		$x = 0;
    		foreach ( $query->result_array () as $row ) {
    			$result [$x] ['page_id'] = $row ['page_id'];
    			$result [$x] ['page_title'] = $row ['page_title'];
                $result [$x] ['page_content'] = $row ['page_content'];
    			$result [$x] ['page_date'] = unix_to_human_date($row ['page_date']);
    			$result [$x] ['page_status'] = $row ['page_status'];
                $result [$x] ['page_permalink'] = $this->permalinks->get_page_permalinks($row ['page_slug']);
    			$x ++;
    		}
    		return $result;
        }
	}
    public function get_pages($page_status=NULL) {
        if($page_status){
            $this->db->where('page_status',$page_status);
        }
        $this->db->order_by('page_order', 'ASC');
		$query = $this->db->get('pages');
		if ($query->num_rows() > 0){
    		$x = 0;
    		foreach ( $query->result_array () as $row ) {
    			$result [$x] ['page_id'] = $row ['page_id'];
    			$result [$x] ['page_title'] = $row ['page_title'];
                $result [$x] ['page_content'] = $row ['page_content'];
    			$result [$x] ['page_date'] = unix_to_human_date($row ['page_date']);
    			$result [$x] ['page_status'] = $row ['page_status'];
                $result [$x] ['page_permalink'] = $this->permalinks->get_page_permalinks($row ['page_slug']);
    			$x ++;
    		}
    		return $result;
        }
	}
    public function get_pages_count($page_status=NULL){
        if(!$page_status){
		    $query = $this->db->count_all_results('pages');
        }else{
            $this->db->where('page_status',$page_status);
		    $query = $this->db->count_all_results('pages');
        }
		return $query;
	}
    function delete_page($page_id){
	    $this->db->where('page_id', $page_id);
        $this->db->delete('pages');
	}
}