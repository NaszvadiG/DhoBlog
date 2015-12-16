<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Edit Category</h1>
                        <ol class="breadcrumb">
                          <li><a href="#">Categories</a></li>
                          <li class="active">Edit Category</li>
                        </ol>
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
									<label>Name</label> <input type="text" class="form-control"
										value="<?php echo $category['category_name'];?>" name="name">
								</div>
								<div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="5" name="description" id="categorydescription"><?php echo $category['category_description'];?></textarea>
                                </div>
                                        <button value="submit" name="save" type="submit" class="btn btn-primary">Submit</button>
							</form>
                        </div>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            </div>
        <!-- /#page-wrapper -->