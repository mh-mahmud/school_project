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
                                          <b>Teachers</b>
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
                                <div class="muted pull-left">Teachers</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <!-- <div class="btn-group">
                                         <a href="<?php //echo $url_prefix . 'create_teacher' ?>"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                                      <div class="btn-group">
                                         <a href="<?php //echo $url_prefix . 'manage_teacher' ?>"><button class="btn btn-primary">Refresh</button></a>
                                      </div> -->
                                      <!-- print button -->
                                      <!-- <div class="btn-group">
                                         <a target="_blank" href="<?php //echo $url_prefix . 'manage_teacher/print' ?>"><button class="btn btn-warning">&nbsp;&nbsp;Print&nbsp;&nbsp;</button></a>
                                      </div> -->
                                      <!-- export button -->
                                      <!-- <div class="btn-group">
                                         <a target="_blank" href="<?php //echo $url_prefix . 'manage_teacher/csv' ?>"><button class="btn btn-info">&nbsp;&nbsp;Export&nbsp;&nbsp;</button></a>
                                      </div> -->
                                      <!-- pdf button -->
                                     <!-- <div class="btn-group">
                                         <a href="<?php //echo $url_prefix . 'manage_teacher/pdf' ?>"><button class="btn btn-danger">&nbsp;&nbsp;PDF&nbsp;&nbsp;</button></a>
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
                                                <th>Teacher Name</th>
                                                <th>Teacher Email</th>
                                                <th>Teacher Phone</th>
                                                <th>Teacher Designation</th>
                                                <th>Teacher Bloodgroup</th>
                                                <th>Teacher Gender</th>
                                                <th>Teacher Birthday</th>
                                                <th>Present address</th>
                                                <th>Teacher Image</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($get_record as $v) : ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $v->TEACHER_NAME; ?></td>
                                                <td><?php echo $v->EMAIL; ?></td>
                                                <td><?php echo $v->PHONE; ?></td>
                                                <td>
                                                  <?php
                                                    $cat = $this->db->query("SELECT DESIGNATION_NAME FROM designation WHERE  DESIGNATION_ID=".$v->DESIGNATION_ID)->result();
                                                    echo($cat[0]->DESIGNATION_NAME);
                                                  ?>
                                                </td>

                                                <td><?php echo $v->BLOOD_GROUP; ?></td>
                                                <td><?php echo $v->GENDER; ?></td>
                                                <td><?php echo $v->TEACHER_BIRTHDAY; ?></td>
                                                <td><?php echo $v->PRESENT_ADDRESS; ?></td>
                                                <td>
                                                  <?php if( file_exists($this->webspice->get_path('teacher_full').$v->TEACHER_ID.'.jpg') ): ?>
                                                      <img src="<?php echo $this->webspice->get_path('teacher').$v->TEACHER_ID.'.jpg'; ?>"  alt="" class="img-responsive" width="100px;"/>
                                                  <?php endif;  ?>
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