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
        $this->CI->load->helper("file");
	}
    public function get_domain($url){
        $host = @parse_url($url, PHP_URL_HOST);
        if (!$host){
            $host = $url;
        }
        if (substr($host, 0, 4) == "www."){
            $host = substr($host, 4);
        }
        if (strlen($host) > 50){
            $host = substr($host, 0, 47) . '...';
        }
        return $host;
    }
    public function get_subdomain($url){
        $domain=$this->get_domain($url);
        preg_match('/([^\.]+)\.[^\.]+\.[^\.]+$/', $domain, $rgMatches);
        $sDomain = count($rgMatches)?$rgMatches[1]:null;
        return $sDomain;
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
        $domain=$this->get_domain($url);
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
        $this->CI->post_per_page=$settings['post_per_page'];
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
    }
}