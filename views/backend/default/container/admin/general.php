<div class="col-md-9">
  <div class="page-header">
    <h2 class="pull-left">General</h2>
    <ol class="breadcrumb pull-right where-am-i">
      <li><a href="#">Settings</a></li>
      <li class="active">General</li>
    </ol>
    <div class="clearfix"></div>
  </div>
  <div class="row">
       <div class="col-md-12">
       <form class="form-horizontal" method="post">
          <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-md-3">
                     <label for="blog_title" class="control-label">Site Title</label>
                    </div>
                    <div class="col-md-9">
                         <input class="form-control" name="blog_title" id="blog_title" type="text" value="<?php echo $general['blog_title'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                     <label for="blog_tagline" class="control-label">Tagline</label>
                    </div>
                    <div class="col-md-9">
                         <input class="form-control" name="blog_tagline" id="blog_tagline" type="text" value="<?php echo $general['blog_tagline'];?>">
                         <p class="help-block">Explain what this site is about in few words.</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                     <label for="blog_description" class="control-label">Description</label>
                    </div>
                    <div class="col-md-9">
                         <textarea class="form-control" name="blog_description" id="blog_description"><?php echo $general['blog_description'];?></textarea>
                         <p class="help-block">Explain your site description. It will show in search engine result.</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                     <label for="blog_keywords" class="control-label">Keywords</label>
                    </div>
                    <div class="col-md-9">
                         <input class="form-control" name="blog_keywords" id="blog_keywords" type="text" value="<?php echo $general['blog_keywords'];?>">
                         <p class="help-block">A few keywords for your site.</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                     <label for="blog_url" class="control-label">Site URL</label>
                    </div>
                    <div class="col-md-9">
                         <input class="form-control" name="blog_url" id="blog_url" type="text" value="<?php echo $general['blog_url'];?>">
                         <p class="help-block"></p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                     <label for="admin_email" class="control-label">Email</label>
                    </div>
                    <div class="col-md-9">
                         <input class="form-control" name="admin_email" id="admin_email" type="text" value="<?php echo $general['admin_email'];?>">
                         <p class="help-block">This email address is used for admin purposes, like notification of new comments, new users, etc.</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                     <label for="timezone" class="control-label">Timezone</label>
                    </div>
                    <div class="col-md-9">
                         <select class="form-control" name="timezone" id="timezone">
                            <?php foreach($timezone as $zone){?>
                              <option value="<?php echo $zone;?>" <?php if($zone==$general['timezone']): ?>selected="selected"<?php endif; ?>><?php echo $zone;?></option>
                              <?php }?>
                         </select>
                         <p class="help-block">Choose a timezone in the same city where you live.</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                     <label for="date_format" class="control-label">Date Format</label>
                    </div>
                    <div class="col-md-9">
                         <input class="form-control" name="date_format" id="date_format" type="text" value="<?php echo $general['date_format'];?>">
                         <p class="help-block"></p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                     <label for="time_format" class="control-label">Time Format</label>
                    </div>
                    <div class="col-md-9">
                         <input class="form-control" name="time_format" id="time_format" type="text" value="<?php echo $general['time_format'];?>">
                         <p class="help-block"></p>
                    </div>
                </div>
          </div>
        </div>

         <button type="submit" name="submit" value="submit" class="btn btn-primary">Save Changes</button>
        </form>
       </div>
  </div>
  </div>