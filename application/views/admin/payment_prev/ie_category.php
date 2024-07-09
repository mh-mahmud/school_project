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
                                          <b>Create Income Expense Category</b>
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
                                    <div class="muted pull-left">Create Income Expense Category</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                      <!-- BEGIN FORM-->
                                      <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                          <input type="hidden" name="ie_cat_id" value="<?php if( isset($edit['IE_CAT_ID']) && $edit['IE_CAT_ID'] ){echo $this->webspice->encrypt_decrypt($edit['IE_CAT_ID'], 'encrypt');} ?>" />
                                          <fieldset>

                                            <div class="control-group">
                                              <label class="control-label">Category Name<span class="required">*</span></label>
                                              <div class="controls">
                                                <select class="span6 m-wrap" name="cat_list_id">
                                                  <option value="">Select...</option>
                                                  <?php
                                                    $options = $this->db->query("SELECT * FROM category_list WHERE STATUS = 7")->result();
                                                  ?>
                                                  <?php foreach($options as $option) : ?>
                                                    <option value="<?php echo $option->LIST_ID; ?>" <?php echo (isset($edit['CAT_LIST_ID']) && $edit['CAT_LIST_ID'] == $option->LIST_ID) ? "selected" : ""; ?> ><?php echo $option->CATEGORY_NAME; ?></option>
                                                  <?php endforeach; ?>
                                                </select>
                                                <span class="fred"><?php echo form_error('cat_list_id'); ?></span>
                                              </div>
                                            </div>

                                            <div class="control-group">
                                              <label class="control-label">Class Name<span class="required">*</span></label>
                                              <div class="controls">
                                                <select class="span6 m-wrap" name="class_id">
                                                  <option value="">Select...</option>
                                                  <?php
                                                    $options = $this->db->query("SELECT CLASS_ID, CLASS_NAME FROM class WHERE STATUS = 7")->result();
                                                  ?>
                                                  <?php foreach($options as $option) : ?>
                                                    <option value="<?php echo $option->CLASS_ID?>" <?php echo (isset($edit['CLASS_ID']) && $edit['CLASS_ID'] == $option->CLASS_ID) ? "selected" : ""; ?> ><?php echo $option->CLASS_NAME ?></option>
                                                  <?php endforeach; ?>
                                                </select>
                                                <span class="fred"><?php echo form_error('class_id'); ?></span>
                                              </div>
                                            </div>

                                            <div class="control-group">
                                              <label class="control-label">Payment will taken with<span class="required">*</span></label>
                                              <div class="controls">
                                                <select class="span6 m-wrap" name="fee_type" />
                                                    <option value="">Select One---</option>
                                                    <option value="0" <?php echo (isset($edit['FEE_TYPE']) && $edit['FEE_TYPE'] == "0") ? "selected" : ""; ?> >Admisison Fee</option>
                                                    <option value="1" <?php echo (isset($edit['FEE_TYPE']) && $edit['FEE_TYPE'] == "1") ? "selected" : ""; ?> >Monthly Fee</option>
                                                </select>
                                                <span class="fred"><?php echo form_error('fee_type'); ?></span>
                                              </div>
                                            </div>

                                            <div class="control-group">
                                                  <label class="control-label">Amount<span class="required">*</span></label>
                                                  <div class="controls">
                                                      <input type="number" name="amount" data-required="1" class="span6 m-wrap" value="<?php echo set_value('amount',$edit['AMOUNT']); ?>" />
                                                  <span class="fred"><?php echo form_error('amount'); ?></span>
                                                  </div>
                                           </div>

                                            <div class="control-group">
                                                <label class="control-label">Year<span class="required">*</span></label>
                                                <div class="controls">
                                                  <input disabled type="text" name="year" data-required="1" class="span6 m-wrap" value="<?php echo date("Y") ?>" />
                                                  <span class="fred"><?php echo form_error('year'); ?></span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-actions">
                                                <input type="submit" name="submit" class="btn btn-primary" value="Submit Data"  />
                                                <a class="btn btn-danger" href="<?php echo $url_prefix; ?>manage_ie_category">Cancel</a>
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