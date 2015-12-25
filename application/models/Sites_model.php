<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sites_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->helper('datetime');
    }
    function get_site($domain){
        $this->db->where('blog_domain',$domain);
        $query = $this->db->get("blogs");
        $result=array();
        if ($query->num_rows () == 1){
            $row=$query->row();
    		$result['blog_id'] = $row->blog_id;
            $result['blog_domain'] = $row->blog_domain;
            $result['blog_registered'] = unix_to_human_date($row->blog_registered);
            $result['blog_last_updated'] = unix_to_human_date($row->blog_last_updated);
            $result['blog_status'] = $row->blog_status;
        }
		return $result;
    }
    function get_sites() {
		$query = $this->db->get("blogs");
		$result=array();
		if ($query->num_rows () > 0){
		    $x = 0;
			foreach ( $query->result_array () as $row ) {
				$result [$x] ['blog_id'] = $row ['blog_id'];
                $result [$x] ['blog_domain'] = $row ['blog_domain'];
                $result [$x] ['blog_registered'] = unix_to_human_date($row ['blog_registered']);
                $result [$x] ['blog_last_updated'] = unix_to_human_date($row ['blog_last_updated']);
                $result [$x] ['blog_status'] = $row ['blog_status'];
				$x ++;
			}
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
		return $this->db->count_all_results('blogs');
	}
}