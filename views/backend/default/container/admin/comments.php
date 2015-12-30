<div class="col-md-9">
  <div class="page-header">
    <h2 class="pull-left">All Comments</h2>
    <ol class="breadcrumb pull-right where-am-i">
      <li><a href="#">Comments</a></li>
      <li class="active">All Comments</li>
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
                            <th>Author</th>
                            <th>Comment</th>
                            <th>Response to</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if($comments){
                    foreach ($comments as $comment){
                    ?>
                        <tr>
                            <td class="text-center"><input type="checkbox" class="select_all" name="" id=""></td>
                            <td><strong><?php echo $comment['comment_author'];?></strong>

                            </td>
                            <td>
                            Submitted on <?php echo human_datetime($comment['comment_date']);?>
                            <p><?php echo $comment['comment_content'];?></p>
                            <div class="row-actions">
                            <a href="<?php echo base_url();?>dashboard/approvecomment/<?php echo $comment['comment_id'];?>">Approve</a> | <a href="<?php echo base_url();?>dashboard/editcomment/<?php echo $comment['comment_id'];?>">Edit</a> | <a href="<?php echo base_url()?>dashboard/deletecomment/<?php echo $comment['comment_id'];?>" onclick='return confirm("Are you sure to delete this comment?")'>Delete</a>
                            </div>
                            </td>
                            <td>
                            <a href="<?php echo base_url();?>dashboard/editpost/<?php echo $comment['post_id'];?>"><?php echo $comment['post_title'];?></a><br>
                            <a target="blank" href="<?php echo $comment['post_permalink'];?>">View Post</a>
                            </td>
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