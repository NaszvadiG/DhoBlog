<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-md-9">
  <div class="page-header">
    <h2 class="pull-left">Writing</h2>
    <ol class="breadcrumb pull-right where-am-i">
      <li><a href="#">Settings</a></li>
      <li class="active">Writing</li>
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
                     <label for="default_category" class="control-label">Default post Category</label>
                    </div>
                    <div class="col-md-9">
                         <select class="form-control" name="default_category" id="default_category">
                            <?php foreach($categories as $cat){?>
                              <option value="<?php echo $cat['category_id'];?>" <?php if($cat['category_id']==$this->default_category): ?>selected="selected"<?php endif; ?>><?php echo $cat['category_name'];?></option>
                              <?php }?>
                         </select>
                    </div>
                </div>
          </div>
        </div>

         <button type="submit" name="submit" value="submit" class="btn btn-primary">Save Changes</button>
        </form>
       </div>
  </div>
  </div>