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
                                          <b>Create Teacher</b>  
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
                                    <div class="muted pull-left">Create Teacher</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                                <!-- BEGIN FORM-->
                                                <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                    <input type="hidden" name="teacher_id" value="<?php if( isset($edit['TEACHER_ID']) && $edit['TEACHER_ID'] ){echo $this->webspice->encrypt_decrypt($edit['TEACHER_ID'], 'encrypt');} ?>" />
                                                    <fieldset>

                                                            <div class="control-group">
                                                                <label class="control-label">Teacher Name<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="teacher_name" data-required="1" class="span6 m-wrap" value="<?php echo set_value('teacher_name',$edit['TEACHER_NAME']); ?>" />
                                                                    <span class="fred"><?php echo form_error('teacher_name'); ?></span>
                                                                </div>
                                                                
                                                            </div>


                                                            <div class="control-group">
                                                                <label class="control-label">Date-of-Birth<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="teacher_birthday" data-required="1" class="span6 m-wrap datepicker" value="<?php echo set_value('teacher_birthday',$edit['TEACHER_BIRTHDAY']); ?>" />
                                                                </div>
                                                                <span class="fred"><?php echo form_error('teacher_birthday'); ?></span>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Teacher Phone<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="phone" data-required="1" class="span6 m-wrap" value="<?php echo set_value('phone',$edit['PHONE']); ?>" />
                                                                    <span class="fred"><?php echo form_error('phone'); ?></span>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Teacher Email<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="email" name="email" data-required="1" class="span6 m-wrap" value="<?php echo set_value('email',$edit['EMAIL']); ?>" />
                                                                </div>
                                                                <span class="fred"><?php echo form_error('email'); ?></span>
                                                            </div>

                                                            <div class="control-group">
                                                              <label class="control-label">Teacher Designation<span class="required">*</span></label>
                                                              <div class="controls">
                                                                <?php
                                                                  $options = $this->db->query("SELECT * FROM designation WHERE STATUS = 7")->result();
                                                                ?>
                                                                <select class="span6 m-wrap" name="designation_id">
                                                                  <option value="">Select...</option>
                                                                  <?php foreach($options as $option) : ?>
                                                                    <option value="<?php echo $option->DESIGNATION_ID ?>" <?php echo (isset($edit['DESIGNATION_ID']) && $edit['DESIGNATION_ID'] == $option->DESIGNATION_ID) ? "selected" : ""; ?> >

                                                                      <?php echo $option->DESIGNATION_NAME; ?>

                                                                    </option>
                                                                  <?php endforeach; ?>
                                                                </select>
                                                                <span class="fred"><?php echo form_error('designation_id'); ?></span>
                                                              </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Teacher Blood Group<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="blood_group" data-required="1" class="span6 m-wrap" value="<?php echo set_value('blood_group',$edit['BLOOD_GROUP']); ?>" />
                                                                  <span class="fred"><?php echo form_error('blood_group'); ?></span>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="control-group">
                                                              <label class="control-label">Gender<span class="required">*</span></label>
                                                              <div class="controls">
                                                                <select class="span6 m-wrap" name="gender">
                                                                  <option value="">Select...</option>
                                                                    <option value="Male" <?php echo (isset($edit['GENDER']) && set_value('gender',$edit['GENDER'])  == "Male") ? "selected" : ""; ?> >Male</option>
                                                                    <option value="Female" <?php echo (isset($edit['GENDER']) && set_value('gender',$edit['GENDER']) == "Female") ? "selected" : ""; ?> >Female</option>
                                                                </select>
                                                                <span class="fred"><?php echo form_error('gender'); ?></span>
                                                              </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Teacher Voter ID<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="voter_id" data-required="1" class="span6 m-wrap" value="<?php echo set_value('voter_id',$edit['VOTER_ID']); ?>" />
                                                                   <span class="fred"><?php echo form_error('voter_id'); ?></span>
                                                                </div>
                                                               
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Teacher Religion<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="religion" data-required="1" class="span6 m-wrap" value="<?php echo set_value('religion',$edit['RELIGION']); ?>" />
                                                                   <span class="fred"><?php echo form_error('religion'); ?></span>
                                                                </div>
                                                               
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Educational Background<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <textarea rows="10" cols="50" name="educational_back" data-required="1" class="span6 m-wrap" ><?php echo set_value('educational_back',$edit['EDUCATIONAL_BACK']); ?></textarea>
                                                                    <span class="fred"><?php echo form_error('educational_back'); ?></span>
                                                                </div>
                                                                
                                                            </div>


                                                            <div class="control-group">
                                                                <label class="control-label">Present Address<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <textarea name="present_address" data-required="1" class="span6 m-wrap" ><?php echo set_value('present_address',$edit['PRESENT_ADDRESS']); ?></textarea>
                                                                    <span class="fred"><?php echo form_error('present_address'); ?></span>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Permanent Address<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <textarea name="permanent_address" data-required="1" class="span6 m-wrap" ><?php echo set_value('permanent_address',$edit['PERMANENT_ADDRESS']); ?></textarea>
                                                                    <span class="fred"><?php echo form_error('permanent_address'); ?></span>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="control-group">
                                                              <label class="control-label" for="images">Teacher Image</label>
                                                              <div class="controls">
                                                                <input type="file" name="images" class="input-file uniform_on" id="images" <?php if(set_value('teacher_id',$edit['TEACHER_ID']))echo '';else echo 'required';?>>
                                                              </div>
                                                              <span class="fred"><?php echo form_error('images'); ?></span>
                                                            </div>
                                                            <?php if( file_exists($this->webspice->get_path('teacher_full').$edit['TEACHER_ID'].'.jpg') ): ?>
                                                              <div class="personnel-thm-img" style="padding-top:20px;margin-left:180px;"> 
                                                                <img src="<?php echo $this->webspice->get_path('teacher').$edit['TEACHER_ID'].'.jpg'; ?>"  alt="" class="img-responsive" width="100"/> 
                                                              </div> 
                                                            <?php endif;  ?>
                                                            
                                                            <div class="form-actions">
                                                                <input type="submit" name="submit" class="btn btn-primary" value="Submit Data"  />
                                                                 <a class="btn btn-danger" href="<?php echo $url_prefix; ?>manage_teacher">Cancel</a>
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