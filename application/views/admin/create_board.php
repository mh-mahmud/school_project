<?php include(APPPATH."views/admin/admin_header.php"); ?>
    
        <div class="overloaded"></div>

        <div class="container" id="wrapper">

            <div id="page_create_board_member" class="row-fluid page_identifier">
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
                                          <b>Create Member</b>  
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
                                    <div class="muted pull-left">Create Member</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                                <!-- BEGIN FORM-->
                                                <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                    <input type="hidden" name="member_id" value="<?php if( isset($edit['MEMBER_ID']) && $edit['MEMBER_ID'] ){echo $this->webspice->encrypt_decrypt($edit['MEMBER_ID'], 'encrypt');} ?>" />
                                                    <fieldset>

                                                            <div class="control-group">
                                                                <label class="control-label">Member Name<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="name" data-required="1" class="span6 m-wrap" value="<?php echo set_value('name',$edit['MEMBER_NAME']); ?>" />
                                                                    <span class="fred"><?php echo form_error('name'); ?></span>
                                                                </div>
                                                                
                                                            </div>


                                                            <div class="control-group">
                                                                <label class="control-label">Date-of-birth<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="birthday" data-required="1" class="span6 m-wrap datepicker" value="<?php echo set_value('birthday',$edit['MEMBER_BIRTHDAY']); ?>" />
                                                                </div>
                                                                <span class="fred"><?php echo form_error('birthday'); ?></span>
                                                            </div>

                                                            <div class="control-group">
                                                              <label class="control-label">Gender<span class="required">*</span></label>
                                                              <div class="controls">
                                                                <select class="span6 m-wrap" name="gender">
                                                                  <option value="">Select...</option>
                                                                    <option value="Male" <?php echo (isset($edit['SEX']) && $edit['SEX'] == "Male") ? "selected" : ""; ?> >Male</option>
                                                                    <option value="Female" <?php echo (isset($edit['SEX']) && $edit['SEX'] == "Female") ? "selected" : ""; ?> >Female</option>
                                                                </select>
                                                                <span class="fred"><?php echo form_error('gender'); ?></span>
                                                              </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Member Phone<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="phone" data-required="1" class="span6 m-wrap" value="<?php echo set_value('phone',$edit['PHONE']); ?>" />
                                                                    <span class="fred"><?php echo form_error('phone'); ?></span>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Member Email<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="email" name="email" data-required="1" class="span6 m-wrap" value="<?php echo set_value('email',$edit['EMAIL']); ?>" />
                                                                </div>
                                                                <span class="fred"><?php echo form_error('email'); ?></span>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Member Age<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="age" data-required="1" class="span6 m-wrap" value="<?php echo set_value('age',$edit['AGE']); ?>" />
                                                                </div>
                                                                <span class="fred"><?php echo form_error('age'); ?></span>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Marriage Status<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="marriage_status" data-required="1" class="span6 m-wrap" value="<?php echo set_value('marriage_status',$edit['MARRIAGE_STATUS']); ?>" />
                                                                </div>
                                                                <span class="fred"><?php echo form_error('marriage_status'); ?></span>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Member Occupation<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="occupation" data-required="1" class="span6 m-wrap" value="<?php echo set_value('occupation',$edit['OCCUPATION']); ?>" />
                                                                  <span class="fred"><?php echo form_error('occupation'); ?></span>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Member Voter ID<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="voter_id" data-required="1" class="span6 m-wrap" value="<?php echo set_value('voter_id',$edit['VOTER_ID']); ?>" />
                                                                   <span class="fred"><?php echo form_error('voter_id'); ?></span>
                                                                </div>
                                                               
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Education Background<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <textarea name="education_back" data-required="1" class="span6 m-wrap" ><?php echo set_value('education_back',$edit['EDUCATION_BACK']); ?></textarea>
                                                                    <span class="fred"><?php echo form_error('education_back'); ?></span>
                                                                </div>
                                                                
                                                            </div>


                                                            <div class="control-group">
                                                                <label class="control-label">Member Address<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <textarea name="address" data-required="1" class="span6 m-wrap" ><?php echo set_value('address',$edit['ADDRESS']); ?></textarea>
                                                                    <span class="fred"><?php echo form_error('address'); ?></span>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Session Start<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="session_start" data-required="1" class="span6 m-wrap datepicker" value="<?php echo set_value('session_start',$edit['SESSION_START']); ?>" />
                                                                  <span class="fred"><?php echo form_error('session_start'); ?></span>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Session End<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="session_end" data-required="1" class="span6 m-wrap datepicker" value="<?php echo set_value('session_end',$edit['SESSION_END']); ?>" />
                                                                  <span class="fred"><?php echo form_error('session_end'); ?></span>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="control-group">
                                                              <label class="control-label" for="images">Member Image</label>
                                                              <div class="controls">
                                                                <input type="file" name="images" class="input-file uniform_on" id="images" <?php if(set_value('member_id',$edit['MEMBER_ID']))echo '';else echo 'required';?>>
                                                              </div>
                                                              <span class="fred"><?php echo form_error('images'); ?></span>
                                                            </div>
                                                            <?php if( file_exists($this->webspice->get_path('member_full').$edit['MEMBER_ID'].'.jpg') ): ?>
                                                              <div class="personnel-thm-img" style="padding-top:20px;margin-left:180px;"> 
                                                                <img src="<?php echo $this->webspice->get_path('member').$edit['MEMBER_ID'].'.jpg'; ?>"  alt="" class="img-responsive" width="100"/> 
                                                              </div> 
                                                            <?php endif;  ?>
                                                            
                                                            <div class="form-actions">
                                                                <input type="submit" name="submit" class="btn btn-primary" value="Submit Data"  />
                                                                 <a class="btn btn-danger" href="<?php echo $url_prefix; ?>manage_board">Cancel</a>
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