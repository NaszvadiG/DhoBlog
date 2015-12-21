<div class="col-md-9">
  <div class="page-header">
    <h2 class="pull-left">Add New Page</h2>
    <ol class="breadcrumb pull-right where-am-i">
      <li><a href="#">Pages</a></li>
      <li class="active">Add New Page</li>
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
									<label>Title</label> <input type="text" class="form-control"
										placeholder="Enter title here" name="title">
								</div>
								<div class="form-group">
                                            <label>Content</label>
                                            <textarea class="form-control" rows="20" name="content" id="postcontent"></textarea>
                                        </div>
                                <div class="form-group">
                                        <label>Settings</label>
                                        <div class="checkbox" >
            							<label><input type="checkbox" checked="checked" name="allow_comments">Allow Comments</label>
            						    </div>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="publish">Published</option>
                                        <option value="pending">Pending Review</option>
                                        <option value="draft">Draft</option>
                                    </select>
                                </div>
                                    <button value="submit" name="save" type="submit" class="btn btn-primary">Submit</button>
							</form>
                        </div>
                        </div>
       </div>
  </div>
</div>