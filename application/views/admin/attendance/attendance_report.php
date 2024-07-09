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
                                          <b>Attendance Report</b>  
                                      </li>
                                  </ul>
                              </div>
                          </div>
                      </div>


                         <!-- validation -->
                        <div class="row-fluid">
                             <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Attendance Report</div>
                                </div>
                                <div class="block-content collapse in">
                                  <div class="span12">
                                    <!-- BEGIN FORM-->
                                    <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <fieldset>
                                               <table cellpadding="0" cellspacing="0" border="0" class="table table-striped">
                                                  <tr>
                                                      <th>Class Name</th>
                                                      <th>Section Name</th>
                                                      <th>Status</th>
                                                      <th>Date From</th>
                                                      <th>Date to</th>
                                                      <th>Action</th>
                                                  </tr>
                                                  <tr>
                                                      <td>
                                                        <select class="span12 m-wrap" name="class_id">
                                                          <option value="">Select...</option>
                                                          <?php
                                                            $options = $this->db->query("SELECT CLASS_ID, CLASS_NAME FROM class WHERE STATUS = 7")->result();
                                                          ?>
                                                          <?php foreach($options as $option) : ?>
                                                            <option value="<?php echo $option->CLASS_ID?>" <?php echo (isset($edit['CLASS_ID']) && $edit['CLASS_ID'] == $option->CLASS_ID) ? "selected" : ""; ?> ><?php echo $option->CLASS_NAME ?></option>
                                                          <?php endforeach; ?>
                                                        </select>
                                                      </td>
                                                      <td>
                                                          <select class="span12 m-wrap" name="section_id">
                                                            <option value="">Select...</option>
                                                            <?php
                                                              $options = $this->db->query("SELECT s.SECTION_ID, s.SECTION_NAME, c.CLASS_NAME FROM section AS s INNER JOIN class AS c ON s.CLASS_ID = c.CLASS_ID WHERE s.STATUS = 7")->result();

                                                            ?>
                                                            <?php foreach($options as $option) : ?>
                                                              <option value="<?php echo $option->SECTION_ID?>" <?php echo (isset($edit['SECTION_ID']) && $edit['SECTION_ID'] == $option->SECTION_ID) ? "selected" : ""; ?> ><?php echo $option->CLASS_NAME . ": " . $option->SECTION_NAME; ?></option>
                                                            <?php endforeach; ?>
                                                          </select>
                                                      </td>
                                                      <td>
                                                        <select class="span12 m-wrap" name="att_status">
                                                          <option value="">Select...</option>
                                                          <option value="3">All</option>
                                                          <?php
                                                            $options = $this->db->query("SELECT ATT_STATUS FROM attendance WHERE STATUS = 7 GROUP BY ATT_STATUS")->result();
                                                            
                                                          ?>
                                                          <?php  foreach($options as $option) :?>
                                                            <option value="<?php echo $option->ATT_STATUS?>" <?php echo (isset($edit['ATT_STATUS']) && $edit['ATT_STATUS'] == $option->ATT_STATUS) ? "selected" : ""; ?> ><?php if($option->ATT_STATUS == 1){echo "Present";}elseif($option->ATT_STATUS==0){ echo "Absent";}  ?></option>
                                                          <?php endforeach; ?>
                                                        </select>
                                                      </td>

                                                      <td>
                                                        <div class="control-group">
                                                              <input type="text" name="date_from" data-required="1" class="span12 m-wrap datepicker"  />
                                                        </div>
                                                      </td>

                                                      <td>
                                                        <div class="control-group">
                                                              <input type="text" name="date_to" data-required="1" class="span12 m-wrap datepicker"  />
                                                        </div>
                                                      </td>
                                                      <td>
                                                          <input type="submit" name="filter" class="btn btn-primary" value="Submit Data"  />
                                                          <div class="btn-group">
                                                             <a href="<?php echo $url_prefix . 'attendance_report' ?>"><button class="btn btn-success">Refresh</button></a>
                                                          </div>
                                                      </td>
                                                  </tr>
                                                </table>

                                                    <div style="margin-top: 100px;"></div>

                                                  <?php if(isset($get_record)) : ?>

                                                    <table>
                                                        <tr>
                                                            <td><p>Class Name : </p></td>
                                                          <td><p><?php echo $class_name; ?></p></td>
                                                        </tr>
                                                        <tr>
                                                          <?php if($section_name != ""){?>
                                                            <td><p>Section Name :</p></td>
                                                            <td><p><?php echo $section_name; ?></p></td>
                                                          <?php } ?>
                                                        </tr>
                                                        <tr>
                                                          <td><input type="submit" name="print" class="btn btn-primary" value="Print Pdf"  /></td>
                                                        </tr>
                                                    </table>

                                                    <div style="margin-top: 20px;"></div>

                                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                                      <tr>
                                                        <th>Student Name</th>
                                                        <th>Roll No</th>
                                                        <th>Attendance Date</th>
                                                        <th>Attendance Status</th>
                                                        <th>Comment</th>
                                                      </tr>
                                                      <?php foreach($get_record as $v) : ?>
                                                        <tr>
                                                          <td><?php echo $v->NAME; ?></td>
                                                          <td><?php echo $v->ROLL_NO; ?></td>
                                                          <td><?php echo $v->CREATED_DATE; ?></td>
                                                          <td>
                                                            <?php
                                                                if($v->ATT_STATUS == 0) {
                                                                  echo '<span class="label label-danger-custom">Absent</span>';
                                                                }
                                                                else if($v->ATT_STATUS == 1) {
                                                                  echo '<span class="label label-success">Present</span>';
                                                                }
                                                              ?>
                                                          </td>
                                                          <td><?php echo $v->ATT_COMMENT; ?></td>
                                                          <td>
                                                            
                                                          </td>
                                                        </tr>
                                                      <?php endforeach; ?>

                                                    </table>
                                                 <?php else: ?>
                                                  <!-- data nai vai -->
                                                <?php endif; ?>
                                        </fieldset>
                                    </form>
                                    <!-- END FORM-->
                                  </div>
                                </div>
                            </div>
                            <!-- /block -->
                        </div>
                         <!-- /validation -->
                    
                    
                    
                </div>
        
            </div>
            
<?php include(APPPATH."views/admin/admin_footer.php"); ?>