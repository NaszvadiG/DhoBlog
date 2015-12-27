<?php
/**
 * Pages Controller
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends Backend {

    public function __construct(){
        parent::__construct();
        $page_config=array(
            'table'=>$this->table_pages,
            'field_id'=>'page_id',
            'field_title'=>'page_title',
            'field_slug'=>'page_slug'
        );
        $this->load->library('slug');
        $this->slug->set_config($page_config);
        $this->load->helper('datetime');
    }
    public function index(){
        $data['title']="All Pages";

        $page=$this->uri->segment(3);
		$limit=5;
        if(!$page):
		$offset = 0;
		else:
		$offset = ($page-1)*$limit;
		endif;
		$config['base_url']=base_url('dashboard/pages');
		$config['total_rows']=$this->pages_model->get_pages_count();
		$config['per_page'] = $limit;
        $config['use_page_numbers'] = TRUE;

		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = '<li>';
        $config['first_link'] = 'First';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href>';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_link'] = 'Last';
        $config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data['paging']=$this->pagination->create_links();
        $data['pages']=$this->pages_model->get_pages_limit($limit,$offset);

        $data['container']="admin/pages";
        $this->themes->load($data,TRUE);
	}
    public function newpage(){
        $data['title']="Add New Page";

        $validation_rules=array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required|max_length[255]'
            ),
            array(
                'field' => 'content',
                'label' => 'Content',
                'rules' => 'required'
            )
        );

		$this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() === false) {
            $data['container']="admin/newpage";
            $this->themes->load($data,TRUE);
		} else {

            $page_id=$this->pages_model->add_page();

            redirect('/dashboard/editpage/'.$page_id);
		}
	}
    public function editpage($page_id){
        $data['title']="Edit Page";
        $data['page']=$this->pages_model->get_page_by_id($page_id);
        $validation_rules=array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required|max_length[255]'
            ),
            array(
                'field' => 'content',
                'label' => 'Content',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() === false) {
            $data['container']="admin/editpage";
            $this->themes->load($data,TRUE);
		} else {
            $this->pages_model->edit_page($page_id);
            redirect('/dashboard/editpage/'.$page_id);
		}
 	}
    public function deletepage($page_id){
		$this->pages_model->delete_page($page_id);
		redirect('/dashboard/pages');
	}

}