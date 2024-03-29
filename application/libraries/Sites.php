<?php
/**
 * Sites Library
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Sites {
    public function __construct(){
		$this->CI =& get_instance();
        $this->CI->load->helper(array("file","domain"));
	}
    function create_site_dir($site_id){
        $path = FCPATH."/files/".$site_id;

        if(!is_dir($path)){
          mkdir($path,0777,TRUE);
        }
    }
    function delete_site_dir($site_id){
        $path = FCPATH."/files/".$site_id;

        delete_files($path, true);
        rmdir($path);
    }
    function get_sites($user_id=NULL){
        $sites=array();
        $data=$CI->sites_model->get_sites($user_id);
        $x=0;
        foreach($data as $site){
            $sites[$x]['blog_id']=$site['id'];
            $sites[$x]['blog_domain']=$site['domain'];
            $sites[$x]['registered']=$site['registered'];
            $config=base_settings($site['id']);
            $sites[$x]['url']=$config['siteurl'];
            $x++;
        }
        return $sites;
    }
    function get_site($url){
        $domain=get_domain($url);
        return $this->CI->sites_model->get_site($domain);
    }
    public function get_site_settings(){
        $settings=$this->CI->sites_model->get_site_settings();
        $this->CI->blog_title=$settings['blog_title'];
        $this->CI->blog_description=$settings['blog_description'];
        $this->CI->blog_tagline=$settings['blog_tagline'];
        $this->CI->blog_keywords=$settings['blog_keywords'];
        $this->CI->blog_url=$settings['blog_url'];
        $this->CI->backend_theme=$settings['backend_theme'];
        $this->CI->frontend_theme=$settings['frontend_theme'];
        $this->CI->allow_registration=$settings['allow_registration'];
        $this->CI->admin_email=$settings['admin_email'];
        $this->CI->default_category=$settings['default_category'];
        $this->CI->default_allow_comments=$settings['default_allow_comments'];
        $this->CI->posts_per_page=$settings['posts_per_page'];
        $this->CI->blog_offline=$settings['blog_offline'];
        $this->CI->offline_reason=$settings['offline_reason'];
        $this->CI->date_format=$settings['date_format'];
        $this->CI->time_format=$settings['time_format'];
        $this->CI->comments_moderation=$settings['comments_moderation'];
        $this->CI->post_permalink=$settings['post_permalink'];
        $this->CI->category_permalink=$settings['category_permalink'];
        $this->CI->tag_permalink=$settings['tag_permalink'];
        $this->CI->page_permalink=$settings['page_permalink'];
        $this->CI->comments_registration=$settings['comments_registration'];
        $this->CI->default_role=$settings['default_role'];
        $this->CI->timezone=$settings['timezone'];
        $this->CI->feed_show_count=$settings['feed_show_count'];
        $this->CI->feed_use_excerpt=$settings['feed_use_excerpt'];
        $this->CI->search_engine_visibility=$settings['search_engine_visibility'];
    }
}