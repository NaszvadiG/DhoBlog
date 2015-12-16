<div class="col-md-9">
  <div class="page-header">
    <h2 class="pull-left">Edit Category</h2>
    <ol class="breadcrumb pull-right where-am-i">
      <li><a href="#">Categories</a></li>
      <li class="active">Edit Category</li>
    </ol>
    <div class="clearfix"></div>
  </div>
  <div class="row">
       <div class="col-md-12">
            <div class="panel panel-default">
                <?php if (validation_errors()) { ?>
        			<div class="panel-body">
        				<div class="alert alert-danger" role="alert">
        					<?php echo validation_errors(); ?>
        				</div>
        			</div>
        		<?php } ?>
                <div class="panel-body">
                    <form role="form" method="post">
                    <div class="form-group">
                    	<label>Name</label> <input type="text" class="form-control"
                    		value="<?php echo $category['category_name']; ?>" name="name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="5" name="description" id="categorydescription"><?php echo $category['category_description']; ?></textarea>
                    </div>
                    <button value="submit" name="save" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                </div>
       </div>
  </div>
</div>