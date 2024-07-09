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
                                          <b>Create Book Category</b>  
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
                                    <div class="muted pull-left">Create Book Category</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                                <!-- BEGIN FORM-->
                                                <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                    <input type="hidden" name="book_category_id" value="<?php if( isset($edit['NOTIFICATION_ID']) && $edit['NOTIFICATION_ID'] ){echo $this->webspice->encrypt_decrypt($edit['NOTIFICATION_ID'], 'encrypt');} ?>" />
                                                    <fieldset>
                                                    		<div class="control-group">
	                                                            <label class="control-label">Student Name<span class="required">*</span></label>
	                                                            <div class="controls">
	                                                              <select class="span6 m-wrap chzn-select" name="library_member_id">
	                                                                <option value="">Select...</option>
	                                                                <?php
	                                                                  $options = $this->db->query("SELECT sd.STUDENT_DATA_ID, sd.STUDENT_ID, lm.STUDENT_DATA_ID, lm.LIBRARY_MEMBER_ID, lm.YEAR, si.NAME FROM library_member AS lm INNER JOIN student_data AS sd ON sd.STUDENT_DATA_ID = lm.STUDENT_DATA_ID INNER JOIN student_info AS si ON si.STUDENT_ID=sd.STUDENT_ID WHERE lm.YEAR =". date("Y"))->result();
	                                                                ?>
	                                                                <?php foreach($options as $option) : ?>
	                                                                  <option value="<?php echo $option->LIBRARY_MEMBER_ID?>" 

	                                                                    <?php echo (set_value('library_member_id', $edit['LIBRARY_MEMBER_ID']) == $option->LIBRARY_MEMBER_ID) ? "selected" : "" ?>
	                                                                    
	                                                                   ><?php echo $option->NAME; ?></option>
	                                                                <?php endforeach; ?>
	                                                              </select>
	                                                              <span class="fred"><?php echo form_error('library_member_id'); ?></span>
	                                                            </div>
                                                          </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Subject<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="subject" data-required="1" class="span6 m-wrap" value="<?php echo set_value('subject',$edit['SUBJECT']); ?>" />
                                                                <span class="fred"><?php echo form_error('subject'); ?></span>
                                                                </div>
                                                            </div>

                                                             <div class="control-group">
                                                                <label class="control-label">Message<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <textarea name="message" data-required="1" class="span6 m-wrap" ><?php echo set_value('message',$edit['MESSAGE']); ?></textarea>
                                                                    <span class="fred"><?php echo form_error('message'); ?></span>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="form-actions">
                                                                <input type="submit" name="submit" class="btn btn-success" value="Submit Data"  />
                                                                <a class="btn btn-danger" href="<?php echo $url_prefix; ?>manage_notification">Cancel</a>
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