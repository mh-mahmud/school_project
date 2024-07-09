<?php include(APPPATH."views/admin/admin_header.php"); ?>

        <div class="container">
            <div class="row-fluid">
                <div class="span12" id="content">
                    <div class="row-fluid">

                        <!-- here will goes alert message -->
                        <!-- <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4>Success</h4>
                            The operation completed successfully
                        </div> -->
                        <!-- alert message end -->

                          <div class="navbar">
                              <div class="navbar-inner">
                                  <ul class="breadcrumb">
                                      <li>
                                          <b>Create Grade</b>  
                                      </li>
                                  </ul>
                              </div>
                          </div>
                      </div>


                         <!-- validation -->
                        <div class="row-fluid">
                             <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Create Grade</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                                <!-- BEGIN FORM-->
                                                <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                    <input type="hidden" name="grade_id" value="<?php if( isset($edit['GRADE_ID']) && $edit['GRADE_ID'] ){echo $this->webspice->encrypt_decrypt($edit['GRADE_ID'], 'encrypt');} ?>" />
                                                    <fieldset>
                                                            <div class="control-group">
                                                                <label class="control-label">Grade Name<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="grade_name" data-required="1" class="span6 m-wrap" value="<?php echo set_value('grade_name',$edit['GRADE_NAME']); ?>" />
                                                                <span class="fred"><?php echo form_error('grade_name'); ?></span>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Mark From<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="mark_from" data-required="1" class="span6 m-wrap" value="<?php echo set_value('mark_from',$edit['MARK_FROM']); ?>" />
                                                                <span class="fred"><?php echo form_error('mark_from'); ?></span>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Mark To<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="mark_upto" data-required="1" class="span6 m-wrap" value="<?php echo set_value('mark_upto',$edit['MARK_UPTO']); ?>" />
                                                                <span class="fred"><?php echo form_error('mark_upto'); ?></span>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Comment<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="grade_comment" data-required="1" class="span6 m-wrap" value="<?php echo set_value('grade_comment',$edit['COMMENT']); ?>" />
                                                                <span class="fred"><?php echo form_error('grade_comment'); ?></span>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-actions">
                                                                <input type="submit" name="submit" class="btn btn-success" value="Submit Data"  />
                                                                <a class="btn btn-danger" href="<?php echo $url_prefix; ?>manage_exam_list">Cancel</a>
                                                            </div>
                                                    </fieldset>
                                                </form>
                                                <!-- END FORM-->
                                            </div>
                                      </div>
                                   </div>
                              <!-- /block -->
                        </div>
                         <!-- /validation -->
                    
                    
                    
                </div>
        
            </div>
            
<?php include(APPPATH."views/admin/admin_footer.php"); ?>