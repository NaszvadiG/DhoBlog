<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $config=array(
            'table'=>'posts',
            'field_id'=>'post_id',
            'field_title'=>'post_title',
            'field_slug'=>'post_slug'
        );
        $this->load->library(array('slug','permalinks'));
        $this->slug->set_config($config);
    }
    public function add_page(){
        if($this->input->post('allow_comments')){
            $post_allow_comments=1;
        }else{
            $post_allow_comments=0;
        }
	    $data = array(
			'user_id' => 1,
			'post_title' => $this->db->escape_str($this->input->post('title')),
			'post_date'  => time(),
            'post_content'  => $this->db->escape_str($this->input->post('content')),
            'post_type'  => 'page',
            'post_status'  => $this->input->post('status'),
            'post_allow_comments'=>$post_allow_comments,
            'post_slug'  =>$this->slug->create($this->db->escape_str($this->input->post('title')))
		);
	   $this->db->insert('posts', $data);
       return $this->db->insert_id();
	}
    public function edit_page($post_id){
        if($this->input->post('allow_comments')){
            $post_allow_comments=1;
        }else{
            $post_allow_comments=0;
        }
	    $data = array(
			'user_id' => 1,
			'post_title' => $this->db->escape_str($this->input->post('title')),
			'post_last_updated'  => time(),
            'post_content'  => $this->db->escape_str($this->input->post('content')),
            'post_status'  => $this->input->post('status'),
            'post_allow_comments'=>$post_allow_comments,
            'post_slug'  =>$this->slug->create($this->db->escape_str($this->input->post('title')),$post_id)
		);

        $this->db->where('post_id', $post_id);
        $this->db->update('posts', $data);
	}
    public function get_page_by_id($post_id){
	    $this->db->where('post_id', $post_id);
        $query=$this->db->get('posts');

		$post=$query->row();
		$result['post_id']= $post->post_id;
		$result['post_title']= $post->post_title;
		$result['post_content']= $post->post_content;
        $result['post_allow_comments']= $post->post_allow_comments;
        $result['post_date']= unix_to_human_date($post->post_date);
		$result['post_status'] = $post->post_status;
        $result['post_permalink'] = $this->permalinks->get_page_permalinks($post->post_slug);
		return $result;
	}
    public function get_page_by_slug($slug){
        $this->db->where('post_slug', $slug);
        $query=$this->db->get('posts');

		$post=$query->row();
		$result['post_id']= $post->post_id;
		$result['post_title']= $post->post_title;
		$result['post_content']= $post->post_content;
        $result['post_allow_comments']= $post->post_allow_comments;
        $result['post_date']= unix_to_human_date($post->post_date);
		$result['post_status'] = $post->post_status;
        $result['post_permalink'] = $this->permalinks->get_page_permalinks($post->post_slug);
		return $result;
	}
    public function get_pages_limit($limit,$offset,$post_status=NULL) {
        if($post_status){
            $this->db->where('post_status',$post_status);
        }
        $this->db->where('post_type','page');
        $this->db->order_by('post_date', 'DESC');
        $this->db->limit($limit, $offset);
		$query = $this->db->get("posts");
		if ($query->num_rows() > 0){
    		$x = 0;
    		foreach ( $query->result_array () as $row ) {
    			$result [$x] ['post_id'] = $row ['post_id'];
    			$result [$x] ['post_title'] = $row ['post_title'];
                $result [$x] ['post_excerpt'] = $row ['post_excerpt'];
                $result [$x] ['post_content'] = $row ['post_content'];
    			$result [$x] ['post_date'] = unix_to_human_date($row ['post_date']);
    			$result [$x] ['post_status'] = $row ['post_status'];
                $result [$x] ['post_permalink'] = $this->permalinks->get_post_permalinks($row ['post_id'],$row ['post_date'],$row ['post_slug']);
    			$x ++;
    		}
    		return $result;
        }
	}
    public function get_pages_count($post_status=NULL){
        if(!$post_status){
            $this->db->where('post_type','page');
		    $query = $this->db->count_all_results('posts');
        }else{
            $this->db->where('post_status',$post_status);
            $this->db->where('post_type','page');
		    $query = $this->db->count_all_results('posts');
        }
		return $query;
	}
    function delete_post($post_id){
	    $this->db->where('post_id', $post_id);
        $this->db->delete('posts');
	}
}