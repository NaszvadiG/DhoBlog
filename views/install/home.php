<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title;?></h3>
        </div>
        <div class="panel-body">
            <p><strong>Welcome to DhoBlog Installation!</strong></p>
            <p>Before you can use your new DhoBlog, you have to complete a quick installation.</p>
            <p>You will need to know the following items before proceeding.</p>
            <ol>
                <li>Database host</li>
                <li>Database username</li>
                <li>Database password</li>
                <li>Database name</li>
                <li>Table prefix</li>
            </ol>
            <p>If you do not have this information, then you will need to contact your webhost provider before you can continue the installation.</p>
            <p><a href="<?php echo base_url('install?step=1');?>" class="btn btn-primary ">Start Installation >></a></p>
        </div>
    </div>
</div>