            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li><a class="active" href="<?php echo base_url('admin')?>"><i
								class="fa fa-dashboard"></i> Dashboard</a>
                                <ul class="nav nav-second-level">
								<li><a href="<?php echo base_url('admin')?>">Home</a></li>
								<li><a href="<?php echo base_url('admin/update')?>">Update</a></li>
							    </ul> <!-- /.nav-second-level --></li>
						<li><a href="#"><i class="fa fa-list-alt"></i> Posts<span
								class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li><a href="<?php echo base_url('admin/posts')?>">All Posts</a></li>
								<li><a href="<?php echo base_url('admin/newpost')?>">Add New</a></li>
							</ul> <!-- /.nav-second-level --></li>
						<li><a href="#"><i class="fa fa-folder"></i> Categories<span
								class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li><a href="<?php echo base_url('admin/categories')?>">All Categories</a></li>
								<li><a href="<?php echo base_url('admin/newcategory')?>">Add New</a></li>
							</ul> <!-- /.nav-second-level --></li>
                        <li><a href="<?php echo base_url('admin/comments')?>"><i
								class="fa fa-comments"></i> Comments</a></li>
                        <li><a href="#"><i class="fa fa-users"></i> Users<span
								class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li><a href="<?php echo base_url('admin/users')?>">All Users</a></li>
								<li><a href="<?php echo base_url('admin/newuser')?>">Add New</a></li>
                                <li><a href="<?php echo base_url('admin/profile')?>">Your Profile</a></li>
							</ul> <!-- /.nav-second-level --></li>
                        <li><a href="#"><i class="fa fa-magic"></i> Appearance<span
								class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li><a href="<?php echo base_url('admin/frontend')?>">Frontend Themes</a></li>
								<li><a href="<?php echo base_url('admin/backend')?>">Backend Themes</a></li>
							</ul> <!-- /.nav-second-level --></li>
                        <li><a href="#"><i class="fa fa-gear"></i> Settings<span
								class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li><a href="<?php echo base_url('admin/general')?>">General</a></li>
								<li><a href="<?php echo base_url('admin/permalinks')?>">Permalinks</a></li>
							</ul> <!-- /.nav-second-level --></li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>