<?php
/**
 * Categories Model
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    public function addcategory(){
        $data = array(
			'category_name' => $this->db->escape_str($this->input->post('name')),
            'category_description'  => $this->db->escape_str($this->input->post('description')),
            'category_slug'  =>$this->slug->create($this->db->escape_str($this->input->post('name')))
		);
        $this->db->insert($this->table_categories, $data);
        return $this->db->insert_id();
	}
    public function editcategory($category_id){
	    $data = array(
			'category_name' => $this->db->escape_str($this->input->post('name')),
            'category_description'  => $this->db->escape_str($this->input->post('description')),
            'category_slug'  =>$this->slug->create($this->db->escape_str($this->input->post('name')),$category_id)
		);

        $this->db->where('category_id', $category_id);
        $this->db->update($this->table_categories, $data);
	}
    public function get_category_by_id($category_id){
	    $this->db->where('category_id', $category_id);
        $query=$this->db->get($this->table_categories);

		if ($query->num_rows() ==1)	{
			$result = $query->row_array();
            $result['post_count']=$this->get_posts_count_in_category($result['category_slug']);
            return $result;
        }
	}
    public function get_categories_by_ids($category_ids){
		$this->db->where_in('category_id', $category_ids);
		$query = $this->db->get($this->table_categories);

		if ($query->num_rows() > 0){
			$result=$query->result_array();
            foreach (array_keys($result) as $key){
			   	$result[$key]['category_permalink'] = $this->permalinks->get_category_permalinks($result[$key]['category_slug']);
            }
            return $result;
		}
	}
    public function get_category_by_slug($category_slug){
	    $this->db->where('category_slug', $category_slug);
        $query=$this->db->get($this->table_categories);

		if ($query->num_rows() ==1)	{
			$result = $query->row_array();
            $result['post_count']=$this->get_posts_count_in_category($result['category_slug']);
            return $result;
        }
	}
    public function get_categories_limit($limit,$offset){
		$this->db->order_by('category_name', 'ASC');
        $this->db->limit($limit, $offset);
		$query = $this->db->get($this->table_categories);

        if ($query->num_rows() > 0)	{
			$result = $query->result_array();

			foreach (array_keys($result) as $key){
			  	$result[$key]['post_count']  = $this->get_posts_count_in_category($result[$key] ['category_slug']);
                $result[$key]['category_permalink'] = $this->permalinks->get_category_permalinks($result[$key] ['category_slug']);
			}
			return $result;
		}
	}
    public function get_categories(){
		$this->db->order_by('category_name', 'ASC');
		$query = $this->db->get($this->table_categories);

        if ($query->num_rows() > 0)	{
			$result = $query->result_array();

			foreach (array_keys($result) as $key){
			  	$result[$key]['post_count']  = $this->get_posts_count_in_category($result[$key] ['category_slug']);
                $result[$key]['category_permalink'] = $this->permalinks->get_category_permalinks($result[$key] ['category_slug']);
			}
			return $result;
		}
	}
    public function get_posts_count_in_category($category_slug){
        $this->db->select('count(*) as post_count');
		$this->db->from($this->table_posts);
		$this->db->join($this->table_category_relationships, $this->table_posts.'.post_id = '.$this->table_category_relationships.'.post_id');
		$this->db->join($this->table_categories, $this->table_category_relationships.'.category_id = '.$this->table_categories.'.category_id');
		$this->db->where($this->table_posts.'.post_status', 'publish');
		$this->db->where($this->table_categories.'.category_slug', $category_slug);
		$query = $this->db->get();
        $count=$query->row_array();
		return $count['post_count'];
	}
    public function get_categories_count(){
        $query = $this->db->count_all_results($this->table_categories);
		return $query;
	}
	public function deletecategory($category_id){
		$this->db->where('category_id', $category_id);
        $this->db->delete($this->table_categories);
	}
}