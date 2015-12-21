<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library(array('themes','form_validation'));
        $this->load->model(array('categories_model'));
    }
    public function index(){
        $data['title']="All Categories";
        $data['categories']=$this->categories_model->get_categories();

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
        $data['category']=$this->categories_model->get_category($category_id);

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