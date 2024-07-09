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
                                          <b>Manage Notification</b>  
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
                                <div class="muted pull-left">Manage Notification</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix; ?>send_notification"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix . 'manage_book_category' ?>"><button class="btn btn-primary">Refresh</button></a>
                                      </div>
                                      <!-- print button -->
                                      <div class="btn-group">
                                         <a target="_blank" href="<?php echo $url_prefix . 'manage_book_category/print' ?>"><button class="btn btn-warning">&nbsp;&nbsp;Print&nbsp;&nbsp;</button></a>
                                      </div>
                                      <!-- export button -->
                                      <div class="btn-group">
                                         <a target="_blank" href="<?php echo $url_prefix . 'manage_book_category/csv' ?>"><button class="btn btn-info">&nbsp;&nbsp;Export&nbsp;&nbsp;</button></a>
                                      </div>
                                      <!-- pdf button -->
                                       <div class="btn-group">
                                         <a href="<?php echo $url_prefix . 'manage_book_category/pdf' ?>"><button class="btn btn-danger">&nbsp;&nbsp;PDF&nbsp;&nbsp;</button></a>
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
                                                <th>Member Name</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>Created Date</th>
                                                <th>Created By</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($get_record as $v) : ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $v->NOTIFICATION_ID; ?></td>
                                                <td>
                                                  <?php
                                                    $cat = $this->db->query("SELECT si.NAME, sd.STUDENT_DATA_ID, lm.STUDENT_DATA_ID, lm.LIBRARY_MEMBER_ID, sn.* FROM send_notification AS sn INNER JOIN library_member AS lm ON lm.LIBRARY_MEMBER_ID = sn.LIBRARY_MEMBER_ID INNER JOIN student_data AS sd ON sd.STUDENT_DATA_ID = lm.STUDENT_DATA_ID INNER JOIN student_info AS si ON si.STUDENT_ID=sd.STUDENT_ID WHERE  sn.LIBRARY_MEMBER_ID=".$v->LIBRARY_MEMBER_ID)->result();
                                                    echo($cat[0]->NAME);
                                                  ?>
                                                </td>
                                                <td><?php echo $v->SUBJECT; ?></td>
                                                <td><?php echo $v->MESSAGE; ?></td>
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
                                                          <?php if( $this->webspice->permission_verify('manage_book_category',true) && $v->STATUS!=9 ): ?>
                                                              <a href="<?php echo $url_prefix; ?>manage_book_category/edit/<?php echo $this->webspice->encrypt_decrypt($v->NOTIFICATION_ID,'encrypt'); ?>" class="btn btn-success">Edit</a>
                                                          <?php endif; ?>
                                                        </li>
                                                        <li>
                                                          <?php if( $this->webspice->permission_verify('manage_book_category',true) && $v->STATUS==7 ): ?>
                                                              <a href="<?php echo $url_prefix; ?>manage_book_category/inactive/<?php echo $this->webspice->encrypt_decrypt($v->NOTIFICATION_ID,'encrypt'); ?>" class="btn btn-warning">Inactive</a>
                                                          <?php endif; ?>
                                                        </li>
                                                        <li>
                                                          <?php if( $this->webspice->permission_verify('manage_book_category',true) && $v->STATUS==-7 ): ?>
                                                              <a href="<?php echo $url_prefix; ?>manage_book_category/active/<?php echo $this->webspice->encrypt_decrypt($v->NOTIFICATION_ID,'encrypt'); ?>" class="btn btn-warning">Active</a>
                                                          <?php endif; ?>
                                                        </li>
                                                        <li>
                                                          <?php if( $this->webspice->permission_verify('manage_book_category',true)): ?>
                                                              <a href="<?php echo $url_prefix; ?>manage_book_category/delete/<?php echo $this->webspice->encrypt_decrypt($v->NOTIFICATION_ID,'encrypt'); ?>" class="btn btn-danger">Delete</a>
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