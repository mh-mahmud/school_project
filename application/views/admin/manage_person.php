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
                                          <b>Manage Person</b>  
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
                                <div class="muted pull-left">Manage Person</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix . 'add_person' ?>"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
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
                                                <th>Person Type</th>
                                                <th>Person Name</th>
                                                <th>Person Details</th>
                                                <th>Person Image</th>
                                                <th>Created Date</th>
                                                <th>Created By</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($get_record as $v) : ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $v->PERSON_ID; ?></td>
                                                <td><?php echo $v->PERSON_TYPE; ?></td>
                                                <td><?php echo $v->NAME; ?></td>
                                                <td><?php echo $v->DETAILS; ?></td>
                                                <td>
                                                  <?php if( file_exists($this->webspice->get_path('person_full').$v->PERSON_ID.'.jpg') ): ?>
                                                      <img src="<?php echo $this->webspice->get_path('person').$v->PERSON_ID.'.jpg'; ?>"  alt="" class="img-responsive" width="100px;"/>
                                                  <?php endif;  ?>
                                                </td>
                                                <td><?php echo $v->CREATED_DATE; ?></td>
                                                <td><?php echo $v->CREATED_BY; ?></td>
                                                <td><?php echo $this->webspice->static_status($v->STATUS); ?></td>
                                                <td>
                                                  <?php if( $this->webspice->permission_verify('manage_person',true) && $v->STATUS!=9 ): ?>
                                                      <a href="<?php echo $url_prefix; ?>manage_person/edit/<?php echo $this->webspice->encrypt_decrypt($v->PERSON_ID,'encrypt'); ?>" class="btn btn-success">Edit</a>
                                                  <?php endif; ?>

                                                  <?php if( $this->webspice->permission_verify('manage_person',true) && $v->STATUS==7 ): ?>
                                                      <a href="<?php echo $url_prefix; ?>manage_person/inactive/<?php echo $this->webspice->encrypt_decrypt($v->PERSON_ID,'encrypt'); ?>" class="btn btn-warning">Inactive</a>
                                                  <?php endif; ?>

                                                  <?php if( $this->webspice->permission_verify('manage_person',true) && $v->STATUS==-7 ): ?>
                                                      <a href="<?php echo $url_prefix; ?>manage_person/active/<?php echo $this->webspice->encrypt_decrypt($v->PERSON_ID,'encrypt'); ?>" class="btn btn-warning">Active</a>
                                                  <?php endif; ?>

                                                  <?php if( $this->webspice->permission_verify('manage_person',true)): ?>
                                                      <a href="<?php echo $url_prefix; ?>manage_person/delete/<?php echo $this->webspice->encrypt_decrypt($v->PERSON_ID,'encrypt'); ?>" class="btn btn-danger">Delete</a>
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