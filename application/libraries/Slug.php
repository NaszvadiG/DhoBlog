<?php
/**
 * Slug Library
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Slug {
    protected $table;
	protected $field_id;
	protected $field_slug;
	protected $field_title;

    public function __construct(){
		$this->CI =& get_instance();
	}
    public function set_config($config = array()){
		if (!empty($config)){
			foreach ($config as $key => $value){
				$this->{$key} = $value;
			}
		}
	}
    public function create($title=NULL,$id=NULL){
        $slug = url_title($title, '-', TRUE);
        $increment=2;

        if($id){
            $post_slug=$this->check_post_slug($title,$id);
            if($post_slug){
                return $post_slug;
            }else{
                return $this->check_available_slug($slug,$increment);
            }
        }else{
             return $this->check_available_slug($slug,$increment);
        }
    }
    public function check_post_slug($title,$id){
        $this->CI->db->where($this->field_id, $id);
        $this->CI->db->where($this->field_title, $title);
        $query=$this->CI->db->get($this->table);

        $slug="";
        if ($query->num_rows()==1){
            $data=$query->result_array ();
            $slug=$data[0][$this->field_slug];
        }
        return $slug;
    }
    public function check_available_slug($slug,$increment){
        $this->CI->db->where($this->field_slug, $slug);
		if($this->CI->db->count_all_results($this->table) > 0){
             $count=$this->CI->db->count_all_results($this->table);
             while($increment<$count){
                $this->CI->db->where($this->field_slug, $slug.'-'.$increment);
                if($this->CI->db->count_all_results($this->table) == 0){
                    break 1;
                }
                $increment++;
             }
            return $slug.'-'.$increment;
		}else{
		    return $slug;
		}
    }
}