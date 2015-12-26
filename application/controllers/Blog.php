<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends Frontend{

    public function __construct(){
        parent::__construct();
    }
    public function index(){
		$page=$this->uri->segment(2);
		$limit=5;
		$offset = 0;

		$config['base_url']=base_url('posts');
		$config['total_rows']= $this->posts_model->get_posts_count('publish');
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
		$this->data['paging']=$this->pagination->create_links();

		$this->data['posts']=$this->posts_model->get_posts_limit($limit,0,'publish');
        $this->data['container']="blog/home";

        $this->themes->load($this->data);
	}
    public function posts(){
		$page=$this->uri->segment(2);
        $this->data['title']="Page ".$page;
		$limit=5;

		if($page){
        $offset = ($page-1)*$limit;

		$config['base_url']=base_url('posts');
		$config['total_rows']=$this->posts_model->get_posts_count('publish');
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
		$this->data['paging']=$this->pagination->create_links();

		$this->data['posts']=$this->posts_model->get_posts_limit($limit,$offset,'publish');
        $this->data['container']="blog/home";

		$this->themes->load($this->data);
		}else{
			redirect(base_url());
		}
	}
    public function category($category_slug){
        $cat=$this->categories_model->get_category_by_slug($category_slug);
		$this->data['title']=$cat['category_name'];
		$this->data['category']=$cat;

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
		$this->data['paging']=$this->pagination->create_links();

		$this->data['posts']=$this->posts_model->get_posts_by_category($category_slug,$limit,$offset);
		$this->data['container']="blog/home";

		$this->themes->load($this->data);
	}
    public function post($field1=NULL,$field2=NULL,$field3=NULL,$field4=NULL){
        $permalink=$this->post_permalink;
        if($permalink=="datename"){
            $post=$this->posts_model->get_post_by_date_slug($field1,$field2,$field3,$field4);
        }elseif($permalink=="numeric"){
            $post=$this->posts_model->get_post_by_id($field1);
        }elseif($permalink=="postname"){
            $post=$this->posts_model->get_post_by_slug($field1);
        }
        $this->data['title']=$post['post_title'];
    	$this->data['post']=$post;

        $this->data['container']="blog/post";
		$this->themes->load($this->data);
	}
    public function page($page_slug=NULL){
        $page=$this->pages_model->get_page_by_slug($page_slug);
		$this->data['title']=$page['page_title'];
		$this->data['page']=$page;

        $this->data['container']="blog/page";
		$this->themes->load($this->data);
	}
}