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
                                          <b>Manage Writer</b>  
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
                                <div class="muted pull-left">Manage Writer</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix; ?>create_writer"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix . 'manage_writer' ?>"><button class="btn btn-primary">Refresh</button></a>
                                      </div>
                                      <!-- print button -->
                                      <div class="btn-group">
                                         <a target="_blank" href="<?php echo $url_prefix . 'manage_writer/print' ?>"><button class="btn btn-warning">&nbsp;&nbsp;Print&nbsp;&nbsp;</button></a>
                                      </div>
                                      <!-- export button -->
                                      <div class="btn-group">
                                         <a target="_blank" href="<?php echo $url_prefix . 'manage_writer/csv' ?>"><button class="btn btn-info">&nbsp;&nbsp;Export&nbsp;&nbsp;</button></a>
                                      </div>
                                      <!-- pdf button -->
                                       <div class="btn-group">
                                         <a href="<?php echo $url_prefix . 'manage_writer/pdf' ?>"><button class="btn btn-danger">&nbsp;&nbsp;PDF&nbsp;&nbsp;</button></a>
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
                                                <th>Book Category Name</th>
                                                <th>Writer Name</th>
                                                <th>Country</th>
                                                <th>Date of Birth</th>
                                                <th>Date of Death</th>
                                                <th>Full Address</th>
                                                <th>Achievement</th>
                                                <th>Educational Background</th>
                                                <th>Marital Status</th>
                                                <th>Spouse Name</th>
                                                <th>Father name</th>
                                                <th>Mother name</th>
                                                <th>Children Details</th>
                                                <th>Image</th>
                                                <th>Created Date</th>
                                                <th>Created By</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="">
                                            <?php foreach($get_record as $v) : ?>
                                            <tr class="odd gradeX writer">
                                                <td><?php echo $v->WRITER_ID; ?></td>
                                                <td>
                                                  <?php
                                                    $cat = $this->db->query("SELECT CATEGORY_NAME FROM book_category WHERE BOOK_CATEGORY_ID=".$v->BOOK_CATEGORY_ID)->result();
                                                    echo($cat[0]->CATEGORY_NAME);
                                                  ?>
                                                </td>
                                                <td><?php echo $v->WRITER_NAME; ?></td>
                                                <td><?php echo $v->COUNTRY_NAME; ?></td>
                                                <td><?php echo $v->DATE_OF_BIRTH; ?></td>
                                                <td><?php echo $v->DATE_OF_DEATH; ?></td>
                                                <td style="min-width:200px"><?php echo $v->FULL_ADDRESS; ?></td>
                                                <td style="min-width:200px"><?php echo $v->ACHIEVEMENT; ?></td>
                                                <td style="min-width:250px"><?php echo $v->EDUCATIONAL_DETAILS; ?></td>
                                                <td><?php echo $v->MARITAL_STATUS; ?></td>
                                                <td><?php echo $v->SPOUSE_NAME; ?></td>
                                                <td><?php echo $v->FATHER_NAME; ?></td>
                                                <td><?php echo $v->MOTHER_NAME; ?></td>
                                                <td style="min-width:200px"><?php echo $v->CHILDREN_DETAILS; ?></td>
                                                <td>
                                                  <?php if( file_exists($this->webspice->get_path('writer_full').$v->WRITER_ID.'.jpg') ): ?>
                                                      <img src="<?php echo $this->webspice->get_path('writer').$v->WRITER_ID.'.jpg'; ?>"  alt="" class="img-responsive" width="100px;"/>
                                                  <?php endif;  ?>
                                                </td>
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
                                                        <?php if( $this->webspice->permission_verify('manage_writer',true) && $v->STATUS!=9 ): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_writer/edit/<?php echo $this->webspice->encrypt_decrypt($v->WRITER_ID,'encrypt'); ?>" class="btn btn-success">Edit</a>
                                                        <?php endif; ?>
                                                      </li>
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_writer',true) && $v->STATUS==7 ): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_writer/inactive/<?php echo $this->webspice->encrypt_decrypt($v->WRITER_ID,'encrypt'); ?>" class="btn btn-warning">Inactive</a>
                                                        <?php endif; ?>
                                                      </li>
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_writer',true) && $v->STATUS==-7 ): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_writer/active/<?php echo $this->webspice->encrypt_decrypt($v->WRITER_ID,'encrypt'); ?>" class="btn btn-warning">Active</a>
                                                        <?php endif; ?>
                                                      </li>
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_writer',true)): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_writer/delete/<?php echo $this->webspice->encrypt_decrypt($v->WRITER_ID,'encrypt'); ?>" class="btn btn-danger">Delete</a>
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