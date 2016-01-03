<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title><?php if($is_home):echo $blog_title;else: echo $title.' - '.$blog_title;endif;?></title>
    <?php if($is_home){?><meta name="description" content="<?php echo $blog_description;?>">
    <meta name="keywords" content="<?php echo $blog_keywords;?>">
    <?php }?><meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="generator" content="<?php echo $this->config->item('name').' '.$this->config->item('version');?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="<?php echo base_url('views/frontend/default/assets/css/bootstrap.min.css');?>" media="screen">
    <link rel="stylesheet" href="<?php echo base_url('views/frontend/default/assets/css/style.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('views/frontend/default/assets/third_party/font-awesome-4.5.0/css/font-awesome.min.css');?>">

</head>
  <body>
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo base_url();?>" class="navbar-brand">Home</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
          <?php if($menus){
              foreach($menus as $menu){ ?>
              <li><a href="<?php if($menu['menu_type']=="page"){
                                echo base_url('page/'.$menu['menu_url']);
                            }if($menu['menu_type']=="link"){
                                echo $menu['menu_url'];
                            }if($menu['menu_type']=="category"){
                                echo base_url('category/'.$menu['menu_url']);
                            }
                            ?>"><?php echo $menu['menu_title'];?></a></li>
          <?php }}?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <i class="fa fa-caret-down"></i></a>
              <ul class="dropdown-menu">
                <li><a href="#">Login</a></li>
                <li><a href="#">Register</a></li>
              </ul>
            </li>
         </ul>
        </div>
      </div>
    </div>
    <div class="container">
    <div class="row blog-padding">