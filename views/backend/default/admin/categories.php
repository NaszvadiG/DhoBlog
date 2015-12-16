<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>All Categories</h1>
                        <ol class="breadcrumb">
                          <li><a href="#">Categories</a></li>
                          <li class="active">All Categories</li>
                        </ol>
                        <div class="panel panel-default">
                        <div class="panel-body">
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
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            </div>
        <!-- /#page-wrapper -->