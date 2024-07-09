<?php include(APPPATH."views/admin/admin_header.php"); ?>

  <style type="text/css">
    table{
    //border: 1px solid #000 !important;
    }

    
    .new_table th{
      border: 1px solid #000 !important;
      text-align: center;
      padding: 20px;
    }

    .new_table td{
      padding: 5px;
      border: 1px solid #000 !important;
      text-align: center;
    }

    .new_table .none-padding{
      padding: 0px !important;
    }

    .new_table table{
      padding: 0px !important;
      margin: 0px;

    }

    .new_table .s-table .sd{
      border-right: 0px solid #000 !important;
      border-top: 0px solid #000 !important;
      border-left: 0px solid #000 !important;
    }

    .new_table .s-table .sdd{
      padding: 10px;
      border-left: 0px solid #000 !important;
      border-bottom: 0px solid #000 !important;
    }

    .new_table .s-table .ssd{
       padding: 10px;
      border-right: 0px solid #000 !important;
      border-bottom: 0px solid #000 !important;
    }

    .new_table .s-table .pd{
       padding: 10px;
      border-bottom: 0px solid #000 !important;
    }
    
  </style>

        <div class="container" id="wrapper">
            <div id="page_student_marksheet" class="row-fluid page_identifier">
                <div class="span12" id="content">
                    <div class="row-fluid">

                        <!-- here will goes alert message -->
                        <?php if(isset($optional_not_found)) { ?>
                          <div class="alert alert-danger">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <h4>Failed</h4>
                              <?php echo $optional_not_found; ?>
                          </div>
                        <?php } ?>
                        <!-- alert message end -->

                          <div class="navbar">
                              <div class="navbar-inner">
                                  <ul class="breadcrumb">
                                      <li>
                                          <b>Progress Report</b>  
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
                                    <div class="muted pull-left">Progress Report</div>
                                </div>
                                <div class="block-content collapse in">
                                  <div class="span12">
                                    <!-- BEGIN FORM-->
                                    <form method="post" action=""  enctype="multipart/form-data" id="" class="form-horizontal">

                                        <input id="token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <fieldset>
                                               <table cellpadding="0" cellspacing="0" border="0" class="table table-striped">
                                                  <tr>
                                                      <th>Class Name</th>
                                                      <th>Section Name</th>
                                                      <th>Student Name</th>
                                                      <th>Exam Name</th>
                                                      <th>Year</th>
                                                      <th>Action</th>
                                                  </tr>
                                                  <tr>
                                                      <td>
                                                        <select id="class_list" class="span12 m-wrap" name="class_id">
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
                                                          <select id="section_list" class="span12 m-wrap" name="section_id">
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
                                                        <select id="student_list" class="span12 m-wrap" name="student_id">
                                                          <option value="">Select...</option>
                                                          <?php
                                                            $options = $this->db->query("SELECT STUDENT_ID, NAME FROM student_info WHERE STATUS = 7")->result();
                                                            
                                                          ?>
                                                          <?php  foreach($options as $option) :?>
                                                            <option value="<?php echo $option->STUDENT_ID?>" <?php echo (isset($edit['STUDENT_ID']) && $edit['STUDENT_ID'] == $option->STUDENT_ID) ? "selected" : ""; ?> ><?php echo $option->NAME ?></option>
                                                          <?php endforeach; ?>
                                                        </select>
                                                      </td>

                                                      <td>
                                                        <div class="control-group">
                                                          <!-- <div class="controls"> -->
                                                            <select class="span12 m-wrap" name="exam_id">
                                                              <option value="">Select...</option>
                                                              <?php
                                                                $options = $this->db->query("SELECT * FROM exam WHERE STATUS =7")->result();
                                                              ?>
                                                              <?php foreach($options as $option) : ?>
                                                                <option value="<?php echo $option->EXAM_ID;?>"><?php echo $option->EXAM_NAME; ?></option>
                                                              <?php endforeach; ?>
                                                            </select>
                                                            <span class="fred"><?php //echo form_error('exam_id'); ?></span>
                                                          <!-- </div> -->
                                                        </div>
                                                      </td>

                                                      <td>
                                                        <select name="year" class="form-control">
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
                                                      <td>
                                                          <input type="submit" name="filter" class="btn btn-primary" value="Submit Data"  />
                                                      </td>
                                                  </tr>
                                                </table>

                                                    <div style="margin-top: 100px;"></div>

                                                  <?php if(isset($get_record)) : ?>

                                                    <table>
                                                        <tr>
                                                          <td><p><b>Student Name :</b></p></td>
                                                          <td><p><b><?php echo $student_name; ?></b></p></td>
                                                        </tr>
                                                        <tr>
                                                            <td><p><b>Class Name : </b></p></td>
                                                          <td><p><b><?php echo $class_name; ?></b></p></td>
                                                        </tr>
                                                        <tr>
                                                            <td><p><b>Section Name :</b></p></td>
                                                          <td><p><b><?php echo $section_name; ?></b></p></td>
                                                        </tr>
                                                        <tr>
                                                            <td><p><b>Exam Name :</b></p></td>
                                                          <td><p><b><?php echo $exam_name; ?></b></p></td>
                                                        </tr>
                                                        <tr><td><a target="_blank" href="<?php echo $url_prefix; ?>print_progress_report/<?php echo $class_id; ?>/<?php echo $section_id; ?>/<?php echo $student_id; ?>/<?php echo $exam_id; ?>/<?php echo $year; ?>" class="btn btn-danger">Print</a></td></tr>
                                                    </table>

                                                    <div style="margin-top: 20px;"></div>

                                                    <div class="new_table">
                                                      <table>
                                                          <tr>
                                                            <th>SI.No.</th>
                                                            <th>Name of Subject</th>
                                                            <th>Total</th>
                                                            <th class="none-padding" colspan="3">
                                                              <table class="s-table">
                                                                <tr><th class="sd" colspan="3">Subject</th></tr>
                                                                <tr>
                                                                  <th class="sdd">Total</th>
                                                                  <th class="pd">Pass</th>
                                                                  <th class="ssd">Obtained</th>
                                                                </tr>
                                                              </table>
                                                            </th>
                                                            <th class="none-padding" colspan="3">
                                                              <table class="s-table">
                                                                <tr><th class="sd" colspan="3">Objective</th></tr>
                                                                <tr>
                                                                  <th class="sdd">Total</th>
                                                                  <th class="pd">Pass</th>
                                                                  <th class="ssd">Obtained</th>
                                                                </tr>
                                                              </table>
                                                            </th>
                                                            <th class="none-padding" colspan="3">
                                                              <table class="s-table">
                                                                <tr><th class="sd" colspan="3">Practical</th></tr>
                                                                <tr>
                                                                  <th class="sdd">Total</th>
                                                                  <th class="pd">Pass</th>
                                                                  <th class="ssd">Obtained</th>
                                                                </tr>
                                                              </table>
                                                            </th>
                                                            <th>Total Obtained</th>
                                                            <th>Height Obtained</th>
                                                            <th>Letter Grade</th>
                                                            <th>Grade Point</th>
                                                            <th>
                                                              Without Additional Subject
                                                            </th>
                                                            <th>with additional subject</th>
                                                          </tr>

                                                          <!-- bangla 1st & bangla 2nd paper -->
                                                          <?php
                                                            $i_b=1;
                                                            $total_mark=$s_total=$s_pass=$s_mark=$o_total=$o_pass=$o_mark=$mark_obtained=array();
                                                            foreach($bangla_sub as $v_b) {

                                                              $total_mark[] = $v_b->TOTAL_MARK;
                                                              $s_total[] = $v_b->SUBJECTIVE_MARK_TOTAL;
                                                              $s_pass[] = $v_b->SUBJECTIVE_PASS;
                                                              $s_mark[] = $v_b->SUBJECTIVE_MARK;
                                                              $o_total[] = $v_b->OBJECTIVE_MARK_TOTAL;
                                                              $o_pass[] = $v_b->OBJECTIVE_PASS;
                                                              $o_mark[] = $v_b->OBJECTIVE_MARK;
                                                              $mark_obtained[] = $v_b->MARK_OBTAINED;

                                                          ?>
                                                            <tr>
                                                              <?php if($i_b==1) : ?>
                                                                <td rowspan=3><?php echo $i_b; ?></td>
                                                              <?php endif; ?>
                                                              <td><?php echo $v_b->SUBJECT_NAME; ?></td>
                                                              <td><?php echo $v_b->TOTAL_MARK; ?></td>
                                                              <td><?php echo $v_b->SUBJECTIVE_MARK_TOTAL; ?></td>
                                                              <td><?php echo $v_b->SUBJECTIVE_PASS; ?></td>
                                                              <td><?php echo $v_b->SUBJECTIVE_MARK; ?></td>
                                                              <td><?php echo $v_b->OBJECTIVE_MARK_TOTAL; ?></td>
                                                              <td><?php echo $v_b->OBJECTIVE_PASS; ?></td>
                                                              <td><?php echo $v_b->OBJECTIVE_MARK; ?></td>
                                                              <td></td>
                                                              <td></td>
                                                              <td></td>
                                                              <td><?php echo $v_b->MARK_OBTAINED; ?></td>
                                                              <td><?php echo ""; ?></td>
                                                              <td>
                                                              <?php
                                                                if(($v_b->SUBJECTIVE_MARK < $v_b->SUBJECTIVE_PASS) || ($v_b->OBJECTIVE_MARK < $v_b->OBJECTIVE_PASS)) {
                                                                  echo "F";
                                                                }
                                                                else {
                                                                  if($v_b->MARK_OBTAINED >= 80) {
                                                                    echo "A+";
                                                                  }
                                                                  else if( ($v_b->MARK_OBTAINED >= 70) && ($v_b->MARK_OBTAINED <=79) ) {
                                                                    echo "A";
                                                                  }
                                                                  else if( ($v_b->MARK_OBTAINED >= 60) && ($v_b->MARK_OBTAINED <=69) ) {
                                                                    echo "A-";
                                                                  }
                                                                  else if( ($v_b->MARK_OBTAINED >= 50) && ($v_b->MARK_OBTAINED <=59) ) {
                                                                    echo "B";
                                                                  }
                                                                  else if( ($v_b->MARK_OBTAINED >= 40) && ($v_b->MARK_OBTAINED <=49) ) {
                                                                    echo "C";
                                                                  }
                                                                  else if( ($v_b->MARK_OBTAINED >= 33) && ($v_b->MARK_OBTAINED <=39) ) {
                                                                    echo "D";
                                                                  }
                                                                  else if( ($v_b->MARK_OBTAINED <= 32) ) {
                                                                    echo "F";
                                                                  }
                                                                }
                                                              ?>
                                                              </td>
                                                              <td>
                                                              <?php
                                                                if(($v_b->SUBJECTIVE_MARK < $v_b->SUBJECTIVE_PASS) || ($v_b->OBJECTIVE_MARK < $v_b->OBJECTIVE_PASS)) {
                                                                  echo "0.0";
                                                                }
                                                                else {
                                                                  if($v_b->MARK_OBTAINED >= 80) {
                                                                    echo "5.0";
                                                                  }
                                                                  else if( ($v_b->MARK_OBTAINED >= 70) && ($v_b->MARK_OBTAINED <=79) ) {
                                                                    echo "4.0";
                                                                  }
                                                                  else if( ($v_b->MARK_OBTAINED >= 60) && ($v_b->MARK_OBTAINED <=69) ) {
                                                                    echo "3.5";
                                                                  }
                                                                  else if( ($v_b->MARK_OBTAINED >= 50) && ($v_b->MARK_OBTAINED <=59) ) {
                                                                    echo "3.0";
                                                                  }
                                                                  else if( ($v_b->MARK_OBTAINED >= 40) && ($v_b->MARK_OBTAINED <=49) ) {
                                                                    echo "2.0";
                                                                  }
                                                                  else if( ($v_b->MARK_OBTAINED >= 33) && ($v_b->MARK_OBTAINED <=39) ) {
                                                                    echo "1.0";
                                                                  }
                                                                  else if( ($v_b->MARK_OBTAINED <= 32) ) {
                                                                    echo "0.0";
                                                                  }
                                                                }
                                                              ?>
                                                              </td>
                                                              <?php if($i_b==1) : ?>
                                                                <td  rowspan="15">
                                                                
                                                                  <?php
                                                                    if($failed_any_sub) {
                                                                      
                                                                  ?>
                                                                  <table width="100%">
                                                                    <tr>
                                                                      <td><?php echo "GPA"; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td><?php echo "0.0"; ?></td>
                                                                    </tr>
                                                                  </table>

                                                                  <table style='width:100%; margin-top: 35px;'>
                                                                    <tr>
                                                                      <td><?php echo "Marks"; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td><?php echo $without_opt_mark; ?></td>
                                                                    </tr>
                                                                  </table>
                                                                  <?php }
                                                                      else {
                                                                      
                                                                  ?>
                                                                    <table width="100%">
                                                                      <tr>
                                                                        <td>GPA</td>
                                                                      </tr>
                                                                      <tr>
                                                                        <td><?php echo number_format($without_optional, 2); ?></td>
                                                                      </tr>
                                                                    </table>
                                                                    <table style='width:100%; margin-top: 35px;'>
                                                                      <tr>
                                                                        <td>Marks</td>
                                                                      </tr>
                                                                      <tr>
                                                                        <td><?php echo $without_opt_mark; ?></td>
                                                                      </tr>
                                                                    </table>
                                                                  <?php } ?>

                                                                </td>
                                                                <td rowspan="16">
                                                                  <?php
                                                                      if($failed_any_sub) {
                                                                  ?>
                                                                  <table width="100%">
                                                                    <tr>
                                                                      <td><?php echo "GPA"; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td><?php echo "0.0"; ?></td>
                                                                    </tr>
                                                                  </table>
                                                                  <table style='width:100%; margin-top: 35px;'>
                                                                    <tr>
                                                                      <td><?php echo "Marks"; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td><?php echo $with_opt_mark; ?></td>
                                                                    </tr>
                                                                  </table>
                                                                  <?php }
                                                                      else {
                                                                      $gpa = number_format($with_optional, 2);
                                                                  ?>
                                                                    <table width="100%">
                                                                      <tr>
                                                                        <td>GPA</td>
                                                                      </tr>
                                                                      <tr>
                                                                        <td><?php echo ($gpa > 5) ? "5.0" : $gpa; ?></td>
                                                                      </tr>
                                                                    </table>
                                                                    <table style='width:100%; margin-top: 35px;'>
                                                                      <tr>
                                                                        <td>Marks</td>
                                                                      </tr>
                                                                      <tr>
                                                                        <td><?php echo $with_opt_mark; ?></td>
                                                                      </tr>
                                                                    </table>
                                                                  <?php } ?>
                                                                </td>
                                                              <?php endif; ?>
                                                            </tr>

                                                          <?php $i_b++; } ?>

                                                            <tr>
                                                              <td>Total</td>
                                                              <td><?php echo array_sum($total_mark); ?></td>
                                                              <td><?php echo array_sum($s_total); ?></td>
                                                              <td><?php echo array_sum($s_pass); ?></td>
                                                              <td><?php echo array_sum($s_mark); ?></td>
                                                              <td><?php echo array_sum($o_total); ?></td>
                                                              <td><?php echo array_sum($o_pass); ?></td>
                                                              <td><?php echo array_sum($o_mark); ?></td>
                                                              <td></td>
                                                              <td></td>
                                                              <td></td>
                                                              <td>
                                                                <?php
                                                                  $total_avg = array_sum($total_mark)/2;
                                                                  $bangla_avg = array_sum($mark_obtained)/2;
                                                                  $bangla_avg = ($bangla_avg*100)/$total_avg;
                                                                  echo array_sum($mark_obtained) . " (". $bangla_avg . "%)";
                                                                ?>
                                                              </td>
                                                              <td><?php echo ""; ?></td>
                                                              <td>
                                                              <?php
                                                                if($failed_in_bangla) {
                                                                  echo "F";
                                                                }
                                                                else {
                                                                  $bangla_avg = array_sum($mark_obtained)/2;
                                                                  if($bangla_avg >= 80) {
                                                                    echo "A+";
                                                                  }
                                                                  else if( ($bangla_avg >= 70) && ($bangla_avg <=79) ) {
                                                                    echo "A";
                                                                  }
                                                                  else if( ($bangla_avg >= 60) && ($bangla_avg <=69) ) {
                                                                    echo "A-";
                                                                  }
                                                                  else if( ($bangla_avg >= 50) && ($bangla_avg <=59) ) {
                                                                    echo "B";
                                                                  }
                                                                  else if( ($bangla_avg >= 40) && ($bangla_avg <=49) ) {
                                                                    echo "C";
                                                                  }
                                                                  else if( ($bangla_avg >= 33) && ($bangla_avg <=39) ) {
                                                                    echo "D";
                                                                  }
                                                                  else if( ($bangla_avg <= 32) ) {
                                                                    echo "F";
                                                                  }
                                                                }
                                                              ?>
                                                              </td>
                                                              <td>
                                                              <?php
                                                                if($failed_in_bangla) {
                                                                  echo "0.0";
                                                                }
                                                                else {
                                                                  if($bangla_avg >= 80) {
                                                                    echo "5.0";
                                                                  }
                                                                  else if( ($bangla_avg >= 70) && ($bangla_avg <=79) ) {
                                                                    echo "4.0";
                                                                  }
                                                                  else if( ($bangla_avg >= 60) && ($bangla_avg <=69) ) {
                                                                    echo "3.5";
                                                                  }
                                                                  else if( ($bangla_avg >= 50) && ($bangla_avg <=59) ) {
                                                                    echo "3.0";
                                                                  }
                                                                  else if( ($bangla_avg >= 40) && ($bangla_avg <=49) ) {
                                                                    echo "2.0";
                                                                  }
                                                                  else if( ($bangla_avg >= 33) && ($bangla_avg <=39) ) {
                                                                    echo "1.0";
                                                                  }
                                                                  else if( ($bangla_avg <= 32) ) {
                                                                    echo "0.0";
                                                                  }
                                                                }
                                                              ?>
                                                              </td>
                                                              <!-- <td  rowspan="10"></td> -->
                                                              <!-- <td></td> -->
                                                            </tr>

                                                          <!-- end bangla 1st & 2nd paper -->


                                                          <!-- english 1st & english 2nd paper -->
                                                          <?php
                                                            $i_e=2;
                                                            $total_mark_e=$s_total_e=$s_pass_e=$s_mark_e=$o_total_e=$o_pass_e=$o_mark_e=$mark_obtained_e=array();
                                                            foreach($english_sub as $v_e) {

                                                              $total_mark_e[] = $v_e->TOTAL_MARK;
                                                              $s_total_e[] = $v_e->SUBJECTIVE_MARK_TOTAL;
                                                              $s_pass_e[] = $v_e->SUBJECTIVE_PASS;
                                                              $s_mark_e[] = $v_e->SUBJECTIVE_MARK;
                                                              $o_total_e[] = $v_e->OBJECTIVE_MARK_TOTAL;
                                                              $o_pass_e[] = $v_e->OBJECTIVE_PASS;
                                                              $o_mark_e[] = $v_e->OBJECTIVE_MARK;
                                                              $mark_obtained_e[] = $v_e->MARK_OBTAINED;

                                                          ?>
                                                            <tr>
                                                              <?php if($i_e==2) : ?>
                                                                <td rowspan=3><?php echo $i_e; ?></td>
                                                              <?php endif; ?>
                                                              <td><?php echo $v_e->SUBJECT_NAME; ?></td>
                                                              <td><?php echo $v_e->TOTAL_MARK; ?></td>
                                                              <td><?php echo $v_e->SUBJECTIVE_MARK_TOTAL; ?></td>
                                                              <td><?php echo $v_e->SUBJECTIVE_PASS; ?></td>
                                                              <td><?php echo $v_e->SUBJECTIVE_MARK; ?></td>
                                                              <td><?php echo $v_e->OBJECTIVE_MARK_TOTAL; ?></td>
                                                              <td><?php echo $v_e->OBJECTIVE_PASS; ?></td>
                                                              <td><?php echo $v_e->OBJECTIVE_MARK; ?></td>
                                                              <td></td>
                                                              <td></td>
                                                              <td></td>
                                                              <td><?php echo $v_e->MARK_OBTAINED; ?></td>
                                                              <td><?php echo ""; ?></td>
                                                              <td>
                                                              <?php
                                                                if(($v_e->SUBJECTIVE_MARK < $v_e->SUBJECTIVE_PASS) || ($v_e->OBJECTIVE_MARK < $v_e->OBJECTIVE_PASS)) {
                                                                  echo "F";
                                                                }
                                                                else {
                                                                  if($v_e->MARK_OBTAINED >= 80) {
                                                                    echo "A+";
                                                                  }
                                                                  else if( ($v_e->MARK_OBTAINED >= 70) && ($v_e->MARK_OBTAINED <=79) ) {
                                                                    echo "A";
                                                                  }
                                                                  else if( ($v_e->MARK_OBTAINED >= 60) && ($v_e->MARK_OBTAINED <=69) ) {
                                                                    echo "A-";
                                                                  }
                                                                  else if( ($v_e->MARK_OBTAINED >= 50) && ($v_e->MARK_OBTAINED <=59) ) {
                                                                    echo "B";
                                                                  }
                                                                  else if( ($v_e->MARK_OBTAINED >= 40) && ($v_e->MARK_OBTAINED <=49) ) {
                                                                    echo "C";
                                                                  }
                                                                  else if( ($v_e->MARK_OBTAINED >= 33) && ($v_e->MARK_OBTAINED <=39) ) {
                                                                    echo "D";
                                                                  }
                                                                  else if( ($v_e->MARK_OBTAINED <= 32) ) {
                                                                    echo "F";
                                                                  }
                                                                }
                                                              ?>
                                                              </td>
                                                              <td>
                                                              <?php
                                                                if(($v_e->SUBJECTIVE_MARK < $v_e->SUBJECTIVE_PASS) || ($v_e->OBJECTIVE_MARK < $v_e->OBJECTIVE_PASS)) {
                                                                  echo "0.0";
                                                                }
                                                                else {
                                                                  if($v_e->MARK_OBTAINED >= 80) {
                                                                    echo "5.0";
                                                                  }
                                                                  else if( ($v_e->MARK_OBTAINED >= 70) && ($v_e->MARK_OBTAINED <=79) ) {
                                                                    echo "4.0";
                                                                  }
                                                                  else if( ($v_e->MARK_OBTAINED >= 60) && ($v_e->MARK_OBTAINED <=69) ) {
                                                                    echo "3.5";
                                                                  }
                                                                  else if( ($v_e->MARK_OBTAINED >= 50) && ($v_e->MARK_OBTAINED <=59) ) {
                                                                    echo "3.0";
                                                                  }
                                                                  else if( ($v_e->MARK_OBTAINED >= 40) && ($v_e->MARK_OBTAINED <=49) ) {
                                                                    echo "2.0";
                                                                  }
                                                                  else if( ($v_e->MARK_OBTAINED >= 33) && ($v_e->MARK_OBTAINED <=39) ) {
                                                                    echo "1.0";
                                                                  }
                                                                  else if( ($v_e->MARK_OBTAINED <= 32) ) {
                                                                    echo "0.0";
                                                                  }
                                                                }
                                                              ?>
                                                              </td>
                                                              <!-- <td  rowspan="10"></td> -->
                                                              <!-- <td></td> -->
                                                            </tr>

                                                          <?php $i_e++; } ?>

                                                            <tr>
                                                              <td>Total</td>
                                                              <td><?php echo array_sum($total_mark_e); ?></td>
                                                              <td><?php echo array_sum($s_total_e); ?></td>
                                                              <td><?php echo array_sum($s_pass_e); ?></td>
                                                              <td><?php echo array_sum($s_mark_e); ?></td>
                                                              <td><?php echo array_sum($o_total_e); ?></td>
                                                              <td><?php echo array_sum($o_pass_e); ?></td>
                                                              <td><?php echo array_sum($o_mark_e); ?></td>
                                                              <td></td>
                                                              <td></td>
                                                              <td></td>
                                                              <td>
                                                                <?php
                                                                  $total_avg_e = array_sum($total_mark_e)/2;
                                                                  $english_avg_e = array_sum($mark_obtained_e)/2;
                                                                  $english_avg_e = ($english_avg_e*100)/$total_avg_e;
                                                                  echo array_sum($mark_obtained_e) . " (" . $english_avg_e . "%)";
                                                                ?>
                                                              </td>
                                                              <td><?php echo ""; ?></td>
                                                              <td>
                                                              <?php
                                                                if($failed_in_english) {
                                                                  echo "F";
                                                                }
                                                                else {
                                                                  $english_avg = array_sum($mark_obtained_e)/2;
                                                                  if($english_avg >= 80) {
                                                                    echo "A+";
                                                                  }
                                                                  else if( ($english_avg >= 70) && ($english_avg <=79) ) {
                                                                    echo "A";
                                                                  }
                                                                  else if( ($english_avg >= 60) && ($english_avg <=69) ) {
                                                                    echo "A-";
                                                                  }
                                                                  else if( ($english_avg >= 50) && ($english_avg <=59) ) {
                                                                    echo "B";
                                                                  }
                                                                  else if( ($english_avg >= 40) && ($english_avg <=49) ) {
                                                                    echo "C";
                                                                  }
                                                                  else if( ($english_avg >= 33) && ($english_avg <=39) ) {
                                                                    echo "D";
                                                                  }
                                                                  else if( ($english_avg <= 32) ) {
                                                                    echo "F";
                                                                  }
                                                                }
                                                              ?>
                                                              </td>
                                                              <td>
                                                              <?php
                                                                if($failed_in_english) {
                                                                  echo "0.0";
                                                                }
                                                                else {
                                                                  if($english_avg >= 80) {
                                                                    echo "5.0";
                                                                  }
                                                                  else if( ($english_avg >= 70) && ($english_avg <=79) ) {
                                                                    echo "4.0";
                                                                  }
                                                                  else if( ($english_avg >= 60) && ($english_avg <=69) ) {
                                                                    echo "3.5";
                                                                  }
                                                                  else if( ($english_avg >= 50) && ($english_avg <=59) ) {
                                                                    echo "3.0";
                                                                  }
                                                                  else if( ($english_avg >= 40) && ($english_avg <=49) ) {
                                                                    echo "2.0";
                                                                  }
                                                                  else if( ($english_avg >= 33) && ($english_avg <=39) ) {
                                                                    echo "1.0";
                                                                  }
                                                                  else if( ($english_avg <= 32) ) {
                                                                    echo "0.0";
                                                                  }
                                                                }
                                                              ?>
                                                              </td>
                                                              <!-- <td  rowspan="10"></td> -->
                                                              <!-- <td></td> -->
                                                            </tr>

                                                          <!-- end english 1st & 2nd paper -->







                                                          <!-- start main subjects -->
                                                          <?php $i=3; foreach($get_record as $v) { ?>

                                                            <tr>
                                                              <td><?php echo $i; ?></td>
                                                              <td><?php echo $v->SUBJECT_NAME; ?></td>
                                                              <td><?php echo $v->TOTAL_MARK; ?></td>
                                                              <td><?php echo $v->SUBJECTIVE_MARK_TOTAL; ?></td>
                                                              <td><?php echo $v->SUBJECTIVE_PASS; ?></td>
                                                              <td><?php echo $v->SUBJECTIVE_MARK; ?></td>
                                                              <td><?php echo $v->OBJECTIVE_MARK_TOTAL; ?></td>
                                                              <td><?php echo $v->OBJECTIVE_PASS; ?></td>
                                                              <td><?php echo $v->OBJECTIVE_MARK; ?></td>
                                                              <td><?php echo $v->PRACTICAL_MARK_TOTAL; ?></td>
                                                              <td><?php echo $v->PRACTICAL_PASS; ?></td>
                                                              <td><?php echo $v->PRACTICAL_MARK; ?></td>
                                                              <td>
                                                                <?php
                                                                  $main_avg = $v->MARK_OBTAINED;
                                                                  $main_avg = ($main_avg*100)/$v->TOTAL_MARK;
                                                                  echo $v->MARK_OBTAINED . " (" . $main_avg . "%)";
                                                                ?>
                                                              </td>
                                                              <td><?php echo ""; ?></td>
                                                              <td>
                                                              <?php
                                                                if(($v->SUBJECTIVE_MARK < $v->SUBJECTIVE_PASS) || ($v->OBJECTIVE_MARK < $v->OBJECTIVE_PASS)) {
                                                                  echo "F";
                                                                }
                                                                else {
                                                                  if($v->MARK_OBTAINED >= 80) {
                                                                    echo "A+";
                                                                  }
                                                                  else if( ($v->MARK_OBTAINED >= 70) && ($v->MARK_OBTAINED <=79) ) {
                                                                    echo "A";
                                                                  }
                                                                  else if( ($v->MARK_OBTAINED >= 60) && ($v->MARK_OBTAINED <=69) ) {
                                                                    echo "A-";
                                                                  }
                                                                  else if( ($v->MARK_OBTAINED >= 50) && ($v->MARK_OBTAINED <=59) ) {
                                                                    echo "B";
                                                                  }
                                                                  else if( ($v->MARK_OBTAINED >= 40) && ($v->MARK_OBTAINED <=49) ) {
                                                                    echo "C";
                                                                  }
                                                                  else if( ($v->MARK_OBTAINED >= 33) && ($v->MARK_OBTAINED <=39) ) {
                                                                    echo "D";
                                                                  }
                                                                  else if( ($v->MARK_OBTAINED <= 32) ) {
                                                                    echo "F";
                                                                  }
                                                                }
                                                              ?>
                                                              </td>
                                                              <td>
                                                              <?php
                                                                if(($v->SUBJECTIVE_MARK < $v->SUBJECTIVE_PASS) || ($v->OBJECTIVE_MARK < $v->OBJECTIVE_PASS)) {
                                                                  echo "0.0";
                                                                }
                                                                else {
                                                                  if($v->MARK_OBTAINED >= 80) {
                                                                    echo "5.0";
                                                                  }
                                                                  else if( ($v->MARK_OBTAINED >= 70) && ($v->MARK_OBTAINED <=79) ) {
                                                                    echo "4.0";
                                                                  }
                                                                  else if( ($v->MARK_OBTAINED >= 60) && ($v->MARK_OBTAINED <=69) ) {
                                                                    echo "3.5";
                                                                  }
                                                                  else if( ($v->MARK_OBTAINED >= 50) && ($v->MARK_OBTAINED <=59) ) {
                                                                    echo "3.0";
                                                                  }
                                                                  else if( ($v->MARK_OBTAINED >= 40) && ($v->MARK_OBTAINED <=49) ) {
                                                                    echo "2.0";
                                                                  }
                                                                  else if( ($v->MARK_OBTAINED >= 33) && ($v->MARK_OBTAINED <=39) ) {
                                                                    echo "1.0";
                                                                  }
                                                                  else if( ($v->MARK_OBTAINED <= 32) ) {
                                                                    echo "0.0";
                                                                  }
                                                                }
                                                              ?>
                                                              </td>
                                                              <!-- <td  rowspan="10"></td> -->
                                                              <!-- <td></td> -->
                                                            </tr>

                                                          <?php $i++; } ?>
                                                          <!-- end main subjects -->










                                                          <!-- start group subjects -->

                                                          <?php foreach($group_sub as $v_g) { ?>

                                                            <tr>
                                                              <td><?php echo $i; ?></td>
                                                              <td><?php echo $v_g->SUBJECT_NAME; ?></td>
                                                              <td><?php echo $v_g->TOTAL_MARK; ?></td>
                                                              <td><?php echo $v_g->SUBJECTIVE_MARK_TOTAL; ?></td>
                                                              <td><?php echo $v_g->SUBJECTIVE_PASS; ?></td>
                                                              <td><?php echo $v_g->SUBJECTIVE_MARK; ?></td>
                                                              <td><?php echo $v_g->OBJECTIVE_MARK_TOTAL; ?></td>
                                                              <td><?php echo $v_g->OBJECTIVE_PASS; ?></td>
                                                              <td><?php echo $v_g->OBJECTIVE_MARK; ?></td>
                                                              <td><?php echo $v_g->PRACTICAL_MARK_TOTAL; ?></td>
                                                              <td><?php echo $v_g->PRACTICAL_PASS; ?></td>
                                                              <td><?php echo $v_g->PRACTICAL_MARK; ?></td>
                                                              <td>
                                                                <?php
                                                                  $group_avg = $v_g->MARK_OBTAINED;
                                                                  $group_avg = ($group_avg*100)/$v_g->TOTAL_MARK;
                                                                  echo $v_g->MARK_OBTAINED . " (" . $group_avg . "%)";
                                                                ?>
                                                              </td>
                                                              <td><?php echo " "; ?></td>
                                                              <td>
                                                              <?php
                                                                if(($v_g->SUBJECTIVE_MARK < $v_g->SUBJECTIVE_PASS) || ($v_g->OBJECTIVE_MARK < $v_g->OBJECTIVE_PASS)) {
                                                                  echo "F";
                                                                }
                                                                else {
                                                                  if($v_g->MARK_OBTAINED >= 80) {
                                                                    echo "A+";
                                                                  }
                                                                  else if( ($v_g->MARK_OBTAINED >= 70) && ($v_g->MARK_OBTAINED <=79) ) {
                                                                    echo "A";
                                                                  }
                                                                  else if( ($v_g->MARK_OBTAINED >= 60) && ($v_g->MARK_OBTAINED <=69) ) {
                                                                    echo "A-";
                                                                  }
                                                                  else if( ($v_g->MARK_OBTAINED >= 50) && ($v_g->MARK_OBTAINED <=59) ) {
                                                                    echo "B";
                                                                  }
                                                                  else if( ($v_g->MARK_OBTAINED >= 40) && ($v_g->MARK_OBTAINED <=49) ) {
                                                                    echo "C";
                                                                  }
                                                                  else if( ($v_g->MARK_OBTAINED >= 33) && ($v_g->MARK_OBTAINED <=39) ) {
                                                                    echo "D";
                                                                  }
                                                                  else if( ($v_g->MARK_OBTAINED <= 32) ) {
                                                                    echo "F";
                                                                  }
                                                                }
                                                              ?>
                                                              </td>
                                                              <td>
                                                              <?php
                                                                if(($v_g->SUBJECTIVE_MARK < $v_g->SUBJECTIVE_PASS) || ($v_g->OBJECTIVE_MARK < $v_g->OBJECTIVE_PASS)) {
                                                                  echo "0.0";
                                                                }
                                                                else {
                                                                  if($v_g->MARK_OBTAINED >= 80) {
                                                                    echo "5.0";
                                                                  }
                                                                  else if( ($v_g->MARK_OBTAINED >= 70) && ($v_g->MARK_OBTAINED <=79) ) {
                                                                    echo "4.0";
                                                                  }
                                                                  else if( ($v_g->MARK_OBTAINED >= 60) && ($v_g->MARK_OBTAINED <=69) ) {
                                                                    echo "3.5";
                                                                  }
                                                                  else if( ($v_g->MARK_OBTAINED >= 50) && ($v_g->MARK_OBTAINED <=59) ) {
                                                                    echo "3.0";
                                                                  }
                                                                  else if( ($v_g->MARK_OBTAINED >= 40) && ($v_g->MARK_OBTAINED <=49) ) {
                                                                    echo "2.0";
                                                                  }
                                                                  else if( ($v_g->MARK_OBTAINED >= 33) && ($v_g->MARK_OBTAINED <=39) ) {
                                                                    echo "1.0";
                                                                  }
                                                                  else if( ($v_g->MARK_OBTAINED <= 32) ) {
                                                                    echo "0.0";
                                                                  }
                                                                }
                                                              ?>
                                                              </td>
                                                              <!-- <td  rowspan="10"></td> -->
                                                              <!-- <td></td> -->
                                                            </tr>

                                                          <?php $i++; } ?>
                                                          <!-- end group subjects -->

                                                          <tr>
                                                            <th colspan=17 style="text-align:left">Optional Subject</th>
                                                          </tr>

                                                          <tr>
                                                            <td><?php echo $i; ?></td>
                                                              <td><?php echo $optional_sub->SUBJECT_NAME; ?></td>
                                                              <td><?php echo $optional_sub->TOTAL_MARK; ?></td>
                                                              <td><?php echo $optional_sub->SUBJECTIVE_MARK_TOTAL; ?></td>
                                                              <td><?php echo $optional_sub->SUBJECTIVE_PASS; ?></td>
                                                              <td><?php echo $optional_sub->SUBJECTIVE_MARK; ?></td>
                                                              <td><?php echo $optional_sub->OBJECTIVE_MARK_TOTAL; ?></td>
                                                              <td><?php echo $optional_sub->OBJECTIVE_PASS; ?></td>
                                                              <td><?php echo $optional_sub->OBJECTIVE_MARK; ?></td>
                                                              <td><?php echo $optional_sub->PRACTICAL_MARK_TOTAL; ?></td>
                                                              <td><?php echo $optional_sub->PRACTICAL_PASS; ?></td>
                                                              <td><?php echo $optional_sub->PRACTICAL_MARK; ?></td>
                                                              <td>
                                                                <?php
                                                                  $optional_avg = $optional_sub->MARK_OBTAINED;
                                                                  $optional_avg = ($optional_avg*100)/$optional_sub->TOTAL_MARK;
                                                                  echo $optional_sub->MARK_OBTAINED . " (" . $optional_avg . "%)";
                                                                ?>
                                                              </td>
                                                              <td ><?php echo ""; ?></td>
                                                              <td>
                                                              <?php
                                                                if(($optional_sub->SUBJECTIVE_MARK < $optional_sub->SUBJECTIVE_PASS) || ($optional_sub->OBJECTIVE_MARK < $optional_sub->OBJECTIVE_PASS)) {
                                                                  echo "F";
                                                                }
                                                                else {
                                                                  if($optional_sub->MARK_OBTAINED >= 80) {
                                                                    echo "A+";
                                                                  }
                                                                  else if( ($optional_sub->MARK_OBTAINED >= 70) && ($optional_sub->MARK_OBTAINED <=79) ) {
                                                                    echo "A";
                                                                  }
                                                                  else if( ($optional_sub->MARK_OBTAINED >= 60) && ($optional_sub->MARK_OBTAINED <=69) ) {
                                                                    echo "A-";
                                                                  }
                                                                  else if( ($optional_sub->MARK_OBTAINED >= 50) && ($optional_sub->MARK_OBTAINED <=59) ) {
                                                                    echo "B";
                                                                  }
                                                                  else if( ($optional_sub->MARK_OBTAINED >= 40) && ($optional_sub->MARK_OBTAINED <=49) ) {
                                                                    echo "C";
                                                                  }
                                                                  else if( ($optional_sub->MARK_OBTAINED >= 33) && ($optional_sub->MARK_OBTAINED <=39) ) {
                                                                    echo "D";
                                                                  }
                                                                  else if( ($optional_sub->MARK_OBTAINED <= 32) ) {
                                                                    echo "F";
                                                                  }
                                                                }
                                                              ?>
                                                              </td>
                                                              <td>
                                                              <?php
                                                                if(($optional_sub->SUBJECTIVE_MARK < $optional_sub->SUBJECTIVE_PASS) || ($optional_sub->OBJECTIVE_MARK < $optional_sub->OBJECTIVE_PASS)) {
                                                                  echo "0.0";
                                                                }
                                                                else {
                                                                  if($optional_sub->MARK_OBTAINED >= 80) {
                                                                    echo "5.0";
                                                                  }
                                                                  else if( ($optional_sub->MARK_OBTAINED >= 70) && ($optional_sub->MARK_OBTAINED <=79) ) {
                                                                    echo "4.0";
                                                                  }
                                                                  else if( ($optional_sub->MARK_OBTAINED >= 60) && ($optional_sub->MARK_OBTAINED <=69) ) {
                                                                    echo "3.5";
                                                                  }
                                                                  else if( ($optional_sub->MARK_OBTAINED >= 50) && ($optional_sub->MARK_OBTAINED <=59) ) {
                                                                    echo "3.0";
                                                                  }
                                                                  else if( ($optional_sub->MARK_OBTAINED >= 40) && ($optional_sub->MARK_OBTAINED <=49) ) {
                                                                    echo "2.0";
                                                                  }
                                                                  else if( ($optional_sub->MARK_OBTAINED >= 33) && ($optional_sub->MARK_OBTAINED <=39) ) {
                                                                    echo "1.0";
                                                                  }
                                                                  else if( ($optional_sub->MARK_OBTAINED <= 32) ) {
                                                                    echo "0.0";
                                                                  }
                                                                }
                                                              ?>
                                                              </td>
                                                              <td>
                                                                <table class="s-table">
                                                                  <tr><th>GP above 2</th></tr>
                                                                  <tr>
                                                                    <th><?php echo $this->webspice->opt_mark_val_to_points($optional_sub->MARK_OBTAINED); ?></th>
                                                                  </tr>
                                                                </table>
                                                              </td>
                                                              <td>
                                                                <table>
                                                                  <tr>
                                                                    <th>Marks Above 40</th>
                                                                  </tr>
                                                                  <tr>
                                                                    <th><?php 
                                                                      if($optional_sub->MARK_OBTAINED > 40){
                                                                          $mark = $optional_sub->MARK_OBTAINED - 40 ;
                                                                        echo $mark; 
                                                                      }else{
                                                                        echo "00";
                                                                      }
                                                                      ?>
                                                                        
                                                                      </th>
                                                                  </tr>
                                                                </table>
                                                              </td>
                                                          </tr>

                                                      </table>
                                                    </div>
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