<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-md-9 ">
       <div class="blog-header">
        <h1 class="blog-title"><?php echo $blog_title;?></h1>
        <p class="lead blog-description"><?php echo $blog_tagline;?></p>
      </div>
      <div class="blog-main">
    <?php if($page){?>
                <div class="blog-post">
				<h3 class="blog-post-title"><a href="<?php echo $page['page_permalink'];?>"><?php echo $page['page_title'];?></a></h3>
				<p><?php echo $page['page_content'];?></p>
                </div>
        	<?php }?>
    </div>
</div>
