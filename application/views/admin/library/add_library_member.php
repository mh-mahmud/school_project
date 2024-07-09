<?php include(APPPATH."views/admin/admin_header.php"); ?>

        <div class="container" id="wrapper">
            <div id="page_create_payment" class="row-fluid page_identifier">
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
                                          <b>Add New Library Member</b>  
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
                                    <div class="muted pull-left">Add Library Member</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                      <?php
                                        //dd($edit);
                                      ?>
                                                <!-- BEGIN FORM-->
                                                <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                                    <input id="token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                    <input type="hidden" name="library_member_id" value="<?php if( isset($edit['LIBRARY_MEMBER_ID']) && $edit['LIBRARY_MEMBER_ID'] ){echo $this->webspice->encrypt_decrypt($edit['LIBRARY_MEMBER_ID'], 'encrypt');} ?>" />
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
                                                            <label class="control-label">Student Name<span class="required">*</span></label>
                                                            <div class="controls">
                                                              <select id="student_list" class="span6 m-wrap" name="student_data_id">
                                                                <option value="">Select...</option>
                                                                <?php
                                                                if(isset($edit['STUDENT_ID'])) {
                                                                  $options = $this->db->query("SELECT sd.STUDENT_DATA_ID, sd.ROLL_NO, si.NAME FROM student_data AS sd INNER JOIN student_info AS si ON si.STUDENT_ID = sd.STUDENT_ID WHERE s.STATUS = 7")->result();
                                                                 
                                                                ?>
                                                                <?php  foreach($options as $option) :?>
                                                                  <option value="<?php echo $option->STUDENT_DATA_ID?>" <?php echo (isset($edit['STUDENT_DATA_ID']) && $edit['STUDENT_DATA_ID'] == $option->STUDENT_DATA_ID) ? "selected" : ""; ?> ><?php echo $option->NAME; ?></option>
                                                                <?php endforeach; } ?>
                                                              </select>
                                                              <span class="fred"><?php echo form_error('student_data_id'); ?></span>
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
                                                                <a class="btn btn-danger" href="<?php echo $url_prefix; ?>manage_library_member">Cancel</a>
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