<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->library('passwords');
    }

    public function user_login(){
		$user_name = $this->input->post('user_name');
        $query = $this->db->get_where($this->table_users, array('user_name' => $user_name));

        if ($query->num_rows() == 1) {
            $user= $query->row();
            $hash= $user->password;
            $pass= $this->input->post('password');
            if($this->passwords->verify_password($pass,$hash)){
                $this->session->set_userdata('logged_in', 1);
                $this->session->set_userdata('user_id', $user->user_id);
                $this->session->set_userdata('user_name', $user->user_name);
                $this->session->set_userdata('user_level', $user->user_level);
                return TRUE;
            }else{
                return FALSE;
            }
        }else{
            return FALSE;
        }
	}
    public function user_register(){
        $data = array(
			'user_name' => $this->input->post('user_name'),
			'user_email'     => $this->input->post('email'),
			'user_password'  => $this->passwords->hash_password($this->input->post('password')),
			'user_registered'  => time(),
		);
		return $this->db->insert($this->table_users, $data);
    }
}