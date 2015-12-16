<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title;?></title>

    <link href="<?php echo base_url('views/backend/default/assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('views/backend/default/assets/css/metisMenu.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('views/backend/default/assets/css/custom.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('views/backend/default/assets/third_party/font-awesome-4.5.0/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('views/backend/default/assets/third_party/dataTables/dataTables.bootstrap.css');?>" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('admin');?>">Dashboard</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-nav">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">About <span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="#">About dhoBlog</a></li>
                  <li><a href="#">Documentations</a></li>
                  <li><a href="#">Support Forums</a></li>
                  <li><a href="#">Feedback</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-home"></i> dhoBlog <span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="#">Visit site</a></li>
                  </ul>
                </li>
                <li><a href="#"><i class="fa fa-comment"></i> 0 Comments</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-plus"></i> New <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Post</a></li>
                        <li><a href="#">Category</a></li>
                        <li><a href="#">Page</a></li>
                        <li><a href="#">User</a></li>
                       </ul>
                    <!-- /.dropdown-user -->
                </li>
              </ul>
            <ul class="nav navbar-top navbar-right">

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">admin <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('user/logout');?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->