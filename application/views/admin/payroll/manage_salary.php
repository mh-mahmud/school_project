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
                                          <b>Manage Monthly Salary</b>  
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
                                <div class="muted pull-left">Manage Monthly Salary</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix; ?>monthly_salary"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix . 'manage_salary' ?>"><button class="btn btn-primary">Refresh</button></a>
                                      </div>
                                      <!-- print button -->
                                      <!-- <div class="btn-group">
                                         <a target="_blank" href="<?php //echo $url_prefix . 'manage_section/print' ?>"><button class="btn btn-warning">&nbsp;&nbsp;Print&nbsp;&nbsp;</button></a>
                                      </div>
                                      
                                      <div class="btn-group">
                                         <a target="_blank" href="<?php //echo $url_prefix . 'manage_section/csv' ?>"><button class="btn btn-info">&nbsp;&nbsp;Export&nbsp;&nbsp;</button></a>
                                      </div>
                                      
                                       <div class="btn-group">
                                         <a href="<?php //echo $url_prefix . 'manage_section/pdf' ?>"><button class="btn btn-danger">&nbsp;&nbsp;PDF&nbsp;&nbsp;</button></a>
                                      </div> --> 
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
                                                <th>Teacher Name</th>
                                                <th>Salary</th>
                                                <th>Month</th>
                                                <th>Payment Type</th>
                                                <th>Pay Date</th>
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
                                                <td><?php echo $v->MONTHLY_SALARY_ID; ?></td>
                                                <td>
                                                	<?php
                                                    $cat = $this->db->query("SELECT TEACHER_NAME FROM teacher WHERE TEACHER_ID=".$v->TEACHER_ID)->result();
                                                    echo($cat[0]->TEACHER_NAME);
                                                  ?>
                                                </td>
                                                <td><?php echo $v->SALARY; ?></td>
                                                <td><?php echo $v->MONTH; ?></td>
                                                <td><?php echo $v->PAYMENT_TYPE; ?></td>
                                                <td><?php echo $v->PAY_DATE; ?></td>
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
                                                        <?php if( $this->webspice->permission_verify('manage_salary',true) && $v->STATUS!=9 ): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_salary/edit/<?php echo $this->webspice->encrypt_decrypt($v->MONTHLY_SALARY_ID,'encrypt'); ?>" class="btn btn-success">Edit</a>
                                                        <?php endif; ?>
                                                      </li>
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_salary',true) && $v->STATUS==7 ): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_salary/inactive/<?php echo $this->webspice->encrypt_decrypt($v->MONTHLY_SALARY_ID,'encrypt'); ?>" class="btn btn-warning">Inactive</a>
                                                        <?php endif; ?>
                                                      </li>
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_salary',true) && $v->STATUS==-7 ): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_salary/active/<?php echo $this->webspice->encrypt_decrypt($v->MONTHLY_SALARY_ID,'encrypt'); ?>" class="btn btn-warning">Active</a>
                                                        <?php endif; ?>
                                                      </li>
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_salary',true)): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_salary/delete/<?php echo $this->webspice->encrypt_decrypt($v->MONTHLY_SALARY_ID,'encrypt'); ?>" class="btn btn-danger">Delete</a>
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