<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| dhoBlog Information
|--------------------------------------------------------------------------
|
| Informations related with dhoBlog
|
*/
$config['name'] = 'DhoBlog';
$config['version'] = '1.0.0';
$config['author'] = 'Mutasim Ridlo, S.Kom';
$config['author_email'] = 'me@ridho.id';
$config['author_website'] = 'http://www.ridho.id/';
$config['version_check_url'] = 'http://update.dhoblog.org/';
$config['website_url'] = 'http://www.dhoblog.org/';
$config['documentation_url'] = 'http://docs.dhoblog.org/';
$config['download_url'] = 'http://www.dhoblog.org/downloads/';

/*
|--------------------------------------------------------------------------
| Multisite
|--------------------------------------------------------------------------
|
| Whether allow multisite or not
|
*/
$config['allow_multisite']='false';

/*
|--------------------------------------------------------------------------
| Use Domain
|--------------------------------------------------------------------------
|
| Whether use domain or not, your sub blog will be domain.tld
|
*/
$config['use_domain']='false';

/*
|--------------------------------------------------------------------------
| Use Subdomain
|--------------------------------------------------------------------------
|
| Whether use subdomain or not, your sub blog will be sub.domain.tld
|
*/
$config['use_subdomain']='false';

/*
|--------------------------------------------------------------------------
| Domain Current Site
|--------------------------------------------------------------------------
|
| Your domain in current site
|
*/
$config['domain_current_site']='%DOMAIN%';

/*
|--------------------------------------------------------------------------
| Site ID Current Site
|--------------------------------------------------------------------------
|
| Your side id in current site
|
*/
$config['site_id_current_site']=1;

/*
|--------------------------------------------------------------------------
| Blog ID Current site
|--------------------------------------------------------------------------
|
| Your blog id in current site
|
*/
$config['blog_id_current_site']=1;