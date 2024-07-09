<?php include(APPPATH."views/admin/admin_header.php"); ?>

        <div class="container" id="wrapper">
            <div id="page_student_marksheet" class="row-fluid page_identifier">
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
                                          <b>Students Marksheet</b>  
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
                                    <div class="muted pull-left">Students Marksheet</div>
                                </div>
                                <div class="block-content collapse in">
                                  <div class="span12">
                                    <!-- BEGIN FORM-->
                                    <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                        <input id="token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <fieldset>
                                               <table cellpadding="0" cellspacing="0" border="0" class="table table-striped">
                                                  <tr>
                                                      <th>Class Name</th>
                                                      <th>Section Name</th>
                                                      <th>Student Name</th>
                                                      <th>Exam Name</th>
                                                      <th>Year</th>
                                                      <th>Action</th>
                                                  </tr>
                                                  <tr>
                                                      <td>
                                                        <select id="class_list" class="span12 m-wrap" name="class_id">
                                                          <option value="">Select...</option>
                                                          <?php
                                                            $options = $this->db->query("SELECT CLASS_ID, CLASS_NAME FROM class WHERE STATUS = 7")->result();
                                                          ?>
                                                          <?php foreach($options as $option) : ?>
                                                            <option value="<?php echo $option->CLASS_ID?>" <?php echo (isset($edit['CLASS_ID']) && $edit['CLASS_ID'] == $option->CLASS_ID) ? "selected" : ""; ?> ><?php echo $option->CLASS_NAME ?></option>
                                                          <?php endforeach; ?>
                                                        </select>
                                                      </td>
                                                      <td>
                                                          <select id="section_list" class="span12 m-wrap" name="section_id">
                                                            <option value="">Select...</option>
                                                            <?php
                                                              $options = $this->db->query("SELECT s.SECTION_ID, s.SECTION_NAME, c.CLASS_NAME FROM section AS s INNER JOIN class AS c ON s.CLASS_ID = c.CLASS_ID WHERE s.STATUS = 7")->result();

                                                            ?>
                                                            <?php foreach($options as $option) : ?>
                                                              <option value="<?php echo $option->SECTION_ID?>" <?php echo (isset($edit['SECTION_ID']) && $edit['SECTION_ID'] == $option->SECTION_ID) ? "selected" : ""; ?> ><?php echo $option->CLASS_NAME . ": " . $option->SECTION_NAME; ?></option>
                                                            <?php endforeach; ?>
                                                          </select>
                                                      </td>
                                                      <td>
                                                        <select id="student_list" class="span12 m-wrap" name="student_id">
                                                          <option value="">Select...</option>
                                                          <?php
                                                            $options = $this->db->query("SELECT STUDENT_ID, NAME FROM student_info WHERE STATUS = 7")->result();
                                                            
                                                          ?>
                                                          <?php  foreach($options as $option) :?>
                                                            <option value="<?php echo $option->STUDENT_ID?>" <?php echo (isset($edit['STUDENT_ID']) && $edit['STUDENT_ID'] == $option->STUDENT_ID) ? "selected" : ""; ?> ><?php echo $option->NAME ?></option>
                                                          <?php endforeach; ?>
                                                        </select>
                                                      </td>

                                                      <td>
                                                        <div class="control-group">
                                                          <!-- <div class="controls"> -->
                                                            <select class="span12 m-wrap" name="exam_id">
                                                              <option value="">Select...</option>
                                                              <?php
                                                                $options = $this->db->query("SELECT * FROM exam WHERE STATUS =7")->result();
                                                              ?>
                                                              <?php foreach($options as $option) : ?>
                                                                <option value="<?php echo $option->EXAM_ID;?>"><?php echo $option->EXAM_NAME; ?></option>
                                                              <?php endforeach; ?>
                                                            </select>
                                                            <span class="fred"><?php //echo form_error('exam_id'); ?></span>
                                                          <!-- </div> -->
                                                        </div>
                                                      </td>

                                                      <td>
                                                        <select name="year" class="form-control">
                                                          <?php
                                                              $year = date("Y");
                                                           for($i=2015;$i<=2020;$i++):?>
                                                              <option value="<?php echo $i;?>"
                                                                  <?php if(isset($year) && $year==$i)echo 'selected="selected"';?>>
                                                                      <?php echo $i;?>
                                                              </option>
                                                            <?php endfor;?>
                                                        </select>
                                                      </td>
                                                      <td>
                                                          <input type="submit" name="filter" class="btn btn-primary" value="Submit Data"  />
                                                      </td>
                                                  </tr>
                                                </table>

                                                    <div style="margin-top: 100px;"></div>

                                                  <?php if(isset($get_record)) : ?>

                                                    <table>
                                                        <tr>
                                                          <td><p>Student Name :</p></td>
                                                          <td><p><?php echo $student_name; ?></p></td>
                                                        </tr>
                                                        <tr>
                                                            <td><p>Class Name : </p></td>
                                                          <td><p><?php echo $class_name; ?></p></td>
                                                        </tr>
                                                        <tr>
                                                            <td><p>Section Name :</p></td>
                                                          <td><p><?php echo $section_name; ?></p></td>
                                                        </tr>
                                                    </table>

                                                    <div style="margin-top: 20px;"></div>

                                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                                      <tr>
                                                        <th>Exam Name</th>
                                                        <th>Subject Name</th>
                                                        <th>Mark Obtained</th>
                                                        <th>Grade</th>
                                                        <th>Status</th>
                                                      </tr>
                                                      <?php foreach($get_record as $v) : ?>
                                                        <tr>
                                                          <td><?php echo $v->EXAM_NAME; ?></td>
                                                          <td><?php echo $v->SUBJECT_NAME; ?></td>
                                                          <td><?php echo $v->MARK_OBTAINED; ?></td>
                                                          <td>
                                                            <?php
                                                              if($v->MARK_OBTAINED >= 80) {
                                                                echo "A+";
                                                              }
                                                              else if( ($v->MARK_OBTAINED >= 70) && ($v->MARK_OBTAINED <=79) ) {
                                                                echo "A";
                                                              }
                                                              else if( ($v->MARK_OBTAINED >= 60) && ($v->MARK_OBTAINED <=69) ) {
                                                                echo "A-";
                                                              }
                                                              else if( ($v->MARK_OBTAINED >= 50) && ($v->MARK_OBTAINED <=59) ) {
                                                                echo "B";
                                                              }
                                                              else if( ($v->MARK_OBTAINED >= 40) && ($v->MARK_OBTAINED <=49) ) {
                                                                echo "C";
                                                              }
                                                              else if( ($v->MARK_OBTAINED >= 33) && ($v->MARK_OBTAINED <=39) ) {
                                                                echo "D";
                                                              }
                                                              else if( ($v->MARK_OBTAINED <= 32) ) {
                                                                echo "F";
                                                              }
                                                            ?>
                                                          </td>
                                                          <td>
                                                            <?php if($v->MARK_OBTAINED >= 33) : ?>
                                                              <span class="label label-success">Pass</span>
                                                            <?php elseif($v->MARK_OBTAINED <= 32) : ?>
                                                              <span class="label label-danger-custom">Failed</span>
                                                            <?php endif; ?>
                                                          </td>
                                                        </tr>
                                                      <?php endforeach; ?>

                                                    </table>
                                                 <?php else: ?>
                                                  <!-- data nai vai -->
                                                <?php endif; ?>
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