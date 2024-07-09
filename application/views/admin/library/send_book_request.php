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
                                          <b>Send Book Request</b>  
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
                                    <div class="muted pull-left">Send Book Request</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                                <!-- BEGIN FORM-->
                                                <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                    <input type="hidden" name="request_id" value="<?php if( isset($edit['REQUEST_ID']) && $edit['REQUEST_ID'] ){echo $this->webspice->encrypt_decrypt($edit['REQUEST_ID'], 'encrypt');} ?>" />
                                                    <fieldset>
                                                            <div class="control-group">
                                                                <label class="control-label">Book Name<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="book_name" data-required="1" class="span6 m-wrap" value="<?php echo set_value('book_name',$edit['BOOK_NAME']); ?>" />
                                                                <span class="fred"><?php echo form_error('book_name'); ?></span>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Writer Name<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="writer_name" data-required="1" class="span6 m-wrap" value="<?php echo set_value('writer_name',$edit['WRITER_NAME']); ?>" />
                                                                <span class="fred"><?php echo form_error('writer_name'); ?></span>
                                                                </div>
                                                            </div>

                                                             <div class="control-group">
                                                                <label class="control-label">Book Description</label>
                                                                <div class="controls">
                                                                    <textarea name="book_description" data-required="1" class="span6 m-wrap" ><?php echo set_value('book_description',$edit['BOOK_DESCRIPTION']); ?></textarea>
                                                                    <span class="fred"><?php echo form_error('book_description'); ?></span>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="form-actions">
                                                                <input type="submit" name="submit" class="btn btn-success" value="Submit Data"  />
                                                                <a class="btn btn-danger" href="<?php echo $url_prefix; ?>manage_book_category">Cancel</a>
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