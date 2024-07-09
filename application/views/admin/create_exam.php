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
                                          <b>Create Exam</b>  
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
                                    <div class="muted pull-left">Create Exam</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                                <!-- BEGIN FORM-->
                                                <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                    <input type="hidden" name="exam_id" value="<?php if( isset($edit['EXAM_ID']) && $edit['EXAM_ID'] ){echo $this->webspice->encrypt_decrypt($edit['EXAM_ID'], 'encrypt');} ?>" />
                                                    <fieldset>
                                                            <div class="control-group">
                                                                <label class="control-label">Exam Name<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="exam_name" data-required="1" class="span6 m-wrap" value="<?php echo set_value('exam_name',$edit['EXAM_NAME']); ?>" />
                                                                <span class="fred"><?php echo form_error('exam_name'); ?></span>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Exam Date<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="exam_date" data-required="1" class="span6 m-wrap datepicker" value="<?php echo set_value('exam_date',$edit['EXAM_DATE']); ?>" />
                                                                <span class="fred"><?php echo form_error('exam_date'); ?></span>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Comment<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="exam_comment" data-required="1" class="span6 m-wrap" value="<?php echo set_value('exam_comment',$edit['EXAM_COMMENT']); ?>" />
                                                                <span class="fred"><?php echo form_error('exam_comment'); ?></span>
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