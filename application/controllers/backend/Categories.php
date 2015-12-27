<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends Backend {

    public function __construct(){
        parent::__construct();
        $category_config=array(
            'table'=>$this->table_categories,
            'field_id'=>'category_id',
            'field_title'=>'category_name',
            'field_slug'=>'category_slug'
        );
        $this->load->library('slug');
        $this->slug->set_config($category_config);
    }
    public function index(){
        $data['title']="All Categories";

        $page=$this->uri->segment(3);
		$limit=5;
        if(!$page):
		$offset = 0;
		else:
		$offset = ($page-1)*$limit;
		endif;
		$config['base_url']=base_url('dashboard/categories');
		$config['total_rows']=$this->categories_model->get_categories_count();
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
        $data['categories']=$this->categories_model->get_categories_limit($limit, $offset);

        $data['container']="admin/categories";
        $this->themes->load($data,TRUE);
	}
    public function newcategory(){
        $data['title']="Add New Category";
        $data['categories']=$this->categories_model->get_categories();

        $validation_rules=array(
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required|max_length[255]'
            ),
            array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required'
            )
        );

		$this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() === false) {
            $data['container']="admin/newcategory";
            $this->themes->load($data,TRUE);
		} else {
            $cat_id=$this->categories_model->addcategory();
            redirect('/dashboard/editcategory/'.$cat_id);
		}
	}
    public function editcategory($category_id){
        $data['title']="Edit Category";
        $data['category']=$this->categories_model->get_category_by_id($category_id);

        $validation_rules=array(
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required|max_length[255]'
            ),
            array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required'
            )
        );

		$this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() === false) {
            $data['container']="admin/editcategory";
            $this->themes->load($data,TRUE);
		} else {
            $this->categories_model->editcategory($category_id);
            redirect('/dashboard/editcategory/'.$category_id);
		}
	}
    public function deletecategory($category_id){
		$this->categories_model->deletecategory($category_id);
		redirect('/dashboard/categories');
	}
}