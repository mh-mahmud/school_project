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
                                          <b>Add House</b>  
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
                                    <div class="muted pull-left">Add House</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                                <!-- BEGIN FORM-->
                                                <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                    <input type="hidden" name="house_id" value="<?php if( isset($edit['HOUSE_ID']) && $edit['HOUSE_ID'] ){echo $this->webspice->encrypt_decrypt($edit['HOUSE_ID'], 'encrypt');} ?>" />
                                                    <fieldset>

                                                        <div class="control-group">
                                                            <label class="control-label">House Name<span class="required">*</span></label>
                                                            <div class="controls">
                                                                <input type="text" name="house_name" data-required="1" class="span6 m-wrap" value="<?php echo set_value('house_name',$edit['HOUSE_NAME']); ?>" />
                                                            <span class="fred"><?php echo form_error('house_name'); ?></span>
                                                            </div>
                                                        </div>

                                                        <div class="control-group">
                                                            <label class="control-label">Description<span class="required">*</span></label>
                                                            <div class="controls">
                                                                <textarea name="description" data-required="1" class="span6 m-wrap" ><?php echo set_value('description',$edit['DESCRIPTION']); ?></textarea>
                                                                <span class="fred"><?php echo form_error('description'); ?></span>
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="control-group">
                                                            <label class="control-label">Location<span class="required">*</span></label>
                                                            <div class="controls">
                                                                <textarea name="location" data-required="1" class="span6 m-wrap" ><?php echo set_value('location',$edit['LOCATION']); ?></textarea>
                                                                <span class="fred"><?php echo form_error('location'); ?></span>
                                                            </div>
                                                            
                                                        </div>


                                                        <div class="control-group">
                                                            <label class="control-label">Total Room<span class="required">*</span></label>
                                                            <div class="controls">
                                                                <input type="text" name="total_room" data-required="1" class="span6 m-wrap" value="<?php echo set_value('total_room',$edit['TOTAL_ROOM']); ?>" />
                                                            <span class="fred"><?php echo form_error('total_room'); ?></span>
                                                            </div>
                                                        </div>

                                                        <div class="control-group">
                                                            <label class="control-label">Total Seat<span class="required">*</span></label>
                                                            <div class="controls">
                                                                <input type="text" name="total_set" data-required="1" class="span6 m-wrap" value="<?php echo set_value('total_set',$edit['TOTAL_SET']); ?>" />
                                                            <span class="fred"><?php echo form_error('total_set'); ?></span>
                                                            </div>
                                                        </div>

                                                        <div class="control-group">
                                                          <label class="control-label" for="images">House Image</label>
                                                          <div class="controls">
                                                            <input type="file" name="images" class="input-file uniform_on" id="images" <?php if(set_value('house_id',$edit['HOUSE_ID']))echo '';else echo 'required';?>>
                                                          </div>
                                                          <span class="fred"><?php echo form_error('images'); ?></span>
                                                        </div>
                                                        <?php if( file_exists($this->webspice->get_path('house_full').$edit['HOUSE_ID'].'.jpg') ): ?>
                                                          <div class="personnel-thm-img" style="padding-top:20px;margin-left:180px;"> 
                                                            <img src="<?php echo $this->webspice->get_path('house').$edit['HOUSE_ID'].'.jpg'; ?>"  alt="" class="img-responsive" width="100"/> 
                                                          </div> 
                                                        <?php endif;  ?>

                                                        <div class="form-actions">
                                                            <input type="submit" name="submit" class="btn btn-success" value="Submit Data"  />
                                                            <a class="btn btn-danger" href="<?php echo $url_prefix; ?>manage_house">Cancel</a>
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