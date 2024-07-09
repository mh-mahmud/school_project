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
                                          <b>Manage Member</b>  
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
                                <div class="muted pull-left">Manage Member</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix . 'create_board' ?>"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix . 'manage_board' ?>"><button class="btn btn-primary">Refresh</button></a>
                                      </div>
                                      <!-- print button -->
                                      <div class="btn-group">
                                         <a target="_blank" href="<?php echo $url_prefix . 'manage_board/print' ?>"><button class="btn btn-warning">&nbsp;&nbsp;Print&nbsp;&nbsp;</button></a>
                                      </div>
                                      <!-- export button -->
                                      <div class="btn-group">
                                         <a target="_blank" href="<?php echo $url_prefix . 'manage_board/csv' ?>"><button class="btn btn-info">&nbsp;&nbsp;Export&nbsp;&nbsp;</button></a>
                                      </div>
                                      <!-- pdf button -->
                                       <div class="btn-group">
                                         <a href="<?php echo $url_prefix . 'manage_board/pdf' ?>"><button class="btn btn-danger">&nbsp;&nbsp;PDF&nbsp;&nbsp;</button></a>
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
                                                <th>Member Email</th>
                                                <th>Member Phone</th>
                                                <th>Member Occopation</th>
                                                <th>Marriage Status</th>
                                                <th>Member Age</th>
                                                <th>Gender</th>
                                                <th>Member NID</th>
                                                <th>Education Background</th>
                                                <th>Member Session Start</th>
                                                <th>Member Session End</th>
                                                <th>Member Address</th>
                                                <th>Member Image</th>
                                                <th>Created Date</th>
                                                <th>Created By</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($get_record as $v) : ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $v->MEMBER_ID; ?></td>
                                                <td><?php echo $v->MEMBER_NAME; ?></td>
                                                <td><?php echo $v->EMAIL; ?></td>
                                                <td><?php echo $v->PHONE; ?></td>
                                                <td><?php echo $v->OCCUPATION; ?></td>
                                                <td><?php echo $v->MARRIAGE_STATUS; ?></td>
                                                <td><?php echo $v->AGE; ?></td>
                                                <td><?php echo $v->SEX; ?></td>
                                                <td><?php echo $v->VOTER_ID; ?></td>
                                                <td><?php echo $v->EDUCATION_BACK; ?></td>
                                                <td><?php echo $v->SESSION_START; ?></td>
                                                <td><?php echo $v->SESSION_END; ?></td>
                                                <td><?php echo $v->ADDRESS; ?></td>

                                                <td>
                                                  <?php if( file_exists($this->webspice->get_path('member_full').$v->MEMBER_ID.'.jpg') ): ?>
                                                      <img src="<?php echo $this->webspice->get_path('member').$v->MEMBER_ID.'.jpg'; ?>"  alt="" class="img-responsive" width="100px;"/>
                                                  <?php endif;  ?>
                                                </td>
                                                <td><?php echo $v->CREATED_DATE; ?></td>
                                                <td><?php echo $this->webspice->admin_user_name($v->CREATED_BY); ?></td>
                                                <td><?php echo $this->webspice->static_status($v->STATUS); ?></td>
                                                <td>
                                                  <div class="btn-group " role="group">
                                                    <button type="button" class="btn btn-default dropdown-toggle customized-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      Action
                                                      <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu customized-menu">
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_board',true) && $v->STATUS!=9 ): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_board/edit/<?php echo $this->webspice->encrypt_decrypt($v->MEMBER_ID,'encrypt'); ?>" class="btn btn-success">Edit</a>
                                                        <?php endif; ?>
                                                      </li>
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_board',true) && $v->STATUS==7 ): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_board/inactive/<?php echo $this->webspice->encrypt_decrypt($v->MEMBER_ID,'encrypt'); ?>" class="btn btn-warning">Inactive</a>
                                                        <?php endif; ?>
                                                      </li>
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_board',true) && $v->STATUS==-7 ): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_board/active/<?php echo $this->webspice->encrypt_decrypt($v->MEMBER_ID,'encrypt'); ?>" class="btn btn-warning">Active</a>
                                                        <?php endif; ?>
                                                      </li>
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_board',true)): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_board/delete/<?php echo $this->webspice->encrypt_decrypt($v->MEMBER_ID,'encrypt'); ?>" class="btn btn-danger">Delete</a>
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