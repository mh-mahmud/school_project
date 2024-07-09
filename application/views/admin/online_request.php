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
                                          <b>Online Admission Request</b>
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
                                <div class="muted pull-left">Online Admission Request</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix . 'add_student_info' ?>"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                                      <!-- refresh button -->
                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix . 'manage_student_info' ?>"><button class="btn btn-primary">Refresh</button></a>
                                      </div>
                                      <!-- print button -->
                                      <div class="btn-group">
                                         <a target="_blank" href="<?php echo $url_prefix . 'manage_student_info/print' ?>"><button class="btn btn-warning">&nbsp;&nbsp;Print&nbsp;&nbsp;</button></a>
                                      </div>
                                      <!-- export button -->
                                      <div class="btn-group">
                                         <a target="_blank" href="<?php echo $url_prefix . 'manage_student_info/csv' ?>"><button class="btn btn-info">&nbsp;&nbsp;Export&nbsp;&nbsp;</button></a>
                                      </div>
                                      <!-- pdf button -->
                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix . 'manage_student_info/pdf' ?>"><button class="btn btn-danger">&nbsp;&nbsp;PDF&nbsp;&nbsp;</button></a>
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
                                                <th>Student Name</th>
                                                <th>Birthday</th>
                                                <th>Gender</th>
                                                <th>Religion</th>
                                                <th>Blood Group</th>
                                                <th>Age</th>
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Father Name</th>
                                                <th>Mother Name</th>
                                                <th>Public ID</th>
                                                <th>Image</th>
                                                <th>Applied Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($get_record as $v) : ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $this->webspice->class_name($v->CLASS_ID); ?></td>
                                                <td><?php echo $v->NAME; ?></td>
                                                <td><?php echo $v->BIRTHDAY; ?></td>
                                                <td><?php echo $v->GENDER; ?></td>
                                                <td><?php echo $v->RELIGION; ?></td>
                                                <td><?php echo $v->BLOOD_GROUP; ?></td>
                                                <td><?php echo $v->AGE; ?></td>
                                                <td><?php echo $v->ADDRESS; ?></td>
                                                <td><?php echo $v->PHONE; ?></td>
                                                <td><?php echo $v->EMAIL; ?></td>
                                                <td><?php echo $v->FATHER_NAME; ?></td>
                                                <td><?php echo $v->MOTHER_NAME; ?></td>
                                                <td><?php echo $v->PUBLIC_ID; ?></td>
                                                <td>
                                                  <?php if( file_exists($this->webspice->get_path('student_full').$v->STUDENT_ID.'.jpg') ): ?>
                                                      <img src="<?php echo $this->webspice->get_path('online_application').$v->STUDENT_ID.'.jpg'; ?>"  alt="" class="img-responsive" width="100px;"/>
                                                  <?php endif;  ?>
                                                </td>
                                                <td><?php echo $v->CREATED_DATE; ?></td>
                                                <td>
                                                  <?php
                                                    if($v->STATUS == 1) {
                                                      echo '<span class="label label-info">Waiting</span>';
                                                    }
                                                    else if($v->STATUS == 2) {
                                                      echo '<span class="label label-success">Approved</span>';
                                                    }
                                                  ?>
                                                </td>
                                                <td>
                                                  <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-default dropdown-toggle customized-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      Action
                                                      <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu customized-menu">
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_student_info',true) && $v->STATUS!=9 ): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_student_info/edit/<?php echo $this->webspice->encrypt_decrypt($v->STUDENT_ID,'encrypt'); ?>" class="btn btn-success">Edit</a>
                                                        <?php endif; ?>
                                                      </li>
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('online_request',true) && $v->STATUS==1 ): ?>
                                                            <a href="<?php echo $url_prefix; ?>online_request/approved/<?php echo $this->webspice->encrypt_decrypt($v->STUDENT_ID,'encrypt'); ?>" class="btn btn-warning">Approved</a>
                                                        <?php endif; ?>
                                                      </li>
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('online_request',true)): ?>
                                                            <a href="<?php echo $url_prefix; ?>online_request/delete/<?php echo $this->webspice->encrypt_decrypt($v->STUDENT_ID,'encrypt'); ?>" class="btn btn-danger">Delete</a>
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