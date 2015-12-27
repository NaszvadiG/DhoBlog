<div class="col-md-9 ">
       <div class="blog-header">
        <h1 class="blog-title"><?php echo $blog_title;?></h1>
        <p class="lead blog-description"><?php echo $blog_tagline;?></p>
      </div>
      <div class="blog-main">
    <?php if($post){?>
                <div class="blog-post">
				<h3 class="blog-post-title"><a href="<?php echo $post['post_permalink'];?>"><?php echo $post['post_title'];?></a></h3>
				<p class="blog-post-meta">
				Posted in
                <?php
                foreach ($post['categories'] as $cat){
        			?>
        			<a href="<?php echo $cat['category_permalink'];?>"><?php echo $cat['category_name'];?></a>,
        			<?php } ?>
                by <a href="#"><?php echo $post['user_display_name']?></a>, at <a href="<?php echo $post['post_permalink'];?>"><?php echo $post['post_date'];?></a>, Comments: <?php echo $post['comment_count'];?>
				</p>
				<p><?php echo $post['post_content'];?></p>
                </div>
        	<?php }?>
    </div>

</div>
