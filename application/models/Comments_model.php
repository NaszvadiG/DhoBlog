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
			$result=$query->result_array();

            foreach (array_keys($result) as $key){
                $result[$key]['comment_date']=unix_to_human_date($result[$key]['comment_date']);
			}
			return $result;

		}
    }
}