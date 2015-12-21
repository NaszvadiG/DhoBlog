    <div class="col-md-3">
    <div class="sidebarpadding">
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="panel-title">
                <i class="fa fa-dashboard"></i> Dashboard
            </div>
            </div>
            <div class="list-group">
                <a class="list-group-item" href="<?php echo base_url('dashboard')?>">Home</a>
                <a class="list-group-item" href="<?php echo base_url('dashboard/update')?>">Update</a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="panel-title">
                <i class="fa fa-list-alt"></i> Posts
            </div>
            </div>
            <div class="list-group">
                <a class="list-group-item" href="<?php echo base_url('dashboard/posts')?>">All Posts</a>
			    <a class="list-group-item" href="<?php echo base_url('dashboard/newpost')?>">Add New</a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="panel-title">
                <i class="fa fa-folder"></i> Categories
            </div>
            </div>
            <div class="list-group">
                <a class="list-group-item" href="<?php echo base_url('dashboard/categories')?>">All Categories</a>
			    <a class="list-group-item" href="<?php echo base_url('dashboard/newcategory')?>">Add New</a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="panel-title">
                <i class="fa fa-comments"></i> Comments
            </div>
            </div>
            <div class="list-group">
                <a class="list-group-item" href="<?php echo base_url('dashboard/comments')?>">All Comments</a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="panel-title">
                <i class="fa fa-users"></i> Users
            </div>
            </div>
            <div class="list-group">
                <a class="list-group-item" href="<?php echo base_url('dashboard/users')?>">All Users</a>
                <a class="list-group-item" href="<?php echo base_url('dashboard/newuser')?>">Add New</a>
                <a class="list-group-item" href="<?php echo base_url('dashboard/profile')?>">Your Profile</a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="panel-title">
                <i class="fa fa-magic"></i> Appearance
            </div>
            </div>
            <div class="list-group">
                <a class="list-group-item" href="<?php echo base_url('dashboard/frontend')?>">Frontend Themes</a>
			    <a class="list-group-item" href="<?php echo base_url('dashboard/backend')?>">Backend Themes</a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="panel-title">
                <i class="fa fa-gear"></i> Settings
            </div>
            </div>
            <div class="list-group">
                <a class="list-group-item" href="<?php echo base_url('dashboard/general')?>">General</a>
				<a class="list-group-item" href="<?php echo base_url('dashboard/permalinks')?>">Permalinks</a>
            </div>
        </div>
    </div>
</div>