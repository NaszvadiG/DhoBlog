<div class="col-md-9">
  <div class="page-header">
    <h2 class="pull-left">Discussion</h2>
    <ol class="breadcrumb pull-right where-am-i">
      <li><a href="#">Settings</a></li>
      <li class="active">Discussion</li>
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
                     <label class="control-label">Comment settings</label>
                    </div>
                    <div class="col-md-9">
                    <div class="checkbox">
                        <label>
                         <input name="comments_registration" type="checkbox" <?php if ($this->comments_registration==1):?> checked="checked" <?php endif;?>>Users must be registered and logged in to comment</label>
                    </div>
                    <div class="checkbox">
                        <label>
                         <input name="comments_moderation" type="checkbox" <?php if ($this->comments_moderation==1):?> checked="checked" <?php endif;?>>Comment must be manually approved</label>
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