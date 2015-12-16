    <div class="col-md-3">
    <div class="sidebarpadding">
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="panel-title">
                <i class="fa fa-dashboard"></i> Dashboard
            </div>
            </div>
            <div class="list-group">
                <a class="list-group-item" href="<?php echo base_url('admin')?>">Home</a>
                <a class="list-group-item" href="<?php echo base_url('admin/update')?>">Update</a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="panel-title">
                <i class="fa fa-list-alt"></i> Posts
            </div>
            </div>
            <div class="list-group">
                <a class="list-group-item" href="<?php echo base_url('admin/posts')?>">All Posts</a>
			    <a class="list-group-item" href="<?php echo base_url('admin/newpost')?>">Add New</a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="panel-title">
                <i class="fa fa-folder"></i> Categories
            </div>
            </div>
            <div class="list-group">
                <a class="list-group-item" href="<?php echo base_url('admin/categories')?>">All Categories</a>
			    <a class="list-group-item" href="<?php echo base_url('admin/newcategory')?>">Add New</a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="panel-title">
                <i class="fa fa-comments"></i> Comments
            </div>
            </div>
            <div class="list-group">
                <a class="list-group-item" href="<?php echo base_url('admin/comments')?>">All Comments</a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="panel-title">
                <i class="fa fa-users"></i> Users
            </div>
            </div>
            <div class="list-group">
                <a class="list-group-item" href="<?php echo base_url('admin/users')?>">All Users</a>
                <a class="list-group-item" href="<?php echo base_url('admin/newuser')?>">Add New</a>
                <a class="list-group-item" href="<?php echo base_url('admin/profile')?>">Your Profile</a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="panel-title">
                <i class="fa fa-magic"></i> Appearance
            </div>
            </div>
            <div class="list-group">
                <a class="list-group-item" href="<?php echo base_url('admin/frontend')?>">Frontend Themes</a>
			    <a class="list-group-item" href="<?php echo base_url('admin/backend')?>">Backend Themes</a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="panel-title">
                <i class="fa fa-gear"></i> Settings
            </div>
            </div>
            <div class="list-group">
                <a class="list-group-item" href="<?php echo base_url('admin/general')?>">General</a>
				<a class="list-group-item" href="<?php echo base_url('admin/permalinks')?>">Permalinks</a>
            </div>
        </div>
    </div>
</div>