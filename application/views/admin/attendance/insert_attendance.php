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
                                          <b>Insert Attendance</b>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                      </div>
<!-- table start -->
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Insert Attendance</div>

                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="data_info">
                                        <h5>Class Name: <?php echo $class_name; ?></h5>
                                        <h5>Section Name: <?php echo $section_name; ?></h5>
                                        <h5>Date: <?php echo date("Y-m-d"); ?></h5>
                                      </div>

                                      <?php
                                        $students = $this->db->query("SELECT si.NAME, sd.* FROM student_data AS sd INNER JOIN student_info AS si ON si.STUDENT_ID = sd.STUDENT_ID WHERE sd.CLASS_ID='".$class."' AND sd.SECTION_ID='".$section."'")->result();
                                        // dd($students);
                                      ?>
                                      <!-- <div class="btn-group pull-right">
                                         <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <span class="caret"></span></button>
                                         <ul class="dropdown-menu">
                                            <li><a href="#">Print</a></li>
                                            <li><a href="#">Save as PDF</a></li>
                                            <li><a href="#">Export to Excel</a></li>
                                         </ul>
                                      </div> -->
                                   </div>

                                    <!-- BEGIN FORM-->
                                    <form method="post" action=""  enctype="multipart/form-data" id="" class="">

                                      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                      <input type="hidden" name="att_id" value="<?php if( isset($edit['ATT_ID']) && $edit['ATT_ID'] ){echo $this->webspice->encrypt_decrypt($edit['ATT_ID'], 'encrypt');} ?>" />

                                      <!-- additional data -->
                                      <input type="hidden" name="class_id" value="<?php echo $class; ?>" />
                                      <input type="hidden" name="section_id" value="<?php echo $section; ?>" />
                                      
                                      <?php if(count($students)) { ?>

                                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">

                                            <tr>
                                                <th>Student Name</th>
                                                <th style="text-align:center">Roll No</th>
                                                <th>Attendance Status</th>
                                                <th>Comment</th>
                                            </tr>
                                            <?php foreach($students as $student) : ?>
                                            <tr>
                                              <td>
                                                <?php echo $student->NAME ?>
                                                <input type="hidden" name="student_id[]" data-required="1" class="span6 m-wrap" value="<?php echo $student->STUDENT_DATA_ID; ?>" />
                                              </td>
                                              <td style="text-align:center">
                                                <b><?php echo $student->ROLL_NO; ?></b>
                                              </td>
                                              <td>
                                                <!-- <div class="control-group"> -->
                                                    <!-- <input type="checkbox" name="att_status[]" value="1"> -->
                                                    <!-- <span class="fred"><?php //echo form_error('att_status'); ?></span> -->
                                                <!-- </div> -->
                                                <label for="att_status[]"></label>
                                                <label class="myCheckbox">
                                                    <input type="checkbox" name="att_status[<?php echo $student->STUDENT_DATA_ID; ?>]" value="1" /> <span class="checkbox-data">Present</span>
                                                    <span class="fred"><?php echo form_error('att_status'); ?></span>
                                                </label>
                                              </td>
                                              <td>
                                                <div class="control-group">
                                                    <!-- <label class="control-label">Staff Name<span class="required">*</span></label> -->
                                                    <div class="controls">
                                                        <textarea name="att_comment[]" data-required="1" class="span6 m-wrap"><?php echo set_value('att_comment',$edit['ATT_COMMENT']); ?></textarea>
                                                        <span class="fred"><?php echo form_error('att_comment'); ?></span>
                                                    </div>
                                                </div>
                                              </td>
                                            </tr>
                                            <?php endforeach; ?>
                                            <tr>
                                              <td></td>
                                              <td></td>
                                              <td>
                                                <!-- <div class="form-actions"> -->
                                                    <input type="submit" name="submit" class="btn btn-primary" value="Submit Data"  />
                                                     <a class="btn btn-danger" href="<?php echo $url_prefix; ?>manage_staff">Cancel</a>
                                                <!-- </div> -->
                                              </td>
                                            </tr>
                                        </table>

                                      <?php } else { ?>
                                        <div class="alert alert-danger" role="alert">Sorry, no student found on this search</div>
                                      <?php } ?>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
<!-- table end -->
                    
                    
                    
                </div>
        
            </div>
            
<?php include(APPPATH."views/admin/admin_footer.php"); ?>