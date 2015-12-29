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
                <?php if($post['post_allow_comments']==1){
                if($comments){
                ?>
                <div class="blog-post">
                <h3 class="blog-post-title">Comments</h3>
                <?php foreach($comments as $comment){?>
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object" src="<?php echo base_url('views/frontend/default/assets/img/noavatar.jpg');?>" alt="...">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading"><?php echo $comment['comment_author']?></h4>
                    <p>at <?php echo $comment['comment_date'];?></p>
                    <p><?php echo $comment['comment_content'];?></p>
                  </div>
                </div>
                <?php }?>
                </div>
                <?php }?>
                <div class="blog-post">
                <h3 class="blog-post-title">Post a Reply</h3>
                <p>Your email address will not be published. Required fields are marked *</p>
                <?php if (validation_errors()){ ?>
    				<div class="alert alert-danger" role="alert">
    					<?php echo validation_errors();?>
    				</div>
        		<?php }?>
                <form class="form-horizontal" method="post">
                <div class="form-group">
                <div class="col-md-6">
                    <input class="form-control" type = "text" placeholder = "Name (required)" name="comment_author" value="<?php echo set_value('comment_author'); ?>">
                </div>
                </div>
                <div class="form-group">
                <div class="col-md-6">
                    <input class="form-control" type = "text" placeholder = "Mail (will not be published) (required)" name = "comment_author_email" value="<?php echo set_value('comment_author_email'); ?>">
                </div>
                </div>
                <div class="form-group">
                <div class="col-md-6">
                    <input class="form-control" type = "text" placeholder = "Website" name = "comment_author_website" value="<?php echo set_value('comment_author_website'); ?>">
                </div>
                </div>
                <div class="form-group">
                <div class="col-md-12">
                    <textarea class="form-control" rows="10" name="comment_content" placeholder = "Message" ><?php echo set_value('comment_content'); ?></textarea>
                </div>
                </div>
                <input class="btn btn-primary" type="submit" name="submit" value="Submit Comment">
                </form>
                </div>
        	<?php }}?>
    </div>

</div>
