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
                                          <b>Create Notice</b>  
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
                                    <div class="muted pull-left">Create Notice</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                                <!-- BEGIN FORM-->
                                                <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                    <input type="hidden" name="notice_id" value="<?php if( isset($edit['NOTICE_ID']) && $edit['NOTICE_ID'] ){echo $this->webspice->encrypt_decrypt($edit['NOTICE_ID'], 'encrypt');} ?>" />
                                                    <fieldset>
                                                            <div class="control-group">
                                                                <label class="control-label">Notice Title<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="notice_title" data-required="1" class="span6 m-wrap" value="<?php echo set_value('notice_title',$edit['NOTICE_TITLE']); ?>" />
                                                                <span class="fred"><?php echo form_error('notice_title'); ?></span>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Notce<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <textarea name="notice_details" data-required="1" class="span6 m-wrap" ><?php echo set_value('notice_details',$edit['NOTICE_DETAILS']); ?></textarea>
                                                                    <span class="fred"><?php echo form_error('notice_details'); ?></span>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-actions">
                                                                <input type="submit" name="submit" class="btn btn-success" value="Submit Data"  />
                                                                <a class="btn btn-danger" href="<?php echo $url_prefix; ?>manage_notice">Cancel</a>
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