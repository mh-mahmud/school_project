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
                                    <div class="muted pull-left">Create Category</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                      <!-- BEGIN FORM-->
                                      <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                          <input type="hidden" name="list_id" value="<?php if( isset($edit['LIST_ID']) && $edit['LIST_ID'] ){echo $this->webspice->encrypt_decrypt($edit['LIST_ID'], 'encrypt');} ?>" />
                                          <fieldset>
                                          	<div class="control-group">
                                                      <label class="control-label">Category Name<span class="required">*</span></label>
                                                      <div class="controls">
                                                          <input type="text" name="category_name" data-required="1" class="span6 m-wrap" value="<?php echo set_value('category_name',$edit['CATEGORY_NAME']); ?>" />
                                                      <span class="fred"><?php echo form_error('category_name'); ?></span>
                                                      </div>
                                               </div>

                                                <div class="control-group">
                                                  <label class="control-label">Type<span class="required">*</span></label>
                                                  <div class="controls">
                                                    <select class="span6 m-wrap" name="category_type">
                                                      <option value="">Select...</option>
                                                        <option value="income" <?php echo (set_value('category_type', $edit['CATEGORY_TYPE']) == "income") ? "selected" : "" ?> >Income</option>
                                                        <option value="expense" <?php echo (set_value('category_type', $edit['CATEGORY_TYPE']) == "expense") ? "selected" : "" ?> >Expense</option>
                                                    </select>
                                                    <span class="fred"><?php echo form_error('category_type'); ?></span>
                                                  </div>
                                                </div>
                                                  
                                                <div class="form-actions">
                                                    <input type="submit" name="submit" class="btn btn-primary" value="Submit Data"  />
                                                    <a class="btn btn-danger" href="<?php echo $url_prefix; ?>manage_payment_category">Cancel</a>
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