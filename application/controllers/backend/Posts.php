<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends Backend {

    public function __construct(){
        parent::__construct();
        $post_config=array(
            'table'=>$this->table_posts,
            'field_id'=>'post_id',
            'field_title'=>'post_title',
            'field_slug'=>'post_slug'
        );
        $this->load->library('slug');
        $this->slug->set_config($post_config);
        $this->load->helper('datetime');
    }
    public function index(){
        $data['title']="All Posts";

        $page=$this->uri->segment(3);
		$limit=5;
        if(!$page):
		$offset = 0;
		else:
		$offset = ($page-1)*$limit;
		endif;
		$config['base_url']=base_url('dashboard/posts');
		$config['total_rows']=$this->posts_model->get_posts_count();
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
        $data['posts']=$this->posts_model->get_posts_limit($limit,$offset);

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
        $data['post']=$this->posts_model->get_post_by_id($post_id);
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