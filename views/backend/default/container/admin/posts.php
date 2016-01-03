<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-md-9">
  <div class="page-header">
    <h2 class="pull-left">All Posts</h2>
    <ol class="breadcrumb pull-right where-am-i">
      <li><a href="#">Posts</a></li>
      <li class="active">All Posts</li>
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
                            <th>Categories</th>
                            <th>Date</th>
                            <th><i class="fa fa-comments"></i></th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if($posts){
                    foreach ($posts as $post){
                    ?>
                        <tr>
                            <td class="text-center"><input type="checkbox" class="select_all" name="" id=""></td>
                            <td><?php echo $post['post_title'];?>
                            <div class="row-actions">
                            <a href="<?php echo base_url();?>dashboard/editpost/<?php echo $post['post_id'];?>">Edit</a> | <a href="<?php echo base_url()?>dashboard/deletepost/<?php echo $post['post_id'];?>" onclick='return confirm("Are you sure to Delete <?php echo $post['post_title'];?>?")'>Delete</a>
                            </div>
                            </td>
                            <td>
                             <?php
                             $i=0 ;
                                foreach ($post['categories'] as $cat){?>
                    			<a href="<?php echo base_url('dashboard/editcategory/'.$cat['category_id']);?>"><?php echo $cat['category_name'];?></a><?php if ($i < count($post['categories']) - 1){
                        		echo ',';
                        		}$i++;} ?>
                            </td>
                            <td><?php echo human_datetime($post['post_date']);?></td>
                            <td class="text-center"><?php echo $post['comment_count'];?></td>
                            <td><?php if($post['post_status']=="publish"){
                                    echo "Published";
                                }elseif($post['post_status']=="pending"){
                                    echo "Pending Review";
                                }if($post['post_status']=="draft"){
                                    echo "Draft";
                                };?></td>
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