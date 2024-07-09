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
                                          <b>Manage Student Admission</b>  
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
                                <div class="muted pull-left">Manage Student Admission: <b style="color:#000">Class <?php echo $class_name; ?></b></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">

                                    <?php
                                      $classes_data = $this->db->query("SELECT CLASS_NAME, CLASS_ID FROM class WHERE STATUS=7")->result();
                                      // dd($classes_data);
                                    ?>

                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix . 'admit_student' ?>"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>

                                      <?php foreach($classes_data as $class_data) : ?>
                                        <div class="btn-group">
                                           <a href="<?php echo $url_prefix . 'manage_student_admission/class/' . $this->webspice->encrypt_decrypt($class_data->CLASS_ID, 'encrypt'); ?>"><button class="btn btn-danger">Class <?php echo $class_data->CLASS_NAME; ?></button></a>
                                        </div>
                                      <?php endforeach; ?>



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
                                                <th>Name</th>
                                                <th>Age</th>
                                                <th>Public ID</th>
                                                <th>Phone</th>
                                                <th>Class</th>
                                                <th>Section</th>
                                                <th>Roll</th>
                                                <th>Year</th>
                                                <th>Image</th>
                                                <th>Created By</th>
                                                <th>Admission Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($get_record as $v) : ?>
                                              <tr class="odd gradeX">
                                                  <td><?php echo $v->STUDENT_DATA_ID; ?></td>
                                                  <td><?php echo $v->NAME; ?></td>
                                                  <td><?php echo $v->AGE; ?></td>
                                                  <td><?php echo $v->PUBLIC_ID; ?></td>
                                                  <td><?php echo $v->PHONE; ?></td>
                                                  <td><?php echo $v->CLASS_NAME; ?></td>
                                                  <td><?php echo $v->SECTION_NAME; ?></td>
                                                  <td><?php echo $v->ROLL_NO; ?></td>
                                                  <td><?php echo $v->YEAR; ?></td>
                                                  <td>
                                                    <?php if( file_exists($this->webspice->get_path('student_full').$v->STUDENT_ID.'.jpg') ): ?>
                                                        <img src="<?php echo $this->webspice->get_path('student').$v->STUDENT_ID.'.jpg'; ?>"  alt="" class="img-responsive" width="100px;"/>
                                                    <?php endif;  ?>
                                                  </td>
                                                  <td><?php echo $this->webspice->admin_user_name($v->CREATED_BY); ?></td>
                                                  <td><?php echo $v->CREATED_DATE; ?></td>
                                                  <td><?php echo $this->webspice->static_status($v->STATUS); ?></td>
                                                  <td>
                                                    <div class="btn-group" role="group">
                                                      <button type="button" class="btn btn-default dropdown-toggle customized-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Action
                                                        <span class="caret"></span>
                                                      </button>
                                                      <ul class="dropdown-menu customized-menu">
                                                        <li>
                                                          <?php if( $this->webspice->permission_verify('manage_student_admission',true) && $v->STATUS!=9 ): ?>
                                                              <a href="<?php echo $url_prefix; ?>manage_student_admission/edit/<?php echo $this->webspice->encrypt_decrypt($v->STUDENT_DATA_ID,'encrypt'); ?>" class="btn btn-success">Edit</a>
                                                          <?php endif; ?>
                                                        </li>
                                                        <li>
                                                          <?php if( $this->webspice->permission_verify('manage_student_admission',true) && $v->STATUS==7 ): ?>
                                                              <a href="<?php echo $url_prefix; ?>manage_student_admission/inactive/<?php echo $this->webspice->encrypt_decrypt($v->STUDENT_DATA_ID,'encrypt'); ?>" class="btn btn-warning">Inactive</a>
                                                          <?php endif; ?>
                                                        </li>

                                                        <li>
                                                          <?php if( $this->webspice->permission_verify('manage_student_admission',true) && $v->STATUS==-7 ): ?>
                                                              <a href="<?php echo $url_prefix; ?>manage_student_admission/active/<?php echo $this->webspice->encrypt_decrypt($v->STUDENT_DATA_ID,'encrypt'); ?>" class="btn btn-warning">Active</a>
                                                          <?php endif; ?>
                                                        </li>
                                                        <li>
                                                        <?php if( $this->webspice->permission_verify('manage_student_admission',true)): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_student_admission/delete/<?php echo $this->webspice->encrypt_decrypt($v->STUDENT_DATA_ID,'encrypt'); ?>" class="btn btn-danger">Delete</a>
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