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
                                          <b>Manage assigned subjects</b>  
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
                                <div class="muted pull-left">Manage assigned subjects</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix; ?>assign_subject"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix . 'manage_assign_subject' ?>"><button class="btn btn-primary">Refresh</button></a>
                                      </div>
                                      <!-- print button -->
                                      <div class="btn-group">
                                         <a target="_blank" href="<?php echo $url_prefix . 'manage_assign_subject/print' ?>"><button class="btn btn-warning">&nbsp;&nbsp;Print&nbsp;&nbsp;</button></a>
                                      </div>
                                      <!-- export button -->
                                      <div class="btn-group">
                                         <a target="_blank" href="<?php echo $url_prefix . 'manage_assign_subject/csv' ?>"><button class="btn btn-info">&nbsp;&nbsp;Export&nbsp;&nbsp;</button></a>
                                      </div>
                                      <!-- pdf button -->
                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix . 'manage_assign_subject/pdf' ?>"><button class="btn btn-danger">&nbsp;&nbsp;PDF&nbsp;&nbsp;</button></a>
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
                                                <th>ID</th>
                                                <th>Teacher Name</th>
                                                <th>Class Name</th>
                                                <th>Section Name</th>
                                                <th>Subject Name</th>
                                                <th>Year</th>
                                                <th>Created By</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($get_record as $v) : ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $v->ASSIGN_SUBJECT_ID; ?></td>
                                                <td>
                                                  <?php
                                                    $cat = $this->db->query("SELECT TEACHER_NAME FROM teacher WHERE TEACHER_ID=".$v->TEACHER_ID)->result();
                                                    echo($cat[0]->TEACHER_NAME);
                                                  ?>
                                                </td>
                                                <td>
                                                <?php
                                                    $cat = $this->db->query("SELECT CLASS_NAME FROM class WHERE CLASS_ID=".$v->CLASS_ID)->result();
                                                    echo($cat[0]->CLASS_NAME);
                                                  ?>
                                                </td>
                                                <td>
                                                <?php
                                                    $cat = $this->db->query("SELECT SECTION_NAME FROM section WHERE SECTION_ID=".$v->SECTION_ID)->result();
                                                    echo($cat[0]->SECTION_NAME);
                                                  ?>
                                                </td>
                                                <td>
                                                <?php
                                                    $cat = $this->db->query("SELECT SUBJECT_NAME FROM subject WHERE SUBJECT_ID=".$v->SUBJECT_ID)->result();
                                                    echo($cat[0]->SUBJECT_NAME);
                                                  ?>
                                                </td>
                                                <td><?php echo $v->YEAR; ?></td>
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
                                                        <?php if( $this->webspice->permission_verify('manage_assign_subject',true) && $v->STATUS!=9 ): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_assign_subject/edit/<?php echo $this->webspice->encrypt_decrypt($v->ASSIGN_SUBJECT_ID,'encrypt'); ?>" class="btn btn-success">Edit</a>
                                                        <?php endif; ?>
                                                      </li>
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_assign_subject',true) && $v->STATUS==7 ): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_assign_subject/inactive/<?php echo $this->webspice->encrypt_decrypt($v->ASSIGN_SUBJECT_ID,'encrypt'); ?>" class="btn btn-warning">Inactive</a>
                                                        <?php endif; ?>
                                                      </li>
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_assign_subject',true) && $v->STATUS==-7 ): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_assign_subject/active/<?php echo $this->webspice->encrypt_decrypt($v->ASSIGN_SUBJECT_ID,'encrypt'); ?>" class="btn btn-warning">Active</a>
                                                        <?php endif; ?>
                                                      </li>
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_assign_subject',true)): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_assign_subject/delete/<?php echo $this->webspice->encrypt_decrypt($v->ASSIGN_SUBJECT_ID,'encrypt'); ?>" class="btn btn-danger">Delete</a>
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