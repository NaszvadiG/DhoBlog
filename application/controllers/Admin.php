<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library(array('themes','form_validation'));
        $this->load->model(array('admin_model'));
    }

    public function index()
	{
	    $data['title']="Dashboard";
	    $this->themes->load_back_theme("default","admin_home",$data);
	}
    public function posts(){
        $data['title']="All Posts";
        $data['posts']=$this->admin_model->get_posts();
        $this->themes->load_back_theme("default","admin_posts",$data);
	}
    public function newpost(){
        $data['title']="Add New Post";
        $data['categories']=$this->admin_model->get_categories();

        $validation_rules=array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required|max_length[255]'
            ),
            array(
                'field' => 'excerpt',
                'label' => 'Excerpt',
                'rules' => 'required'
            ),
            array(
                'field' => 'content',
                'label' => 'Content',
                'rules' => 'required'
            )
        );

		$this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() === false) {
            $this->themes->load_back_theme("default","admin_newpost",$data);
		} else {
            $post_id=$this->admin_model->addpost();
            redirect('/admin/editpost/'.$post_id);
		}
	}
    public function editpost($post_id){
        $data['title']="Edit Post";
        $data['categories']=$this->admin_model->get_categories();
        $data['post']=$this->admin_model->get_post($post_id);

        $validation_rules=array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required|max_length[255]'
            ),
            array(
                'field' => 'excerpt',
                'label' => 'Excerpt',
                'rules' => 'required'
            ),
            array(
                'field' => 'content',
                'label' => 'Content',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() === false) {
            $this->themes->load_back_theme("default","admin_editpost",$data);
		} else {
            $this->admin_model->editpost($post_id);
            redirect('/admin/editpost/'.$post_id);
		}
 	}
    public function deletepost($post_id){
		$this->admin_model->deletepost($post_id);
		redirect('/admin/posts');
	}
    public function newcategory(){
        $data['title']="Add New Category";
        $data['categories']=$this->admin_model->get_categories();

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
            $this->themes->load_back_theme("default","admin_newcategory",$data);
		} else {
            $cat_id=$this->admin_model->addcategory();
            redirect('/admin/editcategory/'.$cat_id);
		}
	}
    public function editcategory($category_id){
        $data['title']="Edit Category";
        $data['category']=$this->admin_model->get_category($category_id);

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
            $this->themes->load_back_theme("default","admin_editcategory",$data);
		} else {
            $this->admin_model->editcategory($category_id);
            redirect('/admin/editcategory/'.$category_id);
		}
	}
    public function categories(){
        $data['title']="All Categories";
        $data['categories']=$this->admin_model->get_categories();
        $this->themes->load_back_theme("default","admin_categories",$data);
	}
    public function deletecategory($category_id){
		$this->admin_model->deletecategory($category_id);
		redirect('/admin/categories');
	}
}