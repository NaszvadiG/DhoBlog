<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>All Posts</h1>
                        <ol class="breadcrumb">
                          <li><a href="#">Posts</a></li>
                          <li class="active">All Posts</li>
                        </ol>
                        <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="posts">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
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
                                            <td><?php echo $post['post_id'];?></td>
                                            <td><?php echo $post['post_title'];?>
                                            <div class="row-actions">
													<a href="<?php echo base_url();?>admin/editpost/<?php echo $post['post_id'];?>">Edit</a> | <a href="<?php echo base_url()?>admin/deletepost/<?php echo $post['post_id'];?>" onclick='return confirm("Are you sure to Delete <?php echo $post['post_title'];?>?")'>Delete</a>
											</div>
											</td>
                                            <td>

                                            </td>
                                            <td><?php echo $post['post_date'];?></td>
                                            <td><?php echo $post['post_status'];?></td>
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