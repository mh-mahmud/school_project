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
                                          <b>Create Class Routine</b>  
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
                                    <div class="muted pull-left">Create Class Routine</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                                <!-- BEGIN FORM-->
                                                <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                    <input type="hidden" name="routine_id" value="<?php if( isset($edit['ROUTINE_ID']) && $edit['ROUTINE_ID'] ){echo $this->webspice->encrypt_decrypt($edit['ROUTINE_ID'], 'encrypt');} ?>" />
                                                    <fieldset>

                                                          <div class="control-group">
                                                            <label class="control-label">Class Name<span class="required">*</span></label>
                                                            <div class="controls">
                                                              <select id="class_id" class="span6 m-wrap" name="class_id">
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
                                                            <label class="control-label">Section Name<span class="required">*</span></label>
                                                            <div class="controls">
                                                              <select id="section_id" class="span6 m-wrap" name="section_id">
                                                                <option value="">Select...</option>
                                                                <?php
                                                                  $options = $this->db->query("SELECT s.SECTION_ID, s.SECTION_NAME, c.CLASS_NAME FROM section AS s INNER JOIN class AS c ON s.CLASS_ID = c.CLASS_ID WHERE s.STATUS = 7")->result();
                                                                ?>
                                                                <?php foreach($options as $option) : ?>
                                                                  <option value="<?php echo $option->SECTION_ID?>" <?php echo (isset($edit['SECTION_ID']) && $edit['SECTION_ID'] == $option->SECTION_ID) ? "selected" : ""; ?> ><?php echo $option->CLASS_NAME . ": " . $option->SECTION_NAME; ?></option>
                                                                <?php endforeach; ?>
                                                              </select>
                                                              <span class="fred"><?php echo form_error('section_id'); ?></span>
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
                                                                  <option value="<?php echo $option->TEACHER_ID?>" <?php echo (isset($edit['TEACHER_ID']) && $edit['TEACHER_ID'] == $option->TEACHER_ID) ? "selected" : ""; ?> ><?php echo $option->TEACHER_NAME; ?></option>
                                                                <?php endforeach; ?>
                                                              </select>
                                                              <span class="fred"><?php echo form_error('teacher_id'); ?></span>
                                                            </div>
                                                          </div>

                                                          <div class="control-group">
                                                            <label class="control-label">Subject Name<span class="required">*</span></label>
                                                            <div class="controls">
                                                              <select class="span6 m-wrap" name="subject_id">
                                                                <option value="">Select...</option>
                                                                <?php
                                                                  $options = $this->db->query("SELECT s.SUBJECT_ID, s.SUBJECT_NAME, c.CLASS_NAME, c.CLASS_ID FROM subject AS s INNER JOIN class AS c ON s.CLASS_ID = c.CLASS_ID WHERE s.STATUS = 7")->result();
                                                                ?>
                                                                <?php foreach($options as $option) : ?>
                                                                  <option value="<?php echo $option->SUBJECT_ID?>" <?php echo (isset($edit['SUBJECT_ID']) && $edit['SUBJECT_ID'] == $option->SUBJECT_ID) ? "selected" : ""; ?> ><?php echo $option->CLASS_NAME . ": " . $option->SUBJECT_NAME; ?></option>
                                                                <?php endforeach; ?>
                                                              </select>
                                                              <span class="fred"><?php echo form_error('subject_id'); ?></span>
                                                            </div>
                                                          </div>

                                                            <div class="control-group">
                                                              <label class="control-label">Day<span class="required">*</span></label>
                                                              <?php
                                                              $days = array(
                                                                'Saturday',
                                                                'Sunday',
                                                                'Monday',
                                                                'Tuesday',
                                                                'Wednesday',
                                                                'Thursday',
                                                                'Friday'
                                                              );
                                                              ?>
                                                              <div class="controls">
                                                              <select class="span6 m-wrap" name="day">
                                                              <option value="">Select...</option>
                                                              <?php foreach($days as $day) : ?>
                                                              <option value="<?php echo $day; ?>" <?php echo (isset($edit['DAY']) && $edit['DAY'] == $day) ? "selected" : ""; ?> ><?php echo $day; ?></option>
                                                              <?php endforeach; ?>
                                                              </select>
                                                              <span class="fred"><?php echo form_error('day'); ?></span>
                                                              </div>
                                                            </div>

                                                            <div class="control-group">
                                                              <label class="control-label">Time From<span class="required">*</span></label>
                                                              <?php
                                                              $time_from = array(
                                                                '06 AM',
                                                                '07 AM',
                                                                '08 AM',
                                                                '09 AM',
                                                                '10 AM',
                                                                '11 AM',
                                                                '12 PM',
                                                                '01 PM',
                                                                '02 PM',
                                                                '03 PM',
                                                                '04 PM',
                                                                '05 PM',
                                                                '06 PM',
                                                              );
                                                              ?>
                                                              <div class="controls">
                                                              <select class="span6 m-wrap" name="time_from">
                                                              <option value="">Select...</option>
                                                              <?php foreach($time_from as $time_f) : ?>
                                                              <option value="<?php echo $time_f; ?>" <?php echo (isset($edit['TIME_FROM']) && $edit['TIME_FROM'] == $time_f) ? "selected" : ""; ?> ><?php echo $time_f; ?></option>
                                                              <?php endforeach; ?>
                                                              </select>
                                                              <span class="fred"><?php echo form_error('time_from'); ?></span>
                                                              </div>
                                                            </div>

                                                            <div class="control-group">
                                                              <label class="control-label">Time To<span class="required">*</span></label>
                                                              <?php
                                                              $time_to = array(
                                                                '06 AM',
                                                                '07 AM',
                                                                '08 AM',
                                                                '09 AM',
                                                                '10 AM',
                                                                '11 AM',
                                                                '12 PM',
                                                                '01 PM',
                                                                '02 PM',
                                                                '03 PM',
                                                                '04 PM',
                                                                '05 PM',
                                                                '06 PM',
                                                              );
                                                              ?>
                                                              <div class="controls">
                                                              <select class="span6 m-wrap" name="time_to">
                                                              <option value="">Select...</option>
                                                              <?php foreach($time_to as $time_t) : ?>
                                                              <option value="<?php echo $time_t; ?>" <?php echo (isset($edit['TIME_TO']) && $edit['TIME_TO'] == $time_t) ? "selected" : ""; ?> ><?php echo $time_t; ?></option>
                                                              <?php endforeach; ?>
                                                              </select>
                                                              <span class="fred"><?php echo form_error('time_to'); ?></span>
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