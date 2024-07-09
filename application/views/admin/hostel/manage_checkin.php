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
                                          <b>Manage Student Check-in or check-out</b>  
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
                                <div class="muted pull-left">Manage Student Check-in or check-out</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix . 'student_checkin' ?>"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix . 'manage_checkin' ?>"><button class="btn btn-primary">Refresh</button></a>
                                      </div>
                                      <!-- print button -->
                                      <!-- <div class="btn-group">
                                         <a target="_blank" href="<?php //echo $url_prefix . 'manage_payment/print' ?>"><button class="btn btn-warning">&nbsp;&nbsp;Print&nbsp;&nbsp;</button></a>
                                      </div>
                                      
                                      <div class="btn-group">
                                         <a target="_blank" href="<?php //echo $url_prefix . 'manage_payment/csv' ?>"><button class="btn btn-info">&nbsp;&nbsp;Export&nbsp;&nbsp;</button></a>
                                      </div>
                                      
                                     <div class="btn-group">
                                         <a href="<?php //echo $url_prefix . 'manage_payment/pdf' ?>"><button class="btn btn-danger">&nbsp;&nbsp;PDF&nbsp;&nbsp;</button></a>
                                      </div>  -->
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
                                                <th>Hostel Name</th>
                                                <th>Student Name</th>
                                                <th>Check-out Date</th>
                                                <th>Expire Date</th>
                                                <th>Check-In Date</th>
                                                <th>Gurdiun Type</th>
                                                <th>Gurdiun Name</th>
                                                <th>Mobile Number</th>
                                                <th>Created Date</th>
                                                <th>Created By</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($get_record as $v) : ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $v->CHECKIN_ID; ?></td>
                                                <td>
                                                  <?php
                                                    $cat = $this->db->query("SELECT HOUSE_NAME FROM house WHERE HOUSE_ID=".$v->HOUSE_ID)->result();
                                                    echo($cat[0]->HOUSE_NAME);
                                                  ?>
                                                </td>
                                                <td>
                                                	<?php
                                                    $cat = $this->db->query("SELECT si.NAME, sd.STUDENT_DATA_ID, hs.STUDENT_DATA_ID, ci.* FROM checkin AS ci INNER JOIN admit_student_to_hostel AS hs ON hs.STUDENT_DATA_ID = ci.STUDENT_DATA_ID INNER JOIN student_data AS sd ON sd.STUDENT_DATA_ID = hs.STUDENT_DATA_ID INNER JOIN student_info AS si ON si.STUDENT_ID=sd.STUDENT_ID WHERE  ci.STUDENT_DATA_ID=".$v->STUDENT_DATA_ID)->result();
                                                    echo($cat[0]->NAME);
                                                  	?>
                                                </td>
                                                <td><?php echo $v->CHECKOUT_DATE; ?></td>
                                                <td><?php echo $v->EXPIRE_DATE; ?></td>
                                                <td><?php echo $v->CHECKIN_DATE; ?></td>
                                                <td><?php echo $v->GURDIUN_TYPE; ?></td>
                                                <td><?php echo $v->GURDIUN_NAME; ?></td>
                                                <td><?php echo $v->MOBILE_NO; ?></td>
                                                <td><?php echo $v->CREATED_DATE; ?></td>
                                                <td><?php echo $this->webspice->admin_user_name($v->CREATED_BY); ?></td>
                                                <td>
                                               	<?php
                                               		$expire_date = strtotime($v->EXPIRE_DATE);
                                               		$current_date = time();
                                               		$return_status = null;

                                               		if( ($current_date > $expire_date) && $v->CHECKIN_STATUS == 0  ) {
                                               			echo '<span class="label label-danger" style="background-color:red">Expired</span>';
                                               		}
                                               		else if( ($current_date < $expire_date) && $v->CHECKIN_STATUS == 0 ) {
                                               			echo '<span class="label label-info">Check-out</span>';
                                               		}
                                               		else if($v->CHECKIN_STATUS == 1) {
                                               			echo '<span class="label label-success">Check-In</span>';
                                               		}
                                               	?>
                                               </td>
                                                <td>
                                                  <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-default dropdown-toggle customized-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      Action
                                                      <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu customized-menu">
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_checkin',true) && $v->STATUS!=9 ): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_checkin/edit/<?php echo $this->webspice->encrypt_decrypt($v->CHECKIN_ID,'encrypt'); ?>" class="btn btn-success">Edit</a>
                                                        <?php endif; ?>
                                                      </li>
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_checkin',true) && $v->CHECKIN_STATUS==0 ): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_checkin/checkin_status/<?php echo $this->webspice->encrypt_decrypt($v->CHECKIN_ID,'encrypt'); ?>" class="btn btn-info">Return</a>
                                                        <?php endif; ?>
                                                      </li>
                                                      <li>
                                                        <?php if( $this->webspice->permission_verify('manage_checkin',true)): ?>
                                                            <a href="<?php echo $url_prefix; ?>manage_checkin/delete/<?php echo $this->webspice->encrypt_decrypt($v->CHECKIN_ID,'encrypt'); ?>" class="btn btn-danger">Delete</a>
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