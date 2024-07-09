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
                                          <b>Manage Employee Leave</b>  
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
                              <div class="muted pull-left">Manage Employee Leave</div>
                          </div>
                          <div class="block-content collapse in">
                            <div class="span12">
                              <div class="table-toolbar">
                                <div class="btn-group">
                                   <a href="<?php echo $url_prefix . 'add_leave' ?>"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
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
                                    
                                    <th>Teacher Name</th>
                                    <th>Leave Type</th>
                                    <th>Leave Duration</th>
                                    <th>Leave Reason</th>
                                    <th>Date From</th>
                                    <th>Date To</th>
                                    <th>Created Date</th>
                                    <th>Created By</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach($get_record as $v) : ?>
                                  <tr class="odd gradeX">
                                      
                                      <td>
                                        <?php
                                          echo $this->db->query("SELECT TEACHER_NAME FROM teacher WHERE TEACHER_ID=".$v->TEACHER_ID)->row()->TEACHER_NAME;
                                        ?>
                                      </td>
                                      <td>
                                        <?php
                                          echo $this->db->query("SELECT LEAVE_NAME FROM leave_settings WHERE LEAVE_SETTINGS_ID=".$v->LEAVE_SETTINGS_ID)->row()->LEAVE_NAME;
                                        ?>
                                      </td>
                                      <td><?php echo $v->LEAVE_DURATION; ?> Days</td>
                                      <td><?php echo $v->REASON_FOR_LEAVE; ?></td>
                                      <td><?php echo $v->DATE_FROM; ?></td>
                                      <td><?php echo $v->DATE_TO; ?></td>
                                      <td><?php echo $v->CREATED_DATE; ?></td>
                                      <td><?php echo $this->webspice->admin_name($v->CREATED_BY); ?></td>
                                      <td><?php echo $this->webspice->static_status($v->STATUS); ?></td>
                                      <td>
                                        <div class="btn-group" role="group">
                                          <button type="button" class="btn btn-default dropdown-toggle customized-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                            <span class="caret"></span>
                                          </button>
                                          <ul class="dropdown-menu customized-menu">
                                            <li>
                                              <?php if( $this->webspice->permission_verify('manage_employee_leave',true) && $v->STATUS!=9 ): ?>
                                                  <a href="<?php echo $url_prefix; ?>manage_employee_leave/edit/<?php echo $this->webspice->encrypt_decrypt($v->LEAVE_SETTINGS_ID,'encrypt'); ?>" class="btn btn-success">Edit</a>
                                              <?php endif; ?>
                                            </li>
                                            <li>
                                              <?php if( $this->webspice->permission_verify('manage_employee_leave',true) && $v->STATUS==7 ): ?>
                                                  <a href="<?php echo $url_prefix; ?>manage_employee_leave/inactive/<?php echo $this->webspice->encrypt_decrypt($v->LEAVE_SETTINGS_ID,'encrypt'); ?>" class="btn btn-warning">Inactive</a>
                                              <?php endif; ?>
                                            </li>
                                            <li>
                                              <?php if( $this->webspice->permission_verify('manage_employee_leave',true) && $v->STATUS==-7 ): ?>
                                                  <a href="<?php echo $url_prefix; ?>manage_employee_leave/active/<?php echo $this->webspice->encrypt_decrypt($v->LEAVE_SETTINGS_ID,'encrypt'); ?>" class="btn btn-warning">Active</a>
                                              <?php endif; ?>
                                            </li>
                                            <li>
                                              <?php if( $this->webspice->permission_verify('manage_employee_leave',true)): ?>
                                                  <a href="<?php echo $url_prefix; ?>manage_employee_leave/delete/<?php echo $this->webspice->encrypt_decrypt($v->LEAVE_SETTINGS_ID,'encrypt'); ?>" class="btn btn-danger">Delete</a>
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