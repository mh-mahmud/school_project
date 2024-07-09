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
                                          <b>Manage Hostel Student</b>  
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
                                <div class="muted pull-left">Manage Hostel Student</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix . 'admit_student_to_hostel' ?>"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix . 'manage_hostel_student' ?>"><button class="btn btn-primary">Refresh</button></a>
                                      </div>
                                      <!-- print button -->
                                      <!-- <div class="btn-group">
                                         <a target="_blank" href="<?php //echo $url_prefix . 'manage_payment/print' ?>"><button class="btn btn-warning">&nbsp;&nbsp;Print&nbsp;&nbsp;</button></a>
                                      </div>
                                      
                                      <div class="btn-group">
                                         <a target="_blank" href="<?php //echo $url_prefix . 'manage_payment/csv' ?>"><button class="btn btn-info">&nbsp;&nbsp;Export&nbsp;&nbsp;</button></a>
                                      </div>
                                      
                                     <div class="btn-group">
                                         <a href="<?php //echo $url_prefix . 'manage_payment/pdf' ?>"><button class="btn btn-danger">&nbsp;&nbsp;PDF&nbsp;&nbsp;</button></a>
                                      </div>  -->
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
                                                <th>ID</th>
                                                <th>Class Name</th>
                                                <th>Section Name</th>
                                                <th>Student Name</th>
                                                <th>Hostel Name</th>
                                                <th>Room No</th>
                                                <th>Seat No</th>
                                                <th>Year</th>
                                                <th>Created Date</th>
                                                <th>Created By</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($get_record as $v) : ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $v->ADMIT_STUDENT_TO_HOSTEL_ID; ?></td>
                                                <td><?php  $cat = $this->db->query("SELECT CLASS_NAME FROM class WHERE  CLASS_ID=".$v->CLASS_ID)->result();
                                                    echo($cat[0]->CLASS_NAME); ?></td>
                                                <td>
                                                  <?php
                                                    $cat = $this->db->query("SELECT SECTION_NAME FROM section WHERE  SECTION_ID=".$v->SECTION_ID)->result();
                                                    echo($cat[0]->SECTION_NAME);
                                                  ?>
                                                </td>
                                                <td>
                                                  <?php
                                                  $cat = $this->db->query("SELECT sd.STUDENT_DATA_ID, si.NAME FROM student_data AS sd INNER JOIN student_info AS si ON si.STUDENT_ID = sd.STUDENT_ID WHERE  sd.STUDENT_DATA_ID=".$v->STUDENT_DATA_ID)->result();
                                                     echo($cat[0]->NAME);
                                                  ?>
                                                </td>
                                                <td>
                                                  <?php
                                                    $cat = $this->db->query("SELECT HOUSE_NAME FROM house WHERE HOUSE_ID=".$v->HOUSE_ID)->result();
                                                    echo($cat[0]->HOUSE_NAME);
                                                  ?>
                                                </td>
                                                <td><?php echo $v->ROOM_NO; ?></td>
                                                <td><?php echo $v->SEAT_NO; ?></td>
                                                <td><?php echo $v->YEAR; ?></td>
                                                <td><?php echo $v->CREATED_DATE; ?></td>
                                                <td><?php echo $this->webspice->admin_user_name($v->CREATED_BY); ?></td>
                                                <td><?php echo $this->webspice->static_status($v->STATUS); ?></td>
                                                <td>
                                                  <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-default dropdown-toggle customized-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      Action
                                                      <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu customized-menu">
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_hostel_student',true) && $v->STATUS!=9 ): ?>
                                                        <a href="<?php echo $url_prefix; ?>manage_hostel_student/edit/<?php echo $this->webspice->encrypt_decrypt($v->ADMIT_STUDENT_TO_HOSTEL_ID,'encrypt'); ?>" class="btn btn-success">Edit</a>
                                                        <?php endif; ?>
                                                      </li>
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_hostel_student',true) && $v->STATUS==7 ): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_hostel_student/inactive/<?php echo $this->webspice->encrypt_decrypt($v->ADMIT_STUDENT_TO_HOSTEL_ID,'encrypt'); ?>" class="btn btn-warning">Inactive</a>
                                                        <?php endif; ?>
                                                      </li>
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_hostel_student',true) && $v->STATUS==-7 ): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_hostel_student/active/<?php echo $this->webspice->encrypt_decrypt($v->ADMIT_STUDENT_TO_HOSTEL_ID,'encrypt'); ?>" class="btn btn-warning">Active</a>
                                                        <?php endif; ?>
                                                      </li>
                                                      <li> 
                                                        <?php if( $this->webspice->permission_verify('manage_hostel_student',true)): ?>
                                                          <a href="<?php echo $url_prefix; ?>manage_hostel_student/delete/<?php echo $this->webspice->encrypt_decrypt($v->ADMIT_STUDENT_TO_HOSTEL_ID,'encrypt'); ?>" class="btn btn-danger">Delete</a>
                                                      <?php endif; ?>
                                                      </li>
                                                    </ul>
                                                  </div>
                                                </td>
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