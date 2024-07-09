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
                                          <b>Manage Marks</b>  
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
                                <div class="muted pull-left">Manage Marks</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <!-- <div class="btn-group">
                                         <a href="<?php //echo $url_prefix . 'create_teacher' ?>"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
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
                                                <th>Class Name</th>
                                                <th>Section Name</th>
                                                <th>Exam Name</th>
                                                <th>Subject Name</th>
                                                <th>Year</th>
                                                <th>Created Date</th>
                                                <th>Created By</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $mark_id = array();
                                            foreach($get_record as $v) :
                                              // $mark_id[] = $v->MARK_ID;
                                              // dd($mark_id, true);
                                            ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $v->CLASS_NAME; ?></td>
                                                <td><?php echo $v->SECTION_NAME; ?></td>
                                                <td><?php echo $v->EXAM_NAME; ?></td>
                                                <td><?php echo $v->SUBJECT_NAME; ?></td>
                                                <td><?php echo $v->YEAR; ?></td>
                                                <td><?php echo $v->CREATED_DATE; ?></td>
                                                <td><?php echo $this->webspice->admin_user_name($v->CREATED_BY); ?></td>
                                                <td><?php echo $this->webspice->static_status($v->STATUS); ?></td>
                                                <td>
                                                  <?php if( $this->webspice->permission_verify('manage_marks',true) && $v->STATUS!=9 ): ?>
                                                      <a href="<?php echo $url_prefix; ?>manage_marks/edit/<?php echo $v->CLASS_ID ?>/<?php echo $v->SECTION_ID ?>/<?php echo $v->EXAM_ID ?>/<?php echo $v->SUBJECT_ID ?>" class="btn btn-success">Edit</a>
                                                  <?php endif; ?>

                                                  <?php if( $this->webspice->permission_verify('manage_marks',true) && $v->STATUS==7 ): ?>
                                                      <a href="<?php echo $url_prefix; ?>manage_marks/view_details/<?php echo $this->webspice->encrypt_decrypt($v->SECTION_ID,'encrypt'); ?>/<?php echo $this->webspice->encrypt_decrypt($v->EXAM_ID,'encrypt'); ?>/<?php echo $this->webspice->encrypt_decrypt($v->SUBJECT_ID,'encrypt'); ?>/<?php echo $this->webspice->encrypt_decrypt($v->YEAR,'encrypt'); ?>" class="btn btn-warning">View Details</a>
                                                  <?php endif; ?>

                                                  <?php if( $this->webspice->permission_verify('manage_marks',true)): ?>
                                                      <a href="<?php echo $url_prefix; ?>manage_marks/delete/<?php echo $this->webspice->encrypt_decrypt($v->MARK_ID,'encrypt'); ?>" class="btn btn-danger">Delete</a>
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