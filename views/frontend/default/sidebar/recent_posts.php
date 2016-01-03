<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="sidebar-module">
    <h4>Recent Posts</h4>
    <ol class="list-unstyled">
      <?php if($categories){
        foreach ($categories as $category){
        ?>
        <li><i class="fa fa-folder-o"></i> <a href="<?php echo base_url();?>category/<?php echo $category['category_id'];?>/<?php echo $category['category_slug']?>"><?php echo $category['category_name'];?></a> ( <?php echo $category['post_count'];?> Posts)</li>
        <?php }}?>
    </ol>
</div>