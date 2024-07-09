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
                                          <b>View Attendance</b>
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
                                <div class="muted pull-left">View Attendance</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix . 'manage_attendance' ?>"><button class="btn btn-danger">Go Back</button></a>
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
                                                <th>Date</th>
                                                <th>Class Name</th>
                                                <th>Section Name</th>
                                                <th>Student Name</th>
                                                <th>Roll No</th>
                                                <th>Attendance Statue</th>
                                                <th>Attendance Comment</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($get_record as $v) : ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $v->CREATED_DATE; ?></td>
                                                <td><?php echo $v->CLASS_NAME; ?></td>
                                                <td><?php echo $v->SECTION_NAME; ?></td>
                                                <td><?php echo $v->NAME; ?></td>
                                                <td>
                                                  <?php
                                                    $roll = $this->db->query("SELECT ROLL_NO FROM student_data WHERE STUDENT_DATA_ID='".$v->STUDENT_ID."'")->row()->ROLL_NO;
                                                    echo $roll;
                                                  ?>
                                                </td>
                                                <td>
                                                  <?php
                                                    if($v->ATT_STATUS == 0) {
                                                      echo '<span class="label label-danger-custom">Absent</span>';
                                                    }
                                                    else if($v->ATT_STATUS == 1) {
                                                      echo '<span class="label label-success">Present</span>';
                                                    }
                                                  ?>
                                                </td>
                                                <td><?php echo $v->ATT_COMMENT; ?></td>
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