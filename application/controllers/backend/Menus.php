<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menus extends Backend {

    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $data['title']="All Menus";

        $page=$this->uri->segment(3);
		$limit=5;
        if(!$page):
		$offset = 0;
		else:
		$offset = ($page-1)*$limit;
		endif;
		$config['base_url']=base_url('dashboard/menus');
		$config['total_rows']=$this->menus_model->get_menus_count();
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
        $data['menus']=$this->menus_model->get_menus_limit($limit,$offset);

        $data['container']="admin/menus";
        $this->themes->load($data,TRUE);
	}
    public function newmenu(){
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

            $page_id=$this->menus_model->add_page();

            redirect('/dashboard/editpage/'.$page_id);
		}
	}
    public function editmenu($page_id){
        $data['title']="Edit Page";
        $data['page']=$this->menus_model->get_page_by_id($page_id);
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
            $this->menus_model->edit_page($page_id);
            redirect('/dashboard/editpage/'.$page_id);
		}
 	}
    public function deletemenu($page_id){
		$this->menus_model->delete_page($page_id);
		redirect('/dashboard/pages');
	}

}