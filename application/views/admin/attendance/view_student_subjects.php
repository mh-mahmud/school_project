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
                                          <b>View Student Subjects</b>  
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
                                <div class="muted pull-left">View Student Subjects</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix; ?>create_subject"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix . 'manage_student_subjects' ?>"><button class="btn btn-primary">Refresh</button></a>
                                      </div>
                                      <!-- print button -->
                                      <div class="btn-group">
                                         <a target="_blank" href="<?php echo $url_prefix . 'manage_student_subjects/print' ?>"><button class="btn btn-warning">&nbsp;&nbsp;Print&nbsp;&nbsp;</button></a>
                                      </div>
                                      <!-- export button -->
                                      <div class="btn-group">
                                         <a target="_blank" href="<?php echo $url_prefix . 'manage_student_subjects/csv' ?>"><button class="btn btn-info">&nbsp;&nbsp;Export&nbsp;&nbsp;</button></a>
                                      </div>
                                      <!-- pdf button -->
                                       <div class="btn-group">
                                         <a href="<?php echo $url_prefix . 'manage_student_subjects/pdf' ?>"><button class="btn btn-danger">&nbsp;&nbsp;PDF&nbsp;&nbsp;</button></a>
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
                                                <th>Student Name</th>
                                                <th>Group Name</th>
                                                <th>Group Subjects</th>
                                                <th>Optional Subject</th>
                                                <td>Created Date</td>
                                                <td>Created By</td>
                                                <!-- <td>Status</td> -->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($get_record as $v) : ?>
                                            <tr class="odd gradeX">
                                                <td>
                                                  <?php
                                                    echo $this->db->query("SELECT CLASS_NAME FROM class WHERE CLASS_ID=".$v->CLASS_ID)->row()->CLASS_NAME;
                                                  ?>
                                                </td>
                                                <td>
                                                  <?php
                                                    echo $this->db->query("SELECT SECTION_NAME FROM section WHERE SECTION_ID=".$v->SECTION_ID)->row()->SECTION_NAME;
                                                  ?>
                                                </td>
                                                <td>
                                                  <?php
                                                    echo $this->db->query("SELECT si.NAME FROM student_info AS si INNER JOIN student_data AS sd ON sd.STUDENT_ID=si.STUDENT_ID  WHERE sd.STUDENT_DATA_ID=".$v->STUDENT_ID)->row()->NAME;
                                                  ?>
                                                </td>
                                                <td><?php echo $v->GROUP_NAME; ?></td>
                                                <td>
                                                  <?php
                                                    $sub_id = explode("|", $v->GROUP_SUB_ID);
                                                    $sub_names = array();
                                                    foreach($sub_id as $val_id) {
                                                      $sub_names[] = $this->db->query("SELECT SUBJECT_NAME FROM subject WHERE SUBJECT_ID='".$val_id."'")->row()->SUBJECT_NAME;
                                                    }
                                                    $sub_names = implode(", <br />", $sub_names);
                                                    echo $sub_names;
                                                  ?>
                                                </td>
                                                <td>
                                                  <?php
                                                    echo $this->db->query("SELECT SUBJECT_NAME FROM subject WHERE SUBJECT_ID=".$v->OPTIONAL_SUB_ID)->row()->SUBJECT_NAME;
                                                  ?>
                                                </td>
                                                <td><?php echo $v->CREATED_DATE ?></td>
                                                <td><?php echo $this->webspice->admin_user_name($v->CREATED_BY); ?></td>
                                                <!-- <td><?php //echo $this->webspice->static_status($v->STATUS); ?></td> -->
                                                <td>
                                                  <?php if( $this->webspice->permission_verify('manage_student_subjects',true) && $v->STATUS!=9 ): ?>
                                                      <a href="<?php echo $url_prefix; ?>manage_student_subjects/edit/<?php echo $this->webspice->encrypt_decrypt($v->STUDENT_ID,'encrypt'); ?>" class="btn btn-success">Edit</a>
                                                  <?php endif; ?>
                                                  <?php if( $this->webspice->permission_verify('manage_subject',true)): ?>
                                                      <a href="<?php echo $url_prefix; ?>manage_subject/delete/<?php echo $this->webspice->encrypt_decrypt($v->STUDENT_ID,'encrypt'); ?>" class="btn btn-danger">Delete</a>
                                                  <?php endif; ?>
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