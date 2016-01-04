<?php
/**
 * Install Model
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Install_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->dbutil();
        $this->load->dbforge();
    }
    public function create_database($database_name){
        if ($this->dbutil->database_exists($database_name)){
            return TRUE;
        }else{
            if ($this->dbforge->create_database($database_name)){
                return TRUE;
            }
        }
        return FALSE;
    }
    public function create_tables($database_name){
        $this->db->query('use '.$database_name);
        $this->dbforge->add_field("blog_id bigint(20) NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("site_id int(11) NOT NULL DEFAULT '0'");
        $this->dbforge->add_field("blog_domain varchar(255) NOT NULL");
        $this->dbforge->add_field("blog_registered int(11) NOT NULL DEFAULT '0'");
        $this->dbforge->add_field("blog_last_updated int(11) NOT NULL DEFAULT '0'");
        $this->dbforge->add_field("blog_status varchar(255) NOT NULL DEFAULT 'public'");
        $this->dbforge->add_field("PRIMARY KEY (blog_id)");
        $attributes = array('ENGINE' => 'MyISAM');
        $this->dbforge->create_table('blogs', TRUE, $attributes);

        $this->dbforge->add_field("bloguser_id bigint(20) NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("blog_id bigint(20) NOT NULL");
        $this->dbforge->add_field("user_id bigint(20) NOT NULL");
        $this->dbforge->add_field("bloguser_capability varchar(255) NOT NULL");
        $this->dbforge->add_field("PRIMARY KEY (bloguser_id)");
        $attributes = array('ENGINE' => 'MyISAM');
        $this->dbforge->create_table('blogusers', TRUE, $attributes);

        $this->dbforge->add_field("category_id bigint(20) NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("category_name varchar(255) NOT NULL");
        $this->dbforge->add_field("category_description varchar(255) NOT NULL");
        $this->dbforge->add_field("category_slug varchar(255) NOT NULL");
        $this->dbforge->add_field("PRIMARY KEY (category_id)");
        $this->dbforge->add_field("UNIQUE KEY category_slug (category_slug) ");
        $attributes = array('ENGINE' => 'MyISAM');
        $this->dbforge->create_table('categories', TRUE, $attributes);

        $this->dbforge->add_field("relation_id bigint(20) NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("post_id bigint(20) NOT NULL");
        $this->dbforge->add_field("category_id bigint(20) NOT NULL");
        $this->dbforge->add_field("PRIMARY KEY (relation_id)");
        $attributes = array('ENGINE' => 'MyISAM');
        $this->dbforge->create_table('category_relationships', TRUE, $attributes);

        $this->dbforge->add_field("comment_id bigint(20) NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("post_id bigint(20) NOT NULL");
        $this->dbforge->add_field("user_id bigint(20) NULL");
        $this->dbforge->add_field("comment_author varchar(255) NULL");
        $this->dbforge->add_field("comment_author_email varchar(255) NULL");
        $this->dbforge->add_field("comment_author_website varchar(255) NULL");
        $this->dbforge->add_field("comment_author_ip varchar(255) NULL");
        $this->dbforge->add_field("comment_content text");
        $this->dbforge->add_field("comment_date int(11) DEFAULT '0'");
        $this->dbforge->add_field("comment_last_updated int(11) NULL");
        $this->dbforge->add_field("comment_agent varchar(255) NULL");
        $this->dbforge->add_field("comment_approved tinyint(1) DEFAULT '0'");
        $this->dbforge->add_field("PRIMARY KEY (comment_id)");
        $attributes = array('ENGINE' => 'MyISAM');
        $this->dbforge->create_table('comments', TRUE, $attributes);

        $this->dbforge->add_field("menu_id int(11) NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("menu_title varchar(255) NOT NULL");
        $this->dbforge->add_field("menu_url varchar(255) NOT NULL");
        $this->dbforge->add_field("menu_type varchar(255) NOT NULL DEFAULT 'page'");
        $this->dbforge->add_field("menu_position int(11) NOT NULL DEFAULT '0'");
        $this->dbforge->add_field("PRIMARY KEY (menu_id)");
        $attributes = array('ENGINE' => 'MyISAM');
        $this->dbforge->create_table('menus', TRUE, $attributes);

        $this->dbforge->add_field("page_id bigint(20) NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("user_id bigint(20) NOT NULL");
        $this->dbforge->add_field("page_title varchar(255) NOT NULL");
        $this->dbforge->add_field("page_date int(11) NOT NULL DEFAULT '0'");
        $this->dbforge->add_field("page_last_updated int(11) NULL");
        $this->dbforge->add_field("page_content longtext NOT NULL");
        $this->dbforge->add_field("page_status varchar(10) NOT NULL DEFAULT 'publish'");
        $this->dbforge->add_field("page_slug varchar(255) NOT NULL");
        $this->dbforge->add_field("PRIMARY KEY (page_id)");
        $this->dbforge->add_field("UNIQUE KEY page_slug (page_slug)");
        $attributes = array('ENGINE' => 'MyISAM');
        $this->dbforge->create_table('pages', TRUE, $attributes);

        $this->dbforge->add_field("post_id bigint(20) NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("user_id bigint(20) NOT NULL");
        $this->dbforge->add_field("post_title varchar(255) NOT NULL");
        $this->dbforge->add_field("post_date int(11) NOT NULL DEFAULT '0'");
        $this->dbforge->add_field("post_last_updated int(11) NULL");
        $this->dbforge->add_field("post_excerpt text NOT NULL");
        $this->dbforge->add_field("post_content longtext NOT NULL");
        $this->dbforge->add_field("post_sticky tinyint(1) NOT NULL DEFAULT '0'");
        $this->dbforge->add_field("post_status varchar(10) NOT NULL DEFAULT 'publish'");
        $this->dbforge->add_field("post_allow_comments tinyint(1) NOT NULL DEFAULT '1'");
        $this->dbforge->add_field("post_slug varchar(255) NOT NULL");
        $this->dbforge->add_field("PRIMARY KEY (post_id)");
        $this->dbforge->add_field("UNIQUE KEY post_slug (post_slug)");
        $attributes = array('ENGINE' => 'MyISAM');
        $this->dbforge->create_table('posts', TRUE, $attributes);

        $this->dbforge->add_field("setting_id bigint(20) NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("setting_name varchar(255) NOT NULL");
        $this->dbforge->add_field("setting_value longtext NULL");
        $this->dbforge->add_field("PRIMARY KEY (setting_id)");
        $attributes = array('ENGINE' => 'MyISAM');
        $this->dbforge->create_table('settings', TRUE, $attributes);

        $this->dbforge->add_field("site_meta_id bigint(20) NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("site_id bigint(20) NOT NULL");
        $this->dbforge->add_field("site_meta_name varchar(255) NOT NULL");
        $this->dbforge->add_field("site_meta_value longtext NULL");
        $this->dbforge->add_field("PRIMARY KEY (site_meta_id)");
        $attributes = array('ENGINE' => 'MyISAM');
        $this->dbforge->create_table('sitemeta', TRUE, $attributes);

        $this->dbforge->add_field("site_id bigint(20) NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("site_domain varchar(255) NOT NULL");
        $this->dbforge->add_field("site_status varchar(10) NOT NULL DEFAULT 'enabled'");
        $this->dbforge->add_field("PRIMARY KEY (site_id)");
        $attributes = array('ENGINE' => 'MyISAM');
        $this->dbforge->create_table('sites', TRUE, $attributes);

        $this->dbforge->add_field("tag_id bigint(20) NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("tag_name varchar(255) NOT NULL");
        $this->dbforge->add_field("tag_slug varchar(255) NOT NULL");
        $this->dbforge->add_field("PRIMARY KEY (tag_id)");
        $attributes = array('ENGINE' => 'MyISAM');
        $this->dbforge->create_table('tags', TRUE, $attributes);

        $this->dbforge->add_field("relation_id bigint(20) NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("tag_id bigint(20) NOT NULL");
        $this->dbforge->add_field("post_id bigint(20) NOT NULL");
        $this->dbforge->add_field("PRIMARY KEY (relation_id)");
        $attributes = array('ENGINE' => 'MyISAM');
        $this->dbforge->create_table('tags_relationships', TRUE, $attributes);

        $this->dbforge->add_field("user_meta_id bigint(20) NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("user_id bigint(20) NOT NULL");
        $this->dbforge->add_field("user_meta_name varchar(255) NOT NULL");
        $this->dbforge->add_field("user_meta_value longtext NULL");
        $this->dbforge->add_field("PRIMARY KEY (user_meta_id)");
        $attributes = array('ENGINE' => 'MyISAM');
        $this->dbforge->create_table('usermeta', TRUE, $attributes);

        $this->dbforge->add_field("user_id bigint(20) NOT NULL AUTO_INCREMENT");
        $this->dbforge->add_field("user_name varchar(255) NOT NULL");
        $this->dbforge->add_field("user_display_name varchar(255) NOT NULL");
        $this->dbforge->add_field("user_password varchar(255) NOT NULL");
        $this->dbforge->add_field("user_email varchar(255) NOT NULL");
        $this->dbforge->add_field("user_registered int(11) NOT NULL DEFAULT '0'");
        $this->dbforge->add_field("user_status varchar(255) NOT NULL DEFAULT 'active'");
        $this->dbforge->add_field("PRIMARY KEY (user_id)");
        $this->dbforge->add_field("UNIQUE KEY user_name (user_name)");
        $this->dbforge->add_field("UNIQUE KEY user_email (user_email)");
        $attributes = array('ENGINE' => 'MyISAM');
        $this->dbforge->create_table('users', TRUE, $attributes);
    }
    public function insert_site_data($database_name){
        $this->db->query('use '.$database_name);
        $blog = array(
			'blog_id' => 1,
			'site_id' => 1,
			'blog_domain'  => get_domain(base_url()),
			'blog_registered'  => time(),
            'blog_status'  => 'active'
		);
	    $this->db->insert('blogs', $blog);

        $category = array(
			'category_id' => 1,
			'category_name' => 'Uncategorized',
			'category_description'  => 'Uncategorized',
			'category_slug'  => 'uncategorized'
		);
	    $this->db->insert('categories', $category);

        $category_relationship = array(
			'relation_id' => 1,
			'post_id' => 1,
			'category_id'  => 1
		);
	    $this->db->insert('category_relationships', $category_relationship);

        $comment = array(
			'comment_id' => 1,
			'post_id' => 1,
			'comment_author'  => 'Mr DhoBlog',
			'comment_author_email'  => 'support@dhoblog.org',
            'comment_author_website'  => 'http://www.dhoblog.org/',
            'comment_content'  => 'This is a sample comment!',
            'comment_date'  => time(),
            'comment_approved'  => 1
		);
	    $this->db->insert('comments', $comment);

        $menu = array(
			'menu_id' => 1,
			'menu_title' => 'Sample Page',
			'menu_url'  => 'sample-page.html',
			'menu_type'  => 'page',
            'menu_position '  => 0
		);
	    $this->db->insert('menus', $menu);

        $page = array(
			'page_id' => 1,
			'user_id' => 1,
			'page_title'  => 'Sample Page',
			'page_date'  => time(),
            'page_content '  => 'This is a sample page, edit it or leave it!',
            'page_status '  => 'publish',
            'page_slug '  => 'sample-page',
		);
	    $this->db->insert('pages', $page);

        $post = array(
			'post_id' => 1,
			'user_id' => 1,
			'post_title'  => 'Sample Post',
			'post_date'  => time(),
            'post_excerpt'=>'This is a sample post, edit it or leave it!',
            'post_content '  => 'This is a sample post, edit it or leave it!',
            'post_sticky '  => 0,
            'post_status '  => 'publish',
            'post_allow_comments '  => 1,
            'post_slug '  => 'sample-post',
		);
	    $this->db->insert('posts', $post);

        $settings = array(
    		array(
    				'setting_name' => 'blog_title',
    				'setting_value' => 'DhoBlog'
    		),
    		array(
    				'setting_name' => 'blog_description',
    				'setting_value' => 'dhoBlog is a free and open source blogging platform built using the CodeIgniter PHP framework'
    		),
    		array(
    				'setting_name' => 'blog_tagline',
    				'setting_value' => 'Just Another DhoBlog Sites!'
    		),
    		array(
    				'setting_name' => 'blog_keywords',
    				'setting_value' => 'dhoblog, free blog'
    		),
    		array(
    				'setting_name' => 'blog_url',
    				'setting_value' => base_url()
    		),
    		array(
    				'setting_name' => 'backend_theme',
    				'setting_value' => 'default'
    		),
    		array(
    				'setting_name' => 'frontend_theme',
    				'setting_value' => 'default'
    		),
    		array(
    				'setting_name' => 'allow_registration',
    				'setting_value' => 0
    		),
    		array(
    				'setting_name' => 'admin_email',
    				'setting_value' => 'admin@'.get_domain(base_url())
    		),
    		array(
    				'setting_name' => 'default_category',
    				'setting_value' => 1
    		),
    		array(
    				'setting_name' => 'default_allow_comments',
    				'setting_value' => 1
    		),
    		array(
    				'setting_name' => 'posts_per_page',
    				'setting_value' => 10
    		),
    		array(
    				'setting_name' => 'blog_offline',
    				'setting_value' => 0
    		),
    		array(
    				'setting_name' => 'offline_reason',
    				'setting_value' => ''
    		),
    		array(
    				'setting_name' => 'date_format',
    				'setting_value' => 'F j, Y'
    		),
    		array(
    				'setting_name' => 'time_format',
    				'setting_value' => 'h:i:s a'
    		),
    		array(
    				'setting_name' => 'comments_moderation',
    				'setting_value' => 1
    		),
    		array(
    				'setting_name' => 'post_permalink',
    				'setting_value' => 'datename'
    		),
    		array(
    				'setting_name' => 'category_permalink',
    				'setting_value' => 'category'
    		),
    		array(
    				'setting_name' => 'tag_permalink',
    				'setting_value' => 'tag'
    		),
    		array(
    				'setting_name' => 'page_permalink',
    				'setting_value' => 'page'
    		),
    		array(
    				'setting_name' => 'comments_registration',
    				'setting_value' => 0
    		),
    		array(
    				'setting_name' => 'default_role',
    				'setting_value' => 'subscriber'
    		),
    		array(
    				'setting_name' => 'timezone',
    				'setting_value' => 'Asia/Jakarta'
    		),
    		array(
    				'setting_name' => 'feed_show_count',
    				'setting_value' => 10
    		),
    		array(
    				'setting_name' => 'feed_use_excerpt',
    				'setting_value' => 1
    		),
    		array(
    				'setting_name' => 'search_engine_visibility',
    				'setting_value' => 1,
    		),
            array(
    				'setting_name' => 'permissions',
    				'setting_value' => serialize(get_default_permissions())
    		)
        );
        $this->db->insert_batch('settings', $settings);

        $site_meta = array(
            array(
                    'site_id'=> 1,
                    'site_meta_name' => 'site_name',
                    'site_meta_value' => 'DhoBlog Sites'
            ),
            array(
                    'site_id'=> 1,
                    'site_meta_name' => 'admin_email',
                    'site_meta_value' => 'admin@'.get_domain(base_url())
            ),
            array(
                    'site_id'=> 1,
                    'site_meta_name' => 'admin_user_id',
                    'site_meta_value' => 1
            ),
            array(
                    'site_id'=> 1,
                    'site_meta_name' => 'registration',
                    'site_meta_value' => 'all'
            ),
            array(
                    'site_id'=> 1,
                    'site_meta_name' => 'site_admins',
                    'site_meta_value' => ''
            ),
            array(
                    'site_id'=> 1,
                    'site_meta_name' => 'allowed_themes',
                    'site_meta_value' => ''
            ),
            array(
                    'site_id'=> 1,
                    'site_meta_name' => 'illegal_names',
                    'site_meta_value' => ''
            ),
            array(
                    'site_id'=> 1,
                    'site_meta_name' => 'welcome_email',
                    'site_meta_value' => ''
            ),
            array(
                    'site_id'=> 1,
                    'site_meta_name' => 'site_url',
                    'site_meta_value' => base_url()
            ),
            array(
                    'site_id'=> 1,
                    'site_meta_name' => 'user_count',
                    'site_meta_value' => 1
            ),
            array(
                    'site_id'=> 1,
                    'site_meta_name' => 'blog_count',
                    'site_meta_value' => 1
            )
        );
        $this->db->insert_batch('sitemeta', $site_meta);

        $site = array(
			'site_id' => 1,
			'site_domain' => get_domain(base_url()),
			'site_status'  => 'enabled'
		);
	    $this->db->insert('sites', $site);

        $user_meta = array(
            array(
                    'user_id'=> 1,
                    'user_meta_name' => 'first_name',
                    'user_meta_value' => ''
            ),
            array(
                    'user_id'=> 1,
                    'user_meta_name' => 'last_name',
                    'user_meta_value' => ''
            ),
            array(
                    'user_id'=> 1,
                    'user_meta_name' => 'bio',
                    'user_meta_value' => ''
            ),
            array(
                    'user_id'=> 1,
                    'user_meta_name' => 'primary_blog',
                    'user_meta_value' => 1
            ),
            array(
                    'user_id'=> 1,
                    'user_meta_name' => 'website',
                    'user_meta_value' => ''
            )
        );
        $this->db->insert_batch('usermeta', $user_meta);
    }
    public function insert_user_data(){
        $user_data = array(
            'user_id' => 1,
            'user_name' => $this->db->escape_str($this->input->post('user_name')),
            'user_display_name' => $this->db->escape_str($this->input->post('user_display_name')),
            'user_password' => hash_password($this->input->post('user_password')),
            'user_email' => $this->db->escape_str($this->input->post('user_email')),
            'user_registered' => time(),
            'user_status' => 'active'
        );
        $this->db->insert('users', $user_data);

        $bloguser = array(
            'blog_id' => 1,
            'user_id' => 1,
            'bloguser_capability' => 'administrator'
        );
        $this->db->insert('blogusers', $bloguser);
    }
}