<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title;?></h3>
        </div>
        <div class="panel-body">
            <p>First of all, please enter your MySQL <strong>Hostname</strong>, <strong>Username</strong>, <strong>Password</strong> and <strong>Database Name</strong>.</p>
            <p><strong>Example:</strong></p>
            <pre>Database Hostname : localhost<br>Database Username : username<br>Database Password : password<br>Database Database : dhoblog<br>Table Prefix      : dhoblog_</pre>
            <hr>
            <?php
            if (validation_errors()){
                echo '<div class="alert alert-danger" role="alert">' . validation_errors() .'</div>';
            }
            ?>
            <form method="post">
            <div class="form-group <?php if(form_error('database_hostname')){echo 'has-error';} ?>">
                <label for="database_hostname">Hostname</label>
                <input type="text" class="form-control" id="database_hostname" name="database_hostname" placeholder="Enter your database hostname." value="<?php if(set_value('database_hostname')): echo set_value('database_hostname'); else: echo "localhost";endif;?>">
            </div>
            <div class="form-group <?php if(form_error('database_username')){echo 'has-error';} ?>">
                <label for="database_username">Username</label>
                <input type="text" class="form-control" id="database_username" name="database_username" placeholder="Enter your database username." value="<?php if(set_value('database_username')): echo set_value('database_username'); endif;?>">
            </div>
            <div class="form-group <?php if(form_error('database_password')){echo 'has-error';} ?>">
                <label for="database_password">Password</label>
                <input type="text" class="form-control" id="database_password" name="database_password" placeholder="Enter your database password." value="<?php if(set_value('database_password')): echo set_value('database_password'); endif;?>">
            </div>
            <div class="form-group <?php if(form_error('database_name')){echo 'has-error';} ?>">
                <label for="database_name">Database</label>
                <input type="text" class="form-control" id="database_name" name="database_name" placeholder="Enter your database name." value="<?php if(set_value('database_name')): echo set_value('database_name'); endif;?>">
            </div>
            <div class="form-group <?php if(form_error('table_prefix')){echo 'has-error';} ?>">
                <label for="table_prefix">Table Prefix</label>
                <input type="text" class="form-control" id="table_prefix" name="table_prefix" placeholder="Enter your table prefix."value="<?php if(set_value('table_prefix')): echo set_value('table_prefix'); else: echo "dhoblog_";endif;?>">
            </div>
            <hr>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Next">
            </div>
            </form>
        </div>
    </div>
</div>