<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sites_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->helper('datetime');
    }
    function get_site($domain){
        $this->db->where('blog_domain',$domain);
        $query = $this->db->get($this->table_blogs);

        if ($query->num_rows() ==1)	{
			$result = $query->row_array();
            $result['blog_registered'] = unix_to_human_date($result['blog_registered']);
            $result['blog_last_updated'] = unix_to_human_date($result['blog_last_updated']);
			return $result;
		}
    }
    function get_sites() {
		$query = $this->db->get($this->table_blogs);

        if ($query->num_rows() > 0)	{
			$result = $query->result_array();

			foreach (array_keys($result) as $key){
			   	$result[$key]['blog_registered'] = unix_to_human_date($result[$key]['blog_registered']);
                $result[$key]['blog_last_updated'] = unix_to_human_date($result[$key]['blog_last_updated']);
			}
			return $result;
		}
	}
     public function get_site_settings(){
        $query = $this->db->get($this->table_settings);
		foreach ( $query->result_array () as $row ) {
			$result [$row['setting_name']] = $row['setting_value'];
		}
		return $result;
    }
    function create_site(){
		$domain=trim($this->input->post('domain'));

        return $this->db->insert_id();
	}
    function update_site(){
	    $site_id=$this->input->post('id');
		$domain=trim($this->input->post('domain'));
        $siteurl="http://".$this->input->post('domain')."/";

	}
    function delete_site(){
	    $site_id=$this->input->post('id');

	}
    function delete_site_table(){
	    $site_id=$this->input->post('id');

	}
    function create_site_table($site_id){

    }
    function site_count(){
		return $this->db->count_all_results($this->table_blogs);
	}
}