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
                                          <b>Assign House Teacher</b>  
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
                                    <div class="muted pull-left">Assign House Teacher</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                                <!-- BEGIN FORM-->
                                                <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                    <input type="hidden" name="assign_hostel_teacher_id" value="<?php if( isset($edit['ASSIGN_HOSTEL_TEACHER_ID']) && $edit['ASSIGN_HOSTEL_TEACHER_ID'] ){echo $this->webspice->encrypt_decrypt($edit['ASSIGN_HOSTEL_TEACHER_ID'], 'encrypt');} ?>" />
                                                    <fieldset>

                                                        <div class="control-group">
                                                              <label class="control-label">House Name<span class="required">*</span></label>
                                                            <div class="controls">
                                                              <select class="span6 m-wrap" name="house_id">
                                                                <option value="">Select...</option>
                                                                <?php
                                                                  $options = $this->db->query("SELECT * FROM house WHERE STATUS = 7")->result();
                                                                ?>
                                                                <?php foreach($options as $option) : ?>
                                                                  <option value="<?php echo $option->HOUSE_ID ?>" <?php echo (isset($edit['HOUSE_ID']) && $edit['HOUSE_ID'] == $option->HOUSE_ID) ? "selected" : ""; ?> ><?php echo $option->HOUSE_NAME; ?></option>
                                                                <?php endforeach; ?>
                                                              </select>
                                                              <span class="fred"><?php echo form_error('house_id'); ?></span>
                                                            </div>
                                                        </div>

                                                        <div class="control-group">
                                                          <label class="control-label">Teacher Name<span class="required">*</span></label>
                                                          <div class="controls">
                                                            <select class="span6 m-wrap" name="teacher_id">
                                                              <option value="">Select...</option>
                                                              <?php
                                                                $options = $this->db->query("SELECT * FROM teacher WHERE STATUS = 7")->result();
                                                              ?>
                                                              <?php foreach($options as $option) : ?>
                                                                <option value="<?php echo $option->TEACHER_ID ?>" <?php echo (isset($edit['TEACHER_ID']) && $edit['TEACHER_ID'] == $option->TEACHER_ID) ? "selected" : ""; ?> ><?php echo $option->TEACHER_NAME; ?></option>
                                                              <?php endforeach; ?>
                                                            </select>
                                                            <span class="fred"><?php echo form_error('teacher_id'); ?></span>
                                                          </div>
                                                        </div>

                                                        <div class="control-group">
                                                            <label class="control-label">Session<span class="required">*</span></label>
                                                            <div class="controls">
                                                                <input type="text" name="session" data-required="1" class="span6 m-wrap" value="<?php echo set_value('session',$edit['SESSION']); ?>" />
                                                            <span class="fred"><?php echo form_error('session'); ?></span>
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
                                                            <input type="submit" name="submit" class="btn btn-success" value="Submit Data"  />
                                                            <a class="btn btn-danger" href="<?php echo $url_prefix; ?>manage_house_teacher">Cancel</a>
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