<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title;?></h3>
        </div>
        <div class="panel-body">
            <p>Please provide the following information. You can always change these settings later.</p>
            <hr>
            <?php
            if (validation_errors()){
                echo '<div class="alert alert-danger" role="alert">' . validation_errors() .'</div>';
            }
            ?>
            <form class="form-horizontal" method="post">
            <div class="form-group <?php if(form_error('user_name')){echo 'has-error';} ?>">
                <div class="col-md-2">
                 <label for="user_name" class="control-label">Username</label>
                </div>
                <div class="col-md-10">
                    <input class="form-control" name="user_name" id="user_name" type="text" value="<?php if(set_value('user_name')): echo set_value('user_name'); endif;?>" placeholder="Enter your username.">
                </div>
            </div>
            <div class="form-group <?php if(form_error('user_display_name')){echo 'has-error';} ?>">
                <div class="col-md-2">
                 <label for="user_display_name" class="control-label">Display Name</label>
                </div>
                <div class="col-md-10">
                    <input class="form-control" name="user_display_name" id="user_display_name" type="text" value="<?php if(set_value('user_display_name')): echo set_value('user_display_name'); endif;?>" placeholder="Enter your display name.">
                </div>
            </div>
            <div class="form-group <?php if(form_error('user_password')){echo 'has-error';} ?>">
                <div class="col-md-2">
                 <label for="user_password" class="control-label">Password</label>
                </div>
                <div class="col-md-10">
                    <input class="form-control" name="user_password" id="user_password" type="password" value="<?php if(set_value('user_password')): echo set_value('user_password'); endif;?>" placeholder="Enter your password.">
                </div>
            </div>
            <div class="form-group <?php if(form_error('confirm_user_password')){echo 'has-error';} ?>">
                <div class="col-md-2">
                 <label for="confirm_user_password" class="control-label">Confirm Password</label>
                </div>
                <div class="col-md-10">
                    <input class="form-control" name="confirm_user_password" id="confirm_user_password" type="password" value="<?php if(set_value('confirm_user_password')): echo set_value('confirm_user_password'); endif;?>" placeholder="Enter your confirm password.">
                </div>
            </div>
            <div class="form-group <?php if(form_error('user_email')){echo 'has-error';} ?>">
                <div class="col-md-2">
                 <label for="user_email" class="control-label">Email</label>
                </div>
                <div class="col-md-10">
                    <input class="form-control" name="user_email" id="user_email" type="text" value="<?php if(set_value('user_email')): echo set_value('user_email'); endif;?>" placeholder="Enter your valid email address.">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-2">
                <input type="submit" name="submit" class="btn btn-primary" value="Next">
                </div>
            </div>
            </form>
        </div>
    </div>
</div>