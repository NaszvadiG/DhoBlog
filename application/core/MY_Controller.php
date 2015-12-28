<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dhoblog extends CI_Controller{
    public $dhoblog_config;

    //Site Information
    public $blog_id;
    public $site_id;
    public $blog_domain;
    public $blog_registered;
    public $blog_last_updated;
    public $blog_status;

    //Site Settings
    public $blog_title;
    public $blog_description;
    public $blog_tagline;
    public $blog_keywords;
    public $blog_url;
    public $backend_theme;
    public $frontend_theme;
    public $allow_registration;
    public $admin_email;
    public $default_category;
    public $default_allow_comments;
    public $post_per_page;
    public $blog_offline;
    public $offline_reason;
    public $date_format;
    public $time_format;
    public $comments_moderation;
    public $post_permalink;
    public $category_permalink;
    public $tag_permalink;
    public $page_permalink;
    public $comments_registration;
    public $default_role;
    public $timezone;
    public $posts_per_page;
    public $feed_show_count;
    public $feed_use_excerpt;
    public $search_engine_visibility;

    //Dynamic Tables
    public $table_categories;
    public $table_category_relationships;
    public $table_comments;
    public $table_menus;
    public $table_pages;
    public $table_posts;
    public $table_settings;
    public $table_tags;
    public $table_tag_relationships;

    //Static Tables
    public $table_blogs='blogs';
    public $table_blogusers='blogusers';
    public $table_sitemeta='sitemeta';
    public $table_sites='sites';
    public $table_usermeta='usermeta';
    public $table_users='users';

    protected $data = array();

    public function __construct(){
        parent::__construct();
        $this->load->database();

        $this->config->load('dhoblog', TRUE);
        $this->dhoblog_config=$this->config->item('dhoblog');

        $this->load->model(array('categories_model','posts_model','menus_model','pages_model','users_model','sites_model'));
        $this->load->library(array('themes','pagination','permalinks','form_validation','sites'));
        $this->load->helper('url');

        $this->output->set_header('X-XSS-Protection: 1; mode=block');
		$this->output->set_header('X-Frame-Options: DENY');
		$this->output->set_header('X-Content-Type-Options: nosniff');

        $site=$this->sites->get_site(base_url());

        if($site){
            $this->blog_id=$site['blog_id'];
            $this->site_id=$site['site_id'];
            $this->blog_domain=$site['blog_domain'];
            $this->blog_registered=$site['blog_registered'];
            $this->blog_last_updated=$site['blog_last_updated'];
            $this->blog_status=$site['blog_status'];

            if($this->dhoblog_config['blog_id_current_site']==$this->blog_id){
                $this->table_categories='categories';
                $this->table_category_relationships='category_relationships';
                $this->table_comments='comments';
                $this->table_menus='menus';
                $this->table_pages='pages';
                $this->table_posts='posts';
                $this->table_settings='settings';
                $this->table_tags='tags';
                $this->table_tag_relationships='tag_relationships';
            }else{
                $this->table_categories=$this->blog_id.'_categories';
                $this->table_category_relationships=$this->blog_id.'_category_relationships';
                $this->table_comments=$this->blog_id.'_comments';
                $this->table_menus=$this->blog_id.'_categories';
                $this->table_pages=$this->blog_id.'_pages';
                $this->table_posts=$this->blog_id.'_posts';
                $this->table_settings=$this->blog_id.'_settings';
                $this->table_tags=$this->blog_id.'_tags';
                $this->table_tag_relationships=$this->blog_id.'_tag_relationships';
            }
            $this->sites->get_site_settings();

            if($this->blog_status=="spam"){
                $this->data['title']="Site Spammed!";
                $this->data['status']="This site has marked as spam!";
                $this->data['reason']="Reason: Un-natural posting!";
                $this->data['container']="error/status";
		        $this->themes->load($this->data);
                return;
            }elseif($this->blog_status=="deleted"){
                $this->data['title']="Site Deleted!";
                $this->data['status']="This site has been deleted!";
                $this->data['reason']="Reason: TOS Violation!";
                $this->data['container']="error/status";
		        $this->themes->load($this->data);
                return;
            }
        }else{
            $new=$this->sites->get_subdomain(base_url());
            redirect('http://'.$this->dhoblog_config['domain_current_site'].'/user/register?new='.$new);
        }
    }
}
class Frontend extends Dhoblog {
     public function __construct(){
        parent::__construct();

        $this->data['blog_title']="Dhoblog";
        $this->data['blog_tagline']="Just Another DhoBlog Site!";
        $this->data['blog_description']="dhoBlog is a free and open source blogging platform built using the CodeIgniter PHP framework.";
        $this->data['blog_keywords']="dhoblog, free blog";
        $this->data['categories']=$this->categories_model->get_categories();
        $this->data['menus']=$this->menus_model->get_menus();
        $this->data['is_home']=($this->router->fetch_class() === 'blog' && $this->router->fetch_method() === 'index') ? true : false;
    }
}
class Backend extends Dhoblog {
    public function __construct(){
        parent::__construct();

    }
}