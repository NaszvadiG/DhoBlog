<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts_model extends CI_Model {

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
        $this->load->library('slug',$config);
        $this->load->library('permalinks');
    }
    public function add_post(){
	    $data = array(
			'user_id' => 1,
			'post_title' => $this->db->escape_str($this->input->post('title')),
			'post_date'  => time(),
			'post_excerpt'  => $this->db->escape_str($this->input->post('excerpt')),
            'post_content'  => $this->db->escape_str($this->input->post('content')),
            'post_status'  => $this->input->post('status'),
            'post_allow_comments'  => 1,
            'post_slug'  =>$this->slug->create($this->db->escape_str($this->input->post('title')))
		);
		$this->db->insert('posts', $data);
        return $this->db->insert_id();
	}
    public function add_post_category($post_id, $category_id){
		$data = array(
    		'post_id' => $post_id,
    		'category_id' => $category_id
		);

		$this->db->insert('category_relationships', $data);
	}
    public function edit_post($post_id){
	    $data = array(
			'user_id' => 1,
			'post_title' => $this->db->escape_str($this->input->post('title')),
			'post_date'  => time(),
			'post_excerpt'  => $this->db->escape_str($this->input->post('excerpt')),
            'post_content'  => $this->db->escape_str($this->input->post('content')),
            'post_status'  => $this->input->post('status'),
            'post_allow_comments'  => 1,
            'post_slug'  =>$this->slug->create($this->db->escape_str($this->input->post('title')),$post_id)
		);

        $this->db->where('post_id', $post_id);
        $this->db->update('posts', $data);
	}
    public function edit_post_categories($post_id, $categories){
        $this->delete_post_categories($post_id);
        foreach ($categories as $category_id){
            $this->add_post_category($post_id, $category_id);
        }
	}
    public function get_post_by_id($post_id){
	    $this->db->where('post_id', $post_id);
        $query=$this->db->get('posts');

		$post=$query->row();
		$result['post_id']= $post->post_id;
		$result['post_title']= $post->post_title;
		$result['post_excerpt']= $post->post_excerpt;
		$result['post_content']= $post->post_content;
        $result['post_date']= unix_to_human_date($post->post_date);
		$result['post_status'] = $post->post_status;
        $result['post_permalink'] = $this->permalinks->get_post_permalinks($post->post_id,$post->post_date,$post->post_slug);
		return $result;
	}
    public function get_post_by_date_slug($year,$month,$day,$slug){
        $date = $year.'-'.$month.'-'.$day;
        $this->db->where('from_unixtime(post_date, "%Y-%m-%d")=', $date);
        $this->db->where('post_slug', $slug);
        $query=$this->db->get('posts');

		$post=$query->row();
		$result['post_id']= $post->post_id;
		$result['post_title']= $post->post_title;
		$result['post_excerpt']= $post->post_excerpt;
		$result['post_content']= $post->post_content;
        $result['post_date']= unix_to_human_date($post->post_date);
		$result['post_status'] = $post->post_status;
        $result['post_permalink'] = $this->permalinks->get_post_permalinks($post->post_id,$post->post_date,$post->post_slug);
		return $result;
	}
    public function get_post_by_slug($slug){
        $this->db->where('post_slug', $slug);
        $query=$this->db->get('posts');

		$post=$query->row();
		$result['post_id']= $post->post_id;
		$result['post_title']= $post->post_title;
		$result['post_excerpt']= $post->post_excerpt;
		$result['post_content']= $post->post_content;
        $result['post_date']= unix_to_human_date($post->post_date);
		$result['post_status'] = $post->post_status;
        $result['post_permalink'] = $this->permalinks->get_post_permalinks($post->post_id,$post->post_date,$post->post_slug);
		return $result;
	}
	public function get_posts(){
	    $this->db->order_by('post_id', 'DESC');
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
    public function get_posts_limit($limit,$offset) {
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
    public function get_posts_count(){
		$this->db->where('post_status', 'published');
		$query = $this->db->count_all_results('posts');
		return $query;
	}
    public function get_post_categories($post_id){
		$this->db->select('category_id');
		$this->db->where('post_id', $post_id);

		$query = $this->db->get('category_relationships');

		if ($query->num_rows() > 0)	{
			$result = $query->result_array();
			foreach ($result as $category){
				$categories[] = $category['category_id'];
			}
			return $categories;
		}
	}
    function delete_post($post_id){
	    $this->db->where('post_id', $post_id);
        $this->db->delete('posts');
	}
    public function delete_post_categories($post_id){
		$this->db->where('post_id', $post_id);
		$this->db->delete('category_relationships');
	}
}