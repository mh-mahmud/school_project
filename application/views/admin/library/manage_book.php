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
                                          <b>Manage Book</b>  
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
                                <div class="muted pull-left">Manage Book</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix; ?>add_book"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix . 'manage_section' ?>"><button class="btn btn-primary">Refresh</button></a>
                                      </div>
                                      <!-- print button -->
                                      <div class="btn-group">
                                         <a target="_blank" href="<?php echo $url_prefix . 'manage_section/print' ?>"><button class="btn btn-warning">&nbsp;&nbsp;Print&nbsp;&nbsp;</button></a>
                                      </div>
                                      <!-- export button -->
                                      <div class="btn-group">
                                         <a target="_blank" href="<?php echo $url_prefix . 'manage_section/csv' ?>"><button class="btn btn-info">&nbsp;&nbsp;Export&nbsp;&nbsp;</button></a>
                                      </div>
                                      <!-- pdf button -->
                                       <div class="btn-group">
                                         <a href="<?php echo $url_prefix . 'manage_section/pdf' ?>"><button class="btn btn-danger">&nbsp;&nbsp;PDF&nbsp;&nbsp;</button></a>
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
                                                <th>Book Name</th>
                                                <th>Book Description</th>
                                                <th>Book Code</th>
                                                <th>ISBN NO</th>
                                                <th>Number of Copies</th>
                                                <th>Book Location</th>
                                                <th>Edition No</th>
                                                <th>Edition Year</th>
                                                <th>Image</th>
                                                <th>Created Date</th>
                                                <th>Created By</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($get_record as $v) : ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $v->BOOK_ID; ?></td>
                                                <td>
                                                  <?php
                                                    $cat = $this->db->query("SELECT CATEGORY_NAME FROM book_category WHERE BOOK_CATEGORY_ID=".$v->BOOK_CATEGORY_ID)->result();
                                                    echo($cat[0]->CATEGORY_NAME);
                                                  ?>
                                                </td>
                                                <td>
                                                	<?php
                                                    $cat = $this->db->query("SELECT WRITER_NAME FROM book_writer WHERE WRITER_ID=".$v->WRITER_ID)->result();
                                                    echo($cat[0]->WRITER_NAME);
                                                  ?>
                                                </td>
                                                <td><?php echo $v->BOOK_NAME; ?></td>
                                                <td style="min-width:200px"><?php echo $v->BOOK_DESCRIPTION; ?></td>
                                                <td><?php echo $v->BOOK_CODE; ?></td>
                                                <td><?php echo $v->ISBN_NO; ?></td>
                                                <td><?php echo $v->NUMBER_OF_COPIES; ?></td>
                                                <td><?php echo $v->BOOK_LOCATION; ?></td>
                                                <td><?php echo $v->EDITION_NO; ?></td>
                                                <td><?php echo $v->EDITION_YEAR; ?></td>
                                                <td>
                                                  <?php if( file_exists($this->webspice->get_path('book_full').$v->BOOK_ID.'.jpg') ): ?>
                                                      <img src="<?php echo $this->webspice->get_path('books').$v->BOOK_ID.'.jpg'; ?>"  alt="" class="img-responsive" width="100px;"/>
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
                                                        <?php if( $this->webspice->permission_verify('manage_book',true) && $v->STATUS!=9 ): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_book/edit/<?php echo $this->webspice->encrypt_decrypt($v->BOOK_ID,'encrypt'); ?>" class="btn btn-success">Edit</a>
                                                        <?php endif; ?>
                                                      </li>
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_book',true) && $v->STATUS==7 ): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_book/inactive/<?php echo $this->webspice->encrypt_decrypt($v->BOOK_ID,'encrypt'); ?>" class="btn btn-warning">Inactive</a>
                                                        <?php endif; ?>
                                                      </li>
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_book',true) && $v->STATUS==-7 ): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_book/active/<?php echo $this->webspice->encrypt_decrypt($v->BOOK_ID,'encrypt'); ?>" class="btn btn-warning">Active</a>
                                                        <?php endif; ?>
                                                      </li>
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_book',true)): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_book/delete/<?php echo $this->webspice->encrypt_decrypt($v->BOOK_ID,'encrypt'); ?>" class="btn btn-danger">Delete</a>
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