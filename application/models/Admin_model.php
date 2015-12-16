<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

/*
| -------------------------------------------------------------------
|  Add Functions
| -------------------------------------------------------------------
*/
	public function addpost(){
	    $data = array(
			'user_id' => 1,
			'post_title' => $this->db->escape_str($this->input->post('title')),
			'post_date'  => time(),
			'post_excerpt'  => $this->db->escape_str($this->input->post('excerpt')),
            'post_content'  => $this->db->escape_str($this->input->post('content')),
            'post_status'  => $this->input->post('status'),
            'post_allow_comments'  => 1,
            'post_slug'  => url_title($this->db->escape_str($this->input->post('title')), '-', TRUE),
		);
		$this->db->insert('posts', $data);
        return $this->db->insert_id();
	}
    public function addcategory(){
        $data = array(
			'category_name' => $this->db->escape_str($this->input->post('name')),
            'category_description'  => $this->db->escape_str($this->input->post('description')),
            'category_slug'  => url_title($this->db->escape_str($this->input->post('name')), '-', TRUE),
		);
		$this->db->insert('categories', $data);
        return $this->db->insert_id();
	}

/*
| -------------------------------------------------------------------
|  Get Functions
| -------------------------------------------------------------------
*/
	public function get_post($post_id) {
	    $this->db->where('post_id', $post_id);
        $query=$this->db->get('posts');

		$post=$query->row();
		$result['post_id']= $post->post_id;
		$result['post_title']= $post->post_title;
		$result['post_excerpt']= $post->post_excerpt;
		$result['post_content']= $post->post_content;
		$result['post_status'] = $post->post_status;
		return $result;
	}
	public function get_posts() {
	    $this->db->order_by('post_id', 'DESC');
		$query = $this->db->get("posts");

        if ($query->num_rows() > 0){
    		$x = 0;
    		foreach ( $query->result_array () as $row ) {
    			$result [$x] ['post_id'] = $row ['post_id'];
    			$result [$x] ['post_title'] = $row ['post_title'];
    			$result [$x] ['post_date'] = $row ['post_date'];
    			$result [$x] ['post_status'] = $row ['post_status'];
    			$x ++;
    		}
    		return $result;
        }
	}
    public function get_category($category_id) {
	    $this->db->where('category_id', $category_id);
        $query=$this->db->get('categories');

		$post=$query->row();
		$result['category_id']= $post->category_id;
		$result['category_name']= $post->category_name;
		$result['category_description']= $post->category_description;
		$result['category_slug']= $post->category_slug;
		$result['post_count'] = 0;
		return $result;
	}
    public function get_categories() {
		$this->db->order_by('category_name', 'ASC');
		$query = $this->db->get("categories");

        if ($query->num_rows() > 0){
    		$x = 0;
    		foreach ( $query->result_array () as $row ) {
    			$result [$x] ['category_id'] = $row ['category_id'];
    			$result [$x] ['category_name'] = $row ['category_name'];
    			$result [$x] ['category_description'] = $row ['category_description'];
                $result [$x] ['category_slug']  = 0;
    			$result [$x] ['post_count']  = 0;
    			$x ++;
    		}
    		return $result;
        }
	}

/*
| -------------------------------------------------------------------
|  Edit Functions
| -------------------------------------------------------------------
*/
	function editpost($post_id){
	    $data = array(
			'user_id' => 1,
			'post_title' => $this->db->escape_str($this->input->post('title')),
			'post_date'  => time(),
			'post_excerpt'  => $this->db->escape_str($this->input->post('excerpt')),
            'post_content'  => $this->db->escape_str($this->input->post('content')),
            'post_status'  => $this->input->post('status'),
            'post_allow_comments'  => 1,
            'post_slug'  => url_title($this->db->escape_str($this->input->post('title')), '-', TRUE),
		);

        $this->db->where('post_id', $post_id);
        $this->db->update('posts', $data);
	}
    function editcategory($category_id)
	{
	    $data = array(
			'category_name' => $this->db->escape_str($this->input->post('name')),
            'category_description'  => $this->db->escape_str($this->input->post('description')),
            'category_slug'  => url_title($this->db->escape_str($this->input->post('name')), '-', TRUE),
		);

        $this->db->where('category_id', $category_id);
        $this->db->update('categories', $data);
	}
/*
| -------------------------------------------------------------------
|  Delete Functions
| -------------------------------------------------------------------
*/
	function deletepost($post_id)
	{
	    $this->db->where('post_id', $post_id);
        $this->db->delete('posts');
	}
	function deletecategory($category_id)
	{
		$this->db->where('category_id', $category_id);
        $this->db->delete('categories');
	}
}