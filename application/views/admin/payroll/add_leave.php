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
                                          <b>Add Leave</b>  
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
                                  <div class="muted pull-left">Add Leave</div>
                              </div>
                              <div class="block-content collapse in">
                                  <div class="span12">
                                    <!-- BEGIN FORM-->
                                    <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <input type="hidden" name="leave_id" value="<?php if( isset($edit['LEAVE_ID']) && $edit['LEAVE_ID'] ){echo $this->webspice->encrypt_decrypt($edit['LEAVE_ID'], 'encrypt');} ?>" />
                                        <fieldset>

                                          <div class="control-group">
                                            <label class="control-label">Teacher Name<span class="required">*</span></label>
                                            <div class="controls">
                                              <select class="span6 m-wrap" name="teacher_id">
                                                <option value="">Select...</option>
                                                <?php
                                                  $options = $this->db->query("SELECT * FROM teacher WHERE STATUS = 7")->result();
                                                ?>
                                                <?php foreach($options as $option) : ?>
                                                  <option value="<?php echo $option->TEACHER_ID; ?>" <?php echo (isset($edit['TEACHER_ID']) && $edit['TEACHER_ID'] == $option->TEACHER_ID) ? "selected" : ""; ?> ><?php echo $option->TEACHER_NAME ?></option>
                                                <?php endforeach; ?>
                                              </select>
                                              <span class="fred"><?php echo form_error('teacher_id'); ?></span>
                                            </div>
                                          </div>

                                          <div class="control-group">
                                            <label class="control-label">Leave Type<span class="required">*</span></label>
                                            <div class="controls">
                                              <select class="span6 m-wrap" name="leave_settings_id">
                                                <option value="">Select...</option>
                                                <?php
                                                  $options = $this->db->query("SELECT * FROM leave_settings WHERE STATUS = 7")->result();
                                                ?>
                                                <?php foreach($options as $option) : ?>
                                                  <option value="<?php echo $option->LEAVE_SETTINGS_ID; ?>" <?php echo (isset($edit['LEAVE_SETTINGS_ID']) && $edit['LEAVE_SETTINGS_ID'] == $option->LEAVE_SETTINGS_ID) ? "selected" : ""; ?> ><?php echo $option->LEAVE_NAME ?></option>
                                                <?php endforeach; ?>
                                              </select>
                                              <span class="fred"><?php echo form_error('leave_settings_id'); ?></span>
                                            </div>
                                          </div>

                                          <div class="control-group">
                                              <label class="control-label">Leave Duration<span class="required">*</span></label>
                                              <div class="controls">
                                                  <input type="text" name="leave_duration" data-required="1" class="span6 m-wrap" value="<?php echo set_value('leave_duration',$edit['LEAVE_DURATION']); ?>" />
                                                  <span class="fred"><?php echo form_error('leave_duration'); ?></span>
                                              </div>
                                          </div>

                                          <div class="control-group">
                                              <label class="control-label">Reason for Leave</label>
                                              <div class="controls">
                                                  <textarea rows="10" cols="50" name="reason_for_leave" data-required="1" class="span6 m-wrap"><?php echo set_value('reason_for_leave',$edit['REASON_FOR_LEAVE']); ?></textarea>
                                                  <span class="fred"><?php echo form_error('reason_for_leave'); ?></span>
                                              </div>
                                          </div>

                                          <div class="control-group">
                                              <label class="control-label">Date From<span class="required">*</span></label>
                                              <div class="controls">
                                                  <input type="text" name="date_from" data-required="1" class="span6 m-wrap datepicker" value="<?php echo set_value('date_from',$edit['DATE_FROM']); ?>" />
                                              <span class="fred"><?php echo form_error('date_from'); ?></span>
                                              </div>
                                          </div>

                                          <div class="control-group">
                                              <label class="control-label">Date To<span class="required">*</span></label>
                                              <div class="controls">
                                                  <input type="text" name="date_to" data-required="1" class="span6 m-wrap datepicker" value="<?php echo set_value('date_to',$edit['DATE_TO']); ?>" />
                                              <span class="fred"><?php echo form_error('date_to'); ?></span>
                                              </div>
                                          </div>

                                          
                                                
                                          <div class="form-actions">
                                              <input type="submit" name="submit" class="btn btn-primary" value="Submit Data"  />
                                               <a class="btn btn-danger" href="<?php echo $url_prefix; ?>manage_buyer">Cancel</a>
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