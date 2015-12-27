<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    public function add_post(){
        if($this->input->post('allow_comments')){
            $post_allow_comments=1;
        }else{
            $post_allow_comments=0;
        }
        if($this->input->post('sticky')){
            $post_sticky=1;
        }else{
            $post_sticky=0;
        }
	    $data = array(
			'user_id' => 1,
			'post_title' => $this->db->escape_str($this->input->post('title')),
			'post_date'  => time(),
			'post_excerpt'  => $this->db->escape_str($this->input->post('excerpt')),
            'post_content'  => $this->db->escape_str($this->input->post('content')),
            'post_sticky'=>$post_sticky,
            'post_status'  => $this->input->post('status'),
            'post_allow_comments'=>$post_allow_comments,
            'post_slug'  =>$this->slug->create($this->db->escape_str($this->input->post('title')))
		);
	   $this->db->insert($this->table_posts, $data);
       return $this->db->insert_id();
	}
    public function add_post_category($post_id, $category_id){
		$data = array(
    		'post_id' => $post_id,
    		'category_id' => $category_id
		);

		$this->db->insert($this->table_category_relationships, $data);
	}
    public function edit_post($post_id){
        if($this->input->post('allow_comments')){
            $post_allow_comments=1;
        }else{
            $post_allow_comments=0;
        }
        if($this->input->post('sticky')){
            $post_sticky=1;
        }else{
            $post_sticky=0;
        }
	    $data = array(
			'post_title' => $this->db->escape_str($this->input->post('title')),
			'post_last_updated'  => time(),
			'post_excerpt'  => $this->db->escape_str($this->input->post('excerpt')),
            'post_content'  => $this->db->escape_str($this->input->post('content')),
            'post_sticky'=>$post_sticky,
            'post_status'  => $this->input->post('status'),
            'post_allow_comments'=>$post_allow_comments,
            'post_slug'  =>$this->slug->create($this->db->escape_str($this->input->post('title')),$post_id)
		);

        $this->db->where('post_id', $post_id);
        $this->db->update($this->table_posts, $data);
	}
    public function edit_post_categories($post_id, $categories){
        $this->delete_post_categories($post_id);
        foreach ($categories as $category_id){
            $this->add_post_category($post_id, $category_id);
        }
	}
    public function get_post_by_id($post_id){
        $this->db->select($this->table_posts.'.*,'.$this->table_users.'.user_display_name');
		$this->db->from($this->table_posts);
	 	$this->db->join($this->table_category_relationships, $this->table_posts.'.post_id = '.$this->table_category_relationships.'.post_id');
	 	$this->db->join($this->table_categories, $this->table_category_relationships.'.category_id = '.$this->table_categories.'.category_id');
		$this->db->join($this->table_users,$this->table_posts.'.user_id = '.$this->table_users.'.user_id');
	    $this->db->where($this->table_posts.'.post_id', $post_id);
        $this->db->limit(1);
        $query=$this->db->get();

		if ($query->num_rows() ==1)	{
			$result = $query->row_array();

          	$result['categories'] = $this->categories_model->get_categories_by_ids($this->get_post_categories($result['post_id']));
         	$result['comment_count'] = $this->db->where('post_id', $result['post_id'])->from($this->table_comments)->count_all_results();
            $result['post_permalink']=$this->permalinks->get_post_permalinks($result['post_id'],$result['post_date'],$result['post_slug']);
            $result['post_date']=unix_to_human_date($result['post_date']);
			return $result;
		}
	}
    public function get_post_by_date_slug($year,$month,$day,$slug){
        $date = $year.'-'.$month.'-'.$day;

        $this->db->select($this->table_posts.'.*,'.$this->table_users.'.user_display_name');
		$this->db->from($this->table_posts);
	 	$this->db->join($this->table_category_relationships, $this->table_posts.'.post_id = '.$this->table_category_relationships.'.post_id');
	 	$this->db->join($this->table_categories, $this->table_category_relationships.'.category_id = '.$this->table_categories.'.category_id');
		$this->db->join($this->table_users,$this->table_posts.'.user_id = '.$this->table_users.'.user_id');
        $this->db->where('from_unixtime(post_date, "%Y-%m-%d")=', $date);
        $this->db->where($this->table_posts.'.post_slug', $slug);
        $this->db->limit(1);
        $query=$this->db->get();

		if ($query->num_rows() ==1)	{
			$result = $query->row_array();

          	$result['categories'] = $this->categories_model->get_categories_by_ids($this->get_post_categories($result['post_id']));
         	$result['comment_count'] = $this->db->where('post_id', $result['post_id'])->from($this->table_comments)->count_all_results();
            $result['post_permalink']=$this->permalinks->get_post_permalinks($result['post_id'],$result['post_date'],$result['post_slug']);
            $result['post_date']=unix_to_human_date($result['post_date']);
			return $result;
		}
	}
    public function get_post_by_slug($slug){
        $this->db->select($this->table_posts.'.*,'.$this->table_users.'.user_display_name');
		$this->db->from($this->table_posts);
	 	$this->db->join($this->table_category_relationships, $this->table_posts.'.post_id = '.$this->table_category_relationships.'.post_id');
	 	$this->db->join($this->table_categories, $this->table_category_relationships.'.category_id = '.$this->table_categories.'.category_id');
		$this->db->join($this->table_users,$this->table_posts.'.user_id = '.$this->table_users.'.user_id');
        $this->db->where($this->table_posts.'.post_slug', $slug);
        $this->db->limit(1);
        $query=$this->db->get();

		if ($query->num_rows() ==1)	{
			$result = $query->row_array();

          	$result['categories'] = $this->categories_model->get_categories_by_ids($this->get_post_categories($result['post_id']));
         	$result['comment_count'] = $this->db->where('post_id', $result['post_id'])->from($this->table_comments)->count_all_results();
            $result['post_permalink']=$this->permalinks->get_post_permalinks($result['post_id'],$result['post_date'],$result['post_slug']);
            $result['post_date']=unix_to_human_date($result['post_date']);
			return $result;
		}
	}
    public function get_posts_by_category($category_slug,$limit,$offset){
	    $this->db->select($this->table_posts.'.*,'.$this->table_users.'.user_display_name');
		$this->db->from($this->table_posts);
	 	$this->db->join($this->table_category_relationships, $this->table_posts.'.post_id = '.$this->table_category_relationships.'.post_id');
	 	$this->db->join($this->table_categories, $this->table_category_relationships.'.category_id = '.$this->table_categories.'.category_id');
		$this->db->join($this->table_users,$this->table_posts.'.user_id = '.$this->table_users.'.user_id');
	   	$this->db->where($this->table_posts.'.post_status', 'publish');
	 	$this->db->where($this->table_categories.'.category_slug', $category_slug);
		$this->db->order_by($this->table_posts.'.post_date', 'DESC');
        $this->db->limit($limit, $offset);
		$query = $this->db->get();

        if ($query->num_rows() > 0)	{
			$result = $query->result_array();

			foreach (array_keys($result) as $key){
			   	$result[$key]['categories'] = $this->categories_model->get_categories_by_ids($this->get_post_categories($result[$key]['post_id']));
			  	$result[$key]['comment_count'] = $this->db->where('post_id', $result[$key]['post_id'])->from($this->table_comments)->count_all_results();
                $result[$key]['post_permalink']=$this->permalinks->get_post_permalinks($result[$key]['post_id'],$result[$key]['post_date'],$result[$key]['post_slug']);
                $result[$key]['post_date']=unix_to_human_date($result[$key]['post_date']);
			}
			return $result;
		}
	}
    public function get_posts_limit($limit,$offset,$post_status=NULL) {
        $this->db->select($this->table_posts.'.*,'.$this->table_users.'.user_display_name');
		$this->db->from($this->table_posts);
	 	$this->db->join($this->table_category_relationships, $this->table_posts.'.post_id = '.$this->table_category_relationships.'.post_id');
	 	$this->db->join($this->table_categories, $this->table_category_relationships.'.category_id = '.$this->table_categories.'.category_id');
		$this->db->join($this->table_users,$this->table_posts.'.user_id = '.$this->table_users.'.user_id');

        if($post_status){
            $this->db->where('post_status',$post_status);
        }
        $this->db->order_by($this->table_posts.'.post_sticky', 'DESC');
        $this->db->order_by($this->table_posts.'.post_date', 'DESC');
        $this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0)	{
			$result = $query->result_array();

			foreach (array_keys($result) as $key){
			   	$result[$key]['categories'] = $this->categories_model->get_categories_by_ids($this->get_post_categories($result[$key]['post_id']));
			  	$result[$key]['comment_count'] = $this->db->where('post_id', $result[$key]['post_id'])->from($this->table_comments)->count_all_results();
                $result[$key]['post_permalink']=$this->permalinks->get_post_permalinks($result[$key]['post_id'],$result[$key]['post_date'],$result[$key]['post_slug']);
                $result[$key]['post_date']=unix_to_human_date($result[$key]['post_date']);
			}
			return $result;
		}
	}
    public function get_posts_count($post_status=NULL){
        if(!$post_status){
		    $query = $this->db->count_all_results($this->table_posts);
        }else{
            $this->db->where('post_status',$post_status);
		    $query = $this->db->count_all_results($this->table_posts);
        }
		return $query;
	}
    public function get_post_categories($post_id){
		$this->db->select('category_id');
		$this->db->where('post_id', $post_id);

		$query = $this->db->get($this->table_category_relationships);

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
        $this->db->delete($this->table_posts);
	}
    public function delete_post_categories($post_id){
		$this->db->where('post_id', $post_id);
		$this->db->delete($this->table_category_relationships);
	}
}