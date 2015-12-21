<div class="sidebar-module">
    <h4>Categories</h4>
    <ol class="list-unstyled">
      <?php if($categories){
        foreach ($categories as $category){
        ?>
        <li><i class="fa fa-folder-o"></i> <a href="<?php echo $category['category_permalink'];?>"><?php echo $category['category_name'];?></a> ( <?php echo $category['post_count'];?> Posts)</li>
        <?php }}?>
    </ol>
</div>