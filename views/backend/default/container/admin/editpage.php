<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-md-9">
  <div class="page-header">
    <h2 class="pull-left">Edit Page</h2>
    <ol class="breadcrumb pull-right where-am-i">
      <li><a href="#">Pages</a></li>
      <li class="active">Edit Page</li>
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
									<label>Title</label> <input type="text" class="form-control" name="title" value="<?php echo $page['page_title'];?>">
								</div>
								<div class="form-group">
                                            <label>Content</label>
                                            <textarea class="form-control" rows="20" name="content" id="postcontent"><?php echo $page['page_content'];?></textarea>
                                        </div>
                                <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="publish"  <?php if($page['page_status'] === 'publish'): ?>selected="selected"<?php endif; ?>>Published</option>
                                                <option value="pending"  <?php if($page['page_status'] === 'pending'): ?>selected="selected"<?php endif; ?>>Pending Review</option>
                                                <option value="draft" <?php if($page['page_status'] === 'draft'): ?>selected="selected"<?php endif; ?>>Draft</option>
                                            </select>
                                </div>
                                        <button value="submit" name="save" type="submit" class="btn btn-primary">Update</button>
							</form>
                        </div>
                        </div>
       </div>
  </div>
</div>