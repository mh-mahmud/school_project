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
                                          <b>Add Student</b>
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
                                    <div class="muted pull-left">Add Student</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">

                                        <!-- BEGIN FORM-->
                                        <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                            <input type="hidden" name="student_id" value="<?php if( isset($edit['STUDENT_ID']) && $edit['STUDENT_ID'] ){echo $this->webspice->encrypt_decrypt($edit['STUDENT_ID'], 'encrypt');} ?>" />
                                            <fieldset>
                                                
                                                <div class="control-group">
                                                    <label class="control-label">Student Name<span class="required">*</span></label>
                                                    <div class="controls">
                                                        <input type="text" name="name" data-required="1" class="span6 m-wrap" value="<?php echo set_value('name',$edit['NAME']); ?>" />
                                                    <span class="fred"><?php echo form_error('name'); ?></span>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label">Birth Day<span class="required">*</span></label>
                                                    <div class="controls">
                                                        <input type="text" name="birthday" data-required="1" class="span6 m-wrap datepicker" value="<?php echo set_value('birthday',$edit['BIRTHDAY']); ?>" />
                                                    <span class="fred"><?php echo form_error('birthday'); ?></span>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                  <label class="control-label">Gender<span class="required">*</span></label>
                                                  <div class="controls">
                                                    <select class="span6 m-wrap" name="gender">
                                                      <option value="">Select...</option>
                                                        <option value="Female" <?php echo (set_value('gender', $edit['GENDER']) == "Female") ? "selected" : "" ?> >Female</option>
                                                        <option value="Male" <?php echo (set_value('gender', $edit['GENDER']) == "Male") ? "selected" : "" ?> >Male</option>
                                                    </select>
                                                    <span class="fred"><?php echo form_error('gender'); ?></span>
                                                  </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label">Religion<span class="required">*</span></label>
                                                    <div class="controls">
                                                        <input type="text" name="religion" data-required="1" class="span6 m-wrap" value="<?php echo set_value('religion',$edit['RELIGION']); ?>" />
                                                    <span class="fred"><?php echo form_error('religion'); ?></span>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label">Blood Group<span class="required">*</span></label>
                                                    <div class="controls">
                                                        <input type="text" name="blood_group" data-required="1" class="span6 m-wrap" value="<?php echo set_value('blood_group',$edit['BLOOD_GROUP']); ?>" />
                                                    <span class="fred"><?php echo form_error('blood_group'); ?></span>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label">Student Age<span class="required">*</span></label>
                                                    <div class="controls">
                                                        <input type="text" name="age" data-required="1" class="span6 m-wrap" value="<?php echo set_value('age',$edit['AGE']); ?>" />
                                                    <span class="fred"><?php echo form_error('age'); ?></span>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label">Address<span class="required">*</span></label>
                                                    <div class="controls">
                                                        <textarea rows="10" cols="50" name="address" data-required="1" class="span6 m-wrap" ><?php echo set_value('address',$edit['ADDRESS']); ?></textarea>
                                                    <span class="fred"><?php echo form_error('address'); ?></span>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label">Phone</label>
                                                    <div class="controls">
                                                        <input type="text" name="phone" data-required="1" class="span6 m-wrap" value="<?php echo set_value('phone',$edit['PHONE']); ?>" />
                                                    <span class="fred"><?php echo form_error('phone'); ?></span>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label">Student Email</label>
                                                    <div class="controls">
                                                        <input type="text" name="email" data-required="1" class="span6 m-wrap" value="<?php echo set_value('email',$edit['EMAIL']); ?>" />
                                                    <span class="fred"><?php echo form_error('email'); ?></span>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label">Father Name<span class="required">*</span></label>
                                                    <div class="controls">
                                                        <input type="text" name="father_name" data-required="1" class="span6 m-wrap" value="<?php echo set_value('father_name',$edit['FATHER_NAME']); ?>" />
                                                    <span class="fred"><?php echo form_error('father_name'); ?></span>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label">Mother Name<span class="required">*</span></label>
                                                    <div class="controls">
                                                        <input type="text" name="mother_name" data-required="1" class="span6 m-wrap" value="<?php echo set_value('mother_name',$edit['MOTHER_NAME']); ?>" />
                                                    <span class="fred"><?php echo form_error('mother_name'); ?></span>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                  <label class="control-label" for="images">Student Image</label>
                                                  <div class="controls">
                                                    <input type="file" name="images" class="input-file uniform_on" id="images" <?php if(set_value('student_id',$edit['STUDENT_ID']))echo '';else echo 'required';?>>
                                                  </div>
                                                  <span class="fred"><?php echo form_error('images'); ?></span>
                                                </div>
                                                <?php if( file_exists($this->webspice->get_path('student_full').$edit['STUDENT_ID'].'.jpg') ): ?>
                                                  <div class="personnel-thm-img" style="padding-top:20px;margin-left:180px;"> 
                                                    <img src="<?php echo $this->webspice->get_path('student').$edit['STUDENT_ID'].'.jpg'; ?>"  alt="" class="img-responsive" width="100"/> 
                                                  </div> 
                                                <?php endif;  ?>
                                                
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