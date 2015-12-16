<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_Model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

	
	function show_all_posts($limit,$offset) {
		$query = $this->db->query ( "select * from tb_posts where post_status='published' order by post_id desc limit $offset, $limit" );
		$x = 0;
		foreach ( $query->result_array () as $row ) {
			$result [$x] ['post_id'] = $row ['post_id'];
			$result [$x] ['post_title'] = $row ['post_title'];
			$result [$x] ['date'] = $row ['post_date'];
			$result [$x] ['category_id'] = $row ['post_category'];
			$result [$x] ['post_excerpt'] = $row ['post_excerpt'];
			$result [$x] ['post_content'] = $row ['post_content'];
			$x ++;
		}
		return $result;
	}

	function show_search_posts($q,$limit,$offset) {
		$query = $this->db->query ( "select * from tb_posts where post_status='published' and post_title like '%$q%' or post_content like '%$q%' order by post_id desc limit $offset,$limit" );
		$x = 0;
		$result=array();
		if ($query->num_rows () != 0){
		foreach ( $query->result_array () as $row ) {
			$result [$x] ['post_id'] = $row ['post_id'];
			$result [$x] ['post_title'] = $row ['post_title'];
			$result [$x] ['date'] = $row ['post_date'];
			$result [$x] ['category_id'] = $row ['post_category'];
			$result [$x] ['post_excerpt'] = $row ['post_excerpt'];
			$result [$x] ['post_content'] = $row ['post_content'];
			$x ++;
		}
		}
		return $result;
	}
	function show_all_post() {
		$query = $this->db->query ( "select * from tb_posts where post_status='published' order by post_id desc" );
		$x = 0;
		foreach ( $query->result_array () as $row ) {
			$result [$x] ['id'] = $row ['post_id'];
			$result [$x] ['title'] = $row ['post_title'];
			$result [$x] ['date'] = $this->ts2long($this->iso2ts($row ['post_date']));
			$result [$x] ['category_id'] = $row ['post_category'];
			$result [$x] ['excerpt'] = $row ['post_excerpt'];
			$result [$x] ['content'] = $row ['post_content'];
			$result [$x] ['image'] = $row ['post_image'];
			$result [$x] ['status'] = $row ['post_status'];
			$x ++;
		}
		return $result;
	}
	function posts_count(){
		$query=$this->db->query ( "select count(*) as post_count from tb_posts" );
		$count=$query->row_array();
		return $count['post_count'];
	}
	function posts_count_by_category($category_id){
		$query=$this->db->query ( "select count(*) as post_count from tb_posts where post_category like '%i:$category_id;s%'" );
		$count=$query->row_array();
		return $count['post_count'];
	}
	function posts_count_by_search($q){
		$query=$this->db->query ( "select count(*) as post_count from tb_posts where post_status='publish' and post_title like '%$q%' or post_content like '%$q%'" );
		$count=$query->row_array();
		return $count['post_count'];
	}
	function show_category_by_id($id){
		$this->id=$id;
		$query=$this->db->query ( "select * from tb_categories where category_id='$this->id'");
		$cat=$query->row();
		$category['name']= $cat->category_name;
		$category['description']= $cat->category_description;
		return $category;
	}
	function show_posts_by_category($category_id,$limit,$offset) {
		$this->id=$category_id;
		$query = $this->db->query ( "select * from tb_posts where post_status='publish' and post_category like '%i:$this->id;s%' order by post_id desc limit $offset,$limit" );
		$x = 0;
		$result=array();
		foreach ( $query->result_array () as $row ) {
			$result [$x] ['id'] = $row ['post_id'];
			$result [$x] ['title'] = $row ['post_title'];
			$result [$x] ['date'] = $this->ts2long($this->iso2ts($row ['post_date']));
			$result [$x] ['category_id'] = $row ['post_category'];
			$result [$x] ['excerpt'] = $row ['post_excerpt'];
			$result [$x] ['image'] = $row ['post_image'];
			$x ++;
		}
		return $result;
	}
	function show_post_by_id($post_id) {
		$this->id=$post_id;
		$query = $this->db->query ( "select * from tb_posts where post_status='publish' and post_id='$this->id'");
		$post=$query->row();
		$result['id']= $post->post_id;
		$result['title']= $post->post_title;
		$result['date']= $this->ts2long($this->iso2ts($post->post_date));
		$result['category_id']= $post->post_category;
		$result['excerpt']= $post->post_excerpt;
		$result['content']= $post->post_content;
		$result['image'] = $post->post_image;
		$result['status'] = $post->post_status;
		return $result;
	}
}