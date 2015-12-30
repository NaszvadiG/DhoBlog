<?php
/**
 * Comments Model
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    public function add_comment($post_id){
        $data = array(
			'post_id' => $post_id,
			'comment_author'  => $this->db->escape_str($this->input->post('comment_author')),
			'comment_author_email'  => $this->db->escape_str($this->input->post('comment_author_email')),
            'comment_author_website'  => $this->db->escape_str($this->input->post('comment_author_website')),
            'comment_author_ip'=>get_ip(),
            'comment_content'  => $this->db->escape_str($this->input->post('comment_content')),
            'comment_date'=>time(),
            'comment_agent'  =>$this->agent->agent_string(),
            'comment_approved'  =>0
		);
	   $this->db->insert($this->table_comments, $data);
    }
    public function get_comments_by_post_id($post_id){
		$this->db->where('post_id', $post_id);
        $this->db->where('comment_approved', 1);
		$this->db->order_by('comment_date', 'ASC');
		$query = $this->db->get($this->table_comments);

		if ($query->num_rows() > 0){
		   return $query->result_array();
		}
    }
    public function get_comments_limit($limit, $offset) {
        $this->db->select($this->table_comments.'.*,'.$this->table_posts.'.post_id,'.$this->table_posts.'.post_title,'.$this->table_posts.'.post_date,'.$this->table_posts.'.post_slug');
		$this->db->from($this->table_comments);
        $this->db->join($this->table_posts,$this->table_comments.'.post_id = '.$this->table_posts.'.post_id');
        $this->db->order_by('comment_date', 'DESC');
        $this->db->limit($limit, $offset);
		$query = $this->db->get();

        if ($query->num_rows() > 0)	{
			$result= $query->result_array();

            foreach (array_keys($result) as $key){
                $result[$key]['post_permalink']=$this->permalinks->get_post_permalinks($result[$key]['post_id'],$result[$key]['post_date'],$result[$key]['post_slug']);
            }
            return $result;
		}
	}
    public function get_comments_count(){
		return $this->db->count_all_results($this->table_comments);
	}
}