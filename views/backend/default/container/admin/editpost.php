<div class="col-md-9">
  <div class="page-header">
    <h2 class="pull-left">Edit Post</h2>
    <ol class="breadcrumb pull-right where-am-i">
      <li><a href="#">Posts</a></li>
      <li class="active">Edit Post</li>
    </ol>
    <div class="clearfix"></div>
  </div>
  <div class="row">
       <div class="col-md-12">
            <div class="panel panel-default">
                        <?php if (validation_errors()){ ?>
                			<div class="panel-body">
                				<div class="alert alert-danger" role="alert">
                					<?php echo validation_errors();?>
                				</div>
                			</div>
                		<?php }?>
                        <div class="panel-body">
                            <form role="form" method="post">
								<div class="form-group">
									<label>Title</label> <input type="text" class="form-control" name="title" value="<?php echo $post['post_title'];?>">
								</div>
								<div class="form-group">
									<label>Category</label><br>
									<?php
									if($categories){
									foreach ($categories as $category){
									?>
									<label><input type="checkbox" name="categories[]" value="<?php echo $category['category_id']?>" <?php if($post_categories){if(in_array($category['category_id'], $post_categories)){;?>checked="checked" <?php
									} }?>> <?php echo $category['category_name']?></label>
										<?php }}?>

								</div>
								<div class="form-group">
                                            <label>Excerpt</label>
                                            <textarea class="form-control" rows="5" name="excerpt" id="postexcerpt"><?php echo $post['post_excerpt'];?></textarea>
                                        </div>
								<div class="form-group">
                                            <label>Content</label>
                                            <textarea class="form-control" rows="20" name="content" id="postcontent"><?php echo $post['post_content'];?></textarea>
                                        </div>
                                        <div class="form-group">
                                        <label>Settings</label>
                                        <div class="checkbox" >
            							<label><input type="checkbox" <?php if ($post['post_allow_comments']==1):?> checked="checked" <?php endif;?> name="allow_comments">Allow Comments</label>
            						    </div>
                                        <div class="checkbox" >
            							<label><input type="checkbox" <?php if ($post['post_sticky']==1):?> checked="checked" <?php endif;?> name="sticky">Sticky Post</label>
            						    </div>
                                </div>
                                <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="publish"  <?php if($post['post_status'] === 'publish'): ?>selected="selected"<?php endif; ?>>Published</option>
                                                <option value="pending"  <?php if($post['post_status'] === 'pending'): ?>selected="selected"<?php endif; ?>>Pending Review</option>
                                                <option value="draft" <?php if($post['post_status'] === 'draft'): ?>selected="selected"<?php endif; ?>>Draft</option>
                                            </select>
                                </div>
                                        <button value="submit" name="save" type="submit" class="btn btn-primary">Submit</button>
							</form>
                        </div>
                        </div>
       </div>
  </div>
</div>