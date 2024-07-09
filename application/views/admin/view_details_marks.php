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
                                          <b>View Marks</b>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                      </div>
<!-- table start -->
                    <div class="row-fluid">`
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">View Marks</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix . 'manage_marks' ?>"><button class="btn btn-danger">Go Back</button></a>
                                      </div>
                                      <!-- <div class="btn-group pull-right">
                                         <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <span class="caret"></span></button>
                                         <ul class="dropdown-menu">
                                            <li><a href="#">Print</a></li>
                                            <li><a href="#">Save as PDF</a></li>
                                            <li><a href="#">Export to Excel</a></li>
                                         </ul>
                                      </div> -->
                                   </div>
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                        <thead>
                                            <tr>
                                                <th>Class Name</th>
                                                <th>Section Name</th>
                                                <th>Exam Name</th>
                                                <th>Roll No</th>
                                                <th>Subject Name</th>
                                                <th>Student Name</th>
                                                <th>Subjective</th>
                                                <th>Objective</th>
                                                <th>Practical</th>
                                                <th>Total Mark</th>
                                                <th>Grade</th>
                                                <th>Year</th>
                                                <!-- <th>Created Date</th> -->
                                                <!-- <th>Created By</th> -->
                                                <!-- <th>Status</th> -->
                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($get_record as $v) : ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $v->CLASS_NAME; ?></td>
                                                <td><?php echo $v->SECTION_NAME; ?></td>
                                                <td><?php echo $v->EXAM_NAME; ?></td>
                                                <td><?php echo $v->ROLL_NO; ?></td>
                                                <td><?php echo $v->SUBJECT_NAME; ?></td>
                                                <td><?php echo $v->NAME; ?></td>
                                                <td><?php echo ($v->SUBJECTIVE_MARK != 0) ? $v->SUBJECTIVE_MARK : ""; ?></td>
                                                <td><?php echo ($v->OBJECTIVE_MARK != 0) ? $v->OBJECTIVE_MARK : ""; ?></td>
                                                <td><?php echo ($v->PRACTICAL_MARK != 0) ? $v->PRACTICAL_MARK : ""; ?></td>
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
                                                <td><?php echo $v->YEAR; ?></td>
                                                <!-- <td><?php //echo $v->YEAR; ?></td> -->
                                                <!-- <td><?php //echo $v->CREATED_DATE; ?></td> -->
                                                <!-- <td><?php //echo $v->CREATED_BY; ?></td> -->
                                                <!-- <td><?php //echo $this->webspice->static_status($v->STATUS); ?></td> -->
                                            </tr>
                                          <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
<!-- table end -->
                    
                    
                    
                </div>
        
            </div>
            
<?php include(APPPATH."views/admin/admin_footer.php"); ?>