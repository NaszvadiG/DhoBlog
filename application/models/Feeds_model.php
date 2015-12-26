<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feeds_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    function get_feeds() {
		$query = $this->db->query ( "select * from tb_posts where post_status='published' order by post_id desc limit 10" );
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

}