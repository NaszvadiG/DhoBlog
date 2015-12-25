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
        $data=$CI->database->view_all_sites();
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
        $site=$this->CI->database->view_site($domain);
        $data=array();
        $data['domain']=$domain;
        if($site){
            $data['id']=$site['id'];
            $data['type']=$site['type'];
        }else{
            $data['id']="";
            $data['type']="";
        }
       return $data;
    }
}