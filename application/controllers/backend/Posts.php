<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library(array('themes','form_validation'));
        $this->load->model(array('categories_model','posts_model'));
    }
    public function index(){
        $data['title']="All Posts";
        $data['posts']=$this->posts_model->get_posts();

        $data['container']="admin/posts";
        $this->themes->load($data,TRUE);
	}
    public function newpost(){
        $data['title']="Add New Post";
        $data['categories']=$this->categories_model->get_categories();

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
            $data['container']="admin/newpost";
            $this->themes->load($data,TRUE);
		} else {
		    $categories = $this->input->post('categories');

            $post_id=$this->posts_model->add_post();
            foreach ($categories as $category_id)
			{
				$this->posts_model->add_post_category($post_id, $category_id);
			}
            redirect('/dashboard/editpost/'.$post_id);
		}
	}
    public function editpost($post_id){
        $data['title']="Edit Post";
        $data['categories']=$this->categories_model->get_categories();
        $data['post']=$this->posts_model->get_post($post_id);
        $data['post_categories']=$this->posts_model->get_post_categories($post_id);
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
            $data['container']="admin/editpost";
            $this->themes->load($data,TRUE);
		} else {
		    $categories = $this->input->post('categories');

            $this->posts_model->edit_post($post_id);
            $this->posts_model->edit_post_categories($post_id, $categories);
            redirect('/dashboard/editpost/'.$post_id);
		}
 	}
    public function deletepost($post_id){
		$this->posts_model->delete_post($post_id);
		redirect('/dashboard/posts');
	}

}