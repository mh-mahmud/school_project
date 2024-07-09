<?php include(APPPATH."views/admin/admin_header.php"); ?>

        <div class="container" id="wrapper">
            <div id="page_admin_student" class="row-fluid page_identifier">
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
                                          <b>Admit Student</b>
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
                                    <div class="muted pull-left">Admit Student</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                                <!-- BEGIN FORM-->
                                                <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                                    <input id="token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                    <input type="hidden" name="student_data_id" value="<?php if( isset($edit['STUDENT_DATA_ID']) && $edit['STUDENT_DATA_ID'] ){echo $this->webspice->encrypt_decrypt($edit['STUDENT_DATA_ID'], 'encrypt');} ?>" />
                                                    <fieldset>
                                                        
                                                          <div class="control-group">
                                                            <label class="control-label">Student Name<span class="required">*</span></label>
                                                            <div class="controls">
                                                              <select class="span6 m-wrap chzn-select" name="student_id">
                                                                <option value="">Select...</option>
                                                                <?php
                                                                  $options = $this->db->query("SELECT * FROM student_info WHERE STATUS = 7")->result();
                                                                ?>
                                                                <?php foreach($options as $option) : ?>
                                                                  <option value="<?php echo $option->STUDENT_ID?>" 

                                                                    <?php echo (set_value('student_id', $edit['STUDENT_ID']) == $option->STUDENT_ID) ? "selected" : "" ?>
                                                                    
                                                                   ><?php echo $option->NAME . ': ' . $option->PUBLIC_ID; ?></option>
                                                                <?php endforeach; ?>
                                                              </select>
                                                              <span class="fred"><?php echo form_error('student_id'); ?></span>
                                                            </div>
                                                          </div>

                                                          <div class="control-group">
                                                            <label class="control-label">Class<span class="required">*</span></label>
                                                            <div class="controls">
                                                              <select id="class_list" class="span6 m-wrap" name="class_id">
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
                                                            <label class="control-label">Section<span class="required">*</span></label>
                                                            <div class="controls">
                                                              <select id="section_list" class="span6 m-wrap" name="section_id">
                                                                <option value="">Select...</option>
                                                                <?php
                                                                if(isset($edit['SECTION_ID'])) {
                                                                  $options = $this->db->query("SELECT s.SECTION_ID, s.SECTION_NAME, c.CLASS_NAME FROM section AS s INNER JOIN class AS c ON s.CLASS_ID = c.CLASS_ID WHERE s.STATUS = 7")->result();
                                                                ?>
                                                                <?php foreach($options as $option) : ?>
                                                                  <option value="<?php echo $option->SECTION_ID?>" <?php echo (isset($edit['SECTION_ID']) && $edit['SECTION_ID'] == $option->SECTION_ID) ? "selected" : ""; ?> ><?php echo $option->CLASS_NAME . ": " . $option->SECTION_NAME; ?></option>
                                                                <?php endforeach; } ?>
                                                              </select>
                                                              <span class="fred"><?php echo form_error('section_id'); ?></span>
                                                            </div>
                                                          </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Roll No<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" id="roll_no" name="roll_no" data-required="1" class="span6 m-wrap" value="<?php echo set_value('roll_no',$edit['ROLL_NO']); ?>" />
                                                                <span class="fred"><?php echo form_error('roll_no'); ?></span>
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