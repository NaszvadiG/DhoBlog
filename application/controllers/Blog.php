<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model(array('categories_model','posts_model'));
        $this->load->library(array('themes','pagination','permalinks'));
    }
    public function index(){
        $data['title']="dhoBlog";
		$data['description']="dhoBlog is a free and open source blogging platform built using the CodeIgniter PHP framework.";
        $data['keywords']="dhoblog, free blog";
		$data['categories']=$this->categories_model->get_categories();

		$page=$this->uri->segment(2);
		$limit=5;
		$offset = 0;

		$config['base_url']=base_url('posts');
		$config['total_rows']= $this->posts_model->get_posts_count();
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

		$data['posts']=$this->posts_model->get_posts_limit($limit,0);
        $data['container']="blog/home";

        $this->themes->load($data);
	}
    public function posts(){
		$page=$this->uri->segment(2);
		$limit=5;

		if($page){
        $offset = ($page-1)*$limit;
		$data['title']="dhoBlog";
		$data['description']="dhoBlog is a free and open source blogging platform built using the CodeIgniter PHP framework.";
        $data['keywords']="dhoblog, free blog";
		$data['categories']=$this->categories_model->get_categories();

		$config['base_url']=base_url('posts');
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
        $data['container']="blog/home";

		$this->themes->load($data);
		}else{
			redirect(base_url());
		}
	}
    public function category($category_slug){
        $cat=$this->categories_model->get_category_by_slug($category_slug);
		$data['title']=$cat['category_name']." - dhoBlog";
		$data['description']=$cat['category_description'];
        $data['keywords']="dhoblog, free blog";
		$data['categories']=$data['categories']=$this->categories_model->get_categories();
		$data['category']=$cat;

		$page=$this->uri->segment(3);
		$limit=5;
        if(!$page):
		$offset = 0;
		else:
		$offset = ($page-1)*$limit;
		endif;
		$config['base_url']=base_url('category/'.$category_slug);
		$config['total_rows']=$this->categories_model->get_posts_count_in_category($category_slug);
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

		$data['posts']=$this->posts_model->get_posts_by_category($category_slug,$limit,$offset);
		$data['container']="blog/home";

		$this->themes->load($data);
	}
    public function post($field1=NULL,$field2=NULL,$field3=NULL,$field4=NULL){
        $permalink=$this->permalinks->get_default_post_permalink();
        if($permalink=="datename"){
            $post=$this->posts_model->get_post_by_date_slug($field1,$field2,$field3,$field4);
    		$data['title']=$post['post_title']." - Dhoblog";
    		$data['description']=$post['post_excerpt'];
            $data['keywords']='dhoblog,';
    		$data['categories']=$this->categories_model->get_categories();
    		$data['query']="";
    		$data['post']=$post;
        }elseif($permalink=="numeric"){
            $post=$this->posts_model->get_post_by_id($field1);
    		$data['title']=$post['post_title']." - Dhoblog";
    		$data['description']=$post['post_excerpt'];
            $data['keywords']='dhoblog,';
    		$data['categories']=$this->categories_model->get_categories();
    		$data['query']="";
    		$data['post']=$post;
        }elseif($permalink=="postname"){
            $post=$this->posts_model->get_post_by_slug($field1);
    		$data['title']=$post['post_title']." - Dhoblog";
    		$data['description']=$post['post_excerpt'];
            $data['keywords']='dhoblog,';
    		$data['categories']=$this->categories_model->get_categories();
    		$data['query']="";
    		$data['post']=$post;
        }

        $data['container']="blog/post";
		$this->themes->load($data);
	}
}