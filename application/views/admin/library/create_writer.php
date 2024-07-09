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
                                          <b>Create Writer</b>  
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
                                    <div class="muted pull-left">Create Writer</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                                <!-- BEGIN FORM-->
                                                <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                    <input type="hidden" name="writer_id" value="<?php if( isset($edit['WRITER_ID']) && $edit['WRITER_ID'] ){echo $this->webspice->encrypt_decrypt($edit['WRITER_ID'], 'encrypt');} ?>" />
                                                    <fieldset>
                                                          <div class="control-group">
                                                            <label class="control-label">Book Category Name<span class="required">*</span></label>
                                                            <div class="controls">
                                                              <select class="span6 m-wrap" name="book_category_id">
                                                                <option value="">Select...</option>
                                                                <?php
                                                                  $options = $this->db->query("SELECT * FROM book_category WHERE STATUS = 7")->result();
                                                                ?>
                                                                <?php foreach($options as $option) : ?>
                                                                  <option value="<?php echo $option->BOOK_CATEGORY_ID ?>" <?php echo (isset($edit['BOOK_CATEGORY_ID']) && $edit['BOOK_CATEGORY_ID'] == $option->BOOK_CATEGORY_ID) ? "selected" : ""; ?> ><?php echo $option->CATEGORY_NAME; ?></option>
                                                                <?php endforeach; ?>
                                                              </select>
                                                              <span class="fred"><?php echo form_error('book_category_id'); ?></span>
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
                                                                <label class="control-label">Country Name<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="country_name" data-required="1" class="span6 m-wrap" value="<?php echo set_value('country_name',$edit['COUNTRY_NAME']); ?>" />
                                                                <span class="fred"><?php echo form_error('country_name'); ?></span>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Date-of-birth<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="date_of_birth" data-required="1" class="span6 m-wrap datepicker" value="<?php echo set_value('date_of_birth',$edit['DATE_OF_BIRTH']); ?>" />
                                                                </div>
                                                                <span class="fred"><?php echo form_error('date_of_birth'); ?></span>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Date-of-death<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="date_of_death" data-required="1" class="span6 m-wrap datepicker" value="<?php echo set_value('date_of_death',$edit['DATE_OF_DEATH']); ?>" />
                                                                </div>
                                                                <span class="fred"><?php echo form_error('date_of_death'); ?></span>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Full Address<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <textarea name="full_address" data-required="1" class="span6 m-wrap" ><?php echo set_value('full_address',$edit['FULL_ADDRESS']); ?></textarea>
                                                                    <span class="fred"><?php echo form_error('full_address'); ?></span>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Achievement<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <textarea name="achievement" data-required="1" class="span6 m-wrap" ><?php echo set_value('achievement',$edit['ACHIEVEMENT']); ?></textarea>
                                                                    <span class="fred"><?php echo form_error('achievement'); ?></span>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Educational Details<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <textarea name="educational_details" data-required="1" class="span6 m-wrap" ><?php echo set_value('educational_details',$edit['EDUCATIONAL_DETAILS']); ?></textarea>
                                                                    <span class="fred"><?php echo form_error('educational_details'); ?></span>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Marital Status<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="marital_status" data-required="1" class="span6 m-wrap" value="<?php echo set_value('marital_status',$edit['MARITAL_STATUS']); ?>" />
                                                                <span class="fred"><?php echo form_error('marital_status'); ?></span>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Spouse Name<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" name="spouse_name" data-required="1" class="span6 m-wrap" value="<?php echo set_value('spouse_name',$edit['SPOUSE_NAME']); ?>" />
                                                                <span class="fred"><?php echo form_error('spouse_name'); ?></span>
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
                                                                <label class="control-label">Children Details<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <textarea name="children_details" data-required="1" class="span6 m-wrap" ><?php echo set_value('children_details',$edit['CHILDREN_DETAILS']); ?></textarea>
                                                                    <span class="fred"><?php echo form_error('children_details'); ?></span>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                              <label class="control-label" for="images">Writer Image</label>
                                                              <div class="controls">
                                                                <input type="file" name="images" class="input-file uniform_on" id="images" <?php if(set_value('writer_id',$edit['WRITER_ID']))echo '';else echo 'required';?>>
                                                              </div>
                                                              <span class="fred"><?php echo form_error('images'); ?></span>
                                                            </div>
                                                            <?php if( file_exists($this->webspice->get_path('writer_full').$edit['WRITER_ID'].'.jpg') ): ?>
                                                              <div class="personnel-thm-img" style="padding-top:20px;margin-left:180px;"> 
                                                                <img src="<?php echo $this->webspice->get_path('writer').$edit['WRITER_ID'].'.jpg'; ?>"  alt="" class="img-responsive" width="100"/> 
                                                              </div> 
                                                            <?php endif;  ?>

                                                            <div class="form-actions">
                                                                <input type="submit" name="submit" class="btn btn-success" value="Submit Data"  />
                                                                <a class="btn btn-danger" href="<?php echo $url_prefix; ?>manage_writer">Cancel</a>
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