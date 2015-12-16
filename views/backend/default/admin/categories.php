<div class="col-md-9">
  <div class="page-header">
    <h2 class="pull-left">All Categories</h2>
    <ol class="breadcrumb pull-right where-am-i">
      <li><a href="#">Categories</a></li>
      <li class="active">All Categories</li>
    </ol>
    <div class="clearfix"></div>
  </div>
  <div class="row">
       <div class="col-md-12">
            <div class="table-responsive">
                <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="categories">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Slug</th>
                            <th>Count</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if($categories){
    				foreach ($categories as $category){
    				?>
                        <tr>
                            <td><?php echo $category['category_id'];?></td>
                            <td><?php echo $category['category_name'];?>
                            <div class="row-actions">
                            <a href="<?php echo base_url()?>admin/editcategory/<?php echo $category['category_id'];?>">Edit</a> | <a href="<?php echo base_url()?>admin/deletecategory/<?php echo $category['category_id'];?>" onclick='return confirm("Are you sure to Delete <?php echo $category['category_name'];?>?")'>Delete</a>
                            </div>
                            </td>
                            <td><?php echo $category['category_description'];?></td>
                            <td><?php echo $category['category_slug'];?></td>
                            <td><?php echo $category['post_count'];?> posts</td>
                        </tr>
                        <?php }}?>
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
       </div>
  </div>
</div>
