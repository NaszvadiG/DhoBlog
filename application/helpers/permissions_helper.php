<?php
/**
 * Permissions Helper
 *
 * @author Mutasim Ridlo, S.Kom (http://www.ridho.id)
 * @copyright Copyright (c) 2015, Dhosoft (http://www.dhosoft.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://www.dhosoft.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('get_permission_lists')) {
    function get_permission_lists(){
      	$permissions=array(
            'manage_network',
            'manage_sites',
            'manage_network_users',
            'manage_network_themes',
            'manage_network_settings',
            'list_users',
            'create_users',
            'edit_users',
            'delete_users',
            'remove_users',
            'install_themes',
            'update_themes',
            'switch_themes',
            'delete_themes',
            'edit_themes',
            'manage_settings',
            'update_system',
            'moderate_comments',
            'manage_categories',
            'manage_menus',
            'publish_own_pages',
            'edit_own_pages',
            'delete_own_pages',
            'edit_others_pages',
            'delete_others_pages',
            'publish_own_posts',
            'edit_own_posts',
            'delete_own_posts',
            'edit_others_posts',
            'delete_others_posts',
            'read'
        );
		return $permissions;
    }
}
if ( ! function_exists('get_default_permissions')) {
    function get_default_permissions(){
      	$permissions=array(
            'administrator' => array(
                    'name'=>'Administrator',
                    'capabilities'=> array(
                            'list_users',
                            'create_users',
                            'edit_users',
                            'delete_users',
                            'remove_users',
                            'install_themes',
                            'update_themes',
                            'switch_themes',
                            'delete_themes',
                            'edit_themes',
                            'manage_settings',
                            'update_system',
                            'moderate_comments',
                            'manage_categories',
                            'manage_menus',
                            'publish_own_pages',
                            'edit_own_pages',
                            'delete_own_pages',
                            'edit_others_pages',
                            'delete_others_pages',
                            'publish_own_posts',
                            'edit_own_posts',
                            'delete_posts',
                            'edit_others_posts',
                            'delete_others_posts',
                            'read'
                    )
                ),
            'editor' => array(
                    'name'=>'Editor',
                    'capabilities'=> array(
                            'moderate_comments',
                            'manage_categories',
                            'manage_menus',
                            'publish_own_pages',
                            'edit_own_pages',
                            'delete_own_pages',
                            'edit_others_pages',
                            'delete_others_pages',
                            'publish_own_posts',
                            'edit_own_posts',
                            'delete_own_posts',
                            'edit_others_posts',
                            'delete_others_posts',
                            'read'
                    )
                ),
            'author' => array(
                    'name'=>'Author',
                    'capabilities'=> array(
                            'publish_own_posts',
                            'edit_own_posts',
                            'delete_own_posts',
                            'read'
                    )
                ),
            'subscriber' => array(
                    'name'=>'Subscriber',
                    'capabilities'=> array(
                            'read'
                    )
                ),
        );
		return $permissions;
    }
}