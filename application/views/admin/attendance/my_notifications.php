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
                                          <b>My Notification</b>  
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
                                <div class="muted pull-left">My Notification</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="">
                                        <thead>
                                            <tr>
                                                <th>Member Name</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>Notification Send Date</th>
                                                <th>Send By</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($get_record as $v) : ?>
                                            <tr class="odd gradeX">
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