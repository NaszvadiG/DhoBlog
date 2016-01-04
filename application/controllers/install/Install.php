<?php
/**
 * Install Controller
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Install extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $this->load->helper(array('form', 'url','domain','install','passwords','permissions'));
        $this->load->library(array('form_validation'));

        if (file_exists(APPPATH.'controllers/install/lock')){
    		redirect(base_url());
            exit;
    	}
    }
    public function index(){
        $step=$this->input->get('step');
        if(!$step){
            $data['title']="Overview";
            $this->load->view('install/header',$data);
            $this->load->view('install/home',$data);
            $this->load->view('install/footer');
        }elseif($step==1){
            $data['title']="Database Configuration";

            $this->form_validation->set_rules('database_hostname', 'Hostname', 'trim|required');
            $this->form_validation->set_rules('database_username', 'Username', 'trim|required');
            $this->form_validation->set_rules('database_name', 'Database Name', 'trim|required');
            $this->form_validation->set_rules('table_prefix', 'Table Prefix', 'trim|required');

            if ($this->form_validation->run() === TRUE){
                $db=array(
                    'database_hostname'=>$this->input->post('database_hostname'),
                    'database_username'=>$this->input->post('database_username'),
                    'database_password'=>$this->input->post('database_password'),
                    'database_name'=>'',
                    'table_prefix'=>$this->input->post('table_prefix')
                );
                if(write_database_config($db)){
                    $this->load->model('install_model');
                    if($this->install_model->create_database($this->input->post('database_name'))){
                        $db=array(
                            'database_hostname'=>$this->input->post('database_hostname'),
                            'database_username'=>$this->input->post('database_username'),
                            'database_password'=>$this->input->post('database_password'),
                            'database_name'=>$this->input->post('database_name'),
                            'table_prefix'=>$this->input->post('table_prefix')
                        );
                        write_database_config($db);
                        $this->install_model->create_tables($this->input->post('database_name'));
                        $this->install_model->insert_site_data($this->input->post('database_name'));
                    }
                }
                redirect('install?step=2');
            }

            $this->load->view('install/header',$data);
            $this->load->view('install/step1',$data);
            $this->load->view('install/footer');
        }elseif($step==2){
            $this->load->model('install_model');
            $data['title']="User Creation";

            $validation_rules=array(
                array(
                    'field' => 'user_name',
                    'label' => 'Username',
                    'rules' => 'trim|required|alpha_numeric|min_length[5]|max_length[20]|is_unique[users.user_name]'
                ),
                array(
                    'field' => 'user_display_name',
                    'label' => 'Display Name',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'user_email',
                    'label' => 'Email',
                    'rules' => 'trim|required|valid_email|is_unique[users.user_email]'
                ),
                array(
                    'field' => 'user_password',
                    'label' => 'Password',
                    'rules' => 'trim|required|min_length[5]'
                ),
                array(
                    'field' => 'confirm_user_password',
                    'label' => 'Confirm Password',
                    'rules' => 'trim|required|min_length[5]|matches[user_password]'
                )
            );
    		$this->form_validation->set_rules($validation_rules);

            if ($this->form_validation->run() === TRUE){
                $this->install_model->insert_user_data();
                redirect('install?step=finish');
            }

            $this->load->view('install/header',$data);
            $this->load->view('install/step2',$data);
            $this->load->view('install/footer');
        }elseif($step=="finish"){
            $data['title']="Finish";
            write_install_lock();
            $this->load->view('install/header',$data);
            $this->load->view('install/finish',$data);
            $this->load->view('install/footer');
        }
    }
}