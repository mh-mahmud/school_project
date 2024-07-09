<?php include(APPPATH."views/admin/admin_header.php"); ?>

        <div class="container" id="wrapper">
            <div id="page_student_marksheet" class="row-fluid page_identifier">
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
                                          <b>Leave Report</b>  
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
                                    <div class="muted pull-left">Leave Report</div>
                                </div>
                                <div class="block-content collapse in">
                                  <div class="span12">
                                    <!-- BEGIN FORM-->
                                    <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                        <input id="token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <fieldset>
                                               <table cellpadding="0" cellspacing="0" border="0" class="table table-striped">
                                                  <tr>
                                                      <th>Teacher Name</th>
                                                      <th>Year</th>
                                                      <th style="text-align:center">Action</th>
                                                  </tr>
                                                  <tr>
                                                      <td>
                                                        <select id="class_list" class="span12 m-wrap" name="teacher_id" required>
                                                          <option value="">Select...</option>
                                                          <?php
                                                            $options = $this->db->query("SELECT * FROM teacher WHERE STATUS=7")->result();
                                                          ?>
                                                          <?php foreach($options as $option) : ?>
                                                          <option value="<?php echo $option->TEACHER_ID?>" <?php echo (isset($edit['TEACHER_ID']) && $edit['TEACHER_ID'] == $option->TEACHER_ID) ? "selected" : ""; ?> ><?php echo $option->TEACHER_NAME; ?></option>
                                                        <?php endforeach; ?>
                                                        </select>
                                                      </td>

                                                      <td>
                                                        <select name="year" class="form-control" required>
                                                          <?php
                                                              $year = date("Y");
                                                           for($i=2015;$i<=2020;$i++):?>
                                                              <option value="<?php echo $i;?>"
                                                                  <?php if(isset($year) && $year==$i)echo 'selected="selected"';?>>
                                                                      <?php echo $i;?>
                                                              </option>
                                                            <?php endfor;?>
                                                        </select>
                                                      </td>
                                                      <td style="text-align:center">
                                                          <input type="submit" name="filter" class="btn btn-primary" value="Submit Data"  />
                                                          <a href="<?php echo $url_prefix; ?>leave_report" class="btn btn-success">Refresh</a>
                                                      </td>
                                                  </tr>
                                                </table>

                                                    <div style="margin-top: 100px;"></div>

                                                  <?php if(isset($get_record)) : ?>

                                                    <!-- <table>
                                                        <tr>
                                                          <td><p>Teacehr Name :</p></td>
                                                          <td><p><?php //echo $teacher_name; ?></p></td>
                                                        </tr>
                                                    </table> -->

                                                    <div style="margin-top: 20px;"></div>

                                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                                      <tr>
                                                        <th>Teacher Name</th>
                                                        <th>Leave Name</th>
                                                        <th>Leave Duration</th>
                                                        <th>Reason</th>
                                                        <th>Date From</th>
                                                        <th>Date To</th>
                                                        <th>Year</th>
                                                      </tr>
                                                      <?php $dura=[]; foreach($get_record as $v) : $dura[]=$v->LEAVE_DURATION; ?>
                                                        <tr>
                                                          <td><?php echo $v->TEACHER_NAME; ?></td>
                                                          <td><?php echo $v->LEAVE_NAME; ?></td>
                                                          <td><?php echo $v->LEAVE_DURATION; ?></td>
                                                          <td><?php echo $v->REASON_FOR_LEAVE; ?></td>
                                                          <td><?php echo $v->DATE_FROM; ?></td>
                                                          <td><?php echo $v->DATE_TO; ?></td>
                                                           <td><?php echo $v->YEAR; ?></td>
                                                        </tr>
                                                      <?php endforeach; ?>
                                                      <tr>
                                                        <td></td>
                                                        <td style="color:red;font-weight:bold">Total</td>
                                                        <td style="color:red;font-weight:bold"><?php echo array_sum($dura); ?> Days</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                      </tr>

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