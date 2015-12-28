    <div class="col-md-3">
    <div class="sidebarpadding">
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="panel-title">
                <i class="fa fa-dashboard"></i> Dashboard
            </div>
            </div>
            <div class="list-group">
                <a class="list-group-item <?php if($this->uri->segment(2)==""):?>active<?php endif;?>" href="<?php echo base_url('dashboard')?>">Home</a>
                <a class="list-group-item <?php if($this->uri->segment(2)=="update"):?>active<?php endif;?>" href="<?php echo base_url('dashboard/update')?>">Update</a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="panel-title">
                <i class="fa fa-edit"></i> Posts
            </div>
            </div>
            <div class="list-group">
                <a class="list-group-item <?php if($this->uri->segment(2)=="posts" || $this->uri->segment(2)=="editpost"):?>active<?php endif;?>" href="<?php echo base_url('dashboard/posts')?>">Manage Posts</a>
			    <a class="list-group-item <?php if($this->uri->segment(2)=="newpost"):?>active<?php endif;?>" href="<?php echo base_url('dashboard/newpost')?>">Add New</a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="panel-title">
                <i class="fa fa-sticky-note"></i> Pages
            </div>
            </div>
            <div class="list-group">
                <a class="list-group-item <?php if($this->uri->segment(2)=="pages" || $this->uri->segment(2)=="editpage"):?>active<?php endif;?>" href="<?php echo base_url('dashboard/pages')?>">Manage Pages</a>
			    <a class="list-group-item <?php if($this->uri->segment(2)=="newpage"):?>active<?php endif;?>" href="<?php echo base_url('dashboard/newpage')?>">Add New</a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="panel-title">
                <i class="fa fa-folder"></i> Categories
            </div>
            </div>
            <div class="list-group">
                <a class="list-group-item <?php if($this->uri->segment(2)=="categories" || $this->uri->segment(2)=="editcategory"):?>active<?php endif;?>" href="<?php echo base_url('dashboard/categories')?>">Manage Categories</a>
			    <a class="list-group-item <?php if($this->uri->segment(2)=="newcategory"):?>active<?php endif;?>" href="<?php echo base_url('dashboard/newcategory')?>">Add New</a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="panel-title">
                <i class="fa fa-navicon"></i> Menus
            </div>
            </div>
            <div class="list-group">
                <a class="list-group-item <?php if($this->uri->segment(2)=="menus"):?>active<?php endif;?>" href="<?php echo base_url('dashboard/menus')?>">Manage Menus</a>
			    <a class="list-group-item <?php if($this->uri->segment(2)=="newmenus"):?>active<?php endif;?>" href="<?php echo base_url('dashboard/newmenus')?>">Add New</a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="panel-title">
                <i class="fa fa-comments"></i> Comments
            </div>
            </div>
            <div class="list-group">
                <a class="list-group-item <?php if($this->uri->segment(2)=="comments"):?>active<?php endif;?>" href="<?php echo base_url('dashboard/comments')?>">Manage Comments</a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="panel-title">
                <i class="fa fa-users"></i> Users
            </div>
            </div>
            <div class="list-group">
                <a class="list-group-item <?php if($this->uri->segment(2)=="users"):?>active<?php endif;?>" href="<?php echo base_url('dashboard/users')?>">Manage Users</a>
                <a class="list-group-item <?php if($this->uri->segment(2)=="newuser"):?>active<?php endif;?>" href="<?php echo base_url('dashboard/newuser')?>">Add New</a>
                <a class="list-group-item <?php if($this->uri->segment(2)=="profile"):?>active<?php endif;?>" href="<?php echo base_url('dashboard/profile')?>">Your Profile</a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="panel-title">
                <i class="fa fa-magic"></i> Appearance
            </div>
            </div>
            <div class="list-group">
                <a class="list-group-item <?php if($this->uri->segment(2)=="frontend"):?>active<?php endif;?>" href="<?php echo base_url('dashboard/frontend')?>">Frontend Themes</a>
			    <a class="list-group-item <?php if($this->uri->segment(2)=="backend"):?>active<?php endif;?>" href="<?php echo base_url('dashboard/backend')?>">Backend Themes</a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="panel-title">
                <i class="fa fa-gear"></i> Settings
            </div>
            </div>
            <div class="list-group">
                <a class="list-group-item <?php if($this->uri->segment(2)=="general"):?>active<?php endif;?>" href="<?php echo base_url('dashboard/general')?>">General</a>
                <a class="list-group-item <?php if($this->uri->segment(2)=="maintenance"):?>active<?php endif;?>" href="<?php echo base_url('dashboard/maintenance')?>">Maintenance</a>
                <a class="list-group-item <?php if($this->uri->segment(2)=="writing"):?>active<?php endif;?>" href="<?php echo base_url('dashboard/writing')?>">Writing</a>
                <a class="list-group-item <?php if($this->uri->segment(2)=="reading"):?>active<?php endif;?>" href="<?php echo base_url('dashboard/reading')?>">Reading</a>
                <a class="list-group-item <?php if($this->uri->segment(2)=="discussion"):?>active<?php endif;?>" href="<?php echo base_url('dashboard/discussion')?>">Discussion</a>
				<a class="list-group-item <?php if($this->uri->segment(2)=="permalinks"):?>active<?php endif;?>" href="<?php echo base_url('dashboard/permalinks')?>">Permalinks</a>
            </div>
        </div>
    </div>
</div>