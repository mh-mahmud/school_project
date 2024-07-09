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
                                          <b>Manage Subject</b>  
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
                                <div class="muted pull-left">Manage Subject</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix; ?>create_subject"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix . 'manage_subject' ?>"><button class="btn btn-primary">Refresh</button></a>
                                      </div>
                                      <!-- print button -->
                                      <div class="btn-group">
                                         <a target="_blank" href="<?php echo $url_prefix . 'manage_subject/print' ?>"><button class="btn btn-warning">&nbsp;&nbsp;Print&nbsp;&nbsp;</button></a>
                                      </div>
                                      <!-- export button -->
                                      <div class="btn-group">
                                         <a target="_blank" href="<?php echo $url_prefix . 'manage_subject/csv' ?>"><button class="btn btn-info">&nbsp;&nbsp;Export&nbsp;&nbsp;</button></a>
                                      </div>
                                      <!-- pdf button -->
                                       <div class="btn-group">
                                         <a href="<?php echo $url_prefix . 'manage_subject/pdf' ?>"><button class="btn btn-danger">&nbsp;&nbsp;PDF&nbsp;&nbsp;</button></a>
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
                                                <th>Class Name</th>
                                                <th>Subject Name</th>
                                                <th>Mandatory</th>
                                                <th>Optional</th>
                                                <th>Parent Name</th>
                                                <th>Total Mark</th>
                                                <th>Pass Mark</th>
                                                <th>Subjective Mark</th>
                                                <th>Subjective Pass Mark</th>
                                                <th>Objective Mark</th>
                                                <th>Objective Pass Mark</th>
                                                <th>Practical Mark</th>
                                                <th>Practical Pass Mark</th>
                                                <th>Created Date</th>
                                                <th>Created By</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($get_record as $v) : ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $v->SUBJECT_ID; ?></td>
                                                <td>
                                                  <?php
                                                    $cat = $this->db->query("SELECT CLASS_NAME FROM class WHERE CLASS_ID=".$v->CLASS_ID)->result();
                                                    echo($cat[0]->CLASS_NAME);
                                                  ?>
                                                </td>
                                                <td><?php echo $v->SUBJECT_NAME; ?></td>
                                                <td>
                                                  <?php
                                                    if($v->MANDATORY == 1) {
                                                      echo '<span class="label label-success">Yes</span>';
                                                    }
                                                    else {

                                                    }
                                                  ?>
                                                </td>
                                                <td>
                                                  <?php
                                                    if($v->OPTIONAL == 1) {
                                                      echo '<span class="label label-success">Yes</span>';
                                                    }
                                                    else {

                                                    }
                                                  ?>
                                                </td>
                                                <td><?php echo $v->PARENT_ID; ?></td>
                                                <td><?php echo $v->TOTAL_MARK; ?></td>
                                                <td><?php echo $v->PASS_MARK; ?></td>
                                                <td><?php echo $v->SUBJECTIVE_MARK; ?></td>
                                                <td><?php echo $v->SUBJECTIVE_PASS; ?></td>
                                                <td><?php echo $v->OBJECTIVE_MARK; ?></td>
                                                <td><?php echo $v->OBJECTIVE_PASS; ?></td>
                                                <td><?php echo $v->PRACTICAL_MARK; ?></td>
                                                <td><?php echo $v->PRACTICAL_PASS; ?></td>
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
                                                        <?php if( $this->webspice->permission_verify('manage_subject',true) && $v->STATUS!=9 ): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_subject/edit/<?php echo $this->webspice->encrypt_decrypt($v->SUBJECT_ID,'encrypt'); ?>" class="btn btn-success">Edit</a>
                                                        <?php endif; ?>
                                                      </li>
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_subject',true) && $v->STATUS==7 ): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_subject/inactive/<?php echo $this->webspice->encrypt_decrypt($v->SUBJECT_ID,'encrypt'); ?>" class="btn btn-warning">Inactive</a>
                                                        <?php endif; ?>
                                                      </li>
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_subject',true) && $v->STATUS==-7 ): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_subject/active/<?php echo $this->webspice->encrypt_decrypt($v->SUBJECT_ID,'encrypt'); ?>" class="btn btn-warning">Active</a>
                                                        <?php endif; ?>
                                                      </li>
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_subject',true)): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_subject/delete/<?php echo $this->webspice->encrypt_decrypt($v->SUBJECT_ID,'encrypt'); ?>" class="btn btn-danger">Delete</a>
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