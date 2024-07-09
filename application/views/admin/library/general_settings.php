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
                                          <b>General Settins</b>  
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
                                    <div class="muted pull-left">General Settings</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                                <!-- BEGIN FORM-->
                                                <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                    <input type="hidden" name="library_settings_id" value="<?php if( isset($edit['LIBRARY_SETTING_ID']) && $edit['LIBRARY_SETTING_ID'] ){echo $this->webspice->encrypt_decrypt($edit['LIBRARY_SETTING_ID'], 'encrypt');} ?>" />
                                                    <fieldset>
                                                            <div class="control-group">
                                                                <label class="control-label">Maximum Book Issue<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="number" name="max_book_issue" data-required="1" class="span6 m-wrap" value="<?php echo set_value('max_book_issue',$edit['MAX_BOOK_ISSUE']); ?>" />
                                                                <span class="fred"><?php echo form_error('max_book_issue'); ?></span>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Maximum Day<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="number" name="max_return_day" data-required="1" class="span6 m-wrap" value="<?php echo set_value('max_return_day',$edit['MAX_RETURN_DAY']); ?>" />
                                                                <span class="fred"><?php echo form_error('max_return_day'); ?></span>
                                                                </div>
                                                            </div>

                                                            <div class="form-actions">
                                                                <input type="submit" name="submit" class="btn btn-success" value="Submit Data"  />
                                                                <a class="btn btn-danger" href="<?php echo $url_prefix; ?>manage_settings">Cancel</a>
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