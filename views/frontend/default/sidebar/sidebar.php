<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-md-3">
    <div class="sidebar-padding">
    <?php
    $this->load->view('frontend/default/sidebar/categories');
    $this->load->view('frontend/default/sidebar/meta');
    ?>
    </div>
</div>