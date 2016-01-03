<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-md-9">
  <div class="page-header">
    <h2 class="pull-left">All Menus</h2>
    <ol class="breadcrumb pull-right where-am-i">
      <li><a href="#">Menus</a></li>
      <li class="active">All Menus</li>
    </ol>
    <div class="clearfix"></div>
  </div>
  <div class="row">
       <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="posts">
                    <thead>
                        <tr>
                            <th class="text-center"><input  type="checkbox" name="" id="select_all"></th>
                            <th>Title</th>
                            <th>URL</th>
                            <th>Type</th>
                            <th>Position</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if($menus){
                    foreach ($menus as $menu){
                    ?>
                        <tr>
                            <td class="text-center"><input type="checkbox" class="select_all" name="" id=""></td>
                            <td><?php echo $menu['menu_title'];?>
                            <div class="row-actions">
                            <a href="<?php echo base_url();?>dashboard/editmenu/<?php echo $menu['menu_id'];?>">Edit</a> | <a href="<?php echo base_url()?>dashboard/deletemenu/<?php echo $menu['menu_id'];?>" onclick='return confirm("Are you sure to Delete <?php echo $menu['menu_title'];?>?")'>Delete</a>
                            </div>
                            </td>
                            <td><?php echo $menu['menu_url'];?></td>
                            <td><?php echo $menu['menu_type'];?></td>
                            <td><?php echo $menu['menu_position'];?></td>
                        </tr>
                        <?php }}?>
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
            <div class="text-right">
                <?php
            		echo $paging;
            	?>
            </div>
        </div>
       </div>
  </div>