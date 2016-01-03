<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-md-9">
  <div class="page-header">
    <h2 class="pull-left">Permalinks</h2>
    <ol class="breadcrumb pull-right where-am-i">
      <li><a href="#">Settings</a></li>
      <li class="active">Permalinks</li>
    </ol>
    <div class="clearfix"></div>
  </div>
  <div class="row">
       <div class="col-md-12">
       <form class="form-horizontal" method="post">
          <div class="panel panel-default">
            <div class="panel-heading"><strong>Post Permalinks</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-md-3">
                     <label>
                        <input name="post_permalink" value="datename" type="radio" <?php if($this->post_permalink==="datename"): echo 'checked="checked"';endif;?>>
                        Date and name
                        </label>
                    </div>
                    <div class="col-md-9">
                        <span class="label label-default"><?php echo base_url('2015/12/12/sample-post.html');?></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                     <label>
                        <input name="post_permalink" value="numeric" type="radio" <?php if($this->post_permalink==="numeric"): echo 'checked="checked"';endif;?>>
                        Numeric
                        </label>
                    </div>
                    <div class="col-md-9">
                        <span class="label label-default"><?php echo base_url('post/1');?></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                    <label>
                        <input name="post_permalink" value="postname" type="radio" <?php if($this->post_permalink==="postname"): echo 'checked="checked"';endif;?>>
                        Postname
                         </label>
                    </div>
                    <div class="col-md-9">
                        <span class="label label-default"><?php echo base_url('sample-post.html');?></span>
                    </div>
                </div>
          </div>
        </div>
        <div class="panel panel-default">
            <header class="panel-heading"><strong>Category Permalinks</strong></header>
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-md-3">
                    <label>
                        <input name="category_permalink" value="category" type="radio" <?php if($this->category_permalink==="category"): echo 'checked="checked"';endif;?>>
                        Default
                        </label>
                    </div>
                    <div class="col-md-9">
                        <span class="label label-default"><?php echo base_url('category/sample-category');?></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                    <label>
                        <input name="category_permalink" value="category_custom" type="radio" <?php if($this->category_permalink!="category"): echo 'checked="checked"';endif;?>>
                        Custom Structure
                        </label>
                    </div>
                    <div class="col-md-9">
                        <span class="label label-default"><?php echo base_url();?></span> <input name="category_custom_permalink" type="text" id="category_custom_permalink" value="<?php if($this->category_permalink!="category"): echo $this->category_permalink;endif;?>"> <span class="label label-default">/sample-category</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <header class="panel-heading"><strong>Page Permalinks</strong></header>
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-md-3">
                    <label>
                        <input name="page_permalink" value="page" type="radio" <?php if($this->page_permalink==="page"): echo 'checked="checked"';endif;?>>
                        Default
                        </label>
                    </div>
                    <div class="col-md-9">
                        <span class="label label-default"><?php echo base_url('page/sample-page.html');?></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                    <label>
                        <input name="page_permalink" value="page_custom" type="radio" <?php if($this->page_permalink!="page"): echo 'checked="checked"';endif;?>>
                        Custom Structure
                        </label>
                    </div>
                    <div class="col-md-9">
                        <span class="label label-default"><?php echo base_url();?></span> <input name="page_custom_permalink" type="text" id="page_custom_permalink" value="<?php if($this->page_permalink!="page"): echo $this->page_permalink;endif;?>"> <span class="label label-default">/sample-page.html</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <header class="panel-heading"><strong>Tag Permalinks</strong></header>
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-md-3">
                    <label>
                        <input name="tag_permalink" value="tag" type="radio" <?php if($this->tag_permalink==="tag"): echo 'checked="checked"';endif;?>>
                        Default
                        </label>
                    </div>
                    <div class="col-md-9">
                        <span class="label label-default"><?php echo base_url('tag/sample-tag');?></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                    <label>
                        <input name="tag_permalink" value="tag_custom" type="radio" <?php if($this->tag_permalink!="tag"): echo 'checked="checked"';endif;?>>
                        Custom Structure
                        </label>
                    </div>
                    <div class="col-md-9">
                        <span class="label label-default"><?php echo base_url();?></span> <input name="tag_custom_permalink" type="text" id="tag_custom_permalink" value="<?php if($this->tag_permalink!="tag"): echo $this->tag_permalink;endif;?>"> <span class="label label-default">/sample-tag</span>
                    </div>
                </div>
            </div>
        </div>
         <button type="submit" name="submit" value="submit" class="btn btn-primary">Save Changes</button>
        </form>
       </div>
  </div>
  </div>