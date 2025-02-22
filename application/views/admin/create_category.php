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
                                          <b>Create Category</b>  
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
                                    <div class="muted pull-left">Add Category</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                                <!-- BEGIN FORM-->
                                                <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                    <input type="hidden" name="category_id" value="<?php if( isset($edit['CATEGORY_ID']) && $edit['CATEGORY_ID'] ){echo $this->webspice->encrypt_decrypt($edit['CATEGORY_ID'], 'encrypt');} ?>" />
                                                    <fieldset>
                                                        <!-- <div class="alert alert-error hide">
                                                            <button class="close" data-dismiss="alert"></button>
                                                            You have some form errors. Please check below.
                                                        </div>
                                                        <div class="alert alert-success hide">
                                                            <button class="close" data-dismiss="alert"></button>
                                                            Your form validation is successful!
                                                        </div> -->
                                                            <div class="control-group">
                                                                <label class="control-label">Category Name<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="category_name" data-required="1" class="span6 m-wrap" value="<?php echo set_value('category_name',$edit['CATEGORY_NAME']); ?>" />
                                                                </div>
                                                                <span class="fred"><?php echo form_error('category_name'); ?></span>
                                                            </div>
                                                            
                                                            <div class="form-actions">
                                                                <input type="submit" name="submit" class="btn btn-primary" value="Submit Data"  />
                                                                <button type="button" class="btn">Cancel</button>
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