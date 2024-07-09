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
                                          <b>Create Staff</b>  
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
                                    <div class="muted pull-left">Create Staff</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                                <!-- BEGIN FORM-->
                                                <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                    <input type="hidden" name="staff_id" value="<?php if( isset($edit['STAFF_ID']) && $edit['STAFF_ID'] ){echo $this->webspice->encrypt_decrypt($edit['STAFF_ID'], 'encrypt');} ?>" />
                                                    <fieldset>

                                                            <div class="control-group">
                                                                <label class="control-label">Staff Name<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="name" data-required="1" class="span6 m-wrap" value="<?php echo set_value('name',$edit['STAFF_NAME']); ?>" />
                                                                    <span class="fred"><?php echo form_error('name'); ?></span>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Staff Card No<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="card_no" data-required="1" class="span6 m-wrap" value="<?php echo set_value('card_no',$edit['STAFF_CARD_NO']); ?>" />
                                                                    <span class="fred"><?php echo form_error('card_no'); ?></span>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="control-group">
                                                              <label class="control-label">Designation<span class="required">*</span></label>
                                                              <div class="controls">
                                                                <select class="span6 m-wrap" name="designation_id">
                                                                  <option value="">Select...</option>
                                                                  <?php
                                                                    $options = $this->db->query("SELECT * FROM designation WHERE STATUS = 7")->result();
                                                                  ?>
                                                                  <?php foreach($options as $option) : ?>
                                                                    <option value="<?php echo $option->DESIGNATION_ID ?>" <?php echo (isset($edit['DESIGNATION_ID']) && $edit['DESIGNATION_ID'] == $option->DESIGNATION_ID) ? "selected" : ""; ?> ><?php echo $option->DESIGNATION_NAME; ?></option>
                                                                  <?php endforeach; ?>
                                                                </select>
                                                                <span class="fred"><?php echo form_error('designation_id'); ?></span>
                                                              </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Date-of-birth<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="birthday" data-required="1" class="span6 m-wrap datepicker" value="<?php echo set_value('birthday',$edit['STAFF_BIRTHDAY']); ?>" />
                                                                </div>
                                                                <span class="fred"><?php echo form_error('birthday'); ?></span>
                                                            </div>

                                                            <div class="control-group">
                                                              <label class="control-label">Gender<span class="required">*</span></label>
                                                              <div class="controls">
                                                                <select class="span6 m-wrap" name="gender">
                                                                  <option value="">Select...</option>
                                                                    <option value="Male" <?php echo (isset($edit['SEX']) && $edit['SEX'] == "m") ? "selected" : ""; ?> >Male</option>
                                                                    <option value="Female" <?php echo (isset($edit['SEX']) && $edit['SEX'] == "f") ? "selected" : ""; ?> >Female</option>
                                                                </select>
                                                                <span class="fred"><?php echo form_error('gender'); ?></span>
                                                              </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Staff Phone<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="phone" data-required="1" class="span6 m-wrap" value="<?php echo set_value('phone',$edit['PHONE']); ?>" />
                                                                    <span class="fred"><?php echo form_error('phone'); ?></span>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Staff Email<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="email" name="email" data-required="1" class="span6 m-wrap" value="<?php echo set_value('email',$edit['EMAIL']); ?>" />
                                                                </div>
                                                                <span class="fred"><?php echo form_error('email'); ?></span>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Password<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="password" data-required="1" class="span6 m-wrap" value="<?php echo set_value('password',$edit['PASSWORD']); ?>" />
                                                                </div>
                                                                <span class="fred"><?php echo form_error('password'); ?></span>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Staff Address<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <textarea name="address" data-required="1" class="span6 m-wrap" ><?php echo set_value('address',$edit['ADDRESS']); ?></textarea>
                                                                    <span class="fred"><?php echo form_error('address'); ?></span>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="control-group">
                                                              <label class="control-label" for="images">Staff Image</label>
                                                              <div class="controls">
                                                                <input type="file" name="images" class="input-file uniform_on" id="images" <?php if(set_value('staff_id',$edit['STAFF_ID']))echo '';else echo 'required';?>>
                                                              </div>
                                                              <span class="fred"><?php echo form_error('images'); ?></span>
                                                            </div>
                                                            <?php if( file_exists($this->webspice->get_path('staff_full').$edit['STAFF_ID'].'.jpg') ): ?>
                                                              <div class="personnel-thm-img" style="padding-top:20px;margin-left:180px;"> 
                                                                <img src="<?php echo $this->webspice->get_path('staff').$edit['STAFF_ID'].'.jpg'; ?>"  alt="" class="img-responsive" width="100"/> 
                                                              </div> 
                                                            <?php endif;  ?>
                                                            
                                                            <div class="form-actions">
                                                                <input type="submit" name="submit" class="btn btn-primary" value="Submit Data"  />
                                                                 <a class="btn btn-danger" href="<?php echo $url_prefix; ?>manage_staff">Cancel</a>
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