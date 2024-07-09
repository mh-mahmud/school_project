<?php include(APPPATH."views/admin/admin_header.php"); ?>

        <div class="container" id="wrapper">
            <div id="page_assign_student_subject" class="row-fluid page_identifier">
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
                                          <b>Assign Student Subject</b>
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
                                    <div class="muted pull-left">Assign Student Subject</div>
                                </div>
                                <div class="block-content collapse in">
                                  <div class="span12">
                                    <!-- BEGIN FORM-->
                                    <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                        <input id="token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <input type="hidden" name="a_stu_sub" value="<?php if( isset($edit['A_STU_SUB']) && $edit['A_STU_SUB'] ){echo $this->webspice->encrypt_decrypt($edit['A_STU_SUB'], 'encrypt');} ?>" />
                                        <fieldset>

                                          <div class="control-group">
                                            <label class="control-label">Class Name<span class="required">*</span></label>
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
                                            <label class="control-label">Section Name<span class="required">*</span></label>
                                            <div class="controls">
                                              <select id="section_list" class="span6 m-wrap" name="section_id">
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
                                            <label class="control-label">Student Name<span class="required">*</span></label>
                                            <div class="controls">
                                              <select id="student_list" class="span6 m-wrap" name="student_id">
                                                <option value="">Select...</option>
                                                
                                              </select>
                                              <span class="fred"><?php echo form_error('student_id'); ?></span>
                                            </div>
                                          </div>

                                          <div class="control-group">
                                            <label class="control-label">Group Name<span class="required">*</span></label>
                                            <div class="controls">
                                              <select class="span6 m-wrap" name="group_name">
                                                <option value="">Select...</option>
                                                  <option value="common" <?php echo (isset($edit['GROUP_NAME']) && set_value('group_name',$edit['GROUP_NAME'])  == "common") ? "selected" : ""; ?> >Common</option>
                                                  <option value="science" <?php echo (isset($edit['GROUP_NAME']) && set_value('group_name',$edit['GROUP_NAME'])  == "science") ? "selected" : ""; ?> >Science</option>
                                                  <option value="commerce" <?php echo (isset($edit['GROUP_NAME']) && set_value('group_name',$edit['GROUP_NAME']) == "commerce") ? "selected" : ""; ?> >Commerce</option>
                                                  <option value="arts" <?php echo (isset($edit['GROUP_NAME']) && set_value('group_name',$edit['GROUP_NAME']) == "arts") ? "selected" : ""; ?> >Arts</option>
                                              </select>
                                              <span class="fred"><?php echo form_error('group_name'); ?></span>
                                            </div>
                                          </div>

                                                          <div class="prodcut_price">
                                                              <div class="control-group">
                                                                <!-- <div class="span12"> -->

                                                                  <label class="control-label">Assign Subject<span class="required">*</span></label>
                                                                  <div class="col-md-12 my_real_div">

                                                                    <div class=""></div>

                                                                    <div class="span10">
                                                                      <!-- <div style="margin-left: -33.5641%;"> -->
                                                                        <div class="form-group">
                                                                          <label>Subject Name<span class="required">*</span></label>
                                                                         
                                                                            <select class="span6 m-wrap" name="subject_id[]">
                                                                            <option value="">Select Subject</option>
                                                                            <?php
                                                                              $options = $this->db->query("SELECT s.SUBJECT_ID, s.SUBJECT_NAME, s.GROUP_NAME, c.CLASS_NAME FROM subject AS s INNER JOIN class AS c ON s.CLASS_ID = c.CLASS_ID WHERE s.STATUS = 7 AND s.GROUP_NAME<>''")->result();
                                                                            ?>
                                                                            <?php foreach($options as $option) : ?>
                                                                              <option value="<?php echo $option->SUBJECT_ID?>" <?php echo (isset($edit['SUBJECT_ID']) && $edit['SUBJECT_ID'] == $option->SUBJECT_ID) ? "selected" : ""; ?> ><?php echo $option->CLASS_NAME . ": " . $option->SUBJECT_NAME . " (".$option->GROUP_NAME. ")"; ?></option>
                                                                            <?php endforeach; ?>
                                                                            </select>
                                                                            <span class="fred"><?php echo form_error('subject_id[]'); ?></span>
                                                                          </div>
                                                                        <!-- </div> -->
                                                                    </div>
                                                                  </div>


                                                                <!-- </div> -->

                                                              </div>
                                                          </div>
                              
                                                          <div class="prodcut_price_new" style="display:none">
                                                              <div class="control-group">
                                                                <!-- <div class="span12"> -->

                                                                  <label class="control-label"><span class="required">*</span></label>
                                                                  <div class="col-md-12 my_real_div">

                                                                    <div class=""></div>

                                                                    <div class="span10">
                                                                      <!-- <div style="margin-left: -33.5641%;"> -->
                                                                        <div class="form-group">
                                                                          <label>Subject Name<span class="required">*</span></label>
                                                                         
                                                                            <select class="span6 m-wrap" name="subject_id[]">
                                                                            <option value="">Select Subject</option>
                                                                            <?php
                                                                              $options = $this->db->query("SELECT s.SUBJECT_ID, s.SUBJECT_NAME, s.GROUP_NAME, c.CLASS_NAME FROM subject AS s INNER JOIN class AS c ON s.CLASS_ID = c.CLASS_ID WHERE s.STATUS = 7 AND s.GROUP_NAME<>''")->result();
                                                                            ?>
                                                                            <?php foreach($options as $option) : ?>
                                                                              <option value="<?php echo $option->SUBJECT_ID?>" <?php echo (isset($edit['SUBJECT_ID']) && $edit['SUBJECT_ID'] == $option->SUBJECT_ID) ? "selected" : ""; ?> ><?php echo $option->CLASS_NAME . ":- " . $option->SUBJECT_NAME; ?></option>
                                                                            <?php endforeach; ?>
                                                                            </select>
                                                                            <span class="fred"><?php echo form_error('subject_id[]'); ?></span>
                                                                          </div>
                                                                        <!-- </div> -->
                                                                    </div>
                                                                  </div>


                                                                <!-- </div> -->

                                                              </div>
                                                          </div>

                              
                                                          <div id="pro_area"></div>
                                                          
                                                          <!-- <br> -->
                                                          
                                                          <div class="controls" style="border:none;margin-bottom:40px;padding:0px;">

                                                            <button id="add_subject" class="btn btn-info btn-sm">Add</button>
                                                  
                                                            <button id="remove_subject" type="button" class="btn btn-warning btn-sm">Remove</button>
                                                          </div>

                                          <div class="control-group">
                                            <label class="control-label">Optional Subject Name<span class="required">*</span></label>
                                            <div class="controls">
                                              <select id="subject_list" class="span6 m-wrap" name="optional_sub_id">
                                                <option value="">Select...</option>
                                                <?php
                                                  $options = $this->db->query("SELECT s.SUBJECT_ID, s.SUBJECT_NAME, c.CLASS_NAME, c.CLASS_ID FROM subject AS s INNER JOIN class AS c ON s.CLASS_ID = c.CLASS_ID WHERE s.STATUS = 7 AND s.OPTIONAL=1")->result();
                                                ?>
                                                <?php foreach($options as $option) : ?>
                                                  <option value="<?php echo $option->SUBJECT_ID?>" <?php echo (isset($edit['OPTIONAL_SUB_ID']) && $edit['OPTIONAL_SUB_ID'] == $option->SUBJECT_ID) ? "selected" : ""; ?> ><?php echo $option->CLASS_NAME . ": " . $option->SUBJECT_NAME; ?></option>
                                                <?php endforeach; ?>
                                              </select>
                                              <span class="fred"><?php echo form_error('optional_sub_id'); ?></span>
                                            </div>
                                          </div>
                                          
                                          <div class="form-actions">
                                              <input type="submit" name="submit" class="btn btn-success" value="Submit Data"  />
                                              <a class="btn btn-danger" href="<?php echo $url_prefix; ?>manage_subject">Cancel</a>
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