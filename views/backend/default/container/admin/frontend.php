<div class="col-md-9">
  <div class="page-header">
    <h2 class="pull-left">Frontend Themes</h2>
    <ol class="breadcrumb pull-right where-am-i">
      <li><a href="#">Themes</a></li>
      <li class="active">Frontend Themes</li>
    </ol>
    <div class="clearfix"></div>
  </div>
  <div class="row">
       <div class="col-md-12">
       <?php if($themes){
           foreach($themes as $theme){?>
            <div class="media">
              <div class="media-left">
                  <img class="media-object" src="<?php echo $theme['theme_screenshot'];?>" width="150" height="150">
              </div>
              <div class="media-body">
                <h4 class="media-heading"><?php echo $theme['info']['name'];?></h4>
                <p><?php echo $theme['info']['description'];?></p>
                <p>Version <?php echo $theme['info']['version'];?> | by <a href="<?php echo $theme['info']['author_url'];?>"><?php echo $theme['info']['author'];?></a> | License <a href="<?php echo $theme['info']['lisence_url'];?>"><?php echo $theme['info']['lisence'];?></a> | <a href="<?php echo $theme['info']['theme_url'];?>">Visit Theme Site</a></p>
                <p><?php if($this->frontend_theme != $theme['theme_name']){?>
                <form class="pull-left themeswitch" method="post">
                    <input type="hidden" name="frontend_theme" value="<?php echo $theme['theme_name'];?>" />
        			<button name="activate" type="submit" value="submit" class="btn btn-info btn-sm">Activate</button>
                </form>
        			<?php } ?>
        			<a href="<?php echo $theme['theme_screenshot'];?>" class="fancybox btn btn-warning btn-sm">Preview</a>
                </p>
              </div>
            </div>
            <?php }}?>
        </div>
       </div>
  </div>