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
                <table class="table table-striped table-bordered table-hover" id="posts">
                    <thead>
                        <tr>
                            <th class="text-center"><input  type="checkbox" name="" id="select_all"></th>
                            <th>Title</th>
                            <th>Categories</th>
                            <th>Date</th>
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

                            </td>
                            <td><?php echo $post['post_date'];?></td>
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