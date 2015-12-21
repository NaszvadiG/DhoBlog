<div class="col-md-9 ">
       <div class="blog-header">
        <h1 class="blog-title"><?php echo $title;?></h1>
        <p class="lead blog-description"><?php echo $description;?></p>
      </div>
      <div class="blog-main">
<?php if($posts){
        	foreach ($posts as $post){
        	?>
                <div class="blog-post">
				<h3 class="blog-post-title"><a href="<?php echo $post['post_permalink'];?>"><?php echo $post['post_title'];?></a></h3>
				<p class="blog-post-meta">
				<i class="fa fa-calendar"></i> <a href="<?php echo $post['post_permalink'];?>"><?php echo $post['post_date'];?></a> <i class="fa fa-male"></i> <a href="<?php echo base_url();?>about">ridho</a> <i class="fa fa-folder"></i>
                <!--<?php
                foreach ($all_categories as $cat){
                	if(isset($post_cat[$cat['id']])){
                		if($cat['id']==$post_cat[$cat['id']]){
                			?>
                			<a href="<?php echo base_url();?>category/<?php echo $cat['id'];?>/<?php echo url_title($cat['name'],'-',true);?>"><?php echo $cat['name'];?></a>
                			<?php
                		}
                	}
                }
                ?>-->
				</p>
				<p><?php echo $post['post_excerpt'];?></p>
				<p>
					<a href="<?php echo $post['post_permalink'];?>"><i class="fa fa-external-link"></i> Read more</a>
				</p>
                </div>
        	<?php }}?>
    </div>
    <div class="text-center footer-padding">
    <?php
		echo $paging;
	?>
    </div>
</div>
