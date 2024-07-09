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
                                          <b>Manage Class Routine</b>  
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
                                <div class="muted pull-left">Manage Class Routine</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">

                                    <?php
                                      $classes_data = $this->db->query("SELECT CLASS_NAME, CLASS_ID FROM class WHERE STATUS=7")->result();
                                      // dd($classes_data);
                                    ?>

                                      <div class="btn-group">
                                         <a href="<?php echo $url_prefix . 'create_class_routine' ?>"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>

                                      <?php //foreach($classes_data as $class_data) : ?>
                                        <!-- <div class="btn-group">
                                           <a href="<?php //echo $url_prefix . 'manage_student_admission/class/' . $this->webspice->encrypt_decrypt($class_data->CLASS_ID, 'encrypt'); ?>"><button class="btn btn-danger">Class <?php //echo $class_data->CLASS_NAME; ?></button></a>
                                        </div> -->
                                      <?php //endforeach; ?>



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
                                                <!-- <th>ID</th> -->
                                                <th>Class Name</th>
                                                <th>Section Name</th>
                                                <th>Subjects Name</th>
                                                <th>Teachers Name</th>
                                                <th>Year</th>
                                                <!-- <th>Created By</th> -->
                                                <!-- <th>Created Date</th> -->
                                                 <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($get_record as $v) :
                                            ?>
                                              <tr class="odd gradeX">
                                                  <td>
                                                    <?php
                                                      echo $this->db->query("SELECT CLASS_NAME FROM class WHERE CLASS_ID=" . $v->CLASS_ID)->row()->CLASS_NAME;
                                                    ?>
                                                  </td>
                                                  <td>
                                                    <?php
                                                      echo $this->db->query("SELECT SECTION_NAME FROM section WHERE SECTION_ID=". $v->SECTION_ID)->row()->SECTION_NAME;
                                                    ?>
                                                  </td>
                                                  <td>
                                                    <?php
                                                      $ROUTINE = new Student_controller();
                                                      $subjects = $this->db->query("SELECT SUBJECT_ID FROM class_routine WHERE SECTION_ID=" . $v->SECTION_ID)->result();

                                                      // foreach($subjects as $sub) {
                                                      //   echo $ROUTINE->subject_name($sub->SUBJECT_ID) . ", ";
                                                      // }
                                                      $u_sub = array();
                                                      foreach($subjects as $sub) {
                                                        $u_sub[] = $ROUTINE->subject_name($sub->SUBJECT_ID);
                                                      }
                                                      $u_sub = array_unique($u_sub);
                                                      $z=1;
                                                      foreach($u_sub as $sub_name) {

                                                        echo $sub_name . ($z<count($u_sub) ? "<b>,</b> " : "");
                                                        $z++;
                                                      }
                                                    ?>
                                                  </td>
                                                  <td>
                                                    <?php
                                                      $teachers = $this->db->query("SELECT TEACHER_ID FROM class_routine WHERE SECTION_ID=" . $v->SECTION_ID)->result();

                                                      $t_array = array();
                                                      foreach($teachers as $t_list) {
                                                        $t_array[] = $t_list->TEACHER_ID;
                                                      }
                                                      $t_array = array_unique($t_array);

                                                      $n=1;
                                                      foreach($t_array as $teac) {
                                                        echo $ROUTINE->teacher_name($teac) . ($n<count($t_array) ? "<b>,</b> " : "");
                                                        $n++;
                                                      }
                                                    ?>
                                                  </td>
                                                  <td><?php echo $v->YEAR; ?></td>
                                                  <td><?php echo $this->webspice->static_status($v->STATUS); ?></td>
                                                  <td class="td-large-button">
                                                    <?php if( $this->webspice->permission_verify('manage_class_routine',true) && $v->STATUS!=9 ): ?>
                                                        <a href="<?php echo $url_prefix; ?>manage_class_routine/details/<?php echo $this->webspice->encrypt_decrypt($v->SECTION_ID,'encrypt'); ?>" class="btn btn-success">View Details</a>
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