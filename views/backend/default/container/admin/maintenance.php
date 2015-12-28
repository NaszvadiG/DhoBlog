<div class="col-md-9">
  <div class="page-header">
    <h2 class="pull-left">Maintenance</h2>
    <ol class="breadcrumb pull-right where-am-i">
      <li><a href="#">Settings</a></li>
      <li class="active">Maintenance</li>
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
                     <label class="control-label">Blog Status</label>
                    </div>
                    <div class="col-md-9">
                         <div class="checkbox">
                        <label>
                         <input name="blog_offline" type="checkbox" <?php if ($this->blog_offline==1):?> checked="checked" <?php endif;?>>Make blog offline.</label>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                     <label for="offline_reason" class="control-label">Offline Reason</label>
                    </div>
                    <div class="col-md-9">
                         <textarea class="form-control" name="offline_reason" id="offline_reason"><?php echo $this->offline_reason;?></textarea>
                         <p class="help-block">Explain your blog offline reason.</p>
                    </div>
                </div>

          </div>
        </div>

         <button type="submit" name="submit" value="submit" class="btn btn-primary">Save Changes</button>
        </form>
       </div>
  </div>
  </div>