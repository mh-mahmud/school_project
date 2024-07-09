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
                                          <b>Manage Income Expense Data</b>  
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
                                <div class="muted pull-left">Manage Income Expense Data</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix . 'manage_ie_category' ?>"><button class="btn btn-danger">Back</button></a>
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
                                                <th>Category Name</th>
                                                <th>Type</th>
                                                <th>Payment For</th>
                                                <th>Class Name</th>
                                                <th>Amount</th>
                                                <!-- <th>Year</th> -->
                                                <!-- <th>Create date</th> -->
                                                <!-- <th>Created By</th> -->
                                                <!-- <th>Status</th> -->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($get_record as $v) : ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $this->webspice->category_val($v->CAT_LIST_ID)->CATEGORY_NAME; ?></td>
                                                <td><?php echo $this->webspice->category_val($v->CAT_LIST_ID)->CATEGORY_TYPE; ?></td>
                                                <td>
                                                  <?php
                                                    if($v->FEE_TYPE == 0) {
                                                      echo "Admission Fee";
                                                    }
                                                    else if($v->FEE_TYPE == 1) {
                                                      echo "Monthly Fee";
                                                    }
                                                    else {
                                                      echo "";
                                                    }
                                                  ?>
                                                </td>
                                                <td><?php
                                                    $cat = $this->db->query("SELECT CLASS_NAME FROM class WHERE  CLASS_ID=".$v->CLASS_ID)->result();
                                                    echo($cat[0]->CLASS_NAME);
                                                  ?></td>
                                                <td><?php echo $v->AMOUNT; ?></td>
                                                <!-- <td><?php //echo $v->YEAR; ?></td> -->
                                                <!-- <td><?php //echo $v->CREATED_DATE; ?></td> -->
                                                <!-- <td><?php //echo $this->webspice->admin_user_name($v->CREATED_BY); ?></td> -->
                                              
                                                <!-- <td><?php //echo $this->webspice->static_status($v->STATUS); ?></td> -->
                                                <td>
                                                  <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-default dropdown-toggle customized-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      Action
                                                      <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu customized-menu">
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_ie_category',true) && $v->STATUS!=9 ): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_ie_category/edit/<?php echo $this->webspice->encrypt_decrypt($v->IE_CAT_ID,'encrypt'); ?>" class="btn btn-success">Edit</a>
                                                        <?php endif; ?>
                                                      </li>
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_ie_category',true) && $v->STATUS==7 ): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_ie_category/inactive/<?php echo $this->webspice->encrypt_decrypt($v->IE_CAT_ID,'encrypt'); ?>" class="btn btn-warning">Inactive</a>
                                                        <?php endif; ?>
                                                      </li>
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_ie_category',true) && $v->STATUS==-7 ): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_ie_category/active/<?php echo $this->webspice->encrypt_decrypt($v->IE_CAT_ID,'encrypt'); ?>" class="btn btn-warning">Active</a>
                                                        <?php endif; ?>
                                                      </li>
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_ie_category',true)): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_ie_category/delete/<?php echo $this->webspice->encrypt_decrypt($v->IE_CAT_ID,'encrypt'); ?>" class="btn btn-danger">Delete</a>
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