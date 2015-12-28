<div class="col-md-9">
  <div class="page-header">
    <h2 class="pull-left">Reading</h2>
    <ol class="breadcrumb pull-right where-am-i">
      <li><a href="#">Settings</a></li>
      <li class="active">Reading</li>
    </ol>
    <div class="clearfix"></div>
  </div>
  <div class="row">
       <div class="col-md-12">
       <form class="form-horizontal" method="post">
          <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-md-6">
                     <label for="posts_per_page" class="control-label">Show posts per page</label>
                    </div>
                    <div class="col-md-6">
                         <input class="form-control" name="posts_per_page" id="posts_per_page" type="text" value="<?php echo $this->posts_per_page;?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                     <label for="feed_show_count" class="control-label text-left">How much syndication feeds show the recent posts?</label>
                    </div>
                    <div class="col-md-6">
                         <input class="form-control" name="feed_show_count" id="feed_show_count" type="text" value="<?php echo $this->feed_show_count;?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                     <label class="control-label">Show full text or excerpt in a feed?</label>
                    </div>
                    <div class="col-md-6">
                    <div class="radio">
                        <label> <input name="feed_use_excerpt" type="radio" value="0" <?php if($this->feed_use_excerpt==0): echo 'checked="checked"';endif;?>> Full Text</label> </div>
                        <div class="radio">
                        <label> <input name="feed_use_excerpt" type="radio" value="1" <?php if($this->feed_use_excerpt==1): echo 'checked="checked"';endif;?>> Excerpt</label>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                     <label class="control-label">Search Engine Visibility </label>
                    </div>
                    <div class="col-md-6">
                    <div class="checkbox">
                        <label>
                         <input name="search_engine_visibility" type="checkbox" <?php if ($this->search_engine_visibility==1):?> checked="checked" <?php endif;?>>Allow search engines to indexing this site</label>
                    </div>
                    </div>
                </div>
          </div>
        </div>

         <button type="submit" name="submit" value="submit" class="btn btn-primary">Save Changes</button>
        </form>
       </div>
  </div>
  </div>